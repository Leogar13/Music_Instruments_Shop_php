<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
function appendText() {
  // var txt1 = "<p>Text.</p>";        // Create text with HTML
  // var txt2 = $("<p></p>").text("Text.");  // Create text with jQuery
  var txt3 ="<button onclick="appendText()">Append text</button>";
  $("body").append(txt3);   // Append new elements
}
</script>
</head>
<body>

<p>This is a paragraph.</p>
<button onclick="appendText()">Append text</button>

</body>
</html>