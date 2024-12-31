<?php include("../inc/header.php"); ?>
<?php include("../inc/nav.php"); ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Register</h3>
                </div>
                <div class="card-body">
                    <?php 
                        if(isset($_SESSION["errors"])) :
                            foreach($_SESSION["errors"] as $error) : 
                    ?>
                            <div class="alert alert-danger text-center">
                                <?= $error; ?>
                            </div>

                    <?php 
                            endforeach;
                        endif;
                        unset($_SESSION["errors"]); 
                    ?>
                    <form action="../handler/handleRegister.php" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>







<?php include("../inc/footer.php"); ?>