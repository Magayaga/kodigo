{ app, BrowserWindow } = require 'electron'
path = require 'path'

createWindow = ->
    win = new BrowserWindow
        icon: path.join(__dirname, "../assets/images/logo.png")
        width: 1000
        height: 800

    win.setMenuBarVisibility false
    win.loadFile './src/index.html'

app.whenReady().then ->
    createWindow()

    app.on 'activate', ->
        createWindow() unless BrowserWindow.getAllWindows().length == 0

app.on 'window-all-closed', ->
    app.quit() if process.platform != 'darwin'
