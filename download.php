<?php
require_once 'functions.php';

$dateBegin = date('Y-m-d', strtotime($_POST['trip-start']));
$dateEnd = date('Y-m-d', strtotime($_POST['trip-end']));

if(isset($dateBegin) && !empty($dateBegin) && isset($dateBegin) && !empty($dateEnd) ) {

    $query = "SELECT * FROM `jsons`";
    $res = mysqli_query($connect, $query);

    $merged = array();

    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            $jsonDate = date('Y-m-d', strtotime($row["uploaded_on"]));
            if ($jsonDate >= $dateBegin && $jsonDate <= $dateEnd) {
                $path = 'uploads/' . $row['file_name'];
                $content = file_get_contents($path, $row['file_name']);
                $content = json_decode($content, true);

                foreach ($content as $post) {
                    array_push($merged, $post);
                }
            }
        }

        if (!empty($merged)) {
            $file = "results.json";
            file_put_contents($file, json_encode($merged));

            header('Content-type: application/octet-stream');
            header("Content-Type: " . mime_content_type($file));
            header("Content-Disposition: attachment; filename=" . $file);
            while (ob_get_level()) {
                ob_end_clean();
            }
            readfile($file);
        } else {
            echo "There are no posts in the selected period";
        }
    } else {
        echo "There are no posts in the selected period";
    }
} else {
    echo "No data selected";
}
