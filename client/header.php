<?php
// Start session safely
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="navbar navbar-expand-lg shadow-sm " style="background-color: #f2f2f2;">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="./">
            <img src="./public/logo1.png" alt="Logo" height="30px" class="me-2">
        </a>
        <button class="navbar-toggler border-0 shadow-sm" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"
            style="background-color: #e6e6e6; border-radius: 6px; padding: 8px 10px;">
            <div style="display: flex; flex-direction: column; gap: 4px;">
                <span style="width: 22px; height: 2px; background-color: #333; border-radius: 1px;"></span>
                <span style="width: 22px; height: 2px; background-color: #333; border-radius: 1px;"></span>
                <span style="width: 22px; height: 2px; background-color: #333; border-radius: 1px;"></span>
            </div>
        </button>


        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav align-items-center gap-2">
                <li class="nav-item">
                    <a class="nav-link text-dark fw-bold fs-5" href="./">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-bold fs-5" href="?latest=true">Latest Questions</a>
                </li>

                <?php if (!isset($_SESSION['user']['username'])) { ?>
                    <li class="nav-item">
                        <a class="btn btn-outline-info btn-sm text-dark fw-bold fs-6" href="?signUp=true">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-success btn-sm text-dark fw-bold fs-6" href="?logIn=true">Log In</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-bold fs-5" href="?u-id=<?php echo $_SESSION['user']['user_id'] ?>">My
                            Questions</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-warning btn-sm text-dark fw-bold fs-6" href="?ask=true">💬 Ask a Question</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-danger btn-sm text-dark fw-bold fs-6"
                            href="./server/requests.php?logOut=true ">Logout (<?php echo ucfirst($_SESSION['user']['username'])?>)</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <form class="d-flex align-items-center gap-2" action="">
            <input name = "search" class="form-control form-control-sm border border-warning shadow-sm rounded fs-6" type="search"
                placeholder="Search Question..." >
            <button class="btn btn-sm btn-outline-warning text-dark fw-semibold shadow-sm px-3 fs-6" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>

    </div>
</nav>