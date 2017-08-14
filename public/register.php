<script type="text/javascript">
	function showStaff(){
    	document.getElementById("patient").style.display="none";
    	document.getElementById("staff").style.display="inline";
    	document.getElementById("appmt").style.display="none";
	}	
	function showPatient(){
    	document.getElementById("patient").style.display="inline";
    	document.getElementById("staff").style.display="none";
    	document.getElementById("appmt").style.display="none";
	}
	function showAppmt(){
    	document.getElementById("patient").style.display="none";
    	document.getElementById("staff").style.display="none";
    	document.getElementById("appmt").style.display="inline";
	}
	function showPhyExtra(){
		document.getElementById("phyExtra").style.display="table";
	}

	function hidePhyExtra(){
		document.getElementById("phyExtra").style.display="none";
	}

</script>

<?php 
$result = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	if(isset($_POST["patientReg"])){
		$healthid = isset($_POST["healthid"])? $_POST["healthid"]:"";
		$name = isset($_POST["name"])? $_POST["name"]:"";
		$healthinfo = isset($_POST["healthinfo"])? $_POST["healthinfo"]:"";
		$phonenum = isset($_POST["phonenum"])? $_POST["phonenum"]:"";
		$address = isset($_POST["address"])? $_POST["address"]:"";
		$postal_code = isset($_POST["postal_code"])? $_POST["postal_code"]:"";
		$city = isset($_POST["city"])? $_POST["city"]:"";
		$state = isset($_POST["state"])? $_POST["state"]:"";

		$healthid = mysql_real_escape_string($healthid);
		$name = mysql_real_escape_string($name);
		$healthinfo = mysql_real_escape_string($healthinfo);
		$phonenum = mysql_real_escape_string($phonenum);
		$address = mysql_real_escape_string($address);
		$postal_code = mysql_real_escape_string($postal_code);
		$city = mysql_real_escape_string($city);
		$state = mysql_real_escape_string($state);
		

		$query="INSERT INTO Patient(healthid, healthinfo, name, phonenum ,address, city, postal_code, state) VALUES ($healthid,'$healthinfo','$name', '$phonenum', '$address', '$city', '$postal_code', '$state');";
		$result = mysql_query($query);}

	else if(isset($_POST["staffReg"])){
		$sin = isset($_POST["sin"])?$_POST["sin"]:"";
		$name = isset($_POST["name"])? $_POST["name"]:"";
		$phonenum = isset($_POST["phonenum"])? $_POST["phonenum"]:"";
		$address = isset($_POST["address"])? $_POST["address"]:"";
		$postal_code = isset($_POST["postal_code"])? $_POST["postal_code"]:"";
		$city = isset($_POST["city"])? $_POST["city"]:"";
		$state = isset($_POST["state"])? $_POST["state"]:"";

		$sin = mysql_real_escape_string($sin);
		$name = mysql_real_escape_string($name);
		$phonenum = mysql_real_escape_string($phonenum);
		$address = mysql_real_escape_string($address);
		$postal_code = mysql_real_escape_string($postal_code);
		$city = mysql_real_escape_string($city);
		$state = mysql_real_escape_string($state);

		$query = "INSERT INTO Staff(sin,name,phonenum,address,city,postal_code,state) VALUES ($sin, '$name', '$phonenum', '$address', '$city', '$postal_code', '$state');";
		$result = mysql_query($query);
		if($result){
			switch ($_POST["job"]) {
				case 'Nurse':
					$query = "INSERT INTO Nurse(sin) VALUES ($sin);";
					break;

				case 'Janitor':
					$query = "INSERT INTO Janitor(sin) VALUES ($sin);";
					break;

				case 'Receptionist':
					$query = "INSERT INTO Receptionist(sin) VALUES ($sin);";
					break;

				case 'Physician':
					$query = "INSERT INTO Physician(sin) VALUES ($sin);";
					break;
				
				default:
					$query = "INSERT INTO Nurse(sin) VALUES ($sin);";
					break;
			}
			
			$result = mysql_query($query);
		}
	}
	else if(isset($_POST["proReg"])) {
		$proid = isset($_POST["proid"])? $_POST["proid"]:"";
		$healthid = isset($_POST["healthid"])? $_POST["healthid"]:"";
		$sin = isset($_POST["sin"])?$_POST["sin"]:"";
		$description = isset($_POST["description"])?$_POST["description"]:"";
		$date = isset($_POST["date"])?$_POST["date"]:"";
		$time = isset($_POST["time"])?$_POST["time"]:"";
		$level = isset($_POST["level"])?$_POST["level"]:"";
		$roomnum = isset($_POST["roomnum"])?$_POST["roomnum"]:"";
		$name = isset($_POST["name"])?$_POST["name"]:"";
		$city = isset($_POST["city"])?$_POST["city"]:"";

		$proid = mysql_real_escape_string($proid);
		$healthid = mysql_real_escape_string($healthid);
		$sin = mysql_real_escape_string($sin);
		$description = mysql_real_escape_string($description);
		$date = mysql_real_escape_string($date);
		$time = mysql_real_escape_string($time);
		$level = mysql_real_escape_string($level);
		$roomnum = mysql_real_escape_string($roomnum);
		$name = mysql_real_escape_string($name);
		$city = mysql_real_escape_string($city);

		$query="INSERT INTO Procedures(proid,healthid,sin,description,date,time) VALUES ($proid, $healthid, $sin, '$description', '$date', '$time');";
		$result = mysql_query($query);
		if($result)
		{
			$query = "INSERT INTO procedureInRoom(proid,level,roomnum,name,city) VALUES ($proid,$level,'$roomnum','$name','$city');";
			$result = mysql_query($query);
		}
	}

	if($result){
		echo "<p>Registered sucessfully</p>";
	}else{
		echo "<p>Register failed</p>";
?>
		<a href="javascript:history.go(-1)">Try Again</a> <br>
<?php
		die('Invalid query: ' . mysql_error());
		}
}
?>

<div style="margin-top:20px">
<button onclick="showPatient();" style="font: italic bold 30px Georgia, serif;">Patient</button> <button onclick="showStaff();"  style="font: italic bold 30px Georgia, serif;">Staff</button> <button onclick="showAppmt();"  style="font: italic bold 30px Georgia, serif;">Appointment</button>

<br><br><br>

	<form action="?page=register" method="post" id="patient" style="display: none; font-size: 20px;">
		<table align="center" style="text-align: left;">
		<tr><td>Health ID </td><td><input type="number" name="healthid"/></td></tr>
		<tr><td>Name </td><td><input type="text" name="name"></td></tr>
		<tr><td>Health Information </td><td><input type="text" name="healthinfo" ></td></tr>
		<tr><td>Phone Number </td><td><input type="number" name="phonenum"></td></tr>
		<tr><td>Address </td><td><input type="text" name="address"></td></tr>
		<tr><td>Postal Code </td><td><input type="text" name="postal_code"></td></tr>
		<tr><td>City </td><td><input type="text" name="city"></td></tr>
		<tr><td>state </td><td><input type="text" name="state"></td></tr>
		</table>
		
		<input type="submit" name="patientReg" value="submit">		
	</form>

	<form action="?page=register" method="post" id="staff" style="display: none; font-size: 20px;">
		Position : &nbsp <input type="radio" name="job" value="Nurse" onclick="hidePhyExtra();" checked>Nurse &nbsp
				<input type="radio" name="job" value="Janitor" onclick="hidePhyExtra();">Janitor &nbsp
				<input type="radio" name="job" value="Receptionist" onclick="hidePhyExtra();">Receptionist &nbsp
				<input type="radio" name="job" value="Physician" onclick="showPhyExtra();" >Physician &nbsp

		<br><br><br>

		<table align="center" style="text-align: left;">
			<tr><td>SSN  </td><td><input type="number" name="sin"></td></tr>
			<tr><td>Name  </td><td><input type="text" name="name"></td></tr>
			<tr><td>Phone Number  </td><td><input type="number" name="phonenum"></td></tr>
			<tr><td>Address  </td><td><input type="text" name="address"></td></tr>
			<tr><td>Postal Code  </td><td><input type="text" name="postal_code"></td></tr>
			<tr><td>City  </td><td><input type="text" name="city"></td></tr>
			<tr><td>state  </td><td><input type="text" name="state"></td></tr>
		</table>
		<br>
		<table align="center" style="text-align: left; display: none;" id="phyExtra">
			<tr><td>Specialty</td><td><input type="text" name="specialty"></td></tr>
			<tr><td>Office Room&nbsp&nbsp</td><td><input type="number" name="office_room"></td></tr>
			<tr><td>Office Name&nbsp&nbsp</td><td><input type="text" name="office_name"></td></tr>
			<tr><td>Office Level&nbsp&nbsp</td><td><input type="number" name="office_level"></td></tr>
			<tr><td>Office City&nbsp&nbsp</td><td><input type="text" name="office_city"></td></tr>
		</table>

	

		<input type="submit" name="staffReg" value="submit">
	</form>

	<form action="?page=register" method="post" id="appmt" style="display: none; font-size: 20px;">
		
		<table align="center" style="text-align: left;">
			<tr><td>Procedure ID </td><td><input type="number" name="proid"/></td></tr>
			<tr><td>Health ID </td><td><input type="number" name="healthid"/></td></tr>
			<tr><td>SSN  </td><td><input type="number" name="sin"></td></tr>
			<tr><td>Description </td><td><input type="text" name="description"></td></tr>
			<tr><td>Date  </td><td><input type="date" name="date"></td></tr>
			<tr><td>Time  </td><td><input type="time" name="time"></td></tr>

			<tr><td>Room Level&nbsp&nbsp</td><td><input type="text" name="level"></td></tr>
			<tr><td>Room Number&nbsp&nbsp</td><td><input type="text" name="roomnum"></td></tr>
			<tr><td>Hospital Name&nbsp&nbsp</td><td><input type="text" name="name"></td></tr>
			<tr><td>City&nbsp&nbsp</td><td><input type="text" name="city"></td></tr>
		</table>

	
		<input type="submit" name="proReg" value="submit">		
	</form>
	
	</div>