<?php
if($_POST['UPDATE'] == 'update')
{
include 'connection.php';
$a = $_SESSION['t_name'];
$b = $_SESSION['t_url'];
$c = $_SESSION['t_image'];
$s = $_SESSION['user'];
$sql_update = "UPDATE person_details_Twitter SET name_twitter='$a',url_twitter='$b', img_twitter='$c',search_time_twitter=NOW() WHERE url_twitter='$b' and User_id='$s'";
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
