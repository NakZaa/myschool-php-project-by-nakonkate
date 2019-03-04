<?php
// connection_database
include "connect.php";
$id				=$_GET["id"];
$table_name		=$_GET["table_name"];
$id_name		=$_GET["id_name"];

//delete
	$sql = "DELETE FROM $table_name WHERE $id_name='$id' LIMIT 1 ";

if ($conn->query($sql) === TRUE) {
		echo "Delete row from table '".$table_name."' successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
?>
