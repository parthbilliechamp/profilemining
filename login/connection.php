<?php
  session_start();
  $servername="localhost";
  $username="root";
  $password="";
  $dbname = "profile search";
  $con = mysqli_connect($servername,$username,$password,$dbname);
  if(!$con)
  {
    echo"<script>alert('Connection Error')</script>";
  }
?>
