 <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
	  <li data-target="#myCarousel" data-slide-to="2"></li>
	  <li data-target="#myCarousel" data-slide-to="3"></li>
	   <li data-target="#myCarousel" data-slide-to="4"></li>

    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="image/staff/nurse.jpg" alt="Nurse">
        <div class="carousel-caption">
          <h3>Nurse</h3>
       
        </div>       
      </div>
	  
	  	<div class="item">
          <img src="image/staff/receptionist.jpg" alt="Receptionist">
        <div class="carousel-caption">
          <h3>Receptionist</h3>
       
        </div>      
      </div>
	  
	  	      <div class="item">
        <img src="image/uams1.jpg" alt="Image">
        <div class="carousel-caption">
          <h3>Physician</h3>
       
        </div>     
      </div>
	  
	  
	        <div class="item">
          <img src="image/staff/janitors.jpeg" alt="janitors">
        <div class="carousel-caption">
          <h3>Janitors</h3>
       
        </div>      
      </div>


	        <div class="item">
          <img src="image/staff/Security.jpg" alt="Security">
        <div class="carousel-caption">
          <h3>Security</h3>
       
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
$staff_group = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  	if (isset($_POST["Staff"])) {
  		$staff_group = $_POST["Staff"];
  	}
  	
  	
}

?>
<h2 style="font: italic bold 40px Georgia, serif; margin-bottom:10px;">Staff</h2>

<p style="font: italic bold 30px Georgia, serif; ">Enter Current Position:</p>
<form method="post" action="" style="font-size: 20px;">
	<input type="checkbox" name="Staff[]" value="Nurse">Nurses
	<input type="checkbox" name="Staff[]" value="Receptionist">Receptionist
	<input type="checkbox" name="Staff[]" value="Physician">Physicians
	<input type="checkbox" name="Staff[]" value="Janitor">Janitors
	<input type="checkbox" name="Staff[]" value="Security">Security
	<br>
	<input type="submit" name="division" value="Submit"> 
	<br><br><br>
</form>
<?php
	$query_staff = "SELECT * FROM staff;";
	if (isset($_POST["single"])) {
		if($staff_group == "Nurses"){
			echo 'Only Nurses' . "<br>";
			$query_staff = "
				SELECT s.sin, s.name, s.phonenum, s.address, s.city, s.postal_code, s.state 
				FROM staff s, nurse n
				WHERE s.sin = n.sin;";
		} else if ($staff_group == "Physicians"){
			$query_staff = "
				SELECT s.sin, s.name, s.phonenum, s.address, s.city, s.postal_code, s.state 
				FROM staff s, physician p
				WHERE s.sin = p.sin;";
			echo 'Only Physicians' . "<br>";
		} else if ($staff_group == "Janitors"){
			$query_staff = "
				SELECT s.sin, s.name, s.phonenum, s.address, s.city, s.postal_code, s.state 
				FROM staff s, janitor j
				WHERE s.sin = j.sin;";
			echo 'Only Janitors' . "<br>";
		} else if ($staff_group == "Receptionist"){
			$query_staff = "
				SELECT s.sin, s.name, s.phonenum, s.address, s.city, s.postal_code, s.state 
				FROM staff s, receptionist r
				WHERE s.sin = r.sin;";
			echo 'Only Receptionists' . "<br>";
		} else {
			echo 'All Staff Members' . "<br>";
		}
	}
	else if (isset($_POST["division"])) {
		if(empty($staff_group)) 
		  {
		    echo("Staff with no positions");
		  }
		else
		{
			$maxLen = count($staff_group);
			
			$query_staff = "SELECT s.sin, s.name, s.phonenum, s.address, s.city, s.postal_code, s.state 
							FROM staff s ";

		    echo("You selected $maxLen position(s) :");
		    for($i=0; $i < $maxLen; $i++)
		    {
		    	if ($i== 0) {
		    		$query_staff .= "WHERE ";
		    	}
		    	else{
		    		$query_staff .= "AND ";	
		    	}

		    	$query_staff .= " EXISTS( SELECT sin FROM $staff_group[$i] s$i WHERE s.sin=s$i.sin ";
		    	echo($staff_group[$i] . " ");
		    }
		    for($i=0; $i < $maxLen; $i++)
		    {
		    	$query_staff .= ")";
		    }
		    $query_staff.= ";";
		}

		//echo "<br>". $query_staff;
	}
?>

<table align="center"  border="1" style="background-color:#FFF;">
          <tr>
          <td style=" padding: 10px 5px;  font: italic bold 15px Georgia, serif;">SSN</td>
         <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Name</td>
         <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Phone Number</td>
          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Address</td>
          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">City</td>
          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Postal Code</td>
          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">state</td>
		  <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Edit</td>
          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Delete</td>
          </tr>

          <?php 
            //use return Database
          $result = mysql_query($query_staff);
          while ($subject = mysql_fetch_assoc($result)) {
          ?>
          <tr>
          <td><?php  echo $subject["sin"]."<br/>";?></td>
          <td><?php  echo $subject["name"]."<br/>";?></td>
          <td><?php  echo $subject["phonenum"]."<br/>";?></td>
          <td><?php  echo $subject["address"]."<br/>";?></td>
          <td><?php  echo $subject["city"]."<br/>";?></td>
          <td><?php  echo $subject["postal_code"]."<br/>";?></td>
          <td><?php  echo $subject["state"]."<br/>";?></td>
		  <td><form method="post" action="?page=pedit">
			<input type="hidden" name="sin" value="<?php echo $subject["sin"]?>">
			<input type="hidden" name="name" value="<?php echo $subject["name"]?>">
			<input type="submit" name="edit-request-staff" value="Edit">  
			</form></td>
          <td><a href="private/delete.php?class=staff&sin=<?php echo $subject["sin"]; ?>">Delete</a> </td>
          </tr>

          <?php
          }
           ?>
        </table> 

        <?php 
        mysql_free_result($result);  
          ?>
        <br>
</table>
<a href="javascript:history.go(-1)">Back</a>