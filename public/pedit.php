<div style="font-size: 20px; margin-bottom:10px; margin-top:15px;">
<?php
     $name = "";
    $hid = "";
    if(isset($_POST["edit-request-patient"])){ //checks if click was from patient's request
        echo 'Edit ' . $_POST["name"] . "'s information";
        $name = $_POST["name"];
        $hid = $_POST["hid"];
?>

<h2 style="font: italic bold 25px Georgia, serif; margin-bottom:10px;">Please enter patient's new information: </h2>
<form name="edit-patient" method="post" >
<input type="hidden" name="name" value="<?php echo $name ?>" > <br>
<input type="hidden" name="hid" value="<?php echo $hid ?>">
		<table align="center" style="text-align: left;">
		<tr><td>New Name: </td><td><input type="text" name="newname"/></td></tr>
		<tr><td>New Phone Number: </td><td><input type="text" name="pn"></td></tr>
		<tr><td>New Address: </td><td><input type="text" name="address" ></td></tr>
		<tr><td>New City: </td><td><input type="text" name="city"></td></tr>
		<tr><td>New state: </td><td><input type="text" name="state"></td></tr>
		<tr><td>New Postal Code: </td><td><input type="text" name="postal_code"></td></tr>
		</table>
		<br>
		<input type="submit" name="edit-patient" value="Change"> <br>		
</form>


<?php
    } else if(isset($_POST["edit-request-staff"])){
        echo 'Edit ' . $_POST["name"] . "'s information";
        $name = $_POST["name"];
        $sin= $_POST["sin"];
?>

<h2 style="font: italic bold 25px Georgia, serif; margin-bottom:10px;">Please enter staff's new information:</h2>

<form name="edit-staff" method="post">
<input type="hidden" name="sin" value="<?php echo $sin ?>"> <br>
		<table align="center" style="text-align: left;">
		<tr><td>New Name: </td><td><input type="text" name="newname"/></td></tr>
		<tr><td>New Phone Number: </td><td><input type="text" name="pn"></td></tr>
		<tr><td>New Address: </td><td><input type="text" name="address" ></td></tr>
		<tr><td>New City: </td><td><input type="text" name="city"></td></tr>
		<tr><td>New state: </td><td><input type="text" name="state"></td></tr>
		<tr><td>New Postal Code: </td><td><input type="text" name="postal_code"></td></tr>
		</table>
		<br>
		<input type="submit" name="edit-staff" value="Change"> <br>		
</form>


<?php
    } else if(isset($_POST["edit-request-physician"])){
        echo 'Edit ' . $_POST["name"] . "'s information";
        $name = $_POST["name"];
        $sin= $_POST["sin"];
?>

<h2 style="font: italic bold 25px Georgia, serif; margin-bottom:10px;">Please enter physician's new information:</h2>

<form name="edit-physician" method="post">
<input type="hidden" name="sin" value="<?php echo $sin ?>"> <br>
		<table align="center" style="text-align: left;">
		<tr><td>New Name: </td><td><input type="text" name="newname"/></td></tr>
		<tr><td>New Phone Number: </td><td><input type="text" name="pn"></td></tr>
		<tr><td>New Address: </td><td><input type="text" name="address" ></td></tr>
		<tr><td>New City: </td><td><input type="text" name="city"></td></tr>
		<tr><td>New state: </td><td><input type="text" name="state"></td></tr>
		<tr><td>New Postal Code: </td><td><input type="text" name="postal_code"></td></tr>
		<tr><td>New Specialty: </td><td><input type="text" name="specialty"/></td></tr>
		<tr><td>New Hospital Name: </td><td><input type="text" name="office_name"></td></tr>
		<tr><td>New Hospital City: </td><td><input type="text" name="office_city" ></td></tr>
		<tr><td>New Office Room: </td><td><input type="text" name="office_room"></td></tr>
		<tr><td>New Office Level: </td><td><input type="text" name="office_level"></td></tr>
		</table>
		<br>
		<input type="submit" name="edit-physician" value="Change"> <br>	
</form>



<?php
    } else if(isset($_POST["edit-request-hospital"])){
        echo 'Edit ' . $_POST["name"] . "'s information";
        $name = $_POST["name"];
     
?>

<h2 style="font: italic bold 25px Georgia, serif; margin-bottom:10px;">Please enter Hospital's new information:</h2>


<form name="edit-hospital" method="post">
<input type="hidden" name="sin" value="<?php echo $sin ?>"> <br>
		<table align="center" style="text-align: left;">
		<tr><td>New Name: </td><td><input type="text" name="newname"/></td></tr>
		<tr><td>New City:  </td><td><input type="text" name="city"></td></tr>
		<tr><td>New Address: </td><td><input type="text" name="address" ></td></tr>
		<tr><td>New Postal Code: </td><td><input type="text" name="postal_code"></td></tr>
		<tr><td>New state: </td><td><input type="text" name="state"></td></tr>
		
		</table>
		<br>
		<input type="submit" name="edit-hospital" value="Change"> <br>	
</form>

</div>
<?php
    }
?>
  
<?php
  
    if (isset($_POST["edit-patient"])) {
          
        if(!empty($_POST["newname"]) and !empty($_POST["address"]) and !empty($_POST["city"]) and !empty($_POST["state"]) and !empty($_POST["postal_code"]) and !empty($_POST["pn"])){
            $newname = $_POST["newname"];
			$address = $_POST["address"];
            $city = $_POST["city"];
            $state = $_POST["state"];
            $postal_code = $_POST["postal_code"];
            $pn = $_POST["pn"];
            $hid = $_POST["hid"];
            
            $newname = mysql_real_escape_string($newname);
            $address = mysql_real_escape_string($address);
            $city = mysql_real_escape_string($city);
            $state = mysql_real_escape_string($state);
            $postal_code = mysql_real_escape_string($postal_code);
            $pn = mysql_real_escape_string($pn);
            $hid = mysql_real_escape_string($hid);

            $query = "UPDATE patient
                        SET name = '$newname', address = '$address', city = '$city', state = '$state', postal_code = '$postal_code', phonenum = '$pn'
                        WHERE healthid = $hid;";
              
            $result = mysql_query($query);
              
            if (!$result) {
?>
            <a href="javascript:history.go(-1)">Try Again</a> <br>
<?php
                die('Invalid query: ' . mysql_error());
            } else {
                echo $_POST["newname"] . '\'s information changed. Continue navigating top.' . "<br>";
            }
              
        } else {
            echo 'Not all fields were filled in.  Try again. ';
?>
        <a href="javascript:history.go(-1)">Try Again</a>
<?php
        }
          
    } else if (isset($_POST["edit-staff"])){
        if(!empty($_POST["newname"]) and !empty($_POST["address"]) and !empty($_POST["city"]) and !empty($_POST["state"]) and !empty($_POST["postal_code"]) and !empty($_POST["pn"])){
            $newname = $_POST["newname"];
			$address = $_POST["address"];
            $city = $_POST["city"];
            $state = $_POST["state"];
            $postal_code = $_POST["postal_code"];
            $pn = $_POST["pn"];
            $sin = $_POST["sin"];

            $newname = mysql_real_escape_string($newname);
            $address = mysql_real_escape_string($address);
            $city = mysql_real_escape_string($city);
            $state = mysql_real_escape_string($state);
            $postal_code = mysql_real_escape_string($postal_code);
            $pn = mysql_real_escape_string($pn);
            $sin = mysql_real_escape_string($sin);
              
            $query = "UPDATE staff
                        SET name = '$newname', address = '$address', city = '$city', state = '$state', postal_code = '$postal_code', phonenum = '$pn'
                        WHERE sin = $sin;";
              
            $result = mysql_query($query);
              
            if (!$result) {
?>
            <a href="javascript:history.go(-1)">Try Again</a> <br>
<?php
                die('Invalid query: ' . mysql_error());
            } else {
                echo $_POST["newname"] . '\'s information changed. Continue navigating top.' . "<br>";
            }
              
        } else {
            echo 'Not all fields were filled in.  Try again. ';
?>
        <a href="javascript:history.go(-1)">Try Again</a>
<?php        
		}
    } else if (isset($_POST["edit-physician"])){
        if(!empty($_POST["newname"]) and !empty($_POST["address"]) and !empty($_POST["city"]) and !empty($_POST["state"]) and !empty($_POST["postal_code"]) and !empty($_POST["pn"])
			and !empty($_POST["specialty"]) and !empty($_POST["office_name"]) and !empty($_POST["office_city"]) and !empty($_POST["office_room"]) and !empty($_POST["office_level"])){
            $newname = $_POST["newname"];
			$address = $_POST["address"];
            $city = $_POST["city"];
            $state = $_POST["state"];
            $postal_code = $_POST["postal_code"];
            $pn = $_POST["pn"];
			$specialty = $_POST["specialty"];
			$office_name = $_POST["office_name"];
			$office_city = $_POST["office_city"];
			$office_room = intval($_POST["office_room"]);
			$office_level = intval($_POST["office_level"]);
            $sin = $_POST["sin"];

            $newname = mysql_real_escape_string($newname);
            $address = mysql_real_escape_string($address);
            $city = mysql_real_escape_string($city);
            $state = mysql_real_escape_string($state);
            $postal_code = mysql_real_escape_string($postal_code);
            $pn = mysql_real_escape_string($pn);
            $specialty = mysql_real_escape_string($specialty);
            $office_name = mysql_real_escape_string($office_name);
            $office_city = mysql_real_escape_string($office_city);
            $office_room = mysql_real_escape_string($office_room);
            $office_level = mysql_real_escape_string($office_level);
            $sin = mysql_real_escape_string($sin);
              
            $query1 = "UPDATE staff
                        SET name = '$newname', address = '$address', city = '$city', state = '$state', postal_code = '$postal_code', phonenum = '$pn'
                        WHERE sin = $sin;";
			$query2 = "UPDATE physician
						SET specialty = '$specialty', office_room = $office_room, office_name = '$office_name', office_level = $office_level, office_city = '$office_city'
						WHERE sin = $sin;";
              
            $result1 = mysql_query($query1);
			$result2 = mysql_query($query2);
              
            if (!$result1 or !$result2) {
?>
            <a href="javascript:history.go(-1)">Try Again</a> <br>
<?php
                die('Invalid query: ' . mysql_error());
            } else {
                echo $_POST["newname"] . '\'s information changed. Continue navigating top.' . "<br>";
            }
              
        } else {
            echo 'Not all fields were filled in.  Try again. ';
?>
        <a href="javascript:history.go(-1)">Try Again</a>
		

<?php        
		}
    } else if (isset($_POST["edit-hospital"])){
        if(!empty($_POST["newname"]) and !empty($_POST["city"]) and !empty($_POST["address"]) and !empty($_POST["postal_code"]) and !empty($_POST["state"]) and !empty($_POST["pn"])){
            $newname = $_POST["newname"];
			$address = $_POST["address"];
            $city = $_POST["city"];
            $state = $_POST["state"];
            $postal_code = $_POST["postal_code"];

 

            $newname = mysql_real_escape_string($newname);
            $address = mysql_real_escape_string($address);
            $city = mysql_real_escape_string($city);
            $state = mysql_real_escape_string($state);
            $postal_code = mysql_real_escape_string($postal_code);

              
            $query = "UPDATE hospital
                        SET name = '$newname', address = '$address', city = '$city', state = '$state', postal_code = '$postal_code'
                        WHERE name = $name;";
              
            $result = mysql_query($query);
              
            if (!$result) {
?>
            <a href="javascript:history.go(-1)">Try Again</a> <br>
<?php
                die('Invalid query: ' . mysql_error());
            } else {
                echo $_POST["newname"] . '\'s information changed. Continue navigating top.' . "<br>";
            }
              
        } else {
            echo 'Not all fields were filled in.  Try again. ';
?>
        <a href="javascript:history.go(-1)">Try Again</a>
		
		
<?php        
		}
    }
?>
<br>