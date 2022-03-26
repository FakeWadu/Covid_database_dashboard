 <?php
 if(isset($_POST['submitcoviddetails'])){
    $usn = $_GET['usn'];
    $tempr = $_POST['tempr'];
    $covidPass = $_POST['covidpass'];
    $symptoms  = $_POST['symptoms'];

    require_once 'connect.php';
    require_once 'reqfunctions.inc.php';
    
if(is_numeric($tempr) == false){
            header('Location: ../details.php?error=temprformatwrong');
            exit(); 
}

updateCovidDetaisl($conn,$usn, $tempr, $covidPass, $symptoms);


} else {
     header('Location: ../index.php?error=somethingwentwrong2');
     exit();
}