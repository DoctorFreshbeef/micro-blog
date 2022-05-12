<?php
require('db.php');
require('functions.php');

post_blog($_POST["id"], $_POST["header"], $_POST["text"]);
