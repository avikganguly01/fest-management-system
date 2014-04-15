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
if($_SESSION['username']=='admin1' || $_SESSION['username']=='admin2' || $_SESSION['username']=='admin3'){
if(!isset($_GET['event'])) {
	echo "There were error(s) found with the form you submitted. ";
        die();       
    }
	$event=clean_string($_GET['event']);
	$currstatus=clean_string($_GET['status']);
	$updatepaid;
	if($currstatus==0)
	   $updatepaid="UPDATE events SET status=1 where name='$event'";
	else
	   $updatepaid="UPDATE events SET status=0 where name='$event'";   
	mysql_query($updatepaid);
	echo "Action completed.";
}
?>
   