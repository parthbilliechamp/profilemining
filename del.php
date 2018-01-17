<?php
//delete query for linkedin
include('connection.php');
$s = $_SESSION['user'];
if($_SERVER["REQUEST_METHOD"]=="POST" && $_POST['flag1']=='l')
{
  $a = $_POST['id'];
  $sql1 = "DELETE FROM person_details_LinkedIn WHERE LinkedIn_Profile='$a' and User_id='$s' ";
  if (mysqli_query($con, $sql1)) {
    echo "<script>alert('Record deleted successfully');window.location='view_record.php');</script>";

} else {
    echo "Error deleting record: " . mysqli_error($con);
}

mysqli_close($con);
}
//delete query for facebook
if($_SERVER["REQUEST_METHOD"]=="POST" && $_POST['flag1']=='f')
{
  $a = $_POST['id'];
  $sql2 = "DELETE FROM person_details_Facebook WHERE id_facebook='$a' and User_id='$s'";
  if (mysqli_query($con, $sql2)) {
    echo "<script>alert('Record deleted successfully');window.location='view_record.php';</script>";
} else {
    echo "Error deleting record: " . mysqli_error($con);
}



}
//delete query for twitter
if($_SERVER["REQUEST_METHOD"]=="POST" && $_POST['flag1']=='t')
{
  $a = $_POST['id'];
  $sql3 = "DELETE FROM person_details_Twitter WHERE url_twitter='$a' and User_id='$s'";
  if (mysqli_query($con, $sql3)) {
    echo "<script>alert('Record deleted successfully');window.location='view_record.php';</script>";
} else {
    echo "Error deleting record: " . mysqli_error($con);
}

}
//delete query for google
  if($_SERVER["REQUEST_METHOD"]=="POST" && $_POST['flag1']=='g')
  {
    $a = $_POST['id'];
    $sql4 = "DELETE FROM person_details_Googleplus WHERE url_googleplus='$a' and User_id='$s'";
    if (mysqli_query($con, $sql4)) {
      echo "<script>alert('Record deleted successfully');window.location='view_record.php';</script>";
  } else {
      echo "Error deleting record: " . mysqli_error($con);
  }

  }
 ?>
