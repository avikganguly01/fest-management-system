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
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/jquery.ui.timepicker.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script src="js/modernizr.custom.js"></script>
        <script>
	    $(function() {
		$( "#datefrom" ).datepicker({ dateFormat: "yy-mm-dd" });
		$( "#dateto" ).datepicker({ dateFormat: "yy-mm-dd" });
		$( "#timeto" ).timepicker();
		$( "#timefrom" ).timepicker();
			});
	</script>
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
                  <h4 style="width:10%; margin-left:23px;">Reporting</h4>
                 
               <div id="insideblock">
                <form action="showaccounts.php" method="post">
                        <label for="timegap"  style="float:left; width:8%;margin-top:25px; margin-left:15px;">From Timestamp</label>
                       <input type="text" class="form-control" id="datefrom" placeholder="Format: yyyy-mm-dd" name="datefrom" style="float:left; width:20%;margin-top:20px;">
                       <input type="text" class="form-control" id="timefrom" placeholder="Format: hh:mm:ss" name="timefrom" style="float:left; width:20%;margin-top:20px;"><br><br><br><br>
                        <label for="timegap"  style="float:left; width:6%;margin-top:25px; margin-left:15px;">To Timestamp</label>
                        <input type="text" class="form-control" id="dateto" placeholder="Format: yyyy-mm-dd" name="dateto" style="float:left; width:20%;margin-top:20px;">
                         <input type="text" class="form-control" id="timeto" placeholder="Format: hh:mm:ss" name="timeto" style="float:left; width:20%;margin-top:20px;"><br><br><br><br>
                 <label for="account" style="float:left; width:5%;margin-top:25px; margin-left:15px;">Select Admin</label>
                 <select name="username" style="float:left; width:20%;margin-top:25px; margin-left:15px;">
                     <option value="admin1" >Admin1</option>
                     <option value="admin2" selected >Admin2</option>
                     <option value="admin3" >Admin3</option>
                  </select>
                        <button type="submit" class="btn btn-primary" style="float:left; width:10%; margin-top:20px; margin-left:10px;">Search</button>
                </form> <br><br>
                      <table class="table table-striped table-bordered table-hover">
                  <col width="70%">
                  <col width="30%">
                  <thead>  
					<tr>  
						<th>Report Parameter</th>  
						<th>Value</th>   
					</tr>  
				</thead> 
                <tbody>
                   <tr>
                     <td>  Amount Collected - Total </td>
                     <td> <?php 
					 $amntonspot=mysql_fetch_array(mysql_query("SELECT SUM( amount ) FROM  `appuser_transactions`"));
					 echo $amntonspot[0]; ?></td>
                   </tr>
                   <tr>
                     <td> No. of Registrations - Admin1 </td>
                     <td> <?php 
					 $amntadmin1=mysql_fetch_array(mysql_query("SELECT count( regid ) FROM  `appuser_transactions` WHERE appuserid =  'admin1'"));
					 echo $amntadmin1[0]; ?> </td>
                   </tr>
                   <tr>
                     <td>  Amount Collected - Admin1 </td>
                     <td> <?php 
					 $amntadmin1=mysql_fetch_array(mysql_query("SELECT SUM( amount ) FROM  `appuser_transactions` WHERE appuserid =  'admin1'"));
					 echo $amntadmin1[0]; ?> </td>
                   </tr>
                   <tr>
                     <td> No. of Registrations - Admin2 </td>
                     <td> <?php 
					 $amntadmin1=mysql_fetch_array(mysql_query("SELECT count( regid ) FROM  `appuser_transactions` WHERE appuserid =  'admin2'"));
					 echo $amntadmin1[0]; ?> </td>
                   </tr>
                   <tr>
                     <td>  Amount Collected - Admin2 </td>
                     <td> <?php 
					 $amntadmin2=mysql_fetch_array(mysql_query("SELECT SUM( amount ) FROM  `appuser_transactions` WHERE appuserid =  'admin2'"));
					 echo $amntadmin2[0]; ?> </td>
                   </tr>
                   <tr>
                     <td> No. of Registrations - Admin3 </td>
                     <td> <?php 
					 $amntadmin1=mysql_fetch_array(mysql_query("SELECT count( regid ) FROM  `appuser_transactions` WHERE appuserid =  'admin3'"));
					 echo $amntadmin1[0]; ?> </td>
                   </tr>
                   <tr>
                     <td>  Amount Collected - Admin3 </td>
                     <td> <?php 
					 $amntadmin3=mysql_fetch_array(mysql_query("SELECT SUM( amount ) FROM  `appuser_transactions` WHERE appuserid =  'admin3'"));
					 echo $amntadmin3[0]; ?> </td>
                   </tr>
                    <tr>
                     <td>  No. of Registrations - Day 1 Events </td>
                     <td> <?php 
					 $nos=mysql_fetch_array(mysql_query("SELECT count(a.regid) FROM `appuser_transactions` a, `registration` r, `events` e WHERE a.regid=r.id and r.eventname=e.name and e.timing like '%Day 1%'"));
					 echo $nos[0]; ?> </td>
                   </tr>
                   <tr>
                     <td>  Amount Collected - Day 1 Events </td>
                     <td> <?php 
					 $amnt=mysql_fetch_array(mysql_query("SELECT sum(a.amount) FROM `appuser_transactions` a, `registration` r, `events` e WHERE a.regid=r.id and r.eventname=e.name and e.timing like '%Day 1%'"));
					 echo $amnt[0]; ?> </td>
                   </tr>
                   <tr>
                     <td>  No. of Registrations - Day 2 Events </td>
                     <td> <?php 
					 $nos=mysql_fetch_array(mysql_query("SELECT count(a.regid) FROM `appuser_transactions` a, `registration` r, `events` e WHERE a.regid=r.id and r.eventname=e.name and e.timing like '%Day 2%'"));
					 echo $nos[0]; ?> </td>
                   </tr>
                   <tr>
                     <td>  Amount Collected - Day 2 Events </td>
                     <td> <?php 
					 $amnt=mysql_fetch_array(mysql_query("SELECT sum(a.amount) FROM `appuser_transactions` a, `registration` r, `events` e WHERE a.regid=r.id and r.eventname=e.name and e.timing like '%Day 2%'"));
					 echo $amnt[0]; ?> </td>
                   </tr>
                    <tr>
                     <td>  No. of Registrations - Day 3 Events </td>
                     <td> <?php 
					 $nos=mysql_fetch_array(mysql_query("SELECT count(a.regid) FROM `appuser_transactions` a, `registration` r, `events` e WHERE a.regid=r.id and r.eventname=e.name and e.timing like '%Day 3%'"));
					 echo $nos[0]; ?> </td>
                   </tr>
                   <tr>
                     <td>  Amount Collected - Day 3 Events </td>
                     <td> <?php 
					 $amnt=mysql_fetch_array(mysql_query("SELECT sum(a.amount) FROM `appuser_transactions` a, `registration` r, `events` e WHERE a.regid=r.id and r.eventname=e.name and e.timing like '%Day 3%'"));
					 echo $amnt[0]; ?> </td>
                   </tr>
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