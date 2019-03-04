<?php
// connection_database
include "connect.php";
$std_id=$_GET["std_id"];
// Create connection


if($std_id !=0){
	$sql = "SELECT * FROM student WHERE std_id='$std_id' LIMIT 1";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$std_id=$row["std_id"];
		$std_name = $row["std_name"];
		$std_class = $row["std_class"]+0;
		$std_room = $row["std_room"];
		$std_code = $row["std_code"];
		$std_password = $row["std_password"];
		$teach_id = $row["teach_id"];
}
else{
//new
$std_name='';
$std_class=0;
$std_room='';
$std_code='';
$std_password='';
$teach_id='';
}
?>

<div class=" m-2 p-2 border border-light-dark rounded" style="width:500px">
<br>
  <h5>Student form</h5>
  <br>
	<form id="student-form" >

	<div class="form-group">
		<label for="number" class="mb-2 mr-sm-2">Number</label>
		<input type="text" name="std_id" class=" m-2 border border-light-dark rounded" value="<?=$std_id;?>">
	</div>
	
	<div calss="form-inline">
		<label for="name" class="mb-2 mr-sm-2">Name</label>
		<input type="text" name="std_name" class="form-control" value="<?=$std_name;?>" placeholder="Enter name">
	</div>
	
	<div calss="form-inline">
		<label for="class" class="mb-2 mr-sm-2">Class</label>
		<select class="form-control" name="std_class" placeholder="Enter class">
		<option value=0>Please select</option>
		<option value=1>M.1</option>
		<option value=2>M.2</option>
		<option value=3>M.3</option>
		<option value=4>M.4</option>
		<option value=5>M.5</option>
		<option value=6>M.6</option>

		</select>
	</div>

	<div calss="form-inline">
		<label for="number" class="mb-2 mr-sm-2">Room</label>
		<input type="text" class="form-control" name="std_room" value="<?=$std_room;?>" placeholder="Enter room">
	</div>
	
	<div calss="form-inline">
		<label for="username" class="mb-2 mr-sm-2">Code</label>
		<input type="text" class="form-control" name="std_code" value="<?=$std_code;?>" placeholder="Enter code">
	</div>
	
	<div calss="form-inline">
		<label for="password" class="mb-2 mr-sm-2">Password</label>
		<input type="password" class="form-control" name="std_password" value="<?=$std_password;?>" placeholder="Enter password">
	</div>
	
	
	
    <div class="form-check mb-2 mr-sm-2">
    </div>    
  <button type="button" onclick="updateStudent()" class="btn btn-outline-secondary mb-2 m-2">Save</button>
  <button type="button" class="btn btn-outline-secondary mb-2 m-2">Cancel</button>
  </form>
  <div id="fb_updateStd"></div>
</div>
<script>
document.getElementsByName("std_class")[0].value=<?php echo $std_class; ?>;
function updateStudent() {
	var std_id=document.getElementsByName("std_id")[0].value;
	var data=$("#student-form").serializeArray();
	var url="updateStudent.php";
	$("#fb_updateStd").load(url,data);
}
</script>