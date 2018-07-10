<?php $this->load->view('include/header1');

	$_SESSION['consolidated']=true;
	$_SESSION['archieved']=null;

	$_SESSION['negative']=null;
	$_SESSION['regional']=null;
	$_SESSION['div']=true;
	$_SESSION['sec']=null;
	
	if(isset($_POST['consolidate'])){
		if(isset($_SESSION['superuser'])){
			$_SESSION['division']=$_POST['division'];
			$_SESSION['year']=$_POST['year'];
			$_SESSION['month']=$_POST['month'];
			echo "<script>window.open('formWeb')</script>";
		}
		else{
			$division=$this->database->deptDivision($_SESSION['section']);
			$_SESSION['division']=$division['division'];
			$_SESSION['year']=$_POST['year'];
			$_SESSION['month']=$_POST['month'];
			echo "<script>window.open('formWeb')</script>";
		}
	}

?>
<title>Archieved Division</title>
</head>
	<body style="background:linear-gradient(360deg,green,lavender)">
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
					<div id="container" style="background:linear-gradient(160deg,green,lavender);">
					<?php if(isset($_SESSION['user'])) { ?>
					<div style="position:absolute;"><button type="button" class="btn btn-primary" onclick="location.href='user'"><p class="glyphicon glyphicon-arrow-left">BACK</p></button></div>
					<?php } else{ ?>
					<div style="position:absolute;"><button type="button" class="btn btn-primary" onclick="location.href='admin'"><p class="glyphicon glyphicon-arrow-left">BACK</p></button></div>
					<?php } ?>
						<img src="<?php echo base_url('images/header.png');?>" alt="1" width="40%" height="60"></img>
						<form method="POST">
							<div class="form-group">
								<?php if(isset($_SESSION['superuser'])): ?>
									<select class="form-control" name="division" style="width:40%;margin-top:20px;" required>
										<option value="">Select Division</option>
										<option value="MSD">MSD</option>
										<option value="LHSD">LHSD</option>
										<option value="RLED">RLED</option>
										<option value="RD-ARD">RD-ARD</option>
                                        <option value="FDA">FDA</option>
									</select>
								<?php  endif ?>
								<select class="form-control" name="year" style="width:40%;margin-top:20px;" required>
									<option value="">Select Year</option>
									<?php
										for($i = date('Y'); $i >= 2014 ; $i--){
											echo '<option value="'.$i.'">'.$i.'</option>';
										}
									?>
								</select>
								<select class="form-control" name="month" style="width:40%;margin-top:20px;" required>
									<option value="">Select Month</option>
									<?php 
										$monthA=array("January","Febuary","March","April","May","June","July","August","September","October","November","December");
										for($i=0;$i<count($monthA);$i++)
											echo "<option value=".$monthA[$i].">".$monthA[$i]."</option>";
									?>
								</select>
								<button type="submit" class="btn btn-danger" style="margin-top:20px;margin-bottom:20px;" name="consolidate">Generate Archieved Per Division(PDF)</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php $this->load->view('include/footer');?>
	</body>
</html>