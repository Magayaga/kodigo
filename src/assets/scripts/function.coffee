themeDropdown = document.getElementById("theme-dropdown")
themeApplyButton = document.getElementById("toggle-theme-button")

themeApplyButton.addEventListener "click", ->
    selectedTheme = themeDropdown.value
    editor.setOption "theme", selectedTheme

languageDropdown = document.getElementById "language-dropdown"
languageDropdown.addEventListener "change", ->
    selectedMode = languageDropdown.value
    editor.setOption "mode", selectedMode

fontDropdown = document.getElementById "font-dropdown"
fontDropdown.addEventListener "change", ->
    selectedFont = fontDropdown.value
    changeFont selectedFont

changeFont = (font) ->
    fontFamily = ""
    if font is "roboto-mono"
        fontFamily = "'Roboto Mono', monospace"
    else if font is "source-code-pro"
        fontFamily = "'Source Code Pro', monospace"
    else if font is "courier-new"
        fontFamily = "'Courier New', Courier, monospace"
    else if font is "ibm-plex-mono"
        fontFamily = "'IBM Plex Mono', monospace"
    else if font is "jetbrains-mono"
        fontFamily = "'JetBrains Mono', monospace"
    else if font is "space-mono"
        fontFamily = "'Space Mono', monospace"
    else if font is "ubuntu-mono"
        fontFamily = "'Ubuntu Mono', monospace"
    else if font is "fira-code"
        fontFamily = "'Fira Code', monospace"
    else if font is "sf-mono"
        fontFamily = "'SF Mono', monospace"
    else if font is "andale-mono"
        fontFamily = "'Andale Mono', monospace"
    editor.getWrapperElement().style.fontFamily = fontFamily
    editor.refresh()


executeCommand = (command) ->
    editor.focus()
    document.execCommand command

undoButton = document.getElementById 'undo-button'
undoButton.addEventListener 'click', -> executeCommand 'undo'

redoButton = document.getElementById 'redo-button'
redoButton.addEventListener 'click', -> executeCommand 'redo'

cutButton = document.getElementById 'cut-button'
cutButton.addEventListener 'click', -> executeCommand 'cut'

copyButton = document.getElementById 'copy-button'
copyButton.addEventListener 'click', -> executeCommand 'copy'

pasteButton = document.getElementById 'paste-button'
pasteButton.addEventListener 'click', ->
    handlePaste(event)

selectAllButton = document.getElementById 'select-all-button'
selectAllButton.addEventListener 'click', -> executeCommand 'selectAll'

document.addEventListener 'keydown', (event) ->
    if event.ctrlKey and event.key is 'z'
      executeCommand 'undo'

document.addEventListener 'keydown', (event) ->
    if event.ctrlKey and event.key is 'y'
      executeCommand 'redo'

document.addEventListener 'keydown', (event) ->
    if event.ctrlKey and event.key is 'x'
      executeCommand 'cut'

document.addEventListener 'keydown', (event) ->
    if event.ctrlKey and event.key is 'c'
      executeCommand 'copy'

document.addEventListener 'keydown', (event) ->
    if event.ctrlKey and event.key is 'v'
      handlePaste(event)
    
document.addEventListener 'keydown', (event) ->
    if event.ctrlKey and event.key is 'a'
      executeCommand 'selectAll'

document.addEventListener "keydown", (e) ->
    if e.ctrlKey and e.key is "o"
      e.preventDefault()
      openFile()

document.addEventListener "keydown", (e) ->
    if e.ctrlKey and e.key is "s"
      e.preventDefault()
      saveFile()

openFile = ->
    fileInput = document.createElement "input"
    fileInput.type = "file"
    fileInput.accept = ".txt,.md,.html,.js,.ts,.c,.h,.cpp,.py,.java,.rs,.cs"
    fileInput.onchange = ->
        file = fileInput.files[0]
        if file
            reader = new FileReader()
            reader.onload = (e) ->
                contents = e.target.result
                editor.setValue contents
            reader.readAsText file
    fileInput.click()

saveFile = ->
    content = editor.getValue()
    customExtension = prompt "Enter file extension (e.g., txt, md, html):"
    if customExtension
        blob = new Blob([content], { type: "text/plain;charset=utf-8" })
        a = document.createElement "a"
        a.href = URL.createObjectURL blob
        a.download = "index." + customExtension
        a.style.display = "none"
        document.body.appendChild a
        a.click()
        document.body.removeChild a

handlePaste = (event) ->
    event.preventDefault()
    text = (event.originalEvent or event).clipboardData.getData('text/plain')
    editor.replaceSelection(text)