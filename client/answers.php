<div class="container px-0">
    <h5 class="form-label text-muted m-0 mb-3">Previous Answers:</h5>

    <?php
    if (!empty($_SESSION['user']['user_id'])) {
        $user_id = $_SESSION['user']['user_id'];
        $query = "SELECT * FROM answers WHERE question_id = $qid";
        $result = $dbconnect->query($query);

        foreach ($result as $row) {
            $answer = htmlspecialchars($row["answer"]);
            echo "
      <div class='row mb-1'>
        <div class='col-12'>
          <div class='p-1 bg-light border rounded-3 position-relative'>
            <p class='mb-0 text-dark'>$answer</p>
            <span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary'>
              ✓
            </span>
          </div>
        </div>
      </div>
    ";
        }
    }
    else{
        echo " You Need to <a class ='text-decoration-none text-primary' href='./index.php?logIn=true'>Log In</a> First.";
    }
    ?>
</div>