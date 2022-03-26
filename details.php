<?php include('inc/header.php'); ?>


<?php
session_start(); 
if(isset($_SESSION['userAuthorized']) && $_SESSION['userAuthorized'] === true){
  
?>
<div class="container-fluid mt-2">


    <a href="inc/logout.inc.php" class="btn btn-danger float-end "><i class="fas fa-sign-out-alt me-1"></i>Logout</a>
    <a href="add_student.php" class="btn btn-primary float-end  me-1"><i class="fas fa-plus me-1"></i>Add Student</a>
    <div class="toast show bg-success" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="mr-auto">Logged in as
                <?php echo $_SESSION['username']; ?>
            </strong>
            <small>Date:
                <?php echo date("Y/m/d"); ?>
            </small>
            <!-- <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button> -->
        </div>
        <!-- <div class="toast-body">
    Hello, world! This is a toast message.
  </div> -->
    </div>
    <?php 
                          if(isset($_GET['error'])){
                            require_once 'inc/reqfunctions.inc.php';
                            if($_GET['error'] == 'studentadded'){
                                  $class = 'success';
                                  echo error($class, $msg = 'Student Added Successfully');
                        }
                            if($_GET['error'] == 'userdeleted'){
                                  $class = 'danger';
                                  echo error($class, $msg = 'Student Deleted');
                        }
                          else  if($_GET['error'] == 'temprformatwrong'){
                                  $class = 'danger';
                                  echo error($class, $msg = 'Enter proper temprature format!.');
                        }
                          else  if($_GET['error'] == 'stmtfailed'){
                                  $class = 'danger';
                                  echo error($class, $msg = 'Something went wrong!.');
                        }
                          else  if($_GET['error'] == 'detailsupdated'){
                                  $class = 'success';
                                  echo error($class, $msg = 'Details Updated.');
                        }
                     }
            
                        ?>
    <div class="mb-3 mt-3">

        <label for="floatingInput">Search Name</label>
        <input type="text" class="form-control" name="search" id="myInput" title="Type in a name" onkeyup="myFunction()" placeholder="Search by Name">

    </div>



    <table class="table table-striped table-bordered table-sm bg-light" id="myTable">
        <div class="table responsive">
            <thead>
                <tr>
                    <th>Usn</th>
                    <th>Full name</th>
                    <th>Email</th>
                    <th>Sem</th>
                    <th>Branch</th>
                    <th>Phone Number</th>
                    <th>Today temprature</th>
                    <th>Covid Pass Status</th>
                    <th>Action</th>




                </tr>
            </thead>
            <tbody>
                <?php 
require_once 'inc/connect.php';
$sql = 'SELECT 
student_details.usn,
student_details.name,
student_details.email,
student_details.sem,
student_details.branch,
student_details.createdAt,
student_contact.addharNo,
student_contact.phoneNumber,
student_contact.address,
student_covid_info.tempr,
student_covid_info.symptoms,
student_covid_info.covidPass

                       
                        
                        FROM student_details
                          INNER JOIN student_contact ON student_details.usn = student_contact.usn
                        INNER JOIN student_covid_info ON student_details.usn = student_covid_info.usn
                  
                        
                       
                       ;';
$result = mysqli_query($conn, $sql);
$i = 1;
if(mysqli_num_rows($result) > 0)
{
    //output each data
    while($row = mysqli_fetch_assoc($result)){
?>




                <tr>
                    <th scope="row">
                        <?php echo $row['usn']; ?>
                    </th>
                    <td>
                        <?php echo $row['name']; ?>
                    </td>
                    <td>
                        <?php echo $row['email']; ?>
                    </td>
                    <td>
                        <?php echo $row['sem']; ?>
                    </td>
                    <td>
                        <?php echo $row['branch']; ?>
                    </td>
                    <td>
                        <?php echo $row['phoneNumber']; ?>
                    </td>

                    <td>
                        <?php echo $row['tempr']; ?>
                    </td>
                    <td>
                        <?php echo $row['covidPass']; ?>
                    </td>



                    <td>
                        <!-- Modal btn -->
                        <a href="" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#staticBackdropdel<?php echo $i; ?>">Edit</a>

                        <!-- Modal -->
                        <form action="inc/update.inc.php?usn=<?php echo $row['usn'];?>" method="POST">
                            <div class="modal fade" id="staticBackdropdel<?php echo $i; ?>" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-light">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Enter Today's COVID
                                                Detsils!
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row g-3">
                                                <div class="form-group col-md">
                                                    <label for="exampleInputEmail1">USN</label>
                                                    <input type="text" class="form-control" name="usn"
                                                        value="<?php echo $row['usn']; ?>" maxlength="10"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                                        placeholder="Enter USN" id="usn" readonly>
                                                    <small id="emailHelp" class="form-text text-muted">Note that you are
                                                        editing details of the above USN.</small>



                                                </div>
                                                <h2 class="text-info">COVID Details</h2>
                                                <div class="row g-2">
                                                    <div class="form-group col-md">
                                                        <label for="exampleInputEmail1">Temperature</label>
                                                        <input type="text" class="form-control" name="tempr"
                                                            maxlength="3" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp"
                                                            placeholder="Enter Body Temprature" id="usn" required>
                                                        <!-- <small id="emailHelp" class="form-text text-muted">Enter Your University Seat Number</small> -->

                                                    </div>


                                                    <div class="col-md">
                                                        <label for="">Covid Pass</label>
                                                        <select class="form-select " name="covidpass"
                                                            aria-label="Default select example" required>

                                                            <option selected value="">COVID Pass status</option>
                                                            <option value="issued">issued</option>
                                                            <option value="Not-issued">not-issued</option>


                                                        </select>
                                                    </div>



                                                </div>
                                                <div class="form-group">

                                                    <label for="floatingTextarea2">symptoms if any</label>
                                                    <textarea class="form-control" name="symptoms"
                                                        placeholder="symptoms" id="floatingTextarea2"
                                                        style="height: 100px" required></textarea>

                                                    <small id="emailHelp" class="form-text text-muted">Type nil if no
                                                        symptoms</small>
                                                </div>



                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <input type="submit" value="Update" name="submitcoviddetails"
                                                class="btn btn-primary">

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>


                    </td>
                    <td><!-- Button trigger modal view -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdropview<?php echo $i; ?>">
                        view
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdropview<?php echo $i; ?>" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h1 class="text-info">Full details</h1>
                                    <ul class="list-group list-group-flush">
                                        <!-- <li class="list-group-item">USN:<?php echo $row['usn']; ?></li>
                                        <li class="list-group-item"><?php echo $row['usn']; ?></li>
                                        <li class="list-group-item"><?php echo $row['usn']; ?></li>
                                        <li class="list-group-item"><?php echo $row['usn']; ?></li>
                                        <li class="list-group-item"><?php echo $row['usn']; ?></li> -->
                                   
                                    <dl class="row">
                                        
                                        <li class="list-group-item">
                                        <dt class="col-sm-3">USN</dt>
                                        <dd class="col-sm-9"><?php echo $row['usn']; ?></dd>
                                        </li>
                                        <li class="list-group-item">

                                        <dt class="col-sm-3">Name</dt>
                                        <dd class="col-sm-9"><?php echo $row['name']; ?></dd>
                                        </li>

                                        <li class="list-group-item">

                                        <dt class="col-sm-3">Email</dt>
                                        <dd class="col-sm-9"><?php echo $row['email']; ?></dd>
                                        </li>

                                        <li class="list-group-item">

                                        <dt class="col-sm-3">Sem</dt>
                                        <dd class="col-sm-9"><?php echo $row['sem']; ?></dd>
                                        </li>

                                        <li class="list-group-item">

                                        <dt class="col-sm-3">Branch</dt>
                                        <dd class="col-sm-9"><?php echo $row['branch']; ?></dd>
                                        </li>

                                        <li class="list-group-item">

                                        <dt class="col-sm-3">Register Date</dt>
                                        <dd class="col-sm-9"><?php echo $row['createdAt']; ?></dd>
                                        </li>
                                        <li class="list-group-item">

                                        <dt class="col-sm-3">Addhar Number</dt>
                                        <dd class="col-sm-9"><?php echo $row['addharNo']; ?></dd>
                                        </li>
                                        <li class="list-group-item">

                                        <dt class="col-sm-3">Phone Number</dt>
                                        <dd class="col-sm-9"><?php echo $row['phoneNumber']; ?></dd>
                                        </li>
                                        <li class="list-group-item">

                                        <dt class="col-sm-3">Address</dt>
                                        <dd class="col-sm-9"><?php echo $row['address']; ?></dd>
                                        </li>
                                        <li class="list-group-item">

                                        <dt class="col-sm-3">Today's Temprature</dt>
                                        <dd class="col-sm-9"><?php echo $row['tempr']; ?></dd>
                                        </li>
                                        <li class="list-group-item">

                                        <dt class="col-sm-3">symptoms</dt>
                                        <dd class="col-sm-9"><?php echo $row['symptoms']; ?></dd>
                                        </li>
                                        <li class="list-group-item">

                                        <dt class="col-sm-3">COVID Pass Status</dt>
                                        <dd class="col-sm-9"><?php echo $row['covidPass']; ?></dd>
                                        </li>

                                    
                                        
                                    </dl>
                                    </ul>
                                    <small class="form-text text-muted">If the details are wrong other than covid details, we suggest you 
                                        to delete the row and re-register again.</small>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <td>
                        <!-- Modal btn -->
                        <a href="" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop<?php echo $i; ?>">Delete</a>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop<?php echo $i; ?>" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-danger" id="staticBackdropLabel">Alert!</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="inc/delete.inc.php" method="POST">
                                            <div class="row g-3">
                                                <div class="form-group col-md">
                                                    <label for="exampleInputEmail1">USN</label>
                                                    <input type="text" class="form-control" name="usn"
                                                        value="<?php echo $row['usn']; ?>" maxlength="10"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                                        placeholder="Enter USN" id="usn" readonly>


                                                </div>

                                                <p class="display">Are you sure you want to delete the details of this
                                                    USN permanently?</p>

                                                <input type="submit" name="submitdelete" class="btn btn-danger btn-lg"
                                                    value="Delete">

                                            </div>

                                        </form>
                                    </div>

                                    <div class="modal-footer row g-2">
                                        <small id="emailHelp" class="form-text text-muted col-md">click close to abord
                                            --->

                                        </small>
                                        <button type="button" class=" col-md btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>



                    </td>


                    <?php $i++; ?>


                </tr>

                <?php
      
}



}

?>
            </tbody>
        </div>
    </table>
    <!-- Button trigger modal -->



</div>


<?php
} else {
    header('Location: index.php?error=somethingwentwrong');
    exit();
}
?>
<?php include('inc/footer.php'); ?>

<!--1. add student 
    2. display student
    3. edit and delete student 
    4. -->