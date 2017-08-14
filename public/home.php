 <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
	  <li data-target="#myCarousel" data-slide-to="2"></li>
	  <li data-target="#myCarousel" data-slide-to="2"></li>

    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="image/uams1.jpg" alt="Image">
        <div class="carousel-caption">
          <h3>Physician</h3>
       
        </div>       
      </div>
	  
	  	<div class="item">
          <img src="image/internal/patient.jpg" alt="Image">
        <div class="carousel-caption">
          <h3>Patient</h3>
       
        </div>      
      </div>
	  
	        <div class="item">
          <img src="image/internal/archildrenhospital.jpg" alt="Image">
        <div class="carousel-caption">
          <h3>Arkansas Children Hospital</h3>
       
        </div>      
      </div>


	  
	        <div class="item">
        <img src="image/uams2.jpg" alt="Image">
        <div class="carousel-caption">
          <h3>Room</h3>
        
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


<div style="text-align:center;">

<h2  style=" font: italic bold 40px Georgia, serif;" >Internal Search Engine</h2>

</div>

<div>
  <p  style=" font: italic bold 30px Georgia, serif;">Enter the Information that you look for</p>

</div>

<div class="break" style="background: #3E87BC;  height: 2px;
    margin-top:30px;
	margin-bottom:10px;
    width: 100%;"></div>
<form action="" method="post" style="text-align:left; padding:20px; padding-left:80px;
    background:#3E87BC;
    font-size: 20px;
    margin-bottom:10px;
    font-family: Arial;
    color: #FFF;">
        1.  Search hospital patients or staff members directory by name: <input type="text" name="name" style="color:#000000" align="right">
          <input type="submit" style="color:#000000" align="right">
 </form>




<?php
if(isset($_POST["name"])){
$psin = $_POST["name"];
$drawtable = true;

if($psin!=""){
 $result = mysql_query("SELECT DISTINCT * FROM staff where staff.name LIKE '%$psin%'");
 while($subject = mysql_fetch_assoc($result)){
 		 	if($drawtable){
 				$drawtable = false;
?>
		 		<table align="center"  border="1" style=" margin-top: 20px; margin-left:80px; background-color:#FFF;">
		          <tr>
		           <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Type of Member</td>
		          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Health ID</td>
		           <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Name</td>
		           <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Phone Number</td>
		           <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Address</td>
		           <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">City</td>
		           <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Postal Code</td>
		           <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">state</td>
				  
		          </tr>


			    <?php
			 	}
			    ?>

          <tr>
          <td style=" padding: 5px 0;"><?php echo "Staff Member<br/>";?></td>
          <td style=" padding: 5px 0;"><?php  echo "n/a<br/>";?></td>
          <td style=" padding: 5px 0;"><?php  echo $subject["name"]."<br/>";?></td>
          <td style=" padding: 5px 0;"><?php  echo $subject["phonenum"]."<br/>";?></td>
          <td style=" padding: 5px 0;"><?php  echo $subject["address"]."<br/>";?></td>
          <td style=" padding: 5px 0;"><?php  echo $subject["city"]."<br/>";?></td>
          <td style=" padding: 5px 0;"><?php  echo $subject["postal_code"]."<br/>";?></td>
          <td style=" padding: 5px 0;"><?php  echo $subject["state"]."<br/>";?></td>  
		 
          </tr>
        
    <?php
	}

	mysql_free_result($result); 
	?>


<?php
 $result = mysql_query("SELECT DISTINCT * FROM patient where patient.name LIKE '%$psin%'");
 while($subject = mysql_fetch_assoc($result)){
 		 	if($drawtable){
 				$drawtable = false;
 				?>
		 		<table align="center"  border="1" style=" margin-top: 20px; margin-left:80px; background-color:#FFF;">
		          <tr>
		          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Type of Member</td>
		          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Health ID</td>
		          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Name</td>
		          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Phone</td>
		           <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Address</td>
		           <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">City</td>
		           <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Postal Code</td>
		           <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">state</td>
				   <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Appointments</td>
		          </tr>


			    <?php
			 	}
			    ?>

          <tr>
          <td style=" padding: 5px 0;"><?php echo "Patient<br/>";?></td>
          <td style=" padding: 5px 0;"><?php  echo $subject["healthid"]."<br/>";?></td>
          <td style=" padding: 5px 0;"><?php  echo $subject["name"]."<br/>";?></td>
          <td style=" padding: 5px 0;"><?php  echo $subject["phonenum"]."<br/>";?></td>
          <td style=" padding: 5px 0;"><?php  echo $subject["address"]."<br/>";?></td>
          <td style=" padding: 5px 0;"><?php  echo $subject["city"]."<br/>";?></td>
          <td style=" padding: 5px 0;"><?php  echo $subject["postal_code"]."<br/>";?></td>
          <td style=" padding: 5px 0;"><?php  echo $subject["state"]."<br/>";?></td>  
					  <td><form method="post" action="?page=pappointments">
			<input type="hidden" name="sin" value="<?php echo $subject["healthid"]?>">
			<input type="hidden" name="name" value="<?php echo $subject["name"]?>">
			<input type="submit" name="patient-appts" value="Appointments">  
			</form></td>  
          </tr>
        
    <?php
    	}
	}
	
}
	?>
</table>

<?php
if(isset($_POST["name"]) === true){
	if($drawtable){
		echo "No results were found<br/><br/>";
	}
}
?>

<div class="break" style="background: #3E87BC;  height: 2px;
    margin-top:30px;
	margin-bottom:10px;
    width: 100%;"></div>
<form action="" method="post" style="text-align:left; padding:20px; padding-left:80px;
    background:#3E87BC;
    font-size: 20px;
    margin-bottom:10px;
    font-family: Arial;
    color: #FFF;">
        2.  Find patients requiring specific procedures by procedure ID: <input type="text" name="hid" style="color:#000000">
          <input type="submit" style="color:#000000">
 </form>



<?php
$drawanothertable = true;
if(isset($_POST["hid"]) && is_numeric($_POST["hid"])){
$hid = $_POST["hid"];
$drawanothertable = true;

 $resulto = mysql_query("SELECT P.healthid, P.name, PR.proid, PR.description FROM patient P, procedures PR where PR.proid = $hid AND P.healthid = PR.healthid");
 while($subject = mysql_fetch_assoc($resulto)){
 		 	if($drawanothertable){
 				$drawanothertable = false;
 				?>
		 		<table align="center" border="1" style=" margin-top: 20px; margin-left:80px; background-color:#FFF;">
		          <tr>
		          <td style=" padding: 10px 10px;font: italic bold 15px Georgia, serif;">Procedure ID</td>
		          <td style=" padding: 10px 10px; font: italic bold 15px Georgia, serif;">Procedure Name</td>
		         <td style=" padding: 10px 10px; font: italic bold 15px Georgia, serif;">Health ID</td>
		          <td style=" padding: 10px 10px; font: italic bold 15px Georgia, serif;">Name</td>
		          </tr>


			    <?php
			 	}
			    ?>

          <tr>
          <td style=" padding: 5px 0;"><?php  echo $subject["proid"]."<br/>";?></td> 
          <td style=" padding: 5px 0;"><?php  echo $subject["description"]."<br/>";?></td> 	
          <td style=" padding: 5px 0;"><?php  echo $subject["healthid"]."<br/>";?></td> 
          <td style=" padding: 5px 0;"><?php  echo $subject["name"]."<br/>";?></td> 

          </tr>
        
    <?php
    	
	}
		
	mysql_free_result($resulto);


}
	?>
</table>

<?php
if(isset($_POST["hid"]) === true){
	if($drawanothertable){
		echo "No results were found<br/><br/>";
	}
}
?>

<div class="break" style="background: #3E87BC;  height: 2px;
    margin-top:30px;
	margin-bottom:10px;
    width: 100%;"></div>
<form action="" method="post" style="text-align:left; padding:20px; padding-left:80px;
    background:#3E87BC;
    font-size: 20px;
    margin-bottom:10px;
    font-family: Arial;
    color: #FFF;">
         3. Enter a city name to find the number of rooms in each hospital: <input type="text" name="city" style="color:#000000" >
          <input type="submit" style="color:#000000">
 </form>




<?php
if(isset($_POST["city"])){
$cityid = $_POST["city"];
$drawantable = true;
 $result = mysql_query("SELECT R.name,count(*),R.city FROM room R where R.city LIKE '%$cityid%' GROUP BY R.name");
 while($subject = mysql_fetch_assoc($result)){
 		 	if($drawantable){
 				$drawantable = false;
 				?>
		 		<table align="center" border="1" style=" margin-top: 20px; margin-left:80px; background-color:#FFF;">
		          <tr>
		          <td style=" padding: 10px 50px; font: italic bold 15px Georgia, serif;">Number of rooms</td>
		          <td style=" padding: 10px 50px; font: italic bold 15px Georgia, serif;">Hospital</td>
		          <td style=" padding: 10px 50px; font: italic bold 15px Georgia, serif;">City</td>
		          </tr>


			    <?php
			 	}
			    ?>

          <tr>

          <td style=" padding: 5px 0;"><?php  echo $subject["count(*)"]."<br/>";?></td>
          <td style=" padding: 5px 0;"><?php  echo $subject["name"]."<br/>";?></td>
          <td style=" padding: 5px 0;"><?php  echo $subject["city"]."<br/>";?></td>
          </tr>
        
    <?php
    	
	}
		
	mysql_free_result($result);
}
	?>
</table>

<?php
if(isset($_POST["city"])===true){
	if($drawantable){
		echo "No results were found in $cityid<br/><br/>";
	}
}
?>
<br>
<br>
<button type="submit" style="color:#000000"><a href="javascript:history.go(-1)">Back</a></button>

