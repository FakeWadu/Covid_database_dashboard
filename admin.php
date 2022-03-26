<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>
    
    <div class="container mt-5">
        <div class="card-box card mt-5">
            <div class="card-body">
                <div class="card-title"><h1>Admin Login</h1></div>
                <form action="inc/adminlogin.inc.php" method="POST" class="mt-4">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="pwd" class="form-control" id="exampleInputPassword1" required>
                    </div>
        
                    <button type="submit" name="submitadmin" class="custom-btn">Login</button>
                </form>
            </div>
        </div>
        
    </div>
    <?php include('inc/footer.php'); ?>
