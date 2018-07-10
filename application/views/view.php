<?php $this->load->view('include/header1'); ?>
<title>Consolidated</title>
</head>
	<body style="background:linear-gradient(360deg,green,lavender)">
		<div class="container" style="position:absolute;"><!-- <img src="<?php echo base_url('images/css.png');?>"> --></div>
		<div style="position:absolute;right:50px;top:30px;">
			<!-- <div class="logout btn-group">
	            <button style="height:34px;" type="button" class="btn btn-primary"><p class="glyphicon glyphicon-user">Welcome, <?php echo $_SESSION['prepname'];?></p></button>
	            <button style="height:34px;" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
	            	<span class="caret"></span>
	            </button>
	            <ul class="dropdown-menu" role="menu">
	            	<li><a class="glyphicon glyphicon-off" href="<?php echo base_url('css/logout');?>">LogOut</a></li>
	            </ul>
	        </div> -->
   		</div>
		<div class="container container-table">
			<div class="row vertical-center-row">
				<button class="btn btn-warning" onclick="location.href='admin';" style="margin-bottom:25px;margin-top:20px;height:35px;"><i class="glyphicon glyphicon-arrow-left"> BACK </i></button>
				<table class="table" cellpadding="20">	
					<tr>
						<th>Id</th>
						<th>Firstname</th>
						<th>Middlename</th>
						<th>Lastname</th>
						<th>Department</th>
						<th>Position</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
					
					<?php
						foreach($_SESSION['userappr'] as $row)
						{
					?>
							<form action='<?php echo base_url('css/update'); ?>' method='POST'>
					<?php
							if($row['usertype'] != 1)
							{
							echo "<tr>";
								echo "<input type='hidden' name='id' value=".$row['userid'].">";
								echo "<td>".$row['userid']."</td>";
								echo "<td>".$row['userfname']."</td>";
								echo "<td>".$row['usermname']."</td>";
								echo "<td>".$row['userlname']."</td>";
								echo "<td>".$row['userdept']."</td>";
								echo "<td>".$row['userposition']."</td>";
								if($row['userstat'] == 1)
									echo "<th style='color:blue;'> Approved</th>";
								else
									echo "<th style='color:red;'>Disapproved</th>";
								if($row['userstat'] == 1)
									echo "<td><button type='submit' name='action' style='width:100px;height:45px;border-radius:10px;background-color:yellowgreen;'>Disapprove</button></td>";
								else
									echo "<td><button type='submit' name='action' style='width:100px;height:45px;border-radius:10px;background-color:red;'>Approve</button></td>";		
							echo "</tr>";
							}
							echo "</form>";
						}
					?>
				</table>
			</div>
		</div>
		<?php $this->load->view('include/footer');?>
	</body>
</html>
