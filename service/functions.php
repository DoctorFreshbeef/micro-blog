<?php
$db = new db();

function get_blog($start, $offset) {
    global $db;

    $results = $db->load_blog($start, $offset);
    send_json($results);
}

function send_json($array) {
    header('Content-type: application/json');
    echo json_encode( $array );
}
