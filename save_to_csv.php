<?php
if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['submit']=='Save LinkedIn details to Excel')
{
  $a = $_POST['url_linkedin'];
  $b = $_POST['name_linkedin'];
  $c=$_POST['details_linkedin'];
  $d=$_POST['location_linkedin'];
  $e=$_POST['imageurl_linkedin'];
  $list = array
(
"$a$$b$$c$$d$$e"
);

$file = fopen("linkedin.csv","a");

foreach ($list as $line)
  {
  fputcsv($file,explode('$',$line));
  }

fclose($file);


}
 ?>
