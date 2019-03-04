<?php
// connection_database
include "connect.php";
$std_id			=$_POST["std_id"];
$std_name		=$_POST["std_name"];
$std_class		=$_POST["std_class"];
$std_room		=$_POST["std_room"];
$std_code		=$_POST["std_code"];
$std_password	=$_POST["std_password"];



if($std_id !=0){
	$sql = "UPDATE student SET std_name='$std_name', 
	std_class='$std_class', 
	std_room='$std_room', 
	std_code='$std_code', 
	std_password='$std_password' 
	WHERE std_id='$std_id'";
	$msg="Update";
}
else{
//insert
	$sql = "INSERT INTO student (std_name, std_class, std_room, std_code, std_password)
	VALUES ('$std_name', '$std_class', '$std_room', '$std_code', '$std_password')";
	$msg="New";
}
if ($conn->query($sql) === TRUE) {
		echo "Successful";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
?>