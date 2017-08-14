
<div style="font: italic bold 40px Georgia, serif; margin-bottom:10px; margin-top:15px;">
<?php
	echo  'Appointments for ' . $_POST["name"] . ':';
?>
</div>
<br>


<div>
<table align="center"  border="1" style=" margin-top: 20px; margin-left:130px; background-color:#FFF;">
          <tr>
		  <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Proid</td>
          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Date</td>
         <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Time</td>
          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Description</td>
		 <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Room</td>
		  <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Level</td>
		 <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Hospital Name</td>
		<td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Hospital City</td>
		<td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Physician</td>
		
          </tr>

          <?php 
            //use return Database	
          $sin = $_POST["sin"];
		  
		  $query_appoint = "SELECT pr.proid as proid, pr.date, pr.time, pr.description, pir.level, pir.roomnum, pir.name, pir.city, s.name as pname
							from procedures pr, ProcedureInRoom pir, staff s
							where pr.healthid = $sin and pir.proid = pr.proid and s.sin = pr.sin";
		  
		  $result = mysql_query($query_appoint);
          while ($subject = mysql_fetch_assoc($result)) {
          ?>
          <tr>
		  <td><?php  echo $subject["proid"]."<br/>";?></td>
          <td><?php  echo $subject["date"]."<br/>";?></td>
          <td><?php  echo $subject["time"]."<br/>";?></td>
          <td><?php  echo $subject["description"]."<br/>";?></td>
		  <td><?php  echo $subject["level"]."<br/>";?></td>
		  <td><?php  echo $subject["roomnum"]."<br/>";?></td>
		  <td><?php  echo $subject["name"]."<br/>";?></td>
		  <td><?php  echo $subject["city"]."<br/>";?></td>
		  <td><?php  echo $subject["pname"]."<br/>";?></td>

          </tr>

          <?php
          }
           ?>
        </table> 
		</div>
        <?php
        mysql_free_result($result);  
          ?>
        <br>

<button type="submit" style="color:#000000"><a href="javascript:history.go(-1)">Back</a></button>
