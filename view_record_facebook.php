<?php
include('connection.php');
$a = $_SESSION['user'];
$b = $_SESSION['f_id'];
$sql = "SELECT * FROM person_details_Facebook WHERE User_id='$a' and id_facebook='$b'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row

    while($row = mysqli_fetch_assoc($result)) {
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
      echo "<br><br><br><br><br>";
      echo "<hr>";


              }
} else {
    echo "0 results";
}
 ?>
