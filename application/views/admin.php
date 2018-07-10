<?php $this->load->view('include/header1'); ?>
<title>Admin</title>
</head>
	<body style="background:linear-gradient(360deg,green,lavender)">
		<div class="container" style="position:absolute;"><img src="<?php echo base_url('images/css.png');?>"></div>
		<div style="position:absolute;right:50px;top:30px;">
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
				<div align="center" style="margin-top:8%;">
					<table border="0">
						<tr>
							<td align="center"><a href="view"><img src="<?php echo base_url('images/approver.png'); ?>" class="img-circle img-responsive" width="90%" height="70%"></a></td>
							<td width="20%"></td>
							<td align="center"><a href="ro7_select"><img src="<?php echo base_url('images/logo.png');?>" class="img-circle img-responsive"  width="80%" height="80%"></a></td>
							<td width="20%"></td>
							<td align="center"><a href="reportsection"><img src="<?php echo base_url('images/consolidate.png');?>" class="img-circle img-responsive" width="60%" height="70%"></a></td>
							<td width="20%"></td>
							<td align="center"><a href="reportdivision"><img src="<?php echo base_url('images/consolidate.png');?>" class="img-circle img-responsive" width="60%" height="70%"></a></td>
							<td width="20%"></td>
							<td align="center"><a href="reportregional"><img src="<?php echo base_url('images/consolidate.png');?>" class="img-circle img-responsive" width="60%" height="70%"></a></td>
						</tr>
						<tr>
							<td align="center"><button type="button" class="btn btn-info" style="color:black;width:100%;" onclick="location.href='view'"><b>Approved User Account</b></button></td>
							<td width="20%"></td>
							<td align="center"><button type="button" class="btn btn-info" style="color:black;width:100%;" onclick="location.href='ro7_select'"><b>DOH RO7 REPORT</b></button></td>
							<td width="20%"></td>
							<td align="center"><button type="button" class="btn btn-info" style="color:black;width:100%;" onclick="location.href='reportsection'"><b>Consolidated Report By Section</b></button></td>
							<td width="20%"></td>
							<td align="center"><button type="button" class="btn btn-info" style="color:black;width:100%;" onclick="location.href='reportsection'"><b>Consolidated Report By Division</b></button></td>
							<td width="20%"></td>
							<td align="center"><button type="button" class="btn btn-info" style="color:black;width:100%;" onclick="location.href='reportregional'"><b>Consolidated Report By Region</b></button></td>
						</tr>

						<tr><td height="40px"></td></tr>

						<tr>
							<td align="center"><a href="userlist"><img src="<?php echo base_url('images/userlist.png');?>" class="img-circle img-responsive" width="70%" height="70%"></a></td>
							<td width="20%"></td>
							<td align="center"><a href="archievedsection"><img src="<?php echo base_url('images/folders.png');?>" class="img-circle img-responsive" width="70%" height="80%"></a></td>
							<td width="20%"></td>
							<td align="center"><a href="archieveddivision"><img src="<?php echo base_url('images/folders.png');?>" class="img-circle img-responsive" width="70%" height="70%"></a></td>
							<td width="20%"></td>
							<td align="center"><a href="archievedregion"><img src="<?php echo base_url('images/folders.png');?>" class="img-circle img-responsive" width="70%" height="70%"></a></td>
							<td width="20%"></td>
							<td align="center"><a href="archievednegative"><img src="<?php echo base_url('images/dislike.png');?>" class="img-circle img-responsive" width="50%" height="60%"></a></td>
						</tr>
						<tr>
							<td align="center"><button type="button" class="btn btn-info" style="color:black;width:100%;" onclick="location.href='userlist'"><b>User Account List</b></button></td>
							<td width="20%"></td>
							<td align="center"><button type="button" class="btn btn-info" style="color:black;width:100%;" onclick="location.href='archievedsection'"><b>All CSS Forms in Section</b></button></td>
							<td width="20%"></td>
							<td align="center"><button type="button" class="btn btn-info" style="color:black;width:100%;" onclick="location.href='archieveddivision'"><b>All CSS Forms in Division</b></button></td>
							<td width="20%"></td>
							<td align="center"><button type="button" class="btn btn-info" style="color:black;width:100%;" onclick="location.href='archievedregion'"><b>All CSS Forms in Region</b></button></td>
							<td width="20%"></td>
							<td align="center"><button type="button" class="btn btn-info" style="color:black;width:100%;" onclick="location.href='archievednegative'"><b>All CSS Forms in Negative</b></button></td>
						</tr>

						<tr><td height="40px"></td></tr>

						<tr>
							<td align="center"><a href="commentFilter"><img src="<?php echo base_url('images/comment.png');?>" class="img-circle img-responsive" width="70%" height="70%"></a></td>
							<td width="20%"></td>
							<td align="center"><a href="purposeFilter"><img src="<?php echo base_url('images/purpose.png');?>" class="img-circle img-responsive" width="70%" height="80%"></a></td>
							<td width="20%"></td>
							<td align="center"><a href="staff_filter"><img src="<?php echo base_url('images/staff.png');?>" class="img-circle img-responsive" width="60%" height="70%"></a></td>
							<td width="20%"></td>
							<td align="center"><img src="<?php echo base_url('images/folders.png');?>" class="img-circle img-responsive" width="70%" height="70%"></td>
							<td width="20%"></td>
							<td align="center"><img src="<?php echo base_url('images/folders.png');?>" class="img-circle img-responsive" width="70%" height="70%"></td>
						</tr>
						<tr>
							<td align="center"><button type="button" class="btn btn-info" style="color:black;width:100%;" onclick="location.href='commentFilter'"><b>Comment/Suggestion</b></button></td>
							<td width="20%"></td>
							<td align="center"><button type="button" class="btn btn-info" style="color:black;width:100%;" onclick="location.href='purposeFilter'"><b>Purpose/Others</b></button></td>
							<td width="20%"></td>
							<td align="center"><button type="button" class="btn btn-info" style="color:black;width:100%;" onclick="location.href='staff_filter'"><b>Staff who rendered</b></button></td>
							<td width="20%"></td>
							<td align="center"><button type="button" class="btn btn-info" style="color:black;width:100%;" onclick="location.href='archievedregion'" disabled><b>Reserve Slot</b></button></td>
							<td width="20%"></td>
							<td align="center"><button type="button" class="btn btn-info" style="color:black;width:100%;" onclick="location.href='archievednegative'" disabled><b>Reserve Slot</b></button></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<?php $this->load->view('include/footer');?>
	</body>
</html>