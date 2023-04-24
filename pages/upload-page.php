<?php include '../header.php';?>

    <form class="border p-3" action="../upload.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" value="30000" />
        </div>

        <div class="form-group">
            <label for="file">Upload JSON:</label>
            <input class="form-control-file" name="file" type="file" accept=".json" required/>
        </div>
        <input class="btn btn-primary mt-3" type="submit" value="Upload" />
    </form>

<?php include '../footer.php'; ?>