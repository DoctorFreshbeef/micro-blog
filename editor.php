<?php
require('service/db.php');
require('service/functions.php');

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $item = get_item();
    $head = $item["head"];
    $body = $item["body"];
    /*print_r($item);
    die();*/
} else {
    $id = 0;
    $head = "";
    $body = "";
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Micro blog</title>
    <link rel="stylesheet" href="editor/pell.css">
    <link rel="stylesheet" href="css/micro-editor.css">
    <script src="editor/pell.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/micro.js"></script>
    <script>
        const item_id = <?php echo $id ?>
    </script>
</head>
<body>
<div id="content">
    <H2>Micro blog editor</H2>
    <div id="editorForm">
        <div class="formLabel">Head:</div>
        <input type="text" id="blogHead" size="72" value="<?php echo $head?>">
        <div class="formLabel">Body:</div>
        <div id="pell" class="pell" style="width: 600px"></div>
        <input type="button" value="Save" onclick="saveShit()">
    </div>
    <div id="errorArea"/>
</div>
<script>
    let textBlock = '';
    if (item_id !== 0) {
        textBlock = '<?php echo $body ?>';
    }

    const editor = window.pell.init({
        element: document.getElementById('pell'),
        defaultParagraphSeparator: 'p',
        onChange: function (html) {
            textBlock = html;
        }
    });
    editor.content.innerHTML = '<?php echo $body ?>';
    console.log(textBlock);
</script>
</body>
</html>