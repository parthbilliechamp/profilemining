<!DOCTYPE html>
<html lang="en">
<head>
  <script src="./linkedin_js.js"></script>

//linkedin script


  <script>
  var data = [
     ['Foo', 'programmer'],
     ['Bar', 'bus driver'],
     ['Moo', 'Reindeer Hunter']
  ];


  function download_csv() {
      var csv = 'Name,Title\n';
      data.forEach(function(row) {
              csv += row.join(',');
              csv += "\n";

      });

      console.log(csv);
      var hiddenElement = document.createElement('a');
      hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);

      hiddenElement.target = '_blank';
      hiddenElement.download = 'people.csv';
      hiddenElement.click();
  }
  </script>
//linkedin script ends


  <meta charset="utf-8">
  <title>Search Results</title>
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

  <!--==========================
  Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="index.php"></a>

      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="index.php">Home</a></li>
          <li><a href="About.php">About Us</a></li>


          <li><a href="Team.htm">Team</a></li>

          <li><a href="Contact.htm">Contact Us</a></li>

        <li><a href="login/index.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero">
  <div class="hero-container">

    <br><br><br><br>
	<div class="row">

    <div class="col-sm-3" >
      <form method="POST" action="Search.php">
      First Name : <input type="text" name="user" required> <br><br>
      &nbsp Last Name :  <input type = "text" name="last" required> <br><br>
      &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  City :<input type="text" name="city"><br><br>

      <table>
        <tr>
          <td>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Facebook" value="1">
          </td>
          <td>
            <font color="White"> Facebook </font>
          </td>
        </tr>
        <tr>
          <td>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Linkedin" value="2" >
          </td>
          <td>
            <font color="White"> Linkedin</font>
          </td>
        </tr>
        <tr>
          <td>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Google+" value="3">
          </td>
          <td>
          <font color="White">Google+</font>
          </td>
        </tr>
        <tr>
          <td>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Twitter" value="4" >
          </td>
          <td>
            <font color="White"> Twitter</font>
          </td>
        </tr>
      </table>
      <input type = "submit" name="submit" value="Search" style="margin-left:150px">
      <hr>
      </form>
              Search With More Filters here :
              <button onclick="download_csv()">Download CSV</button>

	</div>
    <div class="col-sm-7" >
	<div class="hero-container">


	</div>
  <?php
  //error_reporting(0);
  if($_SERVER['REQUEST_METHOD']=='POST')
  {

    $query="";
    //error_reporting(0);
    $user = $_POST['user'];
    $last = $_POST['last'];
    $city = $_POST['city'];
    $query = $user . " " . $last . " " . $city ;


    //store variable in SessionHandler session_start

    $_SESSION['v_user'] = $user;
    $_SESSION['v_last'] = $last;
    $_SESSION['city'] = $city;


    //store variavle in session encodings



    //echo $query;

    require('search_query_facebook.php');
    require('search_query_linkedin.php');
    require('search_query_twitter.php');

    if($_POST['submit']=='Search')
    {
      //echo "bcbsdasc";
      if($_POST['Linkedin'])
      {
        include 'linkedin_fetch.php';
        search_linkedin($query_linkedin);
      }
      if($_POST['Facebook'])
      {
        include 'facebook_fetch.php';
        search_facebook($query_facebook);
      }
      if($_POST['Twitter'])
      {
        include 'twitter_fetch.php';
        search_twitter($query_twitter);
      }
      if($_POST['Google+'])
      {
        include 'google_fetch.php';
        search_google($query);
      }



    }
      else {

  if($user!="" && $last!=null)
  {

  //get linkedin content
  include 'linkedin_fetch.php';
  search_linkedin($query_linkedin);
  //get facebook content
  include 'facebook_fetch.php';
  search_facebook($query_facebook);
  //get twitter content
  include 'twitter_fetch.php';
  search_twitter($query_twitter);
  //get plus.google content
  include 'google_fetch.php';
  search_google($query);
  }
  include 'save_to_database.php';
  //include 'save_to_csv.php';
}
}

  ?>

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
