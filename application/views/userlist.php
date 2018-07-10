<html>
<head>
	<title>List</title>
	<link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.css');?>" />
	<script src="<?php echo base_url('js/jquery-1.11.3.min.js');?>"></script>
	<script src="<?php echo base_url('bootstrap/js/bootstrap.js');?>"></script>
	<script src="<?php echo base_url('js/tayong.js');?>"></script>
	<link rel="shortcut icon" type="image/icon" href="<?php echo base_url('images/logo.png');?>">
	<style>
		.hidden {display:none;}
		/*.modal-dialog {width: 900px;}*/
		.modal-content {width: 900px;margin-left:-150px;}
	</style>
</head>
<body style="background:linear-gradient(360deg, green, lavender)">
<div style="position:absolute;right:10px;top:30px;">
  <div class="logout btn-group">
    <button style="height:34px;" type="button" class="btn btn-primary"><p class="glyphicon glyphicon-user">Welcome, <?php echo $_SESSION['prepname'];?></p></button>
    <button style="height:34px;" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu">
    <li><a class="glyphicon glyphicon-off" href="<?php echo base_url('css/logout');?>">LogOut</a></li>
    </ul>
    </div>
  </div>
<div class="container" style="background:linear-gradient(360deg, green, lavender);margin-left:1%;">
	<div>
		<h1>User List</h1>
	</div>
	<!--DEPARTMENTLIST-->
	<div class="modal fade" id="departmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="exampleModalLabel">Department List</h4>
		  </div>
		  <div class="modal-body">
			  <!--DEPARTMENT LIST TABLE-->
			  <table border="0" class="table table-bordered">
			    <thead>
				   <tr>
					<th width="40"></th>
					<th>Department Section</th>
					<th>Department Division</th>
					<th>Department Status</th>
				  </tr>
			   </thead>
			    <tbody id="deptlist">
				  <tr><td colspan="4">loading...</td></tr>
			   </tbody>
		      </table>
              <!--END OF DEPARTMENT TABLE-->
		  </div>
		  
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		</div>
	  </div>
	</div>
	<!--END OF DEPARTMENTLIST-->

	<!--ADD DEPARTMENT-->
	<div class="modal fade" id="AddDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hiwdden="true">&times;</span></button>
			<h4 class="modal-title" id="exampleModalLabel">Department List</h4>
		  </div>
		  <div class="modal-body">
			  <!--DEPARTMENT ADD INPUT-->
			<form>
              <div class="form-group">
				<label class="control-label" for="Dept-section">Department Section:</label>       
                <input class="form-control" type="text" value="" id="deptsection" name="deptsection" placeholder="Department Section">
			  </div>
			  <div class="form-group">
				<label for="recipient-name" class="control-label">Department Division:</label>
				<select class="form-control" id="deptdivision" name="deptdivision">
					<option value="">Select Division</option>
                    <option value="MSD">MSD</option>
                    <option value="LHSD">LHSD</option>
                    <option value="RLED">RLED</option>
                    <option value="RD-ARD">RD-ARD</option>
                    <option value="FDA">FDA</option>
				</select>
			  </div>
			  <!--END OF DEPARTMENT ADD INPUT-->
			<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary" id="closeDepartmentModal">Add Department</button>
		  </div>
		  </form>
		  </div>
		</div>
	  </div>
	</div>
	<!--END OF ADD DEPARTMENT-->

	<!--ADD USER-->
	<div class="modal fade" id="AddUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="exampleModalLabel">Add User</h4>
		  </div>
		  <div class="modal-body">
			  <!--USER ADD INPUT-->
			  <form>
		      <div class="form-group">
		        <label class="control-label" for="Dept-section">Firstname:</label>
		        <input type="text" class="form-control" id="fname" name="fname" placeholder="Firstname">
		      </div>

		      <div class="form-group">
		        <label class="control-label" for="Dept-section">Middlename:</label>
		        <input type="text" class="form-control" id="mname" name="mname" placeholder="Middlename">
		      </div>

		      <div class="form-group">
		        <label class="control-label" for="Dept-section">Lastname:</label>
		        <input type="text" class="form-control" id="lname" name="lname" placeholder="Lastname">
		      </div>

		      <div class="form-group">
		      	<label class="control-label" for="Dept-section">Department:</label>
		        <select class="form-control" id="dept" name="dept">
		            <option value="">Select Department</option>
		            <?php
		              foreach($_SESSION['department'] as $row){
		            ?>
		                <option value="<?php echo $row['section']?>"><?php echo $row['section']?></option>
		            <?php
		              }
		            ?>
		        </select>
		      </div>

		      <div class="form-group">
		        <label class="control-label" for="Dept-section">Position:</label>
		        <input type="text" class="form-control" id="pos" name="pos" placeholder="Position">
		      </div>

		      <div class="form-group">
		        <label class="control-label" for="Dept-section">Username:</label>
		        <input type="text" class="form-control" id="uname" name="uname" placeholder="Username">
		      </div>

		      <div class="form-group">
		        <label class="control-label" for="Dept-section">Password:</label>
		        <input type="password" class="form-control" id="pword" name="pword" placeholder="Password">
		      </div>
              <!--END OF USER ADD INPUT-->
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary" id="closeUserModal" onclick="addUser();">Add User</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<!--END OF ADD POSITION-->	
	<div class="col-lg-12">
      <div class="btn-group btn-group-lg;">
		  <button class="btn btn-primary" data-toggle="modal" data-target="#departmentModal" >
		  <i class="glyphicon glyphicon-user"></i>List of Section</button>
	  </div>
	  <div class="btn-group btn-group-lg;">	  
		  <button class="btn btn-primary" data-toggle="modal" data-target="#AddDepartmentModal" >
		  <i class="glyphicon glyphicon-plus"></i>Add Section</button>
	   </div>
	   <div class="btn-group btn-group-lg;">	  
		  <button class="btn btn-info" data-toggle="modal" data-target="#AddUserModal" >
		  <i class="glyphicon glyphicon-plus"></i>Add User</button>
	   </div>
	   <div class="btn-group btn-group-lg;">	  
		  <button class="btn btn-warning" data-toggle="modal" id="back">
		  <i class="glyphicon glyphicon-arrow-left"></i>Back</button>
	   </div>

	</div>
		<table border="0" class="table table-bordered">
			<thead>
				<tr>
					<th width="40"></th>
					<th>Id</th>
					<th>Firstname</th>
					<th>Middlename</th>
					<th>Lastname</th>
					<th>Section</th>
					<th>Position</th>
					<th>Username</th>
					<th>Password</th>
					<th>UserLevel</th>
				</tr>
			</thead>
			<tbody id="contactList">
				<tr><td colspan="10">loading...</td></tr>
			</tbody>
		</table>
</div>

<script type="text/javascript">

function posadd(){
	$("#closePositionModal").attr("data-dismiss","");
			if($("#posname").val()=='')
				$("#posname").attr("required","true");
			else{
				addNewPosition();
				$("#posname").val('');
				$("#closePositionModal").attr("data-dismiss","modal");
			}
}

$(document).ready(function(){
	$("#closeDepartmentModal").click(function(){
	  $("#closeDepartmentModal").attr("data-dismiss","");
	  if($("#deptsection").val()=="" || $("#deptdivision").val()==''){
			$("#deptsection").attr("required","true");
		 	$("#deptdivision").attr("required","true");
	  }
	  else{
	  	addNewDepartment();
	  	$("#deptsection").val('');
	  	$("#deptdivision").val('');
	  	$("#closeDepartmentModal").attr("data-dismiss","modal");
	  }
	});
});

function addUser(){
	$("#closeUserModal").attr("data-dismiss","");
	if($("#fname").val()=="" || $("#mname").val()=="" || $("#lname").val()=="" || $("#dept").val()=="" 
		|| $("#pos").val()=="" || $("#uname").val()=="" || $("#pword").val()=="")
	{
	    $("#fname").attr("required","true");
		$("#mname").attr("required","true");
		$("#lname").attr("required","true");
		$("#dept").attr("required","true");
		$("#pos").attr("required","true");
		$("#uname").attr("required","true");
		$("#pword").attr("required","true");
	}
	else
	{
		addNewUser();
		$("#fname").val('');
		$("#mname").val('');
		$("#lname").val('');
		$("#dept").val('');
		$("#pos").val('');
		$("#uname").val('');
		$("#pword").val('');
		$("#closeUserModal").attr("data-dismiss","modal");
	}
}
</script>
</body>
</html>