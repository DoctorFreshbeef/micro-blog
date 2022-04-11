<?php
require('service/db.php');
require('service/functions.php');

?>
<!DOCTYPE html>
<html>
<head>
    <title>Micro blog</title>
    <link rel="stylesheet" href="editor/pell.css">
    <script src="editor/pell.js"></script>
</head>
<body>
<H2>Micro blog editor</H2>
<div class="content">
    <div id="pell" class="pell" style="width: 600px"></div>
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