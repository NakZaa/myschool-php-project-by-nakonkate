<?php
// connection_database
include "connect.php";
$teach_id=$_GET["teach_id"];
// Create connection


if($teach_id !=0){
	$sql = "SELECT * FROM teacher WHERE teach_id='$teach_id' LIMIT 1";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$teach_id=$row["teach_id"];
		$teach_name = $row["teach_name"];
		$teach_dep = $row["teach_dep"]+0;
		$teach_tel = $row["teach_tel"];
		$teach_username = $row["teach_username"];
		$teach_password = $row["teach_password"];
}
else{
//new
$teach_name='';
$teach_dep=0;
$teach_tel='';
$teach_username='';
$teach_password='';
}
?>

<div class=" m-2 p-2 border border-light-dark rounded" style="width:500px">
<br>
  <h5>Teacher form</h5>
  <br>
	<form id="teacher-form" >

	<div class="form-group">
		<label for="number" class="mb-2 mr-sm-2">Number</label>
		<input type="text" name="teach_id" class=" m-2 border border-light-dark rounded" value="<?=$teach_id;?>">
	</div>
	
	<div calss="form-inline">
		<label for="name" class="mb-2 mr-sm-2">Name</label>
		<input type="text" name="teach_name" class="form-control" value="<?=$teach_name;?>" placeholder="Enter name">
	</div>
	
	<div calss="form-inline">
		<label for="department" class="mb-2 mr-sm-2">Department</label>
		<select class="form-control" name="teach_dep" placeholder="Enter department">
		<option value=0>Please select</option>
		<option value=1>Math</option>
		<option value=2>Thai</option>
		<option value=3>Science</option>
		<option value=4>English</option>
		<option value=5>History</option>
		<option value=6>Socail</option>
		<option value=7>Computer</option>
		<option value=8>Art</option>
		<option value=9>Music</option>
		<option value=10>etc.</option>
		</select>
	</div>
	<div calss="form-inline">
		<label for="username" class="mb-2 mr-sm-2">Telephone</label>
		<input type="text" name="teach_tel" class="form-control" value="<?=$teach_tel;?>" placeholder="Enter telephone">
	</div>

	<div calss="form-inline">
		<label for="username" class="mb-2 mr-sm-2">Username</label>
		<input type="text" name="teach_username" class="form-control" value="<?=$teach_username;?>" placeholder="Enter username">
	</div>
	
	<div calss="form-inline">
		<label for="password" class="mb-2 mr-sm-2">Password</label>
		<input type="password" name="teach_password" class="form-control" value="<?=$teach_password;?>" placeholder="Enter password">
	</div>
	
	
	
    <div class="form-check mb-2 mr-sm-2">
    </div>    
  <button type="button" onclick="updateTeacher()" class="btn btn-success mb-2 m-2">Save</button>
  <button type="button" onclick="cancelTeacher()" class="btn btn-danger mb-2 m-2">Cancel</button>
  </form>
  <div id="fb_updateTeach"></div>
</div>
<script>
document.getElementsByName("teach_dep")[0].value=<?php echo $teach_dep; ?>;
function updateTeacher() {
	var teach_id=document.getElementsByName("teach_id")[0].value;
	var data=$("#teacher-form").serializeArray();
	var url="updateTeacher.php";
	$("#fb_updateTeach").load(url,data,function(responseTxt, statusTxt, xhr){
	 if(statusTxt == "success") {
      alert("External content loaded successfully!");
	  showTeacher();
	}
    if(statusTxt == "error")
      alert("Error: " + xhr.status + ": " + xhr.statusText);
  });
}
function cancelTeacher() {
	$("#teachForm").html ('');
}
</script>