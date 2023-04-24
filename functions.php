<?php
require_once 'config/connect.php';

function debug($data) {
    echo "<pre>" . print_r($data, 1) . "</pre>";
}

function get_posts($query): array {
    global $connect;

    $res = mysqli_query($connect, $query);
    $res = check_table_posts($res, $query);

    return mysqli_fetch_all($res);
}

function insert_into_db($query) {
    global $connect;
    $res = mysqli_query($connect, $query);
        if ($res) {
            return 'Success';
        } else {
            return 'Error ' . $connect->error;
        }
}

function check_table_posts($res, $query) {
    global $connect;
    if(empty($res)) {
        $query2 = "CREATE TABLE `posts` (
                          id int(11) AUTO_INCREMENT,
                          title text NOT NULL,
                          description text NOT NULL,
                          PRIMARY KEY  (ID)
                          )";
        mysqli_query($connect, $query2);
        $res = mysqli_query($connect, $query);
    }
    return $res;
}