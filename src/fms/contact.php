<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username'])){
header("location:index.php");
}
include('db.php');
$query=mysql_query("SELECT * FROM coordinators");
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
                  <h4 style="width:10%; margin-left:23px;">Contacts</h4>
                 
               <div id="insideblock">
                         <table class="table table-striped table-bordered table-hover">  
                <col width="50">
                <col width="30">
                <col width="30">
                <col width="30">
				<thead>  
					<tr>  
						<th>Name</th>  
						<th>Event Name</th>  
						<th>Role</th>  
						<th>Contact</th>  
					</tr>  
				</thead>  
				<tbody>  
                <?php
                      while ($row = mysql_fetch_array($query)) {
						  echo "<tr>";
						  echo "<td>$row[2]</td>";
						  echo "<td>$row[3]</td>";
						  if($row[1]=="0")
						      echo "<td>Convener</td>";
						  elseif($row[1]=="1")	
						      echo "<td>Co-ordinator</td>"; 
						  else
						      echo "<td>Volunteer</td>"; 	   
						  echo "<td>$row[4]</td>";
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