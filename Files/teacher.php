<link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">
<div style="font-size:18px;font-family: 'Athiti', sans-serif;">
<?php
// connect to database
include "connect.php";

//select
$sql = "SELECT * FROM teacher";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo '<table class="table table-bordered">';
	echo '<tr>';
	echo '<th>ID</th>';
	echo '<th>Name</th>';
	echo '<th>Department</th>';
	echo '<th>Telephone</th>';
	echo '<th>Username</th>';
	echo '<th>Password</th>';
	echo '<th>Activity</th>';
	echo '</tr>';
	
	$no=1;
   while($row = $result->fetch_assoc()) {
	    echo '<tr>';
		echo '<td>';
		echo '<a class="btn btn-info btn-sm m-1" onclick="editTeacher('.$row["teach_id"].')" type="button">Edit</a>';
		echo '<a class="btn btn-info btn-sm m-1" onclick="delTeacher('.$row["teach_id"].')" type="button">Del</a>' ;
		echo '<a class="btn btn-info btn-sm m-1" onclick="reportTeacher('.$row["teach_id"].')" type="button">Rpt</a>' ;
		echo $no;
		echo '</td>' ;
        echo '<td>' .$row["teach_name"]. '</td>';
		echo '<td>' .$row["teach_dep"]. '</td>';
		echo '<td>' .$row["teach_tel"]. '</td>';
		echo '<td>' .$row["teach_username"]. '</td>';
		echo '<td>' .$row["teach_password"]. '</td>';
		echo '<td>' .$row["activity_id"]. '</td>';
		echo '</tr>';
		$no++;
     }
	 echo '</table>';
	 echo '<a class="btn btn-outline-dark" href="#teachForm" onclick="showTeachForm()">New</a>';
} else {
    echo "0 results";
}
$conn->close();

echo '<div id="teachForm"></div>';
?>

<script>
function showTeachForm() {
	var url="teachForm.php";
	var data="teach_id=0";
	$("#teachForm").load(url,data);
}
function editTeacher(teach_id) {
	var url="teachForm.php";
	var data="teach_id="+teach_id;
	$("#teachForm").load(url,data); 
}
function delTeacher(teach_id) {
	var url="delete.php";
	var data="id="+teach_id+"&table_name=teacher"+"&id_name=teach_id";
	$("#teachForm").load(url,data);
}
function reportTeacher(teach_id) {
	var data="id="+teach_id;
	var url="reportTeacher.php";
	$("#teachForm").load(url,data);
}
</script>

</div>
