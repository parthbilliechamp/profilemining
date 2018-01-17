<?php
if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['flag']=='twitter')
{
  echo "twitter";
}



 ?>
