<?php
require('service/db.php');
require('service/functions.php');

$item = get_item();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Micro blog</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/micro.css" type="text/css">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/micro.js"></script>
</head>
<body>
<div>
    <?php
    if ($item) {
        show_item($item);
    } else {
        echo '<div id="itemText">No item!</div>';
    }
    ?>
</div>
</body>
</html>