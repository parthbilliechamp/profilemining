<?php
if($_POST['UPDATE'] == 'update')
{
include 'connection.php';
$a =$_SESSION['g_name'];
$b=$_SESSION['g_url'];
$c=$_SESSION['g_image'];
$s = $_SESSION['user'];
$sql_update = "UPDATE person_details_Googleplus SET name_googleplus='$a',url_googleplus='$b',img_googleplus='$c',search_time_googleplus=NOW() WHERE url_googleplus='$b' and User_id='$s'";
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
