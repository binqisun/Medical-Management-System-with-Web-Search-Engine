<?php //re-access database since this taken away from interface
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


 if (isset($_GET["class"])) {
  	switch ($_GET["class"]) {
  		case 'patient':
  			$query = "DELETE FROM patient WHERE healthid = " . $_GET["healthid"];
  			$result = mysql_query("$query;");
  			break;
      
        case 'staff':
            $query = "DELETE FROM staff WHERE sin = " . $_GET["sin"];
            $result = mysql_query("$query;");
            break;
		
		case 'physician':
			$query = "DELETE FROM staff WHERE sin = " . $_GET["sin"];
			$result = mysql_query("$query");
			break;
		
		case 'hospital':
			$hname = $_GET["name"];
			$hcity = $_GET["city"];
			$query = "DELETE FROM hospital WHERE name = '$hname' AND city = '$hcity';";
			$result = mysql_query("$query");
			break;
			
		case 'pappointments':
			$query = "DELETE FROM Procedures WHERE proid = " . $_GET["proid"];
			$result = mysql_query("$query");
			break;
			
		case 'roomstay':
			$l = $_GET["level"];
			$rn = $_GET["rn"];
			$hcity = $_GET["hcity"];
			$hname = $_GET["hname"];
			
			$query = "DELETE FROM PatientStaysIn WHERE roomnum = $rn and level = $l and city = '$hcity' and name = '$hname'";
			
			$result = mysql_query("$query");
			
			break;

  		default:
  			break;
  	}
  }

header('Location: ' . $_SERVER['HTTP_REFERER']);


  ?>
  <html>
  <head>
  	<title>Delete</title>
  </head>
  <body>

  </body>
  </html>
