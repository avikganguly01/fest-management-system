<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username'])){
header("location:index.php");
}
include('db.php');
$clgquery=mysql_query("SELECT name FROM college");
$eventquery=mysql_query('SELECT name FROM events WHERE name<>"none" AND status=0 order by name');

?>
<html lang="en">
    <head>
        <title>Revamp 2014</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="css/index.css" />
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script src="js/bootstrap-modal.js"></script>   
        <script type="text/javascript" src="js/main.js"></script>
        <script src="js/modernizr.custom.js"></script>
        <script>
		   function show_select()
           {
  				var college = document.getElementById("college");
  				var dept = document.getElementById("dept");

 				 var desired_box = college.options[college.selectedIndex].value;
  				if(desired_box == "Reva Institute of Technology and Management") {
    					dept.style.display = '';
  				} else {
    				    dept.style.display = 'none';
  				}
			}
			
			
		</script>
    </head>
    <body onload='show_select()'>
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
                  <h4 style="float:left; width:20%; margin-left:23px;">Onspot Registration</h4>
                  <a data-toggle="modal" href="#regform" class="btn btn-primary" style="float:left; width:18%;margin-top:20px;">Register College</a> 
                 
                  <br/><br/><br/>
               <div id="insideblock">
                 <form action="newregistration.php" method="post">
                 <div class="form-group">
                 <label for="name">Name*</label>
                 <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                 </div>
                 <div class="form-group">
                 <label for="usn">USN*</label>
                 <input type="text" class="form-control" id="usn" placeholder="USN" name="usn">
                 </div>
                 <div class="form-group">
                 <label for="contactno">Contact No.*</label>
                 <input type="text" class="form-control" id="contactno" placeholder="Contact No." name="contactno">
                 </div>
                 <div class="form-group">
                 <label for="college">College*    *If your college name does not appear in the list, please use the button on top of this page to add it.</label>
                 <select name="college" id="college" style="width:250px;" onchange='show_select()'>
				 <?php 
				 while ($row = mysql_fetch_array($clgquery)) {
					 if($row[0]=="Reva Institute of Technology and Management")
					    echo '<option value="'.$row[0].'" selected>'.$row[0].'</option>';
					 else	
				        echo '<option value="'.$row[0].'">'.$row[0].'</option>';
				 }
				  ?>
                  </select>
                 </div>
                  <div class="form-group" id="dept" style='display:none'>
                 <label for="department">Department</label>
                 <select name="department" style="width:150px;">
                     <option value="" ></option>
                     <option value="CSE" >CSE</option>
                     <option value="ISE" >ISE</option>
                     <option value="Mech" >Mech</option>
                     <option value="Civil" >Civil</option>
                     <option value="EEE" >EEE</option>
                     <option value="ECE" >ECE</option>
                     <option value="BCA" >BCA</option>
                     <option value="MCA" >MCA</option>
                     <option value="MBA" >MBA</option>
                  </select>
                 </div>
                 <div class="form-group">
                 <label for="event">Event*</label>
                 <select name="event" style="width:150px;">
                  <?php 
				 while ($row = mysql_fetch_array($eventquery)) {
				        echo '<option value="'.$row[0].'">'.$row[0].'</option>';
				 }
				  ?>
                 </select>
                 </div>
   				 <button type="submit" class="btn btn-primary">Register</button>
		         </form>
              
               </div>
            <div id="regform" class="modal hide fade in" style="display: none; ">  
               <div class="modal-header">  
                   <a class="close" data-dismiss="modal">×</a>  
                   <h3>Register College</h3>  
               </div>  
               <form action="newcollege.php" method="post">
               <div class="modal-body">  
					        
                                   <div class="form-group">
                 						<label for="clgname">College Name</label>
                 						<input type="text" class="form-control" id="clgname" placeholder="College Name" name="collegename">
                 					</div>
				</div>  
				<div class="modal-footer">  
                    <button type="submit" class="btn btn-success">Submit </button>
					<a href="#" class="btn" data-dismiss="modal">Close</a>  
				</div>  
                </form> 
             </div>  
                 
               </div>
            </div>

        
        <div id="footer"> <p id="leftContent">Fest Management System</p>
        </div>
        <script src="js/ytmenu.js"></script>
    </body>
</html>