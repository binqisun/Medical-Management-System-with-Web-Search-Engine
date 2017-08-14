<!doctype html>
<html>
<head>
<title>Register</title>
<style>


body { 
  background: url("image/backg1.jpg") no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;

}
h1{	
color:#fff;
}
.login{
width:360px;
margin:50px auto;
font:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
border-radius:10px;
border:2px solid #ccc;
padding:10px 40px 25px;
margin-top:70px;	
}
input[type=text], input[type=password]{
width:99%;
padding:10px;
margin-top:8px;
border:1px solid #ccc;
padding-left:5px;
font-size:16px;
font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;	
}
input[type=submit]{
width:100%;
background-color:#009;
color:#fff;
border:2px solid #06F;
padding:10px;
font-size:20px;
cursor:pointer;
border-radius:5px;
margin-bottom:15px;	
}

button{
width:100%;
background-color:#009;
color:#fff;
border:2px solid #06F;
padding:10px;
font-size:20px;
cursor:pointer;
border-radius:5px;
margin-bottom:15px;	
	
}
</style>
</head>
<body>


<div class="background">

<div class="title">
<h1 style="text-align:center;">Welcome to</h1>
<h1 style="text-align:center;">Binqi's Medical System</h1>

</div>




<div class="login">
<p style="text-align:center; color:pink"><a style="color:white;" href="register.php">Register</a> | <a  style="color:white;" href="index.php">Login</a></p>
<h3 style="text-align:center; color:white;">Registration</h3>



<form action="" method="POST" style="text-align:center;">
<input type="text" placeholder="Username" id="user" name="user"><br/><br/>
<input type="password" placeholder="Password" id="pass" name="pass"><br/><br/>
<input type="submit" value="Register" name="submit">

</form>


</div>
</div>

<?php
if(isset($_POST["submit"])){

if(!empty($_POST['user']) && !empty($_POST['pass'])) {
	$user=$_POST['user'];
	$pass=$_POST['pass'];

	$con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('hospital') or die("cannot select DB");

	$query=mysql_query("SELECT * FROM login WHERE username='".$user."'");
	$numrows=mysql_num_rows($query);
	if($numrows==0)
	{
	$sql="INSERT INTO login(username,password) VALUES('$user','$pass')";

	$result=mysql_query($sql);


	if($result){
	echo "<div style ='font:21px Arial,tahoma,sans-serif;color:#ff0000' align='center'> Account Successfully Created </div>";

	
	} else {
	echo "<div style ='font:21px Arial,tahoma,sans-serif;color:#ff0000' align='center'> Failure! </div>";

	}

	} else {
		
	echo "<div style ='font:21px Arial,tahoma,sans-serif;color:#ff0000' align='center'> That username already exists! Please try again with another.</div>";
	}

} else {
	echo "<div style ='font:21px Arial,tahoma,sans-serif;color:#ff0000' align='center'> All fields are required! </div>";

}
}
?>

</body>
</html>