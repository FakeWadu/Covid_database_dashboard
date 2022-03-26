<?php
  
  include('config.php');
  $conn = mysqli_connect(DB_HOST,DB_USER ,DB_PASS ,DB_NAME );
  if(!$conn){
      die("connection error:".mysqli_connect_error());
  } 