<?php
if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['flag']=='facebook')
{
  include 'connection.php';
  if($_POST['res']=='YES')
  {
    include('view_record_facebook.php');
    echo "
    Do you want to update the record? <br>
    <form method='POST' action='update_facebook.php'>
    <input type='submit' name='UPDATE' value='update'>
    <input type = 'submit' name='UPDATE' value='do not update'>
    </form>

    ";
  }
  if($_POST['res']=='NO')
    {
      /*
      echo "Do you want to update the record? <br>
      <form method='POST' action='update_facebook.php'>
      <input type='submit' name='UPDATE' value='update'>
      <input type = 'submit' name='UPDATE' value='do not update'>
      </form>";*/
    }
    include('update_facebook.php');
}



 ?>
