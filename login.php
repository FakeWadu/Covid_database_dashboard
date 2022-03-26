<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>
    
    <div class="container mt-5">
        <div class="card-box  card mt-5">
            <div class="card-body">
                <div class="card-title"><h1>Staff Login</h1></div>
                <form action="inc/login.inc.php" method="POST" class="mt-4">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" placeholder="Enter here..." class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class=" mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="pwd"  placeholder="Enter here..." class="form-control" id="exampleInputPassword1">
                    </div>
        
                    <button type="submit" name="submitstafflogin" class="custom-btn mt-2">Login</button>
                </form>
            </div>
        </div>
        
    </div>
    <?php include('inc/footer.php'); ?>
