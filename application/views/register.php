<?php $this->load->view('include/header1'); 
 $message=$this->database->section();
?>
<title>Registration Form</title>
<style type="text/css">
	::-webkit-input-placeholder { /* WebKit browsers */
    text-transform: none;
	}
	:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
    text-transform: none;
	}
	::-moz-placeholder { /* Mozilla Firefox 19+ */
    text-transform: none;
	}
	:-ms-input-placeholder { /* Internet Explorer 10+ */
    text-transform: none;
	}
</style>
</head>
	<body style="background:linear-gradient(360deg,green,lavender)">
		<div class="container" style="position:absolute;"><img src="<?php echo base_url('images/css.png');?>"></div>
		<div class="container container-table">
			<div class="row vertical-center-row">
				<div align="center" style="margin-top:10%;">
					<div id="container" style="background:linear-gradient(160deg,green,lavender);">
						<div style="position:absolute;"><button type="button" class="btn btn-primary" onclick="location.href='LoginPage'"><p class="glyphicon glyphicon-arrow-left">BACK</p></button></div>
						<img src="<?php echo base_url('images/header.png');?>" alt="1" width="40%" height="60"></img>
						<form method="POST" action="<?php echo base_url('css/registerSave');?>">
						    <div class="form-group">
						        <input type="text" class="form-control" name="fname" placeholder="Firstname" style="width:60%;margin-top:10px;" required>
						       	<input type="text" class="form-control" name="mname" placeholder="Middlename" size="1" maxlength="1" style="width:20%;margin-top:10px;margin-right:40%;text-transform:uppercase;" required>
						        <input type="text" class="form-control" name="lname" placeholder="Lastname" style="width:60%;margin-top:10px;" required>
						        <select class="form-control" name="sec" style="width:60%;margin-top:10px;" required>
						          <?php
						            echo "<option value='0'>Select Department</option>";
						            foreach($message as $row){
						          ?>
						              <option value="<?php echo $row['section']?>"><?php echo $row['section']?></option>
						          <?php
						            }
						          ?>
						        </select>
						        <input type="text" class="form-control" name="pos" placeholder="Position" style="width:60%;margin-top:10px;" required>
						        <input type="text" class="form-control" name="uname" placeholder="Username" style="width:60%;margin-top:10px;" required>
						        <input type="password" class="form-control" name="pword" placeholder="Password" style="width:60%;margin-top:10px;" required>        
						      	<center><button class="btn btn-success" type="submit" name="register" style="margin-top:10px;margin-bottom:10px;"><b>Register</b></button></center>
						    </div>
					 	</form>
					</div>
				</div>
			</div>
		</div>
		<?php $this->load->view('include/footer');?>
	</body>
</html>