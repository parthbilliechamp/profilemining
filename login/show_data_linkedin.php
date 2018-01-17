<?php
include 'connection.php';


//linkedin data
$sql = "SELECT * FROM person_details_LinkedIn WHERE User_id={$_SESSION['user']}";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
  while($row = mysqli_fetch_assoc($result))
  {
    $name_l =  $row["Name"];
    $profile_l = $row["LinkedIn Profile"];
    $details_l = $row["Name"];
    $location_l = $row["Name"];
    $picture_l = $row["Name"];
    $search_l = $row["Name"];


    echo $name_l;
    echo $profile_l;
    echo $details_l;
    echo $location_l;
    echo $picture_l;
    echo $search_l;

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

    echo $name_f;
    echo $id_f;
    echo $url_f;
    echo $image_f;
    echo $search_f;


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

    echo $name_t;
    echo $url_t;
    echo $image_t;
    echo $search_t;
  }

}


//Googleplus

$sql4 = "SELECT * FROM person_details_Googleplus WHERE User_id={$_SESSION['user']}";
$result=mysqli_query($con,$sql4);
if(mysqli_num_rows($result)>0)
{
  while($row = mysqli_fetch_assoc($result))
  {
    $name_t = $row["name_googleplus"];
    $url_t = $row["url_googleplus"];
    $image_t = $row["img_googleplus"];
    $search_t = $row["search_time_googleplus"];


    echo $name_t;
    echo $url_t;
    echo $image_t;
    $search_t;
  }

}


 ?>
