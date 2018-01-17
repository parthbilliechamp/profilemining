<!DOCTYPE html>
<html lang="en">
<head>
<style>
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
</style>
  <meta charset="utf-8">
  <title>People Search Engine</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/b.ico" rel="icon">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">


</head>

<body>

  <?php
  session_start();
   ?>
  <!--==========================
  Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="index.php">People Search Engine </a>

      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">Home</a></li>
          <li><a href="About.php">About Us</a></li>


          <li><a href="Team.htm">Team</a></li>

          <li><a href="Contact.htm">Contact Us</a></li>
          <?php
          if($_SESSION['user']=="")
          {
            echo "<li><a href='login/index.html'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
            ";
          }
          if($_SESSION['user']!="")
          {
            //echo "asdasdfsdfdsfdsafsdfds";
            $a = $_SESSION['user'];
            echo "
            <div class='dropdown'>
            <button class='dropbtn'>$a</button>
            <div class='dropdown-content'>
            <a href='view_record.php'>View Records</a>
            <a href='delete_record.php'>Delete Records</a>
            <a href='search_log.php'>View Search Log</a>
            <a href='search_record.php'>Search your Records</a>
            <a href='logout.php'>Logout</a>
            </div>
            </div>
            ";
          }
           ?>

        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero">
    <div class="hero-container">
     <h1>Welcome to People Search Engine </h1><br>
	<div class="row">
    <div class="col-sm-4" ></div>
    <div class=" col-lg-3 col-sm-6" >
      <form method="POST" action="Search.php">
      First Name : <input type="text" name="user" required> <br><br>
      &nbsp Last Name :  <input type = "text" name="last" required> <br><br>
      &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  City :<input type="text" name="city"><br><br>
      <input type = "submit" value="search" style="margin-left:150px">
      <hr>
      </form>
  <div class="col-sm-5" ></div>
  </div>
</div>
</div>
  </section><!-- #hero -->





  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright. All Rights Reserved
      </div>
      <div class="credits">

      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>

  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
