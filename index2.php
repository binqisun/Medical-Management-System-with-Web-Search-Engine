
<?php 
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="hospital";
mysql_connect($dbhost, $dbuser, $dbpass, $dbname);
 if (mysql_error()) {
  die(
    "Database connection failed:".
    mysql_error().
    "(" . mysql_error() . ")"
    );
 }
 mysql_select_db("hospital");
  ?>
  <?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:index.php");
} else {
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Hospital Database System">
    <meta name="author" content="Binqi Sun">
    

    <title>Binqi's Medical System</title>

    <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="public/css/style.css" rel="stylesheet">

<style>

body { 
  background: url("image/home1.jpg") no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;

}

    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
  }


  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }
	
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }

</style>	
	
	


  </head>

  <body>
<nav class="navbar navbar-inverse navbar-fixed-top" style="font-size:18px; padding-top: 7px; background-color:#63599E;" >
      <div class="container-fluid">
        <div class="navbar-header" style="font-size:15px; padding-top: 7px; color:#ffffff;">
          <button type="button" class="navbar-toggle collapsed" style="color:#ffffff;" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="?page=Index3" style="font-size:23px; color:#ffffff;" >Binqi's Medical System</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar" style="font-size:18px; padding-top: 7px;"  align="center">
          <ul class="nav navbar-nav" style="color:#ffffff;"> <!-- Provides links above -->
		  
            <li <?php if(!isset($_GET["page"]) || $_GET["page"]=="home") echo 'class="active"'; ?>><a href="?page=home"  style="color:#ffffff;">Internal Search</a></li>
			<li <?php if(isset($_GET["page"]) && $_GET["page"]=="hospital") echo 'class="active"'; ?>><a href="?page=hospital"  style="color:#ffffff;">Hospitals</a></li>
            <li <?php if(isset($_GET["page"]) && $_GET["page"]=="staff") echo 'class="active"'; ?>><a href="?page=staff"  style="color:#ffffff;">General Staff</a></li>
            <li <?php if(isset($_GET["page"]) && $_GET["page"]=="patient") echo 'class="active"'; ?>><a href="?page=patient"  style="color:#ffffff;">Patient</a></li>
            <li <?php if(isset($_GET["page"]) && $_GET["page"]=="physician") echo 'class="active"'; ?>><a href="?page=physician"  style="color:#ffffff;">Physician</a></li>
            <li <?php if(isset($_GET["page"]) && $_GET["page"]=="register") echo 'class="active"'; ?>><a href="?page=register"  style="color:#ffffff;">Register</a></li>
			<li <?php if(isset($_GET["page"]) && $_GET["page"]=="search") echo 'class="active"'; ?>><a href="?page=search"  style="color:#ffffff;">Web Search</a></li>
			<li <?php if(isset($_GET["page"]) && $_GET["page"]=="logout") echo 'class="active"'; ?>><a href="?page=logout"  style="color:#ffffff;">Log Out</a></li>
          </ul>
   <form class="navbar-form navbar-right" align="center">
      <div class="input-group">
     
<script>
  (function() {
    var cx = '007152061533245651543:4xd9a4_yjwq';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search>
     
      </div>
 
    </form> 
        </div><!--/.nav-collapse -->
      </div>
</nav>

    <div class="container" style="margin-top:30px; ">

      <div class="starter-template" style=" background-color:#ECECEA;">
	 
        <?php //Grabs PHP file for certain requests from where user is nagivating
        if (isset($_GET["page"]) && $_GET["page"]=="physician" )
          {include_once("public/physician.php");}
        elseif (isset($_GET["page"]) && $_GET["page"]=="staff")
          {include_once("public/staff.php");}
        elseif (isset($_GET["page"]) && $_GET["page"]=="patient")
          {include_once("public/patient.php");}
        elseif (isset($_GET["page"]) && $_GET["page"]=="register")
          {include_once("public/register.php");}
		elseif (isset($_GET["page"]) && $_GET["page"]=="hospital")
          {include_once("public/hospital.php");}
		elseif (isset($_GET["page"]) && $_GET["page"]=="pedit")
          {include_once("public/pedit.php");}
		elseif (isset($_GET["page"]) && $_GET["page"]=="pappointments")
          {include_once("public/pappointments.php");}
		elseif (isset($_GET["page"]) && $_GET["page"]=="roomstay")
          {include_once("public/roomstay.php");}
		elseif (isset($_GET["page"]) && $_GET["page"]=="room")
          {include_once("public/room.php");}
		elseif (isset($_GET["page"]) && $_GET["page"]=="search")
          {include_once("search.php");}
		elseif (isset($_GET["page"]) && $_GET["page"]=="logout")
          {include_once("logout.php");}
		  elseif (isset($_GET["page"]) && $_GET["page"]=="home")
          {include_once("public/home.php");}
        else
          {include_once("index3.php");}
        ?>
		
      </div>

    </div><!-- /.container -->
	
	

			
  </body>
</html>
<?php
}
?>

