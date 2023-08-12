((mod) ->
    if typeof exports == "object" and typeof module == "object"
        mod require "../../lib/codemirror"
    else if typeof define == "function" and define.amd
        define ["../../lib/codemirror"], mod
    else
        mod CodeMirror
)((CodeMirror) ->
    "use strict"

    WRAP_CLASS = "CodeMirror-activeline"
    BACK_CLASS = "CodeMirror-activeline-background"
    GUTT_CLASS = "CodeMirror-activeline-gutter"

    CodeMirror.defineOption "styleActiveLine", false, (cm, val, old) ->
        prev = if old == CodeMirror.Init then false else old
        return if val == prev
        if prev
            cm.off "beforeSelectionChange", selectionChange
            clearActiveLines cm
            delete cm.state.activeLines
        if val
            cm.state.activeLines = []
            updateActiveLines cm, cm.listSelections()
            cm.on "beforeSelectionChange", selectionChange

    clearActiveLines = (cm) ->
        for i in [0...cm.state.activeLines.length]
            cm.removeLineClass cm.state.activeLines[i], "wrap", WRAP_CLASS
            cm.removeLineClass cm.state.activeLines[i], "background", BACK_CLASS
            cm.removeLineClass cm.state.activeLines[i], "gutter", GUTT_CLASS

    sameArray = (a, b) ->
        return false if a.length != b.length
        for i in [0...a.length]
            return false if a[i] != b[i]
        return true

    updateActiveLines = (cm, ranges) ->
        active = []
        for i in [0...ranges.length]
            range = ranges[i]
            option = cm.getOption "styleActiveLine"
            continue if typeof option == "object" and (option.nonEmpty and range.anchor.line != range.head.line) or (not option.nonEmpty and not range.empty())
            line = cm.getLineHandleVisualStart range.head.line
            if active[active.length - 1] != line
                active.push line
        return if sameArray cm.state.activeLines, active
        cm.operation ->
            clearActiveLines cm
            for i in [0...active.length]
                cm.addLineClass active[i], "wrap", WRAP_CLASS
                cm.addLineClass active[i], "background", BACK_CLASS
                cm.addLineClass active[i], "gutter", GUTT_CLASS
            cm.state.activeLines = active

    selectionChange = (cm, sel) ->
        updateActiveLines cm, sel.ranges
)
