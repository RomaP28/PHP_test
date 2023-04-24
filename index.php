<?php
    include 'header.php';
    require_once 'classes/Pagination.php';

    $all_posts = get_posts("SELECT * FROM `posts`");
    $page = $_GET['page'] ?? 1;
    $per_page = 10;
    $total = count($all_posts);
    $count_pages = ceil($total / $per_page);

    $pagination = new Pagination($page, $per_page, $total);
    $start = $pagination->get_start();
    $posts = get_posts("SELECT * FROM posts LIMIT $start, $per_page");
?>
        <div class="col-lg-8 p-3 m-3 border">
            <?php foreach ($posts as $post) { ?>
                <div class="post border-bottom">
                    <h1><?php echo $post[1]; ?></h1>
                    <p class="description"><?php echo $post[2]; ?></p>
                </div>
            <?php }

                if (count($posts) < 1) {
                    echo "No data in DB";
                } elseif(count($posts) < 10  && $page !== 1 || count($posts) >= 10) {
                    echo $pagination->get_html();
                }
            ?>
        </div>
        <div class="col-lg-4 p-3 m-3 d-flex flex-column border">
            <a class="btn btn-primary mt-3" href="pages/upload-page.php">Upload json</a>
            <?php if (count($posts) > 0) { ?>
                <a class="btn btn-primary mt-3" href="pages/download-page.php">Download json</a>
            <?php } ?>
        </div>
<?php include 'footer.php'; ?>