<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username'])){
header("location:index.php");
}
include('db.php');
$query=mysql_query("SELECT * FROM events WHERE id<>1");
?>
<html lang="en">
    <head>
        <title>Fest Management System</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="css/index.css" />
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script src="js/modernizr.custom.js"></script>
    </head>
    <body>
    	<div id="header"> 
        </div>
        
        <div class="container">
            <div class="content">
               <nav class="dr-menu">
						<div class="dr-trigger"><span id="dr-icon" class="fa fa-bars"></span><a class="dr-label">Menu</a></div>
						<ul>
							<li><a id="dr-icon" class="fa fa-compass"  href="home.php">Dashboard</a></li>
							<li><a id="dr-icon" class="fa fa-check-square-o" href="registration.php">Registration</a></li>
							<li><a id="dr-icon" class="fa fa-bar-chart-o" href="reporting.php">Reporting</a></li>
							<li><a id="dr-icon" class="fa fa-pencil" href="events.php">Events</a></li>
                            <li><a id="dr-icon" class="fa fa-phone" href="contact.php">Contact Us</a></li>
							<li><a id="dr-icon" class="fa fa-power-off" href="logout.php">Logout</a></li>
						</ul>
					</nav>
            </div><!-- content -->
            <div id="block">
                  <h4 style="width:10%; margin-left:23px;">Events</h4>
                 
               <div id="insideblock">
                      <table class="table table-striped table-bordered table-hover">  
                
				<thead>  
					<tr>  
						<th>Category</th>  
						<th>Name</th>
                        <th>Size</th>   
                        <th>Timing</th> 
                        <th>Location</th> 
                        <th>TotalReg</th> 
                        <th>PaidReg</th> 
                        <th>Close</th> 
						<th>Fee</th>  
						<th>Host Fee</th>  
                        <th>First Prize</th>  
						<th>Second Prize</th>  
						<th>Winner</th>  
						<th>Contact</th> 
                        <th>Runner-up</th>  
						<th>Contact</th> 
					</tr>  
				</thead>  
				<tbody>  
                <?php
                      while ($row = mysql_fetch_array($query)) {
						  $totalreg=mysql_fetch_array(mysql_query("SELECT count(id) FROM `registration` WHERE eventname='$row[1]'"));
						  $paidreg=mysql_fetch_array(mysql_query("SELECT count(id) FROM `registration` WHERE eventname='$row[1]' AND paid=1"));
						  echo "<tr>";
						  
						  if($row[2]==0)
						      echo "<td>Cultural</td>";
						  elseif($row[2]==1)	
						      echo "<td>Sports</td>"; 
					      elseif($row[2]==2)	
						      echo "<td>Technical</td>"; 
						  elseif($row[2]==3)	
						      echo "<td>Fun</td>"; 	  		  
						  else
						      echo "<td>Management</td>"; 
						  echo '<td><a href="showregistrationlist.php?event='.$row[1].'">'.$row[1].'</a></td>';	
						  echo "<td>$row[4]</td>";
						  echo "<td>$row[3]</td>"; 
						  echo "<td>$row[14]</td>"; 
						  echo "<td>$totalreg[0]</td>"; 
						  echo "<td>$paidreg[0]</td>"; 
						  echo '<td><form action="closeevent.php" method="get"> 
						  <input type="hidden" name="event" value="'.$row[1].'" />
						  <input type="hidden" name="status" value="'.$row[13].'" />';
						  if($row[13]==0)
						     echo '<button type="submit" class="btn btn-mini btn-success">Close</button> </form></td>';
						  else
						     echo '<button type="submit" class="btn btn-mini btn-success">Open</button> </form></td>';	 
						  echo "<td>$row[5]</td>";
						  echo "<td>$row[6]</td>";	   
						  echo "<td>$row[7]</td>";
						  echo "<td>$row[8]</td>";
						  echo "<td>$row[9]</td>";
						  echo "<td>$row[10]</td>";
						  echo "<td>$row[11]</td>";
						  echo "<td>$row[12]</td>";
						  echo "</tr>";	 
                      }
                ?>  
				</tbody>  
			</table> 
              
               </div>
            </div>
        </div>
        
        <div id="footer"> <p id="leftContent">Fest Management System</p>
        </div>
        <script src="js/ytmenu.js"></script>
    </body>
</html>