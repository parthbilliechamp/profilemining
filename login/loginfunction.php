<?php
function login($uname,$pass)
{

  include('connection.php');
  //$pass = md5($pass);
  $sql = "SELECT * FROM user WHERE email =\"{$uname}\" AND Password =\"{$pass}\"";
    if($result=mysqli_fetch_assoc(mysqli_query($con,$sql)))
    {
      $_SESSION['user'] = $result['User_id'];
    }

  else {
    echo"<script>alert('Invalid username or password')</script>";
  }
  if(isset($_SESSION['user']))
  {
    echo "<script>alert('Login successfull')</script>";
    header('Location:../index.php');
  }

}
?>
