<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username'])){
header("location:index.php");
}
include('db.php');
$regid = $_GET["regid"];
$query=mysql_fetch_array(mysql_query("SELECT * FROM registration WHERE id='$regid'"));
$eventquery=mysql_fetch_array(mysql_query("SELECT * FROM events WHERE name='$query[6]'"));
$coordinatorquery=mysql_fetch_array(mysql_query("SELECT * FROM coordinators WHERE event_name='$query[6]'"));
$status = $query[8];
$eventstatus = $eventquery[13];
$amount;
if($query[3]=='REVA ITM' || $query[3]=='Reva Institute of Technology and Management' || $query[3]=='Reva Institute of Science & Management' || $query[3]=='Reva Independent PU College') {
				$amount = $eventquery[5];}
				else {
				$amount = $eventquery[6];}
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
         <script src="js/printThis.js"></script>
        <script>
		function printPlease()
		{
			$("#printblock").printThis({});
		}
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
                  <h4 style="float:left; width:14%; margin-left:23px;">Registration</h4>
                  <?php  
				   if($status==0 && ($_SESSION['username']=='admin1' || $_SESSION['username']=='admin2' || $_SESSION['username']=='admin3') && $eventstatus==0) {
                       echo '<form style="float:left; width:22%;margin-top:20px;" action="pay.php" method="get">
					    <input type="hidden" name="amount" value="'.$amount.'" />
						<input type="hidden" name="regid" value="'.$regid.'" />
						<button type="submit" class="btn btn-success">Pay</button> </form>';
				   } elseif($status==1 && ($_SESSION['username']=='admin1' || $_SESSION['username']=='admin2' || $_SESSION['username']=='admin3')){
				        echo '<form style="float:left; width:22%;margin-top:20px;" action="pay.php" method="get">
						<input type="hidden" name="regid" value="'.$regid.'" />
						<button type="submit" class="btn btn-danger">Refund</button> </form>';
				   }
                  ?>
                  <button type="button" class="btn btn-default btn-lg" style="float:right; margin-top:20px; margin-right:20px;" onClick="printPlease()"><span class="fa fa-print"></span></button>
                  <br><br><br><br>
               <div id="printblock">
                <h5>Registration Slip</h5>
                <h1>Revamp '14</h1>
                <h4><?php echo 'Registration ID - '.$regid; ?></h4>
                <div id="studentinfo" style="text-align:left;float:left; width:50%; ">
                <h4>Registrant Information</h4>
                Name : <?php echo $query[1]; ?> <br><br>
                USN : <?php echo $query[2]; ?> <br><br>
                College : <?php echo $query[3]; ?> <br><br>
                </div>
                <div id="eventinfo" style="text-align:left;float:left; width:50%;">
                <h4>Event Information</h4>
                Name : <?php echo $query[6]; ?> <br><br>
                Fee : <?php 
				 echo $amount;?>  <br><br>
                Timing :  <?php echo $eventquery[3]; ?><br><br>
                Location : <?php echo $eventquery[14]; ?><br><br>
                Coordinator Name : <?php echo $coordinatorquery[2]; ?> <br><br>
                Coordinator No. : <?php echo $coordinatorquery[4]; ?>  <br><br>
                </div>
                <div id="foot" style="float:left;">
                 <br><br>
                ____________________ <br><br>
                Cashier Signature
                </div>
               </div>
            </div>
        </div>
        
        <div id="footer"> <p id="leftContent">Fest Management System</p>
        </div>
        <script src="js/ytmenu.js"></script>
    </body>
</html>