# CodeMirror, copyright (c) by Marijn Haverbeke and others
# Distributed under an MIT license: https://codemirror.net/LICENSE

###*
# Tag-closer extension for CodeMirror.
#
# This extension adds an "autoCloseTags" option that can be set to
# either true to get the default behavior, or an object to further
# configure its behavior.
#
# These are supported options:
#
# `whenClosing` (default true)
#   Whether to autoclose when the '/' of a closing tag is typed.
# `whenOpening` (default true)
#   Whether to autoclose the tag when the final '>' of an opening
#   tag is typed.
# `dontCloseTags` (default is empty tags for HTML, none for XML)
#   An array of tag names that should not be autoclosed.
# `indentTags` (default is block tags for HTML, none for XML)
#   An array of tag names that should, when opened, cause a
#   blank line to be added inside the tag, and the blank line and
#   closing line to be indented.
# `emptyTags` (default is none)
#   An array of XML tag names that should be autoclosed with '/>'.
#
# See demos/closetag.html for a usage example.
###

((mod) ->
  if typeof exports == 'object' and typeof module == 'object'
    mod require('../../lib/codemirror'), require('../fold/xml-fold')
  else if typeof define == 'function' and define.amd
    define [
      '../../lib/codemirror'
      '../fold/xml-fold'
    ], mod
  else
    mod CodeMirror
  return
) (CodeMirror) ->

  autoCloseGT = (cm) ->
    `var i`
    if cm.getOption('disableInput')
      return CodeMirror.Pass
    ranges = cm.listSelections()
    replacements = []
    opt = cm.getOption('autoCloseTags')
    i = 0
    while i < ranges.length
      if !ranges[i].empty()
        return CodeMirror.Pass
      pos = ranges[i].head
      tok = cm.getTokenAt(pos)
      inner = CodeMirror.innerMode(cm.getMode(), tok.state)
      state = inner.state
      tagInfo = inner.mode.xmlCurrentTag and inner.mode.xmlCurrentTag(state)
      tagName = tagInfo and tagInfo.name
      if !tagName
        return CodeMirror.Pass
      html = inner.mode.configuration == 'html'
      dontCloseTags = typeof opt == 'object' and opt.dontCloseTags or html and htmlDontClose
      indentTags = typeof opt == 'object' and opt.indentTags or html and htmlIndent
      if tok.end > pos.ch
        tagName = tagName.slice(0, tagName.length - (tok.end) + pos.ch)
      lowerTagName = tagName.toLowerCase()
      # Don't process the '>' at the end of an end-tag or self-closing tag
      if !tagName or tok.type == 'string' and (tok.end != pos.ch or !/[\"\']/.test(tok.string.charAt(tok.string.length - 1)) or tok.string.length == 1) or tok.type == 'tag' and tagInfo.close or tok.string.indexOf('/') == pos.ch - (tok.start) - 1 or dontCloseTags and indexOf(dontCloseTags, lowerTagName) > -1 or closingTagExists(cm, inner.mode.xmlCurrentContext and inner.mode.xmlCurrentContext(state) or [], tagName, pos, true)
        return CodeMirror.Pass
      emptyTags = typeof opt == 'object' and opt.emptyTags
      if emptyTags and indexOf(emptyTags, tagName) > -1
        replacements[i] =
          text: '/>'
          newPos: CodeMirror.Pos(pos.line, pos.ch + 2)
        i++
        continue
      indent = indentTags and indexOf(indentTags, lowerTagName) > -1
      replacements[i] =
        indent: indent
        text: '>' + (if indent then '\n\n' else '') + '</' + tagName + '>'
        newPos: if indent then CodeMirror.Pos(pos.line + 1, 0) else CodeMirror.Pos(pos.line, pos.ch + 1)
      i++
    dontIndentOnAutoClose = typeof opt == 'object' and opt.dontIndentOnAutoClose
    i = ranges.length - 1
    while i >= 0
      info = replacements[i]
      cm.replaceRange info.text, ranges[i].head, ranges[i].anchor, '+insert'
      sel = cm.listSelections().slice(0)
      sel[i] =
        head: info.newPos
        anchor: info.newPos
      cm.setSelections sel
      if !dontIndentOnAutoClose and info.indent
        cm.indentLine info.newPos.line, null, true
        cm.indentLine info.newPos.line + 1, null, true
      i--
    return

  autoCloseCurrent = (cm, typingSlash) ->
    `var i`
    ranges = cm.listSelections()
    replacements = []
    head = if typingSlash then '/' else '</'
    opt = cm.getOption('autoCloseTags')
    dontIndentOnAutoClose = typeof opt == 'object' and opt.dontIndentOnSlash
    i = 0
    while i < ranges.length
      if !ranges[i].empty()
        return CodeMirror.Pass
      pos = ranges[i].head
      tok = cm.getTokenAt(pos)
      inner = CodeMirror.innerMode(cm.getMode(), tok.state)
      state = inner.state
      if typingSlash and (tok.type == 'string' or tok.string.charAt(0) != '<' or tok.start != pos.ch - 1)
        return CodeMirror.Pass
      # Kludge to get around the fact that we are not in XML mode
      # when completing in JS/CSS snippet in htmlmixed mode. Does not
      # work for other XML embedded languages (there is no general
      # way to go from a mixed mode to its current XML state).
      replacement = undefined
      mixed = inner.mode.name != 'xml' and cm.getMode().name == 'htmlmixed'
      if mixed and inner.mode.name == 'javascript'
        replacement = head + 'script'
      else if mixed and inner.mode.name == 'css'
        replacement = head + 'style'
      else
        context = inner.mode.xmlCurrentContext and inner.mode.xmlCurrentContext(state)
        top = if context.length then context[context.length - 1] else ''
        if !context or context.length and closingTagExists(cm, context, top, pos)
          return CodeMirror.Pass
        replacement = head + top
      if cm.getLine(pos.line).charAt(tok.end) != '>'
        replacement += '>'
      replacements[i] = replacement
      i++
    cm.replaceSelections replacements
    ranges = cm.listSelections()
    if !dontIndentOnAutoClose
      i = 0
      while i < ranges.length
        if i == ranges.length - 1 or ranges[i].head.line < ranges[i + 1].head.line
          cm.indentLine ranges[i].head.line
        i++
    return

  autoCloseSlash = (cm) ->
    if cm.getOption('disableInput')
      return CodeMirror.Pass
    autoCloseCurrent cm, true

  indexOf = (collection, elt) ->
    if collection.indexOf
      return collection.indexOf(elt)
    i = 0
    e = collection.length
    while i < e
      if collection[i] == elt
        return i
      ++i
    -1

  # If xml-fold is loaded, we use its functionality to try and verify
  # whether a given tag is actually unclosed.

  closingTagExists = (cm, context, tagName, pos, newTag) ->
    `var i`
    if !CodeMirror.scanForClosingTag
      return false
    end = Math.min(cm.lastLine() + 1, pos.line + 500)
    nextClose = CodeMirror.scanForClosingTag(cm, pos, null, end)
    if !nextClose or nextClose.tag != tagName
      return false
    # If the immediate wrapping context contains onCx instances of
    # the same tag, a closing tag only exists if there are at least
    # that many closing tags of that type following.
    onCx = if newTag then 1 else 0
    i = context.length - 1
    while i >= 0
      if context[i] == tagName
        ++onCx
      else
        break
      i--
    pos = nextClose.to
    i = 1
    while i < onCx
      next = CodeMirror.scanForClosingTag(cm, pos, null, end)
      if !next or next.tag != tagName
        return false
      pos = next.to
      i++
    true

  CodeMirror.defineOption 'autoCloseTags', false, (cm, val, old) ->
    if old != CodeMirror.Init and old
      cm.removeKeyMap 'autoCloseTags'
    if !val
      return
    map = name: 'autoCloseTags'
    if typeof val != 'object' or val.whenClosing != false

      map['\'/\''] = (cm) ->
        autoCloseSlash cm

    if typeof val != 'object' or val.whenOpening != false

      map['\'>\''] = (cm) ->
        autoCloseGT cm

    cm.addKeyMap map
    return
  htmlDontClose = [
    'area'
    'base'
    'br'
    'col'
    'command'
    'embed'
    'hr'
    'img'
    'input'
    'keygen'
    'link'
    'meta'
    'param'
    'source'
    'track'
    'wbr'
  ]
  htmlIndent = [
    'applet'
    'blockquote'
    'body'
    'button'
    'div'
    'dl'
    'fieldset'
    'form'
    'frameset'
    'h1'
    'h2'
    'h3'
    'h4'
    'h5'
    'h6'
    'head'
    'html'
    'iframe'
    'layer'
    'legend'
    'object'
    'ol'
    'p'
    'select'
    'table'
    'ul'
  ]

  CodeMirror.commands.closeTag = (cm) ->
    autoCloseCurrent cm

  return

# ---
# generated by js2coffee 2.2.0