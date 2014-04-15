<?php
$link = mysql_connect('localhost', 'root', 'mysql');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
	mysql_select_db("fms");
	
echo 'Connected successfully';

        $name=$_POST['name'];
        echo $name;
        $contact_no=$_POST['contact_no'];
        echo $contact_no;
        $sem = $_POST['sem'];
        echo $sem;
	$username=$_POST['username'];
        echo $username;
	$password=md5($_POST['password']);
        echo $password;
        $reg_date=date('Y-m-d');
        echo $reg_date;
	$sql="INSERT INTO appuser(username,password,name,contact_no,sem,reg_date) VALUES('$username','$password','$name','$contact_no','$sem','$reg_date')";
	mysql_query($sql);

?>