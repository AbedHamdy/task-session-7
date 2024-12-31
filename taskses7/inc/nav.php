<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="../views/index.php">PHP PROJECT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../views/index.php">Home</a>
                </li>
                <?php if(!isset($_SESSION["auth"])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../views/login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../views/register.php">Register</a>
                    </li>
                <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="../views/profile.php">Profile</a>
                </li>
                <?php endif; ?>
            </ul>
            <?php if(isset($_SESSION["auth"])) : ?>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../views/logout.php">Logout</a>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</nav>
