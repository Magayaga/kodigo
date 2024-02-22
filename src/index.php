<!DOCTYPE html>
<html>
    <head>
        <title>Kodigo</title>
        <link rel="stylesheet" href="assets/styles/codemirror.css">
        <link rel="stylesheet" href="assets/themes/darcula.css">
        <link rel="stylesheet" href="assets/themes/erlang-dark.css">
        <link rel="stylesheet" href="assets/themes/moonlight-wheat.css">
        <link rel="stylesheet" href="assets/themes/neo.css">
        <link rel="stylesheet" href="assets/themes/rubyblue.css" />
        <link rel="stylesheet" href="assets/themes/tomorrow-night-bright.css">
        <link rel="stylesheet" href="assets/themes/zenburn.css">
        <link rel="stylesheet" href="assets/styles/style.css">
        <link rel="stylesheet" href="assets/styles/bootstrap.css">
        <link rel="stylesheet" href="assets/fonts/roboto-mono/font.css">
        <link rel="stylesheet" href="assets/fonts/source-code-pro/font.css">
        <link rel="stylesheet" href="assets/fonts/ibm-plex-mono/font.css">
        <link rel="stylesheet" href="assets/fonts/jetbrains-mono/font.css">
        <link rel="stylesheet" href="assets/fonts/space-mono/font.css">
        <link rel="stylesheet" href="assets/fonts/ubuntu-mono/font.css">
        <link rel="stylesheet" href="assets/fonts/apple-sf-mono/font.css">
        <link rel="stylesheet" href="assets/fonts/fira-code/font.css">
        <link rel="stylesheet" href="assets/fonts/andale-mono/font.css">
        <link rel="stylesheet" href="assets/fonts/cascadia-code/font.css">
        <link rel="stylesheet" href="assets/fonts/cascadia-mono/font.css">
        <link rel="stylesheet" href="assets/fonts/azeret-mono/font.css">
        <link rel="stylesheet" href="assets/fonts/chivo-mono/font.css">
        <link rel="stylesheet" href="assets/styles/show-hint.css">
        <link rel="icon" href="assets/logos/kodigo.ico">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <div>
                        <svg width="22" height="auto" viewBox="0 0 100 114" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect y="13.4614" width="100" height="100" rx="17" fill="url(#paint0_linear_620_76)"/>
                            <rect width="100" height="100" rx="14" fill="url(#paint1_linear_620_76)"/>
                            <rect x="10.6152" y="10.6152" width="78.7692" height="78.7692" rx="7" stroke="white" stroke-width="2" stroke-dasharray="1 1"/>
                            <path d="M19.231 51.1472V49.0384C21.4827 49.0384 23.0524 47.2132 23.9398 46.2993C24.8406 45.372 25.2909 43.8686 25.2909 41.7891V36.7225C25.2909 34.484 25.5691 32.6494 26.1254 31.2189C26.695 29.7883 27.5228 28.6757 28.609 27.8809C29.6952 27.0862 31.0197 26.5365 32.5828 26.2318C34.1458 25.9139 35.9207 25.755 37.9076 25.755V31.2785C36.3446 31.2785 35.1458 31.497 34.3113 31.9342C33.4768 32.358 32.9007 33.0137 32.5828 33.9012C32.2781 34.7886 32.1258 35.9211 32.1258 37.2987V43.8157C32.1258 44.8356 31.9536 45.7893 31.6092 46.6768C31.2648 47.5642 30.6356 48.3457 29.7217 49.0213C28.8077 49.6836 27.503 50.2068 25.8075 50.5909C24.1253 50.9618 21.9331 51.1472 19.231 51.1472ZM37.9076 76.2415C35.9207 76.2415 34.1458 76.0825 32.5828 75.7646C31.0197 75.4599 29.6952 74.9102 28.609 74.1155C27.5228 73.3207 26.695 72.2081 26.1254 70.7775C25.5691 69.347 25.2909 67.5125 25.2909 65.2739V60.2272C25.2909 58.1476 24.8406 56.6509 23.9398 55.7369C23.0524 54.8097 21.4827 52.8846 19.231 52.8846V50.8691C21.9331 50.8691 24.1253 51.0611 25.8075 51.4453C27.503 51.8161 28.8077 52.3394 29.7217 53.0149C30.6356 53.6772 31.2648 54.4521 31.6092 55.3395C31.9536 56.227 32.1258 57.1741 32.1258 58.1808V64.6977C32.1258 66.0753 32.2781 67.2078 32.5828 68.0953C32.9007 68.9827 33.4768 69.645 34.3113 70.0821C35.1458 70.5193 36.3446 70.7378 37.9076 70.7378V76.2415ZM19.231 52.8846V49.0384L25.5293 47.6702V54.3461L19.231 52.8846Z" fill="white"/>
                            <path d="M59.6156 21.1538L48.0771 76.2415L40.3848 79.8077L51.9233 26.923L59.6156 21.1538Z" fill="white"/>
                            <path d="M80.7694 50.8691V52.8846C78.5176 52.8846 76.9414 54.8097 76.0407 55.7369C75.1532 56.6509 74.7095 58.1476 74.7095 60.2272V65.2739C74.7095 67.5125 74.4247 69.347 73.8551 70.7775C73.2988 72.2081 72.4775 73.3207 71.3914 74.1155C70.3052 74.9102 68.9806 75.4599 67.4176 75.7646C65.8546 76.0825 64.0797 76.2415 62.0928 76.2415V70.7378C63.6558 70.7378 64.8546 70.5193 65.689 70.0821C66.5235 69.645 67.0931 68.9827 67.3978 68.0953C67.7157 67.2078 67.8746 66.0753 67.8746 64.6977V58.1808C67.8746 57.1741 68.0468 56.227 68.3912 55.3395C68.7356 54.4521 69.3648 53.6772 70.2787 53.0149C71.1927 52.3394 72.4908 51.8161 74.173 51.4453C75.8685 51.0611 78.0673 50.8691 80.7694 50.8691ZM62.0928 25.755C64.0797 25.755 65.8546 25.9139 67.4176 26.2318C68.9806 26.5365 70.3052 27.0862 71.3914 27.8809C72.4775 28.6757 73.2988 29.7883 73.8551 31.2189C74.4247 32.6494 74.7095 34.484 74.7095 36.7225V41.7891C74.7095 43.8686 75.1532 45.372 76.0407 46.2993C76.9414 47.2132 78.5176 49.0213 80.7694 49.0213V51.1472C78.0673 51.1472 75.8685 50.9618 74.173 50.5909C72.4908 50.2068 71.1927 49.6836 70.2787 49.0213C69.3648 48.3457 68.7356 47.5642 68.3912 46.6768C68.0468 45.7893 67.8746 44.8356 67.8746 43.8157V37.2987C67.8746 35.9211 67.7157 34.7886 67.3978 33.9012C67.0931 33.0137 66.5235 32.358 65.689 31.9342C64.8546 31.497 63.6558 31.2785 62.0928 31.2785V25.755ZM80.7694 50V52.8846L74.471 54.3461V47.6702L80.7694 50Z" fill="white"/>
                            <rect width="100" height="100" rx="14" fill="url(#paint2_linear_620_76)"/>
                            <defs>
                            <linearGradient id="paint0_linear_620_76" x1="92.3077" y1="94.2307" x2="12.5" y2="106.731" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#5E438F"/>
                            <stop offset="0.13696" stop-color="#CD97F9"/>
                            <stop offset="1" stop-color="#5F438F"/>
                            </linearGradient>
                            <linearGradient id="paint1_linear_620_76" x1="97.1154" y1="72.1154" x2="-15.3846" y2="52.8846" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#A966F5"/>
                            <stop offset="0.0777766" stop-color="#B787EE"/>
                            <stop offset="0.219013" stop-color="#AA7CDF"/>
                            <stop offset="1" stop-color="#AA7CDF"/>
                            </linearGradient>
                            <linearGradient id="paint2_linear_620_76" x1="25.9615" y1="85.5769" x2="88.4615" y2="40.3846" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#422B69" stop-opacity="0.74"/>
                            <stop offset="1" stop-color="#AA7CDF" stop-opacity="0"/>
                            </linearGradient>
                            </defs>
                            </svg>                            
                    </div>
                </a>
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
                                <li><a class="dropdown-item" href="https://github.com/Magayaga/kodigo/blob/main/LICENSE">View License</a></li>
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
                        <option value="andale-mono">Andale Mono</option>
                        <option value="azeret-mono">Azeret Mono</option>
                        <option value="cascadia-code">Cascadia Code</option>
                        <option value="cascadia-code-pl">Cascadia Code PL</option>
                        <option value="cascadia-mono">Cascadia Mono</option>
                        <option value="cascadia-mono-pl">Cascadia Mono PL</option>
                        <option value="chivo-mono">Chivo Mono</option>
                        <option value="fira-code">Fira Code</option>
                        <option value="ibm-plex-mono">IBM Plex Mono</option>
                        <option value="jetbrains-mono">JetBrains Mono</option>
                        <option value="roboto-mono">Roboto Mono</option>
                        <option value="sf-mono">SF Mono</option>
                        <option value="source-code-pro">Source Code Pro</option>
                        <option value="space-mono">Space Pro</option>
                        <option value="ubuntu-mono">Ubuntu Mono</option>
                    </select>
                </div>
                <div class="col-auto">
                    <select class="form-select form-select-sm" aria-label="Default select example" id="language-dropdown">
                        <option value="markdown">Markdown</option>
                        <option disabled>C</option>
                        <option disabled>C++</option>
                        <option value="coffeescript">CoffeeScript</option>
                        <option value="css">CSS</option>
                        <option value="go">Go</option>
                        <option value="groovy">Groovy</option>
                        <option value="htmlmixed">HTML</option>
                        <option value="javascript">JavaScript</option>
                        <option value="lua">Lua</option>
                        <option value="php">PHP</option>
                        <option value="python">Python</option>
                        <option value="ruby">Ruby</option>
                        <option value="rust">Rust</option>
                        <option value="swift">Swift</option>
                    </select>
                </div>
                <div class="col-auto">
                    <select class="form-select form-select-sm" aria-label="Default select example" id="theme-dropdown">
                        <option value="default" selected>Default</option>
                        <option value="darcula">Darcula</option>
                        <option value="erlang-dark">Erlang Dark</option>
                        <option value="tomorrow-night-bright">Tomorrow Night Bright</option>
                        <option value="moonlight-wheat">Moonlight Wheat</option>
                        <option value="neo">Neo</option>
                        <option value="rubyblue">Ruby Blue</option>
                        <option value="zenburn">Zenburn</option>
                    </select>
                </div>
                <div class="col-auto">
                    <button class="btn btn-sm btn-outline-dark" id="toggle-theme-button">Apply Theme</button>
                </div>
            </div>
        </div>
        <script src="assets/scripts/function.js"></script>
        <script src="assets/addons/edits/matchbrackets.js"></script>
        <script src="assets/scripts/snippets.js"></script>
        <script src="assets/scripts/bootstrap-bundle.js"></script>
        <script src="assets/scripts/codemirror.js"></script>
        <script src="assets/modes/markdown.js"></script>
        <script src="assets/modes/htmlmixed.js"></script>
        <script src="assets/modes/css.js"></script>
        <script src="assets/modes/javascript.js"></script>
        <script src="assets/modes/go.js"></script>
        <script src="assets/modes/groovy.js"></script>
        <script src="assets/modes/python.js"></script>
        <script src="assets/modes/coffeescript.js"></script>
        <script src="assets/modes/lua.js"></script>
        <script src="assets/modes/php.js"></script>
        <script src="assets/modes/ruby.js"></script>
        <script src="assets/modes/rust.js"></script>
        <script src="assets/modes/swift.js"></script>
        <script src="assets/addons/hints/show-hint.js"></script>
        <script src="assets/addons/hints/anyword-hint.js"></script>
        <script src="assets/addons/edits/closetag.js"></script>
        <script src="assets/addons/folds/foldcode.js"></script>
        <script src="assets/addons/folds/foldgutter.js"></script>
        <script src="assets/addons/folds/markdown-fold.js"></script>
        <script src="assets/addons/selects/active-line.js"></script>
        <script src="assets/addons/keymaps/sublime.js"></script>
        <script src="assets/scripts/script.js"></script>
    </body>
</html>
