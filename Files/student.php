<link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">
<div style="font-size:22px;font-family: 'Athiti', sans-serif;">
<?php
// connect to database
include "connect.php";

$sql = "SELECT * FROM student";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo '<table class="table">';
	echo '<tr>';
	echo '<th>No.</th>';
	echo '<th>Name</th>';
	echo '<th>Class</th>';
	echo '<th>Room</th>';
	echo '<th>Code</th>';
	echo '<th>Password</th>';
	echo '<th>Teacher</th>';
	echo '</tr>';
	
	$no=1;
   while($row = $result->fetch_assoc()) {
	    echo '<tr>';
		echo '<td>' ;
		echo '<a class="btn btn-info btn-sm m-1" onclick="editStudent('.$row["std_id"].')" type="button">Edit</a>';
		echo '<a class="btn btn-info btn-sm m-1" onclick="delStudent('.$row["std_id"].')" type="button">Del</a>' ;
		echo $no;
		echo '</td>';
        echo '<td>' .$row["std_name"]. '</td>';
		echo '<td>' .$row["std_class"]. '</td>';
		echo '<td>' .$row["std_room"]. '</td>';
		echo '<td>' .$row["std_code"]. '</td>';
		echo '<td>' .$row["std_password"]. '</td>';
		echo '<td>' .$row["teach_id"]. '</td>';
		echo '</tr>';
		$no++;
     }
	 echo '</table>';
	 echo '<a class="btn btn-outline-dark" href="#stdForm" onclick="showStdForm()">New</a>';
} else {
    echo "0 results";
}
$conn->close();
echo '<div id="stdForm"></div>';
?>
<script>
function showStdForm() {
	var url="stdForm.php";
	var data="std_id=0";
	$("#stdForm").load(url,data);
}
function editStudent(std_id) {
	var url="stdForm.php";
	var data="std_id="+std_id;
	$("#stdForm").load(url,data); 
}
function delStudent(std_id) {
	var url="delete.php";
	var data="id="+std_id+"&table_name=student"+"&id_name=std_id";
	$("#stdForm").load(url,data);
}
</script>
</div>
