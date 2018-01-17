<?php
if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['flag']=='twitter')
{
  include 'connection.php';
  if($_POST['res']=='YES')
  {
    include('view_record_twitter.php');
    echo "
    Do you want to update the record? <br>
    <form method='POST' action='update_twitter.php'>
    <input type='hidden' text='twitter' name='record_flag'>
    <input type='submit' name='UPDATE' value='update'>
    <input type = 'submit' name='UPDATE' value='do not update'>
    </form>

    ";
  }
  if($_POST['res']=='NO')
    {
      /*
      echo "Do you want to update the record? <br>
      <form method='POST' action='update_twitter.php'>
      <input type='hidden' text='twitter' name='record_flag'>
      <input type='submit' name='UPDATE' value='update'>
      <input type = 'submit' name='UPDATE' value='do not update'>
      </form>"; */
      echo "
      <script>window.location='index.php'</script>
      ";
    }
    include('update_twitter.php');
}



 ?>
