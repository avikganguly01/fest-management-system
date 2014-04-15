<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username'])){
header("location:index.php");
}
include('db.php');

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
                  <h4 style="float:left; width:14%; margin-left:23px;">Registered</h4>
                  <form style="float:left; width:18%;margin-top:20px;" action="onspot.php" method="get"> <button type="submit" class="btn btn-primary">Register Onspot</button> </form>
                  
                  <br/><br/><br/>
               <div id="insideblock">
                <form action="search.php" method="post">
                        <label for="name"  style="float:left; width:10%;margin-top:25px; margin-left:15px;">Search by USN</label>
                        <input type="text" class="form-control" id="usn" placeholder="USN" name="usn" style="float:left; width:20%;margin-top:20px;">
                        <button type="submit" class="btn btn-primary" style="float:left; width:10%; margin-top:20px; margin-left:10px;">Search</button>
                </form> <br><br><br>
                <form action="search.php" method="post">
                        <label for="regid"  style="float:left; width:10%;margin-top:25px; margin-left:15px;">Search by Reg ID</label>
                        <input type="text" class="form-control" id="regid" placeholder="Reg ID" name="regid" style="float:left; width:20%;margin-top:20px;">
                        <button type="submit" class="btn btn-primary" style="float:left; width:10%; margin-top:20px; margin-left:10px;">Search</button>
                </form> <br><br><br>
                 <form action="search.php" method="post">
                        <label for="name"  style="float:left; width:10%;margin-top:25px; margin-left:15px;">Search by Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" style="float:left; width:20%;margin-top:20px;">
                        <button type="submit" class="btn btn-primary" style="float:left; width:10%; margin-top:20px; margin-left:10px;">Search</button>
                </form> <br><br><br>
                 <form action="search.php" method="post">
                        <label for="contactno"  style="float:left; width:10%;margin-top:25px; margin-left:15px;">Search by Contact No</label>
                        <input type="text" class="form-control" id="contactno" placeholder="Contact No" name="contactno" style="float:left; width:20%;margin-top:20px;">
                        <button type="submit" class="btn btn-primary" style="float:left; width:10%; margin-top:20px; margin-left:10px;">Search</button>
                </form><br><br><br>
                <div>
                <form action="showlist.php?mode=0" method="post">
                        <button type="submit" class="btn btn-primary" style="float:left; width:10%; margin-top:20px; margin-left:10px;">Show All Registrations</button>
                </form>
                  <form action="showlist.php?mode=1" method="post">
                        <button type="submit" class="btn btn-primary" style="float:left; width:10%; margin-top:20px; margin-left:10px;">Show Paid Registrations</button>
                </form>
                  <form action="showlist.php?mode=2" method="post">
                        <button type="submit" class="btn btn-primary" style="float:left; width:10%; margin-top:20px; margin-left:10px;">Show Online Registrations</button>
                </form>
                </div><br/><br/><br/><br/><br/>
                <div>
                     <h5>Custom Search</h5>
                     <form action="showlist.php" method="post">
                        <label for="college"  style="float:left; width:10%;margin-top:25px; margin-left:15px;">Search by College</label>
                        <select name="college" id="college" style="float:left; width:20%;margin-top:25px; margin-left:15px;" >
				 <?php 
				 $clgquery=mysql_query("SELECT name FROM college");
				 while ($row = mysql_fetch_array($clgquery)) {
					 if($row[0]=="Reva Institute of Technology and Management")
					    echo '<option value="'.$row[0].'" selected>'.$row[0].'</option>';
					 else	
				        echo '<option value="'.$row[0].'">'.$row[0].'</option>';
				 }
				  ?>
                  </select>
                   <label for="mode" style="float:left; width:5%;margin-top:25px; margin-left:15px;">Mode</label>
                 <select name="mode" style="float:left; width:20%;margin-top:25px; margin-left:15px;">
                     <option value="0" >All Registrations</option>
                     <option value="1" selected >Paid Registrations</option>
                     <option value="2" >Unpaid Registrations</option>
                  </select>
                        <button type="submit" class="btn btn-primary" style="float:left; width:10%; margin-top:20px; margin-left:10px;">Search</button>
                </form> <br><br><br>
                <form action="showlist.php" method="post">
                        <label for="event"  style="float:left; width:10%;margin-top:25px; margin-left:15px;">Search by Event</label>
                        <select name="event" style="float:left; width:20%;margin-top:25px; margin-left:15px;">
                  <?php 
				  $eventquery=mysql_query('SELECT name FROM events WHERE name<>"none"');
				 while ($row = mysql_fetch_array($eventquery)) {
				        echo '<option value="'.$row[0].'">'.$row[0].'</option>';
				 }
				  ?>
                 </select>
                 <label for="mode" style="float:left; width:5%;margin-top:25px; margin-left:15px;">Mode</label>
                 <select name="mode" style="float:left; width:20%;margin-top:25px; margin-left:15px;">
                     <option value="0" >All Registrations</option>
                     <option value="1" selected >Paid Registrations</option>
                     <option value="2" >Unpaid Registrations</option>
                  </select>
                        <button type="submit" class="btn btn-primary" style="float:left; width:10%; margin-top:20px; margin-left:10px;">Search</button>
                </form> <br><br>
                </div>      
              
               </div>
            </div>
        </div>
        
        <div id="footer"> <p id="leftContent">Fest Management System</p>
        </div>
        <script src="js/ytmenu.js"></script>
    </body>
</html>