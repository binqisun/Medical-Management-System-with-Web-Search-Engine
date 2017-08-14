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
        <img src="image/physicians/physician1.jpg" alt="Physician">
        <div class="carousel-caption">
          <h3>Physician</h3>
       
        </div>       
      </div>
	  
	  	<div class="item">
        <img src="image/physicians/physician2.jpg" alt="Physician">
        <div class="carousel-caption">
          <h3>Physician</h3>
       
        </div>      
      </div>
	  
	  	      <div class="item">
       <img src="image/physicians/physician3.jpg" alt="Physician">
        <div class="carousel-caption">
          <h3>Physician</h3>
       
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



  <h2 style="font: italic bold 40px Georgia, serif; margin-bottom:10px; margin-top:15px;">All Available Physicians</h2>
<table align="center"  border="1" style="background-color:#FFF;">
          <tr>
          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">SSN</td>
          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Name</td>
          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Specialty</td>
          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Hospital</td>
          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Office Room</td>
          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Office Level</td>
          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Phone Number</td>
          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Address</td>
          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">City</td>
          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Postal Code</td>
          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">state</td>
          <td style=" padding: 10px 5px; font: italic bold 15px Georgia, serif;">Modify</td>
          </tr>
  
          <?php 
            //use return Database
          $result = mysql_query("SELECT DISTINCT * FROM physician inner join staff where physician.sin = staff.sin;");
          while ($subject = mysql_fetch_assoc($result)) {
          ?>
          <tr>
          <td><?php  echo $subject["sin"]."<br/>";?></td>
          <td><?php  echo $subject["name"]."<br/>";?></td>
          <td><?php  echo $subject["specialty"]."<br/>";?></td>
          <td><?php  echo $subject["office_name"]."<br/>";?></td>
          <td><?php  echo $subject["office_room"]."<br/>";?></td>
          <td><?php  echo $subject["office_level"]."<br/>";?></td>
          <td><?php  echo $subject["phonenum"]."<br/>";?></td>
          <td><?php  echo $subject["address"]."<br/>";?></td>
          <td><?php  echo $subject["city"]."<br/>";?></td>
          <td><?php  echo $subject["postal_code"]."<br/>";?></td>
          <td><?php  echo $subject["state"]."<br/>";?></td>         
		  <td><form method="post" action="?page=pedit">
            <input type="hidden" name="sin" value="<?php echo $subject["sin"]?>">
            <input type="hidden" name="name" value="<?php echo $subject["name"]?>">
            <input type="submit" name="edit-request-physician" value="Edit">  
            </form></td>
          <td><a href="private/delete.php?class=physician&sin=<?php echo $subject["sin"]; ?>">Delete</a> </td>
  
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