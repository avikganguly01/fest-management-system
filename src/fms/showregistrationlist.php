<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username'])){
header("location:index.php");
}
include('db.php');
function clean_string($string) {
      $bad = array(";","<",">","$","*");
      return str_replace($bad,"",$string);
}
if(!isset($_GET['event'])) {
	echo "There were error(s) found with the form you submitted. ";
        die();       
    }
	$event=clean_string($_GET['event']);
	$query=mysql_query("SELECT * FROM registration  WHERE eventname='$event' AND paid=1");
	
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
			$("#insideblock").printThis({
				loadCSS: "css/print.css"});
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
                  <h4 style="float:left; width:14%; margin-left:23px;">Search Results</h4>
                  <button type="button" class="btn btn-default btn-lg" style="float:right; margin-top:20px; margin-right:20px;" onClick="printPlease()"><span class="fa fa-print"></span></button>
                  <br/><br/><br/>
               <div id="insideblock">
                 <table class="table table-striped table-bordered table-hover">  
                <col width="50">
                <col width="30">
                <col width="30">
                <col width="30">
				<thead>  
					<tr>  
						<th>Registration ID</th>  
						<th>Name</th>  
						<th>College Name</th>  
						<th>Contact No.</th> 
					</tr>  
				</thead>  
				<tbody>  
                <?php
                      while ($row = mysql_fetch_array($query)) {
						  echo "<tr>";	  
						  echo "<td>$row[0]</td>";
						  echo "<td>$row[1]</td>";
						  echo "<td>$row[3]</td>";
						  echo "<td>$row[5]</td>";
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
   