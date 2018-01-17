<?php
if($_POST['UPDATE'] == 'update')
{
include 'connection.php';
$c = $_SESSION['f_id'];
$a=$_SESSION['f_name'];
$b=$_SESSION['f_image'];
$d=$_SESSION['f_url'];
$s = $_SESSION['user'];
$sql_update = "UPDATE person_details_Facebook SET name_facebook='$a',id_facebook='$c',url_facebook='$d',imageurl_facebook='$b', Search_time=NOW() WHERE LinkedIn_Profile='$c' and User_id='$s'";
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
