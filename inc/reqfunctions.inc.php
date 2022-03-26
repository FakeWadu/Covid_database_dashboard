<?php
#UTILITY FUNCTIONS
function emailExist($conn , $table, $email){
    $sql = 'SELECT * FROM '.$table.' WHERE email = ?;';
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header('Location: ../index.php?error=stmtfailed');
        exit() ;
    }
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result)){
        return $row;
    } else {
        return false;
    }
}
function adharCheck($adNo){
    $result;
    // "/^[a-zA-Z0-1]*$/"
    
    $regex = "/^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$/";
                // /^[2-9]{1}[0-9]{3}\\s[0-9]{4}\\s[0-9]{4}$/

    if(!preg_match($regex, $adNo)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function invalidPhone($phNo){
        // Allow +, - and . in phone number
    $filtered_phone_number = filter_var($phNo, FILTER_SANITIZE_NUMBER_INT);
    // Remove "-" from number
    $phone_to_check = str_replace("-", "", $filtered_phone_number);
    // Check the lenght of number
    // This can be customized if you want phone number from a specific country
    if(strlen($phone_to_check) < 10 || strlen($phone_to_check) > 10) {
    return true;
    } else {
    return false;
    }
}

function pwdMatch($pwd, $pwdRepeat){
    $result;
    if($pwd !== $pwdRepeat){
    $result = true;
    }
    else {
    $result = false;
    }
    return $result;
}

function error($class, $msg){
    echo '<div class="alert alert-'.$class.'" role="alert" id="alert">
    '.$msg.'
  </div>';
}

#ADMIN
function loginAdmin($conn,$table, $email, $pwd){
        $emailExists = emailExist($conn , $table, $email);
        if($emailExists === false){
            header('Location: ../admin.php?=wrongdetails');
            exit();
        }
        $pwddb = $emailExists['password'];
        if($pwd !== $pwddb){
            header('Location: ../admin.php?=wrongpassword');
            exit();
        } else if($pwd == $pwddb) {
            session_start();
            $_SESSION['authorization'] = true;
            $_SESSION['userid'] = $emailExists['id'];
            $_SESSION['useremail'] = $emailExists['email'];
            header('Location: ../final_detail.php?=loginsuccess');
            exit();


        }
    
}

#ADD STAFF
function addharExist($conn , $table, $adNo){
    $sql = 'SELECT * FROM '.$table.' WHERE addharNo = ?;';
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header('Location: ../index.php?error=stmtfailed');
        exit() ;
    }
    mysqli_stmt_bind_param($stmt, 'i', $adNo);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result)){
        return $row;
    } else {
        return false;
    }
}

function addStaff($conn,$table, $name, $email,$phNo, $adNo, $address,$pwd){
    $sql = 'INSERT INTO staff(`name`, email, phoneNumber, `address`, addharNo, `password`) VALUES(?,?,?,?,?,?);';
    $stmt = mysqli_stmt_init($conn);

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header('Location: ../add_staff.php?error=stmtfailed');
        exit() ;
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, 'ssisis', $name, $email,$phNo, $address, $adNo,$hashedPwd );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header('Location: ../final_detail.php?error=detailesadded');
     exit() ;

}

#STAFF LOGIN
function loginStaff($conn, $table, $email, $pwd){
   $emailExists = emailExist($conn , $table, $email);

   if($emailExists === false){
       header('Location: ../login.php?error=detailsdoesnotexist');
       exit();
   }
   $hashedPwd = $emailExists['password'];

   $checkPwd = password_verify($pwd, $hashedPwd);
   if($checkPwd === false){
       header('Location: ../login.php?error=wrongpassword');
       exit();
   } else if($checkPwd === true){
       session_start();
       $_SESSION['userAuthorized'] = TRUE;
       $_SESSION['id'] = $emailExists['id'];
       $_SESSION['useremail'] = $emailExists['email'];
       $_SESSION['username'] = $emailExists['name'];
       header('Location: ../details.php?error=loginsuccess');
    }

}

#Add student
function checkUsn($conn, $table, $usn){
    $sql = 'SELECT * FROM '.$table.' WHERE usn = ?;';
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header('Location: ../add_student.php?error=stmtfailed');
        exit() ;
    }
    mysqli_stmt_bind_param($stmt, 's', $usn);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result)){
        return $row;
    } else {
        return false;
    }
}

function createStudent($conn, $usn, $name, $email, $sem, $branch,$adNo, $phNo, $address, $tempr, $covidPass, $symptoms){
    $sql = 'INSERT INTO student_details(usn, `name`, email, sem, branch) VALUES(?,?,?,?,?);';
    $stmt = mysqli_stmt_init($conn); 
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header('Location: ../add_student.php?error=stmtfailed');
        exit() ;
    }
    mysqli_stmt_bind_param($stmt, 'sssis', $usn, $name, $email, $sem, $branch);
    mysqli_stmt_execute($stmt);
    $sql = 'INSERT INTO student_contact(usn, addharNo, phoneNumber, `address`) VALUES(?,?,?,?);';
    $stmt = mysqli_stmt_init($conn); 
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header('Location: ../add_student.php?error=stmtfailed');
        exit() ;
    }
    mysqli_stmt_bind_param($stmt, 'siis', $usn, $adNo, $phNo, $address);
    mysqli_stmt_execute($stmt);
    $sql = 'INSERT INTO student_covid_info(usn, tempr, symptoms, covidPass) VALUES(?,?,?,?);';
    $stmt = mysqli_stmt_init($conn); 
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header('Location: ../add_student.php?error=stmtfailed');
        exit() ;
    }
    mysqli_stmt_bind_param($stmt, 'siss', $usn, $tempr, $symptoms, $covidPass);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header('Location: ../details.php?error=studentadded');
    exit() ;

}
#UPDATE COVID DETAILS
function  updateCovidDetaisl($conn,$usn, $tempr, $covidPass, $symptoms){
    $sql = 'UPDATE student_covid_info SET
            tempr = ?,
            symptoms = ?,
            covidPass = ?
            WHERE usn = ?
            ;';
    
    
     $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql )){
        header('Location: ../details.php?error=stmtfailed');
        exit();

    }

    mysqli_stmt_bind_param($stmt, 'isss',$tempr,$symptoms,$covidPass,$usn);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('Location: ../details.php?error=detailsupdated');
    exit();
}

#DELETE USN

function  deleteUsn($conn, $usn){
     $sql = "DELETE FROM student_details WHERE usn = ?";
    
     $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql )){
        header('Location: ../details.php?error=stmtfailed');
        exit();

    }

    mysqli_stmt_bind_param($stmt, 's',$usn);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('Location: ../details.php?error=userdeleted');
    exit();
}

function deleteStaff($conn, $id){
       $sql = "DELETE FROM staff WHERE id = ?";
    
     $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql )){
        header('Location: ../final_detail.php?error=stmtfailed');
        exit();

    }

    mysqli_stmt_bind_param($stmt, 'i',$id);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('Location: ../final_detail.php?error=staffdeleted');
    exit();

}



