<?php 
if(isset($_POST['submitaddstaff'])){
    $table = 'staff';
       $name = $_POST['name'];
       $email = $_POST['email'];
       $phNo = $_POST['phnumber'];
       $adNo = $_POST['addharno'];
       $address = $_POST['address'];
       $pwd = $_POST['pwd'];
       $pwdRepeat = $_POST['pwdrepeat'];

       require_once 'connect.php';
       require_once 'reqfunctions.inc.php';
       /*phone number validation
         addharno validation
         password match check
       */
      if(invalidPhone($phNo) !== false){
        header('Location: ../add_staff.php?error=invalidphonenumber');
        exit(); 
      }
      if(adharCheck($adNo) !== false){
        header('Location: ../add_staff.php?error=invalidaddhar');
        exit(); 
      }
      if(emailExist($conn , $table, $email) !== false){
        header('Location: ../add_staff.php?error=emailalreadytaken');
        exit(); 
      }
      if(pwdMatch($pwd, $pwdRepeat) !== false){
        header('Location: ../add_staff.php?error=passworddoesntmatch');
        exit(); 
      }
      if(addharExist($conn, $table, $adNo) !== false){
        header('Location: ../add_staff.php?error=addharinuse');
        exit(); 
      }
      addStaff($conn,$table, $name, $email,$phNo, $adNo, $address,$pwd, $pwdRepeat);

      

} else {
    header('Location: ../index.php?error=somethingwentwrong');
    exit();
}