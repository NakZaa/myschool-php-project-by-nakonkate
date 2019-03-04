<?php
// connection_database
include "connect.php";
$teach_id		=$_POST["teach_id"];
$teach_name		=$_POST["teach_name"];
$teach_dep		=$_POST["teach_dep"];
$teach_tel		=$_POST["teach_tel"];
$teach_username	=$_POST["teach_username"];
$teach_password	=$_POST["teach_password"];


if($teach_id !=0){
	//update
	$sql = "UPDATE teacher SET teach_name='$teach_name', 
	teach_dep='$teach_dep', 
	teach_tel='$teach_tel', 
	teach_username='$teach_username', 
	teach_password='$teach_password' 
	WHERE teach_id='$teach_id'";
	$msg="Update";
}
else{
//insert
	$sql = "INSERT INTO teacher (teach_name, teach_dep, teach_tel, teach_username, teach_password)
	VALUES ('$teach_name', '$teach_dep', '$teach_tel', '$teach_username', '$teach_password')";
	$msg="New";
}
if ($conn->query($sql) === TRUE) {
		echo "Successful";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
?>
