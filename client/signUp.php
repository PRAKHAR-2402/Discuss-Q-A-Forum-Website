<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-6 p-4 rounded shadow-sm" style="background-color: #f8f9fa;">
            <h2 class="text-center mb-4">Sign Up</h2>
            <form method="POST" action="./server/requests.php">
                <div class="mb-3">
                    <label for="username" class="form-label fw-bold">User Name</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Enter User Name" required>
                </div>
                <div class="mb-3">
                    <label for="useremail" class="form-label fw-bold">User Email ID</label>
                    <input type="email" name="email" class="form-control" id="useremail" placeholder="Enter Email ID" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Enter Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" required>
                </div>
                <div class="mb-4">
                    <label for="address" class="form-label fw-bold">User Address</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="Enter User Address" required>
                </div>
                <div class="d-grid justify-content-center">
                    <button type="submit" name="signUp" class="btn btn-outline-info btn-sm text-dark fw-bold">Sign Up</button>
                </div>
                <div class="text-center mt-2">
                    <small>Already have an account! <a href="/Projects/Discuss/index.php?logIn=true">Log in here</a></small>
                </div>
            </form>
        </div>
    </div>
</div>