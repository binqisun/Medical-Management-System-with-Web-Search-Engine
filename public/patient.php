 <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
	  <li data-target="#myCarousel" data-slide-to="2"></li>
	  <li data-target="#myCarousel" data-slide-to="3"></li>


    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="image/patient/patient1.jpg" alt="Patient">
        <div class="carousel-caption">
          <h3>Patient</h3>
       
        </div>       
      </div>
	  
	  	<div class="item">
           <img src="image/patient/patient2.jpg" alt="Patient">
        <div class="carousel-caption">
          <h3>Patient</h3>
       
        </div>      
      </div>
	  
	  	      <div class="item">
         <img src="image/patient/patient3.jpg" alt="Patient">
        <div class="carousel-caption">
          <h3>Patient</h3>
       
        </div>     
      </div>
	  
	  
	        <div class="item">
           <img src="image/patient/patient4.jpg" alt="Patient">
        <div class="carousel-caption">
          <h3>Patient</h3>
       
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


<h2 style="font: italic bold 40px Georgia, serif; margin-bottom:10px; margin-top:15px;">All Patients</h2>
<table align="center"  border="1" style="background-color:#FFF;">
          <tr>
          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Health ID</td>
          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Name</td>
          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Phone Number</td>
          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Address</td>
          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">City</td>
          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Postal Code</td>
          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">state</td>
		  <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Appointments</td>
		  <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Edit Info</td>
          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Delete</td>
          </tr>

          <?php 
            //use return Database
          $result = mysql_query("SELECT * FROM patient;");
          while ($subject = mysql_fetch_assoc($result)) {
          ?>
          <tr>
          <td><?php  echo $subject["healthid"]."<br/>";?></td>
          <td><?php  echo $subject["name"]."<br/>";?></td>
          <td><?php  echo $subject["phonenum"]."<br/>";?></td>
          <td><?php  echo $subject["address"]."<br/>";?></td>
          <td><?php  echo $subject["city"]."<br/>";?></td>
          <td><?php  echo $subject["postal_code"]."<br/>";?></td>
          <td><?php  echo $subject["state"]."<br/>";?></td>
		  <td><form method="post" action="?page=pappointments">
			<input type="hidden" name="sin" value="<?php echo $subject["healthid"]?>">
			<input type="hidden" name="name" value="<?php echo $subject["name"]?>">
			<input type="submit" name="patient-appts" value="Appointments">  
			</form></td>
		  <td><form method="post" action="?page=pedit">
			<input type="hidden" name="hid" value="<?php echo $subject["healthid"]?>">
			<input type="hidden" name="name" value="<?php echo $subject["name"]?>">
			<input type="submit" name="edit-request-patient" value="Edit">  
			</form></td>
          <td><a href="private/delete.php?class=patient&healthid=<?php echo $subject["healthid"]; ?>">Delete</a> </td>
          </tr>

          <?php
          }
           ?>
</table>
<?php 
	mysql_free_result($result);  
?>
<br>
<button type="submit" style="color:#000000"><a href="javascript:history.go(-1)">Back</a></button>