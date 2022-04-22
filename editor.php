<?php
require('service/db.php');
require('service/functions.php');

if (isset($_GET["id"])) {

}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Micro blog</title>
    <link rel="stylesheet" href="editor/pell.css">
    <link rel="stylesheet" href="css/micro-editor.css">
    <script src="editor/pell.js"></script>
</head>
<body>
<div id="content">
    <H2>Micro blog editor</H2>
    <div id="editorForm">
        <div class="formLabel">Head:</div>
        <input type="text" id="blogHead" size="72">
        <div class="formLabel">Body:</div>
    <div id="pell" class="pell" style="width: 600px"></div>
        <input type="button" value="Save">
    </div>
</div>
<script>
    var editor = window.pell.init({
            element: document.getElementById('pell'),
            defaultParagraphSeparator: 'p',
            onChange: function (html) {
               console.log(html);
            }
        });
</script>
</body>
</html>