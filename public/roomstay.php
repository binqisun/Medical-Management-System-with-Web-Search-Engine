<?php
if(isset($_POST["roomstay"])){
?>
	<table align="center"  border="1" style="background-color:#FFF;">
          <tr>
           <td style=" padding: 10px 15px;   font: italic bold 15px Georgia, serif;">Patient Name</td>
          <td style=" padding: 10px 15px;  font: italic bold 15px Georgia, serif;">Patient Health ID</td>
          <td style=" padding: 10px 15px; font: italic bold 15px Georgia, serif;">Room</td>
		   <td style=" padding: 10px 15px; font: italic bold 15px Georgia, serif;">Level</td>

          </tr>
		<div style="font-size: 20px; margin-bottom:10px; margin-top:15px;">
		<div style="font: italic bold 25px Georgia, serif; margin-bottom:10px; margin-top:15px;">
          <?php 
            //get all rooms associated with hospital
			$hname = $_POST["name"];
			$hcity = $_POST["city"];
			$l = $_POST["level"];
			$rn = $_POST["rn"];
			
			echo "Room $rn, Level $l at $hname, $hcity occupied by: <br>";
			
			$query = "SELECT p.name as name, p.healthid as hid, psi.roomnum as rn, psi.level as level
				FROM PatientStaysIn psi, Patient p
				WHERE p.healthid = psi.healthid and psi.roomnum = $rn and psi.level = $l and psi.city = '$hcity' and psi.name = '$hname';";
			$result = mysql_query($query);
			
			while ($subject = mysql_fetch_assoc($result)) {
		  
          ?>
		  </div>
		  </div>
			  <tr>
			  <td><?php  echo $subject["name"]."<br/>";?></td>
			  <td><?php  echo $subject["hid"]."<br/>";?></td>
			  <td><?php  echo $subject["rn"]."<br/>";?></td>
			  <td><?php  echo $subject["level"]."<br/>";?></td>

			  </tr>

          <?php
			} 
			mysql_free_result($result); 
           ?>
        <br>
</table>
<?php
	}
?>