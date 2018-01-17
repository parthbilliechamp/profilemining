<?php
include('connection.php');
$a = $_SESSION['user'];
$b = $_SESSION['l_url'];
$sql = "SELECT * FROM person_details_LinkedIn WHERE User_id='$a' and LinkedIn_Profile='$b'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row

    while($row = mysqli_fetch_assoc($result)) {
      $picture_ll = $row['Profile_picture'];
      $name_ll=$row['Name'];
      $profile_ll=$row['LinkedIn_Profile'];
      $details_ll=$row['Details'];
      $location_ll=$row['Location'];
      $search_ll=$row['Search_time'];

      echo "<img src='$picture_ll' height='150' width='150' style='float:left'>";
      echo "Name : ";
      echo $name_ll;
      echo "<br>";
      echo "Profile : ";
      echo $profile_ll;
      echo "<br>";
      echo "Details : ";
      echo $details_ll;
      echo "<br>";
      echo "Location : ";
      echo $location_ll;
      echo "<br>";
      //echo "Picture : ";
      echo "<br>";
      echo "Search : ";
      echo $search_ll;
        }
} else {
    echo "0 results";
}
 ?>
