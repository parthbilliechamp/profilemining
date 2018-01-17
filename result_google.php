<?php
if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['flag']=='google')
{
  include 'connection.php';
  if($_POST['res']=='YES')
  {
    include('view_record_google.php');
    echo "
    Do you want to update the record? <br>
    <form method='POST' action='update_google.php'>
    <input type='submit' name='UPDATE' value='update'>
    <input type = 'submit' name='UPDATE' value='do not update'>
    </form>

    ";
  }
  if($_POST['res']=='NO')
    {
      /*
      echo "Do you want to update the record? <br>
      <form method='POST' action='update_google.php'>
      <input type='submit' name='UPDATE' value='update'>
      <input type = 'submit' name='UPDATE' value='do not update'>
      </form>";*/
    }
    include('update_google.php');
}



 ?>
