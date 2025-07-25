<?php
session_start();

// For Database Connection
include("../common/db.php");

// Implementation of SignUp functionality
if (isset($_POST['signUp'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];


    // Method 1 of sending data to db
    // $sql = "INSERT INTO `users` (`id`, `username`, `email`, `password`, `address`) 
    //     VALUES (NULL, '$username', '$email', '$password', '$address')";

    // $user = $dbconnect->prepare($sql);

    // $result = $user->execute();


    // Method 2 of sending data to db
    // $user = $dbconnect->prepare("INSERT INTO `users` (`id`, `username`, `email`, `password`, `address`) 
    //     VALUES (NULL, '$username', '$email', '$password', '$address')");
    // $result = $user->execute();


    //Method 3 of sending data to db 
    // ? are placeholders
    // You skip the id column if it's AUTO_INCREMENT (no need to set it to NULL)
    // execute([...]) safely binds your variables to the placeholders
    // In Above methods we are directly inserting variables into the SQL string — this is unsafe (SQL Injection Risk) and can break easily.
    // Should be using placeholders with prepare() and bindParam() or execute() properly.

    $user = $dbconnect->prepare("INSERT INTO `users` (`username`, `email`, `password`, `address`) VALUES (?, ?, ?, ?)");
    $result = $user->execute([$username, $email, $password, $address]);

    if ($result) {
        $_SESSION["user"] = ["username" => $username, "email" => $email, "user_id" => $user->insert_id];
        header("Location: /Projects/Discuss");
        exit(); // VERY important to stop execution after redirect
    } else {
        echo "User Not Registered";
    }


}

// Implementation of LogIn functionality
else if (isset($_POST['logIn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = "";

    $query = "select * from users where email = '$email' and password = '$password'";

    $result = $dbconnect->query($query);

    //This loop is only written to check login functionality works properly or not
    // if ($result->num_rows == 1) {
    //     foreach ($result as $row) {
    //         $username = $row['username'];
    //     }
    //     echo $username;
    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);  // Only associative keys

        $_SESSION["user"] = [
            "username" => $row['username'],
            "email" => $row['email'],
            "user_id" => $row['id']
        ];
        header("Location: /Projects/Discuss");
        //   echo "User ID: " . $_SESSION["user"]["user_id"] . "<br>";
        exit();
    } else {
        // Login failed
        $_SESSION['error'] = "Invalid email or password";
        header("Location: /Projects/Discuss/index.php?logIn=true");
        exit();
    }

}

// Impelementation of LOG OUT functionality
else if (isset($_GET['logOut'])) {
    session_destroy();
    header("Location: /Projects/Discuss/index.php?logIn=true");
}

// ASK Question Functionality
else if (isset($_POST["ask"])) {
    // echo "hi there";
    // print_r($_SESSION);
    $title = $_POST['title'];
    $discription = $_POST['discription'];
    $category_id = $_POST['category'];
    $user_id = $_SESSION['user']['user_id'];


    $question = $dbconnect->prepare("INSERT INTO `questions` (`title`, `discription`, `category_id`,`user_id`) VALUES (?, ?, ?, ?)");
    $result = $question->execute([$title, $discription, $category_id, $user_id]);

    if ($result) {
        header("Location: /Projects/Discuss");
        // echo "kaya haal chal";
        exit(); // VERY important to stop execution after redirect
    } else {
        echo "question Not addded to website";
    }
} else if (isset($_POST["answer"])) {
    if (!empty($_SESSION['user']['user_id'])) {
        $answer = $_POST['answer'];
        $question_id = $_POST['question_id'];
        $user_id = $_SESSION['user']['user_id'];

        $query = $dbconnect->prepare("INSERT INTO `answers` (`answer`, `question_id`,`user_id`) VALUES (?, ?, ?)");
        $result = $query->execute([$answer, $question_id, $user_id]);

        if ($result) {
            header("Location: /Projects/Discuss?q-id=$question_id");
            exit(); // Must stop further execution
        } else {
            echo "Answer is Not Submitted";
        }
    } else {
        // User tried submitting but not logged in
        header("Location: /Projects/Discuss?logIn=true");
        exit(); // Must stop further execution
    }
}


// To delete Questions
else if (isset($_GET['delete'])) {
    $qid = $_GET['delete'];
    $query = $dbconnect->prepare("delete from questions where id = $qid");
    $result = $query->execute();
    if ($result) {
        header("Location: /Projects/Discuss?q-id=$qid");
    } else {
        echo "Question Not Deleted";
    }
}
?>