<?php include '../header.php'; ?>
        <p>Select the period of posts you want to download</p>
        <form class="d-flex flex-column flex-xl-row justify-content-xl-between align-items-xl-center" method="post" action="../download.php">
            <label for="start">Start date:</label>
            <input class="mt-2 mt-xl-0" type="date" id="start" name="trip-start" required>

            <label class="mt-2 mt-xl-0" for="end">End date:</label>
            <input class="mt-2 mt-xl-0" type="date" id="end" name="trip-end" required>
            <input class="mt-4 mt-xl-0 btn btn-primary" type="submit" value="Get json" />
        </form>

<?php include '../footer.php';?>