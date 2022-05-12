<?php

class db
{
    function __construct() {
        $this->conn = mysqli_connect('localhost', 'root', 'bonzo', 'micro');
    }

    function load_blog($start, $offset) {
        $retArray = array();
        $results = $this->conn->query("SELECT id, head, DATE_FORMAT(blog_date, \"%d-%m-%Y\") AS blog_date FROM blog ORDER BY id DESC LIMIT $start, $offset");

        while ($row = $results->fetch_assoc()) {
            $retArray[] = $row;
        }
        return $retArray;
    }

    function get_item($id) {
        $result = $this->conn->query("SELECT * FROM blog WHERE id = $id");
        if ($result->num_rows) {
            return $result->fetch_assoc();
        } else {
            return 0;
        }
    }

    function insert_item($header, $text) {
        $stmt = $this->conn->prepare("INSERT INTO blog (head, body) VALUES(?,?)");
        $stmt->bind_param("ss", $h, $b);
        $h = $header;
        $b = $text;
        return $stmt->execute();
    }
}