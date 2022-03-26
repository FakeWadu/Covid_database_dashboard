<?php include('inc/header.php'); ?>


<?php
session_start(); 
if(isset($_SESSION['userAuthorized']) && $_SESSION['userAuthorized'] === true){
  
?>
<div class="container mt-2">
    <a href="details.php" class="btn btn-primary "><i class="fas fa-backward me-1"></i>Back</a>
    <div class="card bg-light mt-5 mb-5">
        <div class="card-body">
            <?php 
                          if(isset($_GET['error'])){
                            require_once 'inc/reqfunctions.inc.php';
                            if($_GET['error'] == 'usnalreadyexists'){
                                  $class = 'danger';
                                  echo error($class, $msg = 'USN already Exists');
                        }
                         else if($_GET['error'] == 'emailalreadytaken'){
                                $class = 'danger';
                                 echo error($class, $msg = 'Email already taken');
                              }
                         else if($_GET['error'] == 'invalidphonenumber'){
                                $class = 'danger';
                                 echo error($class, $msg = 'Enter Valid Phone Number');
                              }
                         else if($_GET['error'] == 'invalidaddhar'){
                                $class = 'danger';
                                 echo error($class, $msg = 'Enter Valid Addhar Number');
                              }
                         else if($_GET['error'] == 'addharinuse'){
                                $class = 'danger';
                                 echo error($class, $msg = 'Adhar in use!!');
                              }
                              
                         else if($_GET['error'] == 'temprformatwrong'){
                                $class = 'danger';
                                 echo error($class, $msg = 'Enter proper temperature format!');
                              }
                              
                              
                              
                              
                        }
            
                        ?>
            <h1>Add Student Details</h1>
            <form action="inc/addstudent.inc.php" method="POST">
                <div class="row g-3">
                    <div class="form-group col-md">
                        <label for="exampleInputEmail1">USN</label>
                        <input type="text" class="form-control" name="usn" maxlength="10" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter USN" id="usn" required>
                        <small id="emailHelp" class="form-text text-muted">Enter Your University Seat Number</small>

                    </div>
                    <div class="form-group col-md">
                        <label for="exampleInputEmail1">Full Name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Name" required>


                    </div>
                    <div class="form-group col-md">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter email" required>

                    </div>


                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md">

                        <select class="form-select " name="sem" aria-label="Default select example" required>
                            <option selected value="">Select Sem</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                    </div>
                    <div class="col-md">

                        <select class="form-select " name="branch" aria-label="Default select example" required>
                            <option selected value="">Select Branch</option>
                            <option value="CS">CS</option>
                            <option value="IS">IS</option>
                            <option value="MECH">MECH</option>
                            <option value="CIV">CIV</option>
                            <option value="ECE">ECE</option>
                            <option value="ELE">ELE</option>

                        </select>
                    </div>
                </div>
                <h2>Contact Details</h2>
                <div class="row g-3">
                    <div class="form-group col-md">
                        <label for="exampleInputEmail1">Addhar Number</label>
                        <input type="text" class="form-control" name="addharno" maxlength="12" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Addhar Number" id="usn" required>
                        <small id="emailHelp" class="form-text text-muted">Enter without any spaces</small>


                    </div>
                    <div class="form-group col-md">
                        <label for="exampleInputEmail1">Phone Number</label>
                        <input type="text" class="form-control" name="phnumber" maxlength="10" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Phone number" required>


                    </div>



                </div>
                <div class="form-group">

                    <label for="floatingTextarea2">Address</label>
                    <textarea class="form-control" name="address" placeholder="Address" id="floatingTextarea2"
                        style="height: 100px" required></textarea>
                </div>
                <h2>COVID Details</h2>
                <div class="row g-2">
                    <div class="form-group col-md">
                        <label for="exampleInputEmail1">Temperature</label>
                        <input type="text" class="form-control" name="tempr" maxlength="3" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Body Temprature" id="usn" required>
                        <!-- <small id="emailHelp" class="form-text text-muted">Enter Your University Seat Number</small> -->

                    </div>


                    <div class="col-md">
                        <label for="">Covid Pass</label>
                        <select class="form-select " name="covidpass" aria-label="Default select example" required>

                            <option selected value="">COVID Pass status</option>
                            <option value="issued">issued</option>
                            <option value="Not-issued">not-issued</option>


                        </select>
                    </div>



                </div>
                <div class="form-group">

                    <label for="floatingTextarea2">Symtoms if any</label>
                    <textarea class="form-control" name="symptoms" placeholder="symptoms" id="floatingTextarea2"
                        style="height: 100px" required></textarea>

                    <small id="emailHelp" class="form-text text-muted">Type nil if no symptoms</small>
                </div>


                <input type="submit" name="submitaddstudent" class="btn btn-primary btn-lg mt-3" value="Submit">
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