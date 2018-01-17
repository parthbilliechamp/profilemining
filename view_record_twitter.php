<?php
include('connection.php');
$a = $_SESSION['user'];
$b = $_SESSION['t_url'];
$sql = "SELECT * FROM person_details_Twitter WHERE User_id='$a' and url_twitter='$b'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row

    while($row = mysqli_fetch_assoc($result)) {
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
      echo "<br><br><br><br><br><br>";
      echo "<hr>";
              }
} else {
    echo "0 results";
}
 ?>
