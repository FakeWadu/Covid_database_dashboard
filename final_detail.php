<?php include('inc/header.php'); ?>
    

<?php
session_start();
if(isset($_SESSION['authorization']) && $_SESSION['authorization'] === true){
    require_once 'inc/connect.php';

    ?>
<div class="container p-2">
<a href="inc/logout.inc.php" class="btn btn-danger float-end"><i class="fas fa-sign-out-alt me-1"></i>Logout</a>
<a href="add_staff.php" class="btn btn-primary float-end me-1"><i class="fas fa-plus me-1"></i>Add Staff</a>
<a href="add_staff.php" class="btn btn-success float-end me-1" data-bs-toggle="modal" data-bs-target="#staticBackdropcall"><i class="fas fa-phone me-1"></i>Call Staff</a>

 <!-- Modal -->
                    <div class="modal fade" id="staticBackdropcall" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Call Staff</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h1 class="text-info">Staff Call details</h1>
                                    <ul class="list-group list-group-flush">
                                      <?php 
$sql = 'SELECT * from staff;';
$result = mysqli_query($conn, $sql);
$j= 1;
if(mysqli_num_rows($result) > 0)
{
    //output each data
    while($row0 = mysqli_fetch_assoc($result)){
?>
                                   
                                        <li class="list-group-item">
                                         <strong>Name: </strong><?php echo $row0['name']; ?> |
                                         <strong>Phone Number: </strong><?php echo $row0['phoneNumber']; ?> |
                                         <a class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdropdel<?php echo $j; ?>"><i class="fas fa-trash-alt text-danger rounded border border-1 p-1 border-danger " ></i></a>
                                       <!-- Modal -->
<div class="modal fade" id="staticBackdropdel<?php echo $j; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>You Are going to remove a staff of Name:  <?php echo $row0['name']; ?></p>
        
        <form action="inc/delete.inc.php?id=<?php echo $row0['id']; ?>">
            Id: <?php echo $row0['id']; ?> <br>
            <input type="hidden" name="id" value="<?php echo $row0['id']; ?>">
            
            <input type="submit" name="submitdelsaff" class="btn btn-danger" value="Delete">
        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
  
</div>
                                        </li>
           
                                         <?php 
                                         $j++;
                     }
                     }?>
                                        
                                       

                                    
                                        
                                    </dl>
                                    </ul>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                   
    <div class="toast show bg-success" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="mr-auto">
                Hello there
            </strong>
            <small>Date:
                <?php echo date("Y/m/d"); ?>
            </small>
            
        </div>
       
    </div>
    <?php 
                          if(isset($_GET['error'])){
                            require_once 'inc/reqfunctions.inc.php';
                            if($_GET['error'] == 'detailesadded'){
                                  $class = 'success';
                                  echo error($class, $msg = 'Staff Added Successfully');
                        }
                          else  if($_GET['error'] == 'staffdeleted'){
                                  $class = 'danger';
                                  echo error($class, $msg = 'Staff Deleted');
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



            <td >
                <!-- Button trigger modal view -->
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
                                        <dt class="col-sm-3">Temprature</dt>
                                        <dd class="col-sm-9"><?php echo $row['tempr']; ?></dd>
                                        </li>
                                        <dt class="col-sm-3">COVID Pass Status</dt>
                                        <dd class="col-sm-9"><?php echo $row['symptoms']; ?></dd>
                                        </li>
                                        <dt class="col-sm-3">COVID Pass Status</dt>
                                        <dd class="col-sm-9"><?php echo $row['covidPass']; ?></dd>
                                        </li>
                                        

                                    
                                        
                                    </dl>
                                    </ul>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>


            </td>
        


<?php 


          
$i++;
      
}



}


?>
</tr>
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