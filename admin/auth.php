<?php 
	error_reporting(E_ERROR | E_PARSE);	
	$admin = "admin";
	$admin_pw = "admin";

	session_start();
	
if (isset($_POST['user']) && isset($_POST['pass'])) {

	$username = $_POST['user'];
	$password = $_POST['pass'];
	if (($username == $admin) && ($password ==$admin_pw)) {
		$_SESSION['admin'] = $username;
		$_SESSION['admin_pw'] = $password;
	}
	header("Location: admin.php");

	?>

	<?php 
	exit();
}


$settings_dir = "../settings";
include "$settings_dir/database.php";

?>