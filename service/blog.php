<?php
require('db.php');
require('functions.php');

if (isset($_GET["start"]) && isset($_GET['offset'])) {
    get_blog($_GET["start"], $_GET['offset']);
} else {
    echo "Error";
}
