<?php
include 'connection.php';
error_reporting(0);

//linkedin data
$sql = "SELECT * FROM person_details_LinkedIn WHERE User_id={$_SESSION['user']}";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
  while($row = mysqli_fetch_assoc($result))
  {
    $name_l =  $row["Name"];
    $profile_l = $row["LinkedIn_Profile"];
    $details_l = $row["Details"];
    $location_l = $row["Location"];
    $picture_l = $row["Profile_picture"];
    $search_l = $row["Search_time"];

    echo "<img src='$picture_l' height='150' width='150' style='float:left'>";
    echo "Name : ";
    echo $name_l;
    echo "<br>";
    echo "Profile : ";
    echo $profile_l;
    echo "<br>";
    echo "Details : ";
    echo $details_l;
    echo "<br>";
    echo "Location : ";
    echo $location_l;
    echo "<br>";
    //echo "Picture : ";
    echo "<br>";
    echo "Search : ";
    echo $search_l;
    echo"
    <form method='POST' action='del.php' style='float:right;margin-right:30em;'>
    <input type='hidden' value='$profile_l' name='id'>
    <input type='hidden' name='flag1' value='l'>
    <input type='submit' value='Delete'>
    </form>
    ";
    echo "<br><br><br>";
    echo "<hr>";


  }

}

//facebook Database

$sql2 = "SELECT * FROM person_details_Facebook WHERE User_id={$_SESSION['user']}";
$result=mysqli_query($con,$sql2);
if(mysqli_num_rows($result)>0)
{
  while($row = mysqli_fetch_assoc($result))
  {
      $name_f =  $row["name_facebook"];
      $id_f = $row["id_facebook"];
      $url_f = $row["url_facebook"];
      $image_f = $row["imageurl_facebook"];
      $search_f = $row["search_time_facebook"];

      echo "<img src='$image_f' height='150' width='150' style='float:left'>";
      echo "Name : ";
      echo $name_f;
      echo "<br>";
      echo "ID : ";
      echo $id_f;
      echo "<br>";
      echo "Facebook Profile : ";
      echo $url_f;
      echo "<br>";
      echo "Search : ";
      echo $search_f;
      echo"
      <form method='POST' action='del.php' style='float:right;margin-right:30em;'>
      <input type='hidden' value='$id_f' name='id'>
      <input type='hidden' value='f' name='flag1'>
      <input type='submit' value='Delete'>
      </form>
      ";
      echo "<br><br><br><br><br>";
      echo "<hr>";


  }

}

//twitter fetch

$sql3 = "SELECT * FROM person_details_Twitter WHERE User_id={$_SESSION['user']}";
$result=mysqli_query($con,$sql3);
if(mysqli_num_rows($result)>0)
{
  while($row = mysqli_fetch_assoc($result))
  {
    $name_t = $row["name_twitter"];
    $url_t = $row["url_twitter"];
    $image_t = $row["img_twitter"];
    $search_t = $row["search_time_twitter"];
    echo "<img src='$image_t' height='150' width='150' style='float:left'>";
    echo "Name : ";
    echo $name_t;
    echo "<br>";
    echo "Twiiter Profile : ";
    echo $url_t;
    echo "<br>";
    echo "Search time : ";
    echo $search_t;
    echo"
    <form method='POST' action='del.php' style='float:right;margin-right:30em;'>
    <input type='hidden' value='$url_t' name='id'>
    <input type='hidden' name='flag1' value='t'>
    <input type='submit' value='Delete'>
    </form>
    ";
    echo "<br><br><br><br><br><br>";
    echo "<hr>";
  }

}


//Googleplus

$sql4 = "SELECT * FROM person_details_Googleplus WHERE User_id={$_SESSION['user']}";
$result=mysqli_query($con,$sql4);
if(mysqli_num_rows($result)>0)
{
  while($row = mysqli_fetch_assoc($result))
  {
    $name_g = $row["name_googleplus"];
    $url_g = $row["url_googleplus"];
    $image_g = $row["img_googleplus"];
    $search_g = $row["search_time_googleplus"];

    echo "<img src='$img_g' height='150' width='150' style='float:left'>";
    echo "Name : ";
    echo $name_g;
    echo "<br>";
    echo "Google Url : ";
    echo $url_g;
    echo "<br>";
    echo "Search : ";
    $search_g;
    echo"
    <form method='POST' action='del.php' style='float:right;margin-right:30em;'>
    <input type='hidden' value='$url_g' name='id'>
    <input type='hidden' name='flag1' value='g'>
    <input type='submit' value='Delete'>
    </form>
    ";
    echo "<br><br><br><br><br><br>";
    echo "<hr>";
  }

}


 ?>
