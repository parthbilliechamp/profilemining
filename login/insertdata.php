<?php
error_reporting(0);
$password="";
if($_SERVER['REQUEST_METHOD']=='POST')
{
include('connection.php');
$password = $_POST['password'];
$name = $_POST['name'];
$city = $_POST['city'];
$state = $_POST['state'];
$eid = $_POST['emailid'];
$sql = "INSERT INTO user (email,Password,City,State,Name)VALUES ('$eid','$password','$city','$state','$name')";
if($password!=NULL)
{
if(mysqli_query($con,$sql))
{

  echo"<script>alert('Data entered succesfully!!!')</script>";
  sleep(2);
  echo ("<SCRIPT LANGUAGE='JavaScript'>
  window.location.href='../login/login.php';
 </SCRIPT>");

}
else {
  echo"<script>alert('Error Signing up.')</script>";

}
}
}
 ?>
