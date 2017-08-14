
 <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
	  <li data-target="#myCarousel" data-slide-to="2"></li>


    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="image/room/room1.jpg" alt="Ward">
        <div class="carousel-caption">
          <h3>Ward</h3>
       
        </div>       
      </div>
	  
	  	<div class="item">
          <img src="image/room/surgery.jpg" alt="Surgery Room">
        <div class="carousel-caption">
          <h3>Surgery Room</h3>
       
        </div>      
      </div>
	  
	        <div class="item">
          <img src="image/room/office.jpg" alt="Office Room">
        <div class="carousel-caption">
          <h3>Office Room</h3>
       
        </div>      
      </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>


<?php
if(isset($_POST["hospital-room"])){
?>
	<table align="center"  border="1" style="background-color:#FFF;">
          <tr>
          <td style=" padding: 10px 15px; font: italic bold 15px Georgia, serif;">Hospital Name</td>
         <td style=" padding: 10px 15px; font: italic bold 15px Georgia, serif;">Room Number</td>
         <td style=" padding: 10px 15px; font: italic bold 15px Georgia, serif;">Level</td>
		 <td style=" padding: 10px 15px; font: italic bold 15px Georgia, serif;">Type</td>
          </tr>
		<div style="font-size: 28px; margin-bottom:10px; margin-top:15px;">
		<div style="font: italic bold 30px Georgia, serif; margin-bottom:10px; margin-top:15px;">
          <?php 
            //get all rooms associated with hospital
			$hname = $_POST["name"];
			$hcity = $_POST["city"];
	
			echo "Rooms in $hname, $hcity <br>";
		
			$query = "SELECT r.name as hname, r.roomnum as roomnum, r.level as level
				FROM Room r
				WHERE r.city = '$hcity' and r.name = '$hname';";
			$result = mysql_query($query);
			
			while ($subject = mysql_fetch_assoc($result)) {
		  
          ?>
		  </div>
		  	</div>
			  <tr>
			  <td><?php  echo $subject["hname"]."<br/>";?></td>
			  <td><?php  echo $subject["roomnum"]."<br/>";?></td>
			  <td><?php  echo $subject["level"]."<br/>";?></td>
			  <td><?php //Checks type of room by checking if hospital room exists in Office or SurgeryRoom tables.
				$rn = $subject["roomnum"];
				$l = $subject["level"];
				
				$insurgery = "SELECT * FROM SurgeryRoom WHERE roomnum = $rn and level = $l and name = '$hname' and city = '$hcity'";
				$qinsurgery = mysql_query($insurgery);
				
				$inoffice = "SELECT * FROM Office WHERE roomnum = $rn and level = $l and name = '$hname' and city = '$hcity'";
				$qinoffice = mysql_query($inoffice);
				
				if(mysql_num_rows($qinsurgery) > 0){
					echo 'Surgery Room';
				} else if(mysql_num_rows($qinoffice)){
					echo 'Office';
				} else {
			  ?>
			  <form method="post" action="?page=roomstay"> 
			<input type="hidden" name="name" value="<?php echo $hname ?>">
			<input type="hidden" name="city" value="<?php echo $hcity ?>">
			<input type="hidden" name="level" value="<?php echo $l ?>">
			<input type="hidden" name="rn" value="<?php echo $rn?>">
			<input type="submit" name="roomstay" value="Occupied By">  
			</form></td></td>
			  <?php
				}
			  ?></td>
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