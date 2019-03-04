<link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">
<div style="font-size:22px;font-family: 'Athiti', sans-serif;">
<?php
// connect to database
include "connect.php";
$id =$_GET["id"];

//select
$sql = "SELECT teacher.teach_name,activity.act_name,student.* 
		FROM teacher,activity,student
		WHERE teach_id='$id' and activity_id=act_id and teach_id=teacher_id ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo '<table class="table table-bordered">';
	echo '<tr>';
	echo '<th>No.</th>';
	echo '<th>Name</th>';
	echo '<th>Activity</th>';
	echo '<th>Student Name</th>';
	echo '<th>Class</th>';
	echo '<th>Number</th>';
	echo '</tr>';
	
	$no=1;
   while($row = $result->fetch_assoc()) {
	    echo '<tr>';
		echo '<td>';
		echo $no;
		echo '</td>' ;
        echo '<td>' .$row["teach_name"]. '</td>';
		echo '<td>' .$row["act_name"]. '</td>';
		echo '<td>' .$row["std_name"]. '</td>';
		echo '<td>' .$row["std_class"].'/'.$row["std_room"]. '</td>';
		echo '<td>' .$row["std_number"]. '</td>';
		echo '</tr>';
		$no++;
     }
	 echo '</table>';
} else {
    echo "0 results";
}
$conn->close();

echo '<div id="teachForm"></div>';
?>
</div>
