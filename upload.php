<?php
    require_once 'config/connect.php';
    require_once 'functions.php';

    if(isset($_FILES['file']) && !empty($_FILES['file']['name'])){
        $file = $_FILES['file'];

        $file_ext = explode('.', $file['name']);
        $file_ext = strtolower(end($file_ext));

        $allowed = array('json');

        if(in_array($file_ext, $allowed)) {
            if($file['error'] === 0) {
                $file_name_new = uniqid('', true) . '.' . $file_ext;
                $file_destination = 'uploads/' . $file_name_new;

                if(move_uploaded_file($file['tmp_name'], $file_destination)) {
                    $data = file_get_contents($file_destination);
                    $data = json_decode($data, true);

                    $upload_error = array();

                    foreach($data as $item) {
                        $query = "INSERT INTO `posts` (`title`, `description`) VALUES ('" . $item['title'] . "','" . $item['description'] . "')";
                        $res = insert_into_db($query);
                        array_push($upload_error, $res);
                    }
                    $query ="INSERT INTO `jsons`(`file_name`, `uploaded_on`) VALUES ('" . $file_name_new . "', NOW())";
                    $res = mysqli_query($connect, $query);

                    if(empty($res)) {
                        $query2 = "CREATE TABLE `jsons` (
                          id int(11) AUTO_INCREMENT,
                          file_name text NOT NULL,
                          uploaded_on DATE NOT NULL,
                          status enum('1', '0') DEFAULT 1 NOT NULL,
                          PRIMARY KEY (ID)
                          )";
                        mysqli_query($connect, $query2);
                        $res = mysqli_query($connect, $query);
                    }

                    if(!in_array("Success", $upload_error)) {
                        echo 'Error ' . $connect->error;;
                    } else {
                        header('Location: index.php');
                    }
                }
            }
        }
    } else {
        header('Location: upload-page.php');
    }



