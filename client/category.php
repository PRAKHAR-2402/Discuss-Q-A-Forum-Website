<select class="form-select" id="category" name="category" required>
    <option value="">Select A Category</option>
    <?php
    include("./common/db.php");
    $query = "select * from category";
    $result = $dbconnect->query($query);
    foreach ($result as $row) {
        $name = ucfirst($row['name']);
        $id = $row['id'];
        echo "<option value = $id>$name</option>";
    }
    ?>
</select>