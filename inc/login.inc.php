<?php
if(isset($_POST['submitstafflogin'])){

    $table = 'staff';
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    require_once 'connect.php';
    require_once 'reqfunctions.inc.php';

    loginStaff($conn, $table, $email, $pwd);
} else {
    header('Location: ../index.php?error=somethingwentwrong2');
    exit() ;
}