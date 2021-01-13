<?php $this->load->view('include/header1'); 
	
	$_SESSION['consolidated']=true;
	$_SESSION['archieved']=false;

    $_SESSION['yearly']=null;
	$_SESSION['regional']=null;
	$_SESSION['div']=null;
	$_SESSION['sec']=true;
	
	if(isset($_POST['generateMonth']))
	{
		if(isset($_SESSION['superuser'])){
			$_SESSION['days']=null;
			$_SESSION['section']=$_POST['section'];
			$_SESSION['year']=$_POST['year'];
			$_SESSION['month']=$_POST['month'];
			echo "<script>window.open('generateweb')</script>";
		} else {
			$_SESSION['days']=null;
			$_SESSION['year']=$_POST['year'];
			$_SESSION['month']=$_POST['month'];
			echo "<script>window.open('generateweb')</script>";
		}
	}
	elseif(isset($_POST['generateDays']))
	{
		if(isset($_SESSION['superuser'])){
			$_SESSION['days']=true;
			$_SESSION['section']=$_POST['section'];
			$_SESSION['year']=$_POST['year'];
			$_SESSION['month']=$_POST['month'];
			$_SESSION['day']=$_POST['day'];
			$_SESSION['day1']=$_POST['day1'];
			echo "<script>window.open('generateweb')</script>";
		}
		else {
			$_SESSION['days']=true;
			$_SESSION['year']=$_POST['year'];
			$_SESSION['month']=$_POST['month'];
			$_SESSION['day']=$_POST['day'];
			$_SESSION['day1']=$_POST['day1'];
			echo "<script>window.open('generateweb')</script>";	
		}
	}
?>
<title>Consolidated</title>
</head>
	<body style="background-color:lightgreen;">
		<div class="container" style="position:absolute;"><img src="<?php echo base_url('images/css.png');?>"></div>
		<div style="position:absolute;right:20px;top:30px;">
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
		<div class="container container-table">
			<div class="row vertical-center-row">
				<div align="center">
					<div id="container" style="background:linear-gradient(160deg,green,lavender);margin-top:8%;">
					<?php if(isset($_SESSION['user'])) { ?>
					<div style="position:absolute;"><button type="button" class="btn btn-primary" onclick="location.href='user'"><p class="glyphicon glyphicon-arrow-left">BACK</p></button></div>
					<?php } else{ ?>
					<div style="position:absolute;"><button type="button" class="btn btn-primary" onclick="location.href='admin'"><p class="glyphicon glyphicon-arrow-left">BACK</p></button></div>
					<?php } ?> 
						<img src="<?php echo base_url('images/header.png');?>" alt="1" width="40%" height="60"></img>
						<form method="POST">
							<div class="form-group">
								<h3></h3>
								<?php 
								if(isset($_SESSION['superuser'])) {
									echo "<select class='form-control' id='section' name='section' style='width:50%;margin-top:20px;' required>";
										echo "<option value=''>"."Select Section"."</option>";
										foreach($_SESSION['wew'] as $row){
								?>
										<option value="<?php echo $row['section']?>"><?php echo $row['section'];?></option>	
								<?php 
										}
									echo "</select>"; 
								}
								?>
								<select class="form-control" id="year" name="year" style="width:40%;margin-top:20px;" required>
									<option value="">Select Year</option>
									<?php
										for($i = date('Y'); $i >= 2014 ; $i--){
											echo '<option value="'.$i.'">'.$i.'</option>';
										}
									?>
								</select>
								<select class="form-control" id="month" name="month" style="width:40%;margin-top:20px;" onchange="dayClear();" required>
									<option value="">Select Month</option>
									<?php 
										$monthA=array("January","Febuary","March","April","May","June","July","August","September","October","November","December");
										for($i=0;$i<count($monthA);$i++)
											echo "<option value=".$monthA[$i].">".$monthA[$i]."</option>";
									?>
								</select><br>
								<p style="display:inline;"> Select Days(optional) </p>
								<input id="day" name = "day" type="text" size = "2" maxlength="2" style="border-radius:5px;color:black;height:30px;" onkeypress='return event.charCode <= 57' onkeyup="dayValid();" required>
								<p style="display:inline;"> Up to: </p>
								<input id="day1" name = "day1" type="text" size = "2" maxlength="2" style="border-radius:5px;color:black;height:30px;" onkeypress='return event.charCode <= 57' onkeyup="dayValid();" required><br>
								<p style="color:red;position:absolute;margin-top:-30px;right:440px;" id="DayError"></p>
								<button type="submit" class="btn btn-info" style="margin-top:20px;margin-bottom:10px;" name="generateDays" onclick="daysRequired();">Generate Report By Days In Section</button>
								<button type="submit" class="btn btn-primary" style="margin-top:20px;margin-bottom:10px;" name="generateMonth" onclick="monthRequired();">Generate Report By Month In Section</button><hr>
								 
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php $this->load->view('include/footer');?>
	</body>
</html>
