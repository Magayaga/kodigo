<!DOCTYPE html>
<html>
    <head>
        <title>Kodigo</title>
        <link rel="stylesheet" href="assets/styles/codemirror.css">
        <link rel="stylesheet" href="assets/themes/darcula.css">
        <link rel="stylesheet" href="assets/themes/erlang-dark.css">
        <link rel="stylesheet" href="assets/themes/neo.css">
        <link rel="stylesheet" href="assets/themes/rubyblue.css" />
        <link rel="stylesheet" href="assets/themes/tomorrow-night-bright.css">
        <link rel="stylesheet" href="assets/styles/style.css">
        <link rel="stylesheet" href="assets/styles/bootstrap.css">
        <link rel="stylesheet" href="assets/fonts/roboto-mono/font.css">
        <link rel="stylesheet" href="assets/fonts/source-code-pro/font.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Kodigo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="btn btn-light nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                File
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <button class="dropdown-item" id="open-button">Open file<span class="float-end kodigo-sm-font-size">Ctrl + O</span></button>
                                </li>
                                <li>
                                    <button class="dropdown-item" id="save-button">Save file<span class="float-end kodigo-sm-font-size">Ctrl + S</span></button>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="btn btn-light nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Edit
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <button class="dropdown-item" id="undo-button">Undo<span class="float-end kodigo-sm-font-size">Ctrl + Z</span></button>
                                </li>
                                <li>
                                    <button class="dropdown-item" id="redo-button">Redo<span class="float-end kodigo-sm-font-size">Ctrl + Y</span></button>
                                </li>
                                <hr />
                                <li>
                                    <button class="dropdown-item" id="cut-button">Cut<span class="float-end kodigo-sm-font-size">Ctrl + X</span></button>
                                </li>
                                <li>
                                    <button class="dropdown-item" id="copy-button">Copy<span class="float-end kodigo-sm-font-size">Ctrl + C</span></button>
                                </li>
                                <li>
                                    <button class="dropdown-item" id="paste-button">Paste<span class="float-end kodigo-sm-font-size">Ctrl + V</span></button>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="btn btn-light nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Selection
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <button class="dropdown-item" id="select-all-button">Select All<span class="float-end kodigo-sm-font-size">Ctrl + A</span></button>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="btn btn-light nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Help
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="https://github.com/magayaga/Kodigo">View License</a></li>
                                <hr />
                                <li><a class="dropdown-item">About</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
<textarea id="editor">
# Welcome to the Kodigo!

**Kodigo** is a free and open-source source-code editor was created and developed by [Cyril John Magayaga](https://github.com/magayaga). It is written in HTML, CSS, JavaScript, and CoffeeScript.
</textarea>
        <div class="footer">
            <div class="p-1">
                Line <span id="line-number"></span>, Column
                <span id="column-number"></span>
            </div>
            <div class="row">
                <div class="col-auto">
                    <select class="form-select form-select-sm" aria-label="Default select example" id="font-dropdown">
                        <option value="courier-new">Courier New</option>
                        <option value="roboto-mono">Roboto Mono</option>
                        <option value="source-code-pro">Source Code Pro</option>
                    </select>
                </div>
                <div class="col-auto">
                    <select class="form-select form-select-sm" aria-label="Default select example" id="language-dropdown">
                        <option value="markdown">Markdown</option>
                        <option value="htmlmixed">HTML</option>
                        <option value="css">CSS</option>
                        <option value="javascript">JavaScript</option>
                        <option value="python">Python</option>
                        <option value="coffeescript">CoffeeScript</option>
                    </select>
                </div>
                <div class="col-auto">
                    <select class="form-select form-select-sm" aria-label="Default select example" id="theme-dropdown">
                        <option value="default" selected>Default</option>
                        <option value="darcula">Darcula</option>
                        <option value="erlang-dark">Erlang Dark</option>
                        <option value="tomorrow-night-bright">Tomorrow Night Bright</option>
                        <option value="neo">Neo</option>
                        <option value="rubyblue">Ruby Blue</option>
                    </select>
                </div>
                <div class="col-auto">
                    <button class="btn btn-sm toggle-theme-button" id="toggle-theme-button">Apply Theme</button>
                </div>
            </div>
        </div>
        <script src="assets/scripts/function.js"></script>
        <script src="assets/scripts/bootstrap-bundles.js"></script>
        <script src="assets/addons/edits/matchbrackets.js"></script>
        <script src="assets/scripts/snippets.js"></script>
        <script src="assets/scripts/bootstrap-bundle.js"></script>
        <script src="assets/scripts/codemirror.js"></script>
        <script src="assets/modes/markdown.js"></script>
        <script src="assets/modes/htmlmixed.js"></script>
        <script src="assets/modes/css.js"></script>
        <script src="assets/modes/javascript.js"></script>
        <script src="assets/modes/python.js"></script>
        <script src="assets/modes/coffeescript.js"></script>
        <script src="assets/addons/hints/show-hint.js"></script>
        <script src="assets/addons/hints/anyword-hint.js"></script>
        <script src="assets/addons/edits/closetag.js"></script>
        <script src="assets/addons/folds/foldcode.js"></script>
        <script src="assets/addons/folds/foldgutter.js"></script>
        <script src="assets/addons/folds/markdown-fold.js"></script>
        <script src="assets/addons/selects/active-line.js"></script>
        <script src="assets/scripts/script.js"></script>
    </body>
</html>
