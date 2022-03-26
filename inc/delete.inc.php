<?php
        if(isset($_POST['submitdelete'])){
            $usn = $_POST['usn'];
            

             require_once 'connect.php';
             require_once 'reqfunctions.inc.php';

             deleteUsn($conn, $usn);

        } else if(isset($_REQUEST['submitdelsaff'])){
            $id = $_GET['id'];
         

             require_once 'connect.php';
             require_once 'reqfunctions.inc.php';

             deleteStaff($conn, $id);

        }  
        else {
                header('Location: ../index.php?error=somethingwentwrong');
                exit();
            }