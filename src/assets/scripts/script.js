var editor = CodeMirror.fromTextArea(document.getElementById("editor"), {
  lineNumbers: true,
  value: "",
  mode: "markdown",
  theme: "default",
  extraKeys: {"Enter": "newlineAndIndentContinueMarkdownList"},
  foldGutter: true,
  gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
  styleActiveLine: true,
  autoCloseTags: true,
  lineWrapping: true,
  hintOptions: { hint: CodeMirror.hint.anyword },
  matchBrackets: true
});

var themeDropdown = document.getElementById("theme-dropdown");
var themeApplyButton = document.getElementById("toggle-theme-button");
themeApplyButton.addEventListener("click", function () {
  var selectedTheme = themeDropdown.value;
  editor.setOption("theme", selectedTheme);
});

editor.on("change", function () {
  updateFooterInfo();
});

var updateFooterInfo = function () {
  var cursor = editor.getCursor();
  var lineNum = cursor.line + 1;
  var colNum = cursor.ch + 1;
  document.getElementById("line-number").textContent = lineNum;
  document.getElementById("column-number").textContent = colNum;
};

updateFooterInfo();