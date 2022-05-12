<?php
$db = new db();

function get_blog($start, $offset) {
    global $db;

    $results = $db->load_blog($start, $offset);
    send_json($results);
}

function get_item() {
    global $db;

    if (isset($_GET["id"])) {
        return $db->get_item($_GET["id"]);
    } else {
        return 0;
    }
}

function show_item($item) {
    echo '<div id="console">';
    echo '<p onclick="add_item()">New item</p>';
    echo '<p onclick="edit_item(' . $item["id"] . ')">Edit item</p>';
    echo '<p onclick="delete_item(' . $item["id"] . ')">Delete item</p>';
    echo '</div>';
    echo '<div class="itemDetail">';
    //echo '<div class="itemText">';
    echo '<div class="itemHead">';
    echo $item["head"];
    echo '</div>';
    echo '<div class="itemBody">';
    echo $item["body"];
    //echo '</div>';
    echo '</div>';
    echo '</div>';
}

function send_json($array) {
    header('Content-type: application/json');
    echo json_encode( $array );
}

function rob($msg) {
    echo "<div class=\"rob\">{$msg}</div>";
}

/*
editor functions
*/

function post_blog($id, $header, $text) {
    global $db;

    if ($db->insert_item($header, $text)) {
        header('Content-type: application/json');
        echo json_encode( array("status" => "OK") );
    } else {
        header("HTTP/1.0 404 Not Found");
        echo "Error";
    }

}



