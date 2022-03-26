<?php include('inc/header.php'); ?>


<?php
session_start();
if(isset($_SESSION['authorization']) && $_SESSION['authorization'] === true){
    
    ?>

<div class="container p-2">
    <a href="final_detail.php" class="btn btn-primary mt-3">Back</a>
    <div class="card mt-5">
        <div class="card-body">
        <?php 
              if(isset($_GET['error'])){
                require_once 'inc/reqfunctions.inc.php';
                if($_GET['error'] == 'invalidphonenumber'){
                      $class = 'danger';
                      echo error($class, $msg = 'Invalid phone number');
            }
                  


            else if($_GET['error'] == 'invalidaddhar'){
              $class = 'danger';
               echo error($class, $msg = 'Invalid Addhar Number');
                    }
                    
                  else if($_GET['error'] == 'emailalreadytaken'){
                    $class = 'danger';
                     echo error($class, $msg = 'Email already taken');
                  }
                  else if($_GET['error'] == 'passworddoesntmatch'){
                    $class = 'danger';
                     echo error($class, $msg = 'Password doesn\'t match');
                  }
                  else if($_GET['error'] == 'addharinuse'){
                    $class = 'danger';
                     echo error($class, $msg = 'Addhar in use');
                  }
                  else if($_GET['error'] == 'detailesadded'){
                    $class = 'success';
                     echo error($class, $msg = 'Details added successfully');
                  }
                  
            }

            ?>
            <div class="card-title">
                <h1>Add Staff</h1>
            </div>
            <form action="inc/addstaff.inc.php" method="POST" class="mt-4">
                <div class="row g-2">
                    <div class="mb-3 col-md">
                        <label for="exampleInputEmail1" class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" required>
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3 col-md">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" required>
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    
                </div>
                <div class="row g-2">
                    <div class="mb-3 col-md">
                        <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                        <input type="number" name="phnumber" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" required>
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3 col-md">
                        <label for="exampleInputEmail1" class="form-label">Adhanr Number</label>
                        <input type="number" name="addharno" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" required>
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" name="address" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Address</label>
                  </div>
                  <div class="row g-2">
                    <div class="mb-3 col-md">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="pwd" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    <div class="mb-3 col-md">
                        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                        <input type="password" name="pwdrepeat" class="form-control" id="exampleInputPassword1" required>
                    </div>
                </div>
                

                <button type="submit" name="submitaddstaff" class="btn btn-lg btn-primary ">Login</button>
            </form>
        </div>
    </div>
</div>
<?php

} else {
    header('Location: index.php?error=somethingwentwrong');
    exit();
}
?>
<?php include('inc/footer.php'); ?>