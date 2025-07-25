<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-6 p-4 rounded shadow-sm" style="background-color: #f8f9fa;">
            <h2 class="text-center mb-4">Log In</h2>
            <?php
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            if (isset($_SESSION['error'])) {
                echo '<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">' . $_SESSION['error'] . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                unset($_SESSION['error']);
            }
            ?>
            <form method="POST" action="./server/requests.php">
                <div class="mb-3">
                    <label for="useremail" class="form-label fw-bold">User Email ID</label>
                    <input type="email" class="form-control" id="useremail" placeholder="Enter Email ID" name="email"
                        required>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label fw-bold">Enter Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter Password"
                        name="password" required>
                </div>

                <div class="d-grid justify-content-center">
                    <button type="submit" class="btn btn-outline-success btn-sm text-dark fw-bold" name="logIn">Log
                        In</button>
                </div>
                <div class="text-center mt-2">
                    <small>Don't have an account? <a href="/Projects/Discuss/index.php?signUp=true">Sign up here</a></small>
                </div>
            </form>
        </div>
    </div>
</div>