<!DOCTYPE html>
<?php

include('db.php');

function clean_string($string) {
      $bad = array(";","<",">","$");
      return str_replace($bad,"",$string);
}
if(!isset($_POST['id']) ||
        !isset($_POST['groupSize']) ||
		!isset($_POST['usn']) ||
        !isset($_POST['mate1'])) {
		echo "There were error(s) found with the form you submitted. ";
        die();       
    }
	$id=$_POST['id'];
	$groupSize = $_POST['groupSize'];
	$usn = $_POST['usn'];
	for($i=0;$i<$groupSize;$i++)
	{
	  if(isset($_POST['mate'.($i+1)]) && $_POST['mate'.($i+1)] != "") {
		  $matename = clean_string($_POST['mate'.($i+1)]);
		  $deptname = "";
		  if(isset($_POST['dept'.($i+1)]))
		      $deptname = clean_string($_POST['dept'.($i+1)]);
	    $sql="INSERT INTO participants(registrationid,name,dept) VALUES('$id','$matename','$deptname')";
	    mysql_query($sql);
	  }
	}
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
        <div id="regform" class="modal hide fade in" style="display: none; ">  
               <div class="modal-header">  
                   <a class="close" data-dismiss="modal">×</a>  
                  <h3>Registration Details</h3> <br>
                   Your unique registration code is <?php echo $id; ?> <br>
                   This has been registered under the USN <?php echo $usn; ?>
               </div>  
               <div class="modal-body">  
					        
				</div>  
				<div class="modal-footer">  
                    <button onclick="window.history.go(-2)" class="btn btn-success">Back</button>
					<a href="#" class="btn" data-dismiss="modal">Close</a>  
				</div>  
             </div>  
    </body>
</html>    