<?php
    if(isset($_POST['submitaddstudent'])){
        $table = 'student_details';
        $usn = $_POST['usn'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $sem = $_POST['sem'];
        $branch = $_POST['branch'];
        $adNo = $_POST['addharno'];
        $phNo = $_POST['phnumber'];
        $address = $_POST['address'];
        $tempr = $_POST['tempr'];
        $covidPass = $_POST['covidpass'];
        $symptoms = $_POST['symptoms'];

        require_once 'connect.php';
        require_once 'reqfunctions.inc.php';
        
        /*1. check usn exists
          2. check email
        */
        if(checkUsn($conn, $table, $usn) !== false){
            header('Location: ../add_student.php?error=usnalreadyexists');
            exit();
        }
        if(emailExist($conn , $table, $email) !== false){
        header('Location: ../add_student.php?error=emailalreadytaken');
        exit(); 
        }
        
         if(invalidPhone($phNo) !== false){
        header('Location: ../add_student.php?error=invalidphonenumber');
        exit(); 
        }
        if(adharCheck($adNo) !== false){
            header('Location: ../add_student.php?error=invalidaddhar');
            exit(); 
        }
        
        // $table = 'student_contact';
        if(addharExist($conn, $table = 'student_contact', $adNo) !== false){
        header('Location: ../add_student.php?error=addharinuse');
        exit(); 
        }
        if(is_numeric($tempr) == false){
            header('Location: ../add_student.php?error=temprformatwrong');
            exit(); 
        }
      
      createStudent($conn, $usn, $name, $email, $sem, $branch,$adNo, $phNo, $address, $tempr, $covidPass, $symptoms);
          

    } else {
        header('Location: ../index.php?error=somethingwentwrong');
        exit();
    }