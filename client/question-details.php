<div class="container mt-5">
  <div class="row">

    <!-- Question Section (Left Side) -->
    <div class="col-md-8 mb-3">
      <div class="card shadow-sm rounded-3">
        <div class="card-body">
          <h3 class="card-title text-muted mb-2">Question</h3>

          <?php
          include("./common/db.php");
          $query = "SELECT * FROM questions WHERE id = $qid";
          $result = $dbconnect->query($query);
          $row = $result->fetch_assoc();
          $cid = $row['category_id'];

          echo "
            <h5 class='mb-2 fw-semibold'>{$row['title']}</h5> 
            <p class='mb-4 text-dark'>Description: " . $row['discription'] . "</p>";

          ?>

          <form method="POST" action="./server/requests.php">
            <div class="mb-3">
              <input type="hidden" name="question_id" value="<?php echo $qid ?>">
              <textarea class="form-control mt-4" id="answer" name="answer" rows="5"
                placeholder="Write your answer here..."></textarea>
            </div>
            <button type="submit" class="btn btn-outline-warning btn-sm text-dark fw-bold mb-5">Submit Answer</button>
          </form>

          <?php 
          include("answers.php");
          ?>
        </div>
      </div>
    </div>

    <!-- Right Side Section -->
    <div class="col-md-4">
      <div class="card shadow-sm rounded-3 mb-1">
        <div class="card-body p-3">
          <!-- <h5 class="text-muted mb-3">Related</h5> -->
          <div style="max-height: 300px; overflow-y: auto;" class="scroll-hidden">
            <?php
            $categoryQuery = "SELECT name From category where id=$cid";
            $categoryResult = $dbconnect->query($categoryQuery);
            $categoryRow = $categoryResult->fetch_assoc();
            echo "<h5 class='text-muted mb-3'>".ucfirst($categoryRow['name'])."</h5>";
            //   echo $cid;
          $query = "SELECT * FROM questions WHERE category_id= $cid AND id!=$qid";
          $result = $dbconnect->query($query);
          
         foreach ($result as $row) {
          $id = $row['id'];
          $title = htmlspecialchars($row['title']); // Safe output
          echo "
            <div class='card mb-2 border-0 bg-light' >
                <div class='card-body py-2 px-3'>
                    <a href='?q-id=<?php echo $id; ?>' class='text-decoration-none text-muted fw-semibold' style='font-size: 0.9rem;'>
                        $title
                    </a>
                </div>
            </div>";
        }
            ?>
          </div>
        </div>
      </div>

      <!-- <div class="card shadow-sm rounded-3">
        <div class="card-body p-3">
          <h6 class="text-muted">Other Info</h6>
          <p class="small mb-0 text-secondary">You can add related topics, recent posts, or stats here.</p>
        </div>
      </div>
    </div> -->

  </div>
</div>
