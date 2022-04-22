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
