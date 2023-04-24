<?php
    require_once 'config/connect.php';
    require_once 'functions.php';
$url = $_SERVER['REQUEST_URI'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <header>
        <div class="container mt-5">
            <?php
            if(!str_contains($url, 'index.php') && $url !== '/') { ?>
                    <a class="btn btn-primary mb-3" href="../index.php">&lt; Back</a>
                <?php } ?>
        </div>
    </header>
    <main class="container">

        <div class="<?php if(!str_contains($url, 'download-page.php')) {
            echo 'd-flex flex-column flex-lg-row';
        } else {
            echo 'col-12 col-lg-6 border p-3';
        }?>">