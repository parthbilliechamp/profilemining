<?php
include('connection.php');
$a = $_SESSION['user'];
$b = $_SESSION['g_url'];
$sql = "SELECT * FROM person_details_Googleplus WHERE User_id='$a' and url_googleplus='$b'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row

    while($row = mysqli_fetch_assoc($result)) {
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
      echo "<br><br><br><br><br><br>";
      echo "<hr>";
              }
} else {
    echo "0 results";
}
 ?>
