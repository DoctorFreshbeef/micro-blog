<?php

class db
{
    function __construct() {
        $this->conn = mysqli_connect('localhost', 'root', 'bonzo', 'micro');
    }

    function load_blog($start, $offset) {
        $retArray = array();
        $results = $this->conn->query("SELECT id, head, blog_date FROM blog ORDER BY id DESC LIMIT $start, $offset");

        while ($row = $results->fetch_assoc()) {
            $retArray[] = $row;
        }
        return $retArray;
    }
}