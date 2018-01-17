<html>
<head>
 <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.min.css">
<style>
 .box{
	 margin-left:4em;
	 font-size:14px;
	 line-height:2.5em;
	 margin-right:9em;

 }
</style>
  <title>Header Section</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:600" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
 </head>
<body>
<?php
session_start();
if(!isset($_SESSION['user']))
{
  header('Location:login.php');
}
 ?>
<div class="row" style="width:auto;height:150px;background-color:#b7c9e8;">
<div class="col-sm-4">
</div>
<div class="col-sm-5">
<h1 style="font-family: 'Source Sans Pro', sans-serif; size:20px; margin-top:1.1em;margin-left:1em;">Header Section<span class="glyphicons glyphicons-pencil"></span> </h1>
<p style="size:18px;margin-top:1.5em;margin-left:2.7em;font-family: 'Montserrat', sans-serif;">Welcome to home page </p>
</div>
<div class="col-sm-3" >
<img style="margin-top:2.3em; margin-left:1em;" src="../images/logo1.png" height="90" width="130">
</div>
</div>
<div class="row" style="margin-top:4em;">
<div class="col-sm-6">
<div class="box">
<p><i class="fa fa-user-circle fa-3x" aria-hidden="true" style="float:right;"></i>
</p>
<span style="font-size:22px;color:#99a9c6">Student Section</span>
<p style="font-family: 'Montserrat', sans-serif;"> - add and view student details</p>
<form method="post" action="add_blog.php">
<input type="submit" class="btn btn-info" value="Click Here" style="background-color:#b7c9e8">
</form>
<hr>
</div>
</div>
<div class="col-sm-6">
<div class="box">
<p><i class="fa fa-university fa-3x" aria-hidden="true" style="float:right;"></i>
</p>
<span style="font-size:22px;color:#99a9c6">College Section</span>
<p style="font-family: 'Montserrat', sans-serif;"> -edit your college information</p>
<form method="post" action="view_blog.php">
<input type="submit" class="btn btn-info" value="Click Here" style="background-color:#b7c9e8">
</form>
<hr>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<div class="box">
<p><i class="fa fa-university fa-3x" aria-hidden="true" style="float:right;"></i></p>
<span style="font-size:22px;color:#99a9c6">Company Section</span>
<p style="font-family: 'Montserrat', sans-serif;"> - view company detials</p>
<form method="post" action="add_gallery.php">
<input type="submit" class="btn btn-info" value="Click Here" style="background-color:#b7c9e8">
</form>
<hr>
</div>
</div>
<div class="col-sm-6">
<div class="box">
<p><i class="fa fa-area-chart fa-3x" aria-hidden="true" style="float:right;"></i>
</p>
<span style="font-size:22px;color:#99a9c6">Placement Section</span>
<p style="font-family: 'Montserrat', sans-serif;"> - view placement analysis</p>
<form method="post" action="view_gallery.php">
<input type="submit" class="btn btn-info" value="Click Here" style="background-color:#b7c9e8">
</form>
<hr>
</div>
</div>
</div>

</body>

</html>
