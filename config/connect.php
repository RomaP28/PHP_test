<?php
    $HOST = 'localhost';
    $USER_NAME = "YOUR DATABASE USERNAME"; // Replace with your own
    $PASSWORD = "YOUR DATABASE PASSWORD";  // Replace with your own
    $DATABASE = "test";

    $connect = mysqli_connect($HOST, $USER_NAME, $PASSWORD);
    if(!$connect) {
        die('Error connection to DB');
    }

    if (!mysqli_select_db($connect, $DATABASE)){
        $sql = "CREATE DATABASE ".'test';
        $connect->query($sql);
    }

    $connect = mysqli_connect($HOST, $USER_NAME, $PASSWORD, $DATABASE);