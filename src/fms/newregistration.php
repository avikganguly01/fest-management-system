<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username'])){
header("location:index.php");
}
include('db.php');

function clean_string($string) {
      $bad = array(";","<",">","$");
      return str_replace($bad,"",$string);
}
if(!isset($_POST['name']) ||
        !isset($_POST['usn']) ||
        !isset($_POST['contactno']) ||
        !isset($_POST['college']) ||
        !isset($_POST['event'])) {
		echo "There were error(s) found with the form you submitted. ";
        die();       
    }
$id = uniqid();
echo $id;
$name= $_POST['name'];
$name = clean_string($name);
echo $name;
$usn= $_POST['usn'];
$usn= clean_string($usn);
echo $usn;
$contactno = $_POST['contactno'];
$contactno = clean_string($contactno);
echo $contactno;
$college = $_POST['college'];
$college = clean_string($college);
echo $college;
$event = $_POST['event'];
$event = clean_string($event);
echo $event;
$regdate = date('Y-m-d');
echo $regdate;
$department="";
if(isset($_POST['department'])){
    $department = $_POST['department'];
    $department = clean_string($department);
}
echo $department;
$groupsizequery=mysql_query("SELECT groupSize FROM events WHERE name='$event'");
$groupSize = 0;
 while ($row = mysql_fetch_array($groupsizequery)) {
        $groupSize = $row[0];				        
 }
$sql="INSERT INTO registration(id,name,usn,collegename,dept,contactno,eventname,regdate) VALUES('$id','$name','$usn','$college','$department','$contactno','$event','$regdate')";
	mysql_query($sql);
	
?>
<html lang="en">
    <head>
        <title>Fest Management System</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script src="js/bootstrap-modal.js"></script> 
        <script type="text/javascript">
    $(window).load(function(){
        $('#regform').modal('show');
    });
</script>  
    </head>
    <body>
        <div id="regform" class="modal hide fade in" style="display: none;  ">  
               <div class="modal-header">  
                   <a class="close" data-dismiss="modal">×</a>  
                   <?php if($groupSize <= 1) {
                   echo "<h3>Registration Details</h3> <br>";
                   echo 'Your unique registration code is '.$id.' <br>';
                   echo 'This has been registered under the USN '.$usn; 
				   } else {
					echo "<h3>Enter Team Details</h3> <br>";
					   echo '<form action="regdetails.php" method="post">';
					   if($college!="Reva Institute of Technology and Management") {
					    for($i=0;$i<$groupSize;$i++){
					      echo 'Enter teammate'.($i+1).' name : <input type="text" name="mate'.($i+1).'"><br>'; 
					     }
					   } else {
						  for($i=0;$i<$groupSize;$i++){
					      echo 'Enter teammate'.($i+1).' name : <input type="text" name="mate'.($i+1).'">'; ?>
                     <select <?php echo 'name="dept'.($i+1).'"';?> style="width:150px;">
                     <option value="" ></option>
                     <option value="CSE" >CSE</option>
                     <option value="ISE" >ISE</option>
                     <option value="Mech" >Mech</option>
                     <option value="Civil" >Civil</option>
                     <option value="EEE" >EEE</option>
                     <option value="ECE" >ECE</option>
                     <option value="BCA" >BCA</option>
                     <option value="MCA" >MCA</option>
                     <option value="MCA" >MBA</option>
                     </select> <br>
					 <?php	
					     }
					   }
					   echo '<input type="hidden" name="id" value="'.$id.'">';
					   echo '<input type="hidden" name="groupSize" value="'.$groupSize.'">';
					   echo '<input type="hidden" name="usn" value="'.$usn.'">';
					   echo '<button type="submit" class="btn btn-success">Submit </button>';
					   echo '</form>';
				   }
                   ?>
               </div>  
               <div class="modal-body">  
					        
				</div>  
				<div class="modal-footer">  
                    <button onclick="window.history.go(-1)" class="btn btn-success">Back</button>
					<a href="#" class="btn" data-dismiss="modal">Close</a>  
				</div>  
             </div>  
    </body>
</html>    