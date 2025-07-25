<div class="container mt-2">
    <h2 class="text-start mb-4">Questions</h2>

    <div class="row">
        <!-- Left Side: Questions (col-8) -->
        <div class="col-md-8">
            <?php
            include("./common/db.php");
            if (isset($_GET["c-id"])) {
                $query = "SELECT * FROM questions WHERE category_id = $cid";
            } else if (isset($_GET["u-id"])) {
                $query = "SELECT * FROM questions WHERE user_id = $uid";
            } else if (isset($_GET["latest"])) {
                $query = "SELECT * FROM questions ORDER BY id desc";
            } else if (isset($_GET["search"])) {
                $search = $_GET["search"];
                $query = "SELECT * FROM `questions` WHERE `title` LIKE '%$search%' ";
            } else {
                $query = "SELECT * FROM questions";
            }

            $result = $dbconnect->query($query);

            foreach ($result as $row) {
                $title = htmlspecialchars($row['title']); // Prevent XSS
                $id = $row['id'];
                if (!isset($uid)) {
                    $uid = null;  // This is useful when you're not sure if a variable is defined and want to avoid "Undefined variable" warnings
                }
                echo "
                    <div class='card-body d-flex justify-content-start card mb-2 shadow-sm'>
                        <h5 class='mb-0 my-questions'>
                        <a href='?q-id=$id' class='text-muted text-decoration-none'>$title</a>"
                    . ($uid ? " <a href='./server/requests.php?delete=$id' class='ms-1 text-muted text-decoration-none'>x</a>" : "") . "
                        </h5>
                </div>";
            }
            ?>
        </div>

        <!-- Right Side: Category List (col-4) -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <h4 class="mb-0">Category</h4>
                </div>
                <div class="card-body">
                    <?php include('categorylist.php'); ?>
                </div>
            </div>
        </div>
    </div>
</div>