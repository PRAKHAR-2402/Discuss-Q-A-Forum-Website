<div>
    <?php
    include("./common/db.php");
    $query = "SELECT * FROM category";
    $result = $dbconnect->query($query);

    foreach ($result as $row) {
        $name = htmlspecialchars($row['name']); // Prevent XSS
        $id = $row['id'];
        echo "
           <div class='card mb-1 shadow-sm'>
            <div class='card-body py-1 px-2 d-flex justify-content-start'>
                <h6 class='mb-0' style='font-size: 18px; line-height: 1.5;'>
                    <a href='?c-id=$id' class='text-muted text-decoration-none'>$name</a>
                </h6>
            </div>
        </div>";
    }
    ?>
</div>