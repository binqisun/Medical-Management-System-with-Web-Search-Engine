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
        <img src="image/hospital/hospital.jpg" alt="Image">
        <div class="carousel-caption">
          <h3>Arkansas Heart Hospital</h3>
       
        </div>       
      </div>
	  
	  	<div class="item">
          <img src="image/uams.png" alt="Image">
        <div class="carousel-caption">
          <h3>University of Arkansas for Medical Science</h3>
       
        </div>      
      </div>
	  
	        <div class="item">
          <img src="image/internal/archildrenhospital.jpg" alt="Image">
        <div class="carousel-caption">
          <h3>Arkansas Children Hospital</h3>
       
        </div>      
      </div>


	  
	        <div class="item">
        <img src="image/Hospital/baptisth.jpg" alt="Image">
        <div class="carousel-caption">
          <h3>Baptist Health Medical Center-Little Rock</h3>
        
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

<h2  style="font: italic bold 40px Georgia, serif; margin-bottom: 30px;" >All Available Hospitals</h2>

</div>



<?php 
$result = mysql_query("SELECT h.name, h.address, h.city, h.postal_code, h.state, count(*) as cnt
        FROM hospital h, WorksAt w
        WHERE h.city = w.city and h.name = w.name
        GROUP BY h.name, h.city");
 ?>
<!-- Make table for available hospitals -->
<table align="center"  border="1" style=" background-color:#FFF;">
<tr>
    <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Hospital</td>
    <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Address</td>
    <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">City</td>
    <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Postal Code</td>
   <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">state</td>
    <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Number of Staff</td>
    <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Rooms</td>
    <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Modify</td>
      </tr>

      <?php 
        //use return Database
      while ($subject = mysql_fetch_assoc($result)) {
      ?>
    <tr>
        <td><?php  echo $subject["name"]."<br/>";?></td>
        <td><?php  echo $subject["address"]."<br/>";?></td>
        <td><?php  echo $subject["city"]."<br/>";?></td>
        <td><?php  echo $subject["postal_code"]."<br/>";?></td>
        <td><?php  echo $subject["state"]."<br/>";?></td>
		<td><?php  echo $subject["cnt"]."<br/>";?></td>
		<td><form method="post" action="?page=room"> 
			<input type="hidden" name="name" value="<?php echo $subject["name"]?>">
			<input type="hidden" name="city" value="<?php echo $subject["city"]?>">
			<input type="submit" name="hospital-room" value="Rooms">  
			</form></td>
		<td><form method="post" action="?page=pedit">
            <input type="hidden" name="name" value="<?php echo $subject["name"]?>">
			<input type="hidden" name="city" value="<?php echo $subject["city"]?>">
            <input type="submit" name="edit-request-hospital" value="Edit">  
            </form></td>
        <td><a href="private/delete.php?class=hospital&name=<?php echo $subject["name"]; ?>&city=<?php echo $subject["city"]; ?>">Delete</a> </td>
    </tr>
  <?php } ?>
</table> 

    <?php 
    mysql_free_result($result);  
      ?>
    <br>
</table>


<form method="post" action="">
  <p>Working Area with
  <select name="amount">
    <option  value="max">Maximum</option>
    <option  value="min" selected>Minimum</option>
  </select>
  staffs
  </p>
  <input type="submit" value="Refresh">
</form>

<?php //Get nested aggregation.  Very very large query.  Gets min or max of an area of workers in an area.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$query = "select t.wcity as tCity, t.wstate as tstate, t.cnt as tcnt from (select w.city as wCity, h.state as wstate, count(*) as cnt
				from worksat w, hospital h
				where h.city = w.city and h.name = w.name
				group by w.city, h.state) as t
				where t.cnt ";
	
	if($_POST["amount"] == "max"){
		$query .= ">= ";
	} else {
		$query .= "<= ";
	}
	
	$query .= "ALL(select c.cnt from (select w.city as wCity, h.state as wstate, count(*) as cnt
				from worksat w, hospital h
				where h.city = w.city and h.name = w.name
				group by w.city, h.state) as c);";
	$result = mysql_query($query);
 ?>

<table align="center" border="1">
  <tr>
    <td style=" padding: 10px 20px;">City</td>
    <td style=" padding: 10px 20px;">state</td>
    <td style=" padding: 10px 20px;">Number of Staff</td>
  </tr>
  <?php 
    while ($subject = mysql_fetch_assoc($result)) {
  ?>
  <tr>
    <td><?php  echo $subject["tCity"];?></td>
    <td><?php  echo $subject["tstate"];?></td>
    <td><?php  echo $subject["tcnt"];?></td>
  </tr>
<?php } ?>
  <br>
</table>
<?php 
    mysql_free_result($result);  
?>

<?php } ?>