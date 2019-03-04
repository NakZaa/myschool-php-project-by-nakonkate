<link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">
<div style="font-size:22px;font-family: 'Athiti', sans-serif;">
<?php
// connect to database
include "connect.php";

$sql = "SELECT * FROM activity";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo '<table class="table table-bordered">';
	echo '<tr>';
	echo '<th>No.</th>';
	echo '<th>Name</th>';
	echo '<th>Limit</th>';
	echo '<th>Remark</th>';
	echo '</tr>';
	
	$no=1;
   while($row = $result->fetch_assoc()) {
	    echo '<tr>';
		echo '<td>' .$no. '</td>';
        echo '<td>' .$row["act_name"]. '</td>';
		echo '<td>' .$row["act_limit"]. '</td>';
		echo '<td>' .$row["act_remark"]. '</td>';
		echo '</tr>';
		$no++;
     }
} else {
    echo "0 results";
}
$conn->close();
?>
</div>
