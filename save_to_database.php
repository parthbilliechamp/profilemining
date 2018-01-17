<?php
session_start();
if($_SERVER['REQUEST_METHOD']=="POST")
{
  if($_SESSION['user']=="")
  {
    echo "You must login first click <a href='login/index.html'>here</a> to login";
  }
  else {

    $s = $_POST['submit'];
    require('connection.php');
    if($s =='Save LinkedIn details to Database')
    {
      //echo "asfdfsdfdsfsdf";
      //echo $url_linkedin;
      //url_linkedin imageurl_linkedin name_linkedin details_linkedin role_linkedin location_linked
      //echo $_POST['name_linkedin'];
      $a_l = $_POST['url_linkedin'];
      $b_l = $_POST['name_linkedin'];
      $c_l=$_POST['details_linkedin'];
      $d_l=$_POST['location_linkedin'];
      $e_l=$_POST['imageurl_linkedin'];
      $f_l=$_SESSION['user'];


      //storing values in session
      $_SESSION['l_url']=$a_l;
      $_SESSION['l_Name']=$b_l;
      $_SESSION['l_Details']=$c_l;
      $_SESSION['l_Location']=$d_l;
      $_SESSION['l_img']=$e_l;
      include 'connection.php';
      $sql = "INSERT INTO person_details_LinkedIn values('$a_l','$b_l','$c_l','$d_l','$e_l',NOW(),$f_l)";
      if (mysqli_query($con, $sql)) {

      echo "<script>alert('New record created successfully')</script>";
      echo"<a href='javascript:history.go(-1)'>Go back to search</a>";
  }
   else {

    echo "This record already exists<br>";
    echo "Do you want to view the record?";
    echo "
    <form method='POST' method='result.php' target='_blank'>
    <input type='hidden' value='linkedin' name='flag'>
    <input type='submit' value='YES' name='res'>
    <input type='submit' value='NO' name='res'>
    </form>";
  }
  }

    else if($s =='Save Twitter details to Database')
    {
      //echo $url_linkedin;
      //url_linkedin imageurl_linkedin name_linkedin details_linkedin role_linkedin location_linked
      //echo $_POST['name_linkedin'];
      $a_t = $_POST['name_twitter'];
      $b_t = $_POST['url_twitter'];
      $c_t = $_POST['imageurl_twitter'];
      $f_t=$_SESSION['user'];


      //session stats_kurtosis
      $_SESSION['t_name']=$a_t;
      $_SESSION['t_url']=$b_t;
      $_SESSION['t_image']=$c_t;


      //storing session in varuables ibase_num_fields
      $sql = "INSERT INTO person_details_Twitter values('$a_t','$b_t','$c_t',NOW(),$f_t)";
      if (mysqli_query($con, $sql)) {
      echo "<script>alert('New record created successfully')</script>";
      echo"<a href='javascript:history.go(-1)'>Go back to search</a>";
  } else {

    echo "This record already exists<br>";
    echo "Do you want to view the record?";
    echo "
    <form method='POST' method='result_twitter.php' target='_blank'>
    <input type='hidden' value='twitter' name='flag'>
    <input type='submit' value='YES' name='res'>
    <input type='submit' value='NO' name='res'>
    </form>";

  }
  }

  else if($s =='Save Googleplus details to Database')
  {
    //echo $url_linkedin;
    //url_linkedin imageurl_linkedin name_linkedin details_linkedin role_linkedin location_linked
    //echo $_POST['name_linkedin'];
    $a_g = $_POST['name_googleplus'];
    $b_g = $_POST['url_googleplus'];
    $c_g = $_POST['imageurl_googleplus'];
    $f_g=$_SESSION['user'];


    //storing session variables
    $_SESSION['g_name']=$a_g;
    $_SESSION['g_url']=$b_g;
    $_SESSION['g_image']=$c_g;

    $sql = "INSERT INTO person_details_Googleplus values('$a_g','$b_g','$c_g',NOW(),$f_g)";
    if (mysqli_query($con, $sql)) {
    echo "<script>alert('New record created successfully')</script>";
    echo"<a href='javascript:history.go(-1)'>Go back to search</a>";
  } else {

    echo "This record already exists<br>";
    echo "Do you want to view the record?";
    echo "
    <form method='POST' method='result_google.php' target='_blank'>
    <input type='hidden' value='google' name='flag'>
    <input type='submit' value='YES' name='res'>
    <input type='submit' value='NO' name='res'>
    </form>";


  }
  }


  else if($s =='Save Facebook details to Database')
  {
    //echo $url_linkedin;
    //url_linkedin imageurl_linkedin name_linkedin details_linkedin role_linkedin location_linked
    //echo $_POST['name_linkedin'];
    $a_f = $_POST['id_facebook'];
    $b_f = $_POST['name_facebook'];
    $c_f = $_POST['imageurl_facebook'];
    $d_f = $_POST['url_facebook'];
    $f_f=$_SESSION['user'];


    $_SESSION['f_id']=$a_f;
    $_SESSION['f_name']=$b_f;
    $_SESSION['f_image']=$c_f;
    $_SESSION['f_url']=$d_f;

    $sql = "INSERT INTO person_details_Facebook values('$a_f','$b_f','$d_f','$c_f',NOW(),$f_f)";
    if (mysqli_query($con, $sql)) {
    echo "<script>alert('New record created successfully')</script>";
    echo"<a href='javascript:history.go(-1)'>Go back to search</a>";
  } else {
    echo "This record already exists<br>";
    echo "Do you want to view the record?";
    echo "
    <form method='POST' method='result_facebook.php' target='_blank'>
    <input type='hidden' value='facebook' name='flag'>
    <input type='submit' value='YES' name='res'>
    <input type='submit' value='NO' name='res'>
    </form>";

  }
  }
  else if($s =='Save LinkedIn details to Excel')
  {
    //echo "bcb";
    $a = $_POST['url_linkedin'];
    $b = $_POST['name_linkedin'];
    $c=$_POST['details_linkedin'];
    $d=$_POST['location_linkedin'];
    $e=$_POST['imageurl_linkedin'];
    $list = array
  (
  "$a$$b$$c$$d$$e"
  );

  //javascript start
  echo"
  <script>
  var data = [
     ['$a','$b','$c','$d','$e']
  ];
  var csv='';
  data.forEach(function(row) {
          csv += row.join(',');

  });
  console.log(csv);
  var hiddenElement = document.createElement('a');
  hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);

  hiddenElement.target = '_blank';
  hiddenElement.download = 'excel_linkedin.csv';
  hiddenElement.click();
  </script>";
  //javascript end

}
  //facebook session_start
  else if($s =='Save Facebook details to Excel')
  {
    $a = $_POST['id_facebook'];
    $b = $_POST['name_facebook'];
    $c = $_POST['imageurl_facebook'];
    $d = $_POST['url_facebook'];
    $list = array
  (
  "$a$$b$$c$$d"
  );

  echo"
  <script>
  var data = [
     ['$a','$b','$c','$d']
  ];
  var csv='';
  data.forEach(function(row) {
          csv += row.join(',');

  });
  console.log(csv);
  var hiddenElement = document.createElement('a');
  hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);

  hiddenElement.target = '_blank';
  hiddenElement.download = 'excel_facebook.csv';
  hiddenElement.click();
  </script>";
  //javascript end

}
  //facebook session encodings

//twitter stats_kurtosis

elseif($s =='Save Twitter details to Excel')
{
  $a = $_POST['name_twitter'];
  $b = $_POST['url_twitter'];
  $c = $_POST['imageurl_twitter'];
  $list = array
(
"$a$$b$$c"
);
echo"
<script>
var data = [
   ['$a','$b','$c']
];
var csv='';
data.forEach(function(row) {
        csv += row.join(',');

});
console.log(csv);
var hiddenElement = document.createElement('a');
hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);

hiddenElement.target = '_blank';
hiddenElement.download = 'excel_twitter.csv';
hiddenElement.click();
</script>";
//javascript end

}



//twitter stats ends


//google+ stats_kurtosis

elseif($s =='Save Googleplus details to Excel')
{
  $a = $_POST['name_googleplus'];
  $b = $_POST['url_googleplus'];
  $c = $_POST['imageurl_googleplus'];

  $list = array
(
"$a$$b$$c"
);
echo"
<script>
var data = [
   ['$a','$b','$c']
];
var csv='';
data.forEach(function(row) {
        csv += row.join(',');

});
console.log(csv);
var hiddenElement = document.createElement('a');
hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);

hiddenElement.target = '_blank';
hiddenElement.download = 'excel_googleplus.csv';
hiddenElement.click();
</script>";
//javascript end

}

include('result.php');
include('result_twitter.php');
include('result_facebook.php');
include('result_google.php');
//google+ encodings

  mysqli_close($conn);
  }
}



/*
    else if($s='')
    {}
      else if()
      {}
        else if()
        {}
          else {
          }*/
?>
