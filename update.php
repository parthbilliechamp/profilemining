<?php
if($_POST['UPDATE'] == 'update')
{
include 'connection.php';
$c = $_SESSION['l_url'];
$a=$_SESSION['l_Name'];
$b=$_SESSION['l_Details'];
$d=$_SESSION['l_Location'];
$e=$_SESSION['l_img'];
$s = $_SESSION['user'];
$sql_update = "UPDATE person_details_LinkedIn SET Name='$a',Details='$b',Location='$d',Profile_picture='$e', Search_time=NOW() WHERE LinkedIn_Profile='$c' and User_id='$s'";
//UPDATE MyGuests SET lastname='Doe' WHERE id=2UPDATE MyGuests SET lastname='Doe' WHERE id=2
if(mysqli_query($con,$sql_update))
{
  echo "<script>alert('Record updated successfully')</script>";
  echo"<script>window.location='Search.php';</script>";
}
else {

  echo "Error updating record: " . mysqli_error($con);
}
}
if($_POST['UPDATE'] == 'do not update')
 {
  echo "<script>window.close();</script>";
}


 ?>
