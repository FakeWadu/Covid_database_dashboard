<?php 

 if(isset($_POST['submitadmin'])){
    $table = 'admin';
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    require_once 'connect.php';
    require_once 'reqfunctions.inc.php';
    


    loginAdmin($conn,$table, $email, $pwd);


 } else {
     header('Location: ../index.php?error=somethingwentwrong');
     exit();
 }