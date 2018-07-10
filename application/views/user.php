<html>
	<title>User</title>
	<head>
		<link rel="shorcut icon" type="images/icon" href="<?= base_url('images/logo.png');?>">
		<link rel="stylesheet" href="<?php echo base_url('style.css');?>" />
		<link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.css');?>" />
	    <script src="<?php echo base_url('js/jquery-1.11.3.min.js');?>"></script>
	    <script src="<?php echo base_url('bootstrap/js/bootstrap.js');?>"></script>
	</head>
	<style>
		html,body,.container-table{
			height:100%;
		}
		.container-table{
			display:table;
		}
		.vertical-center-row{
			display:table-cell;
			vertical-align:middle;
		}
	</style>
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
				<div align="center" style="margin-top:8%;">
					<table>
						<tr>
							<td align="center"><a href="survey"><img src="<?php echo base_url('images/fillup.png');?>" class="img-circle img-responsive" width="60%"></a></td>
							<td width="20%"></td>
							<td align="center"><a href="reportsection"><img src="<?php echo base_url('images/consolidate.png');?>" class="img-circle img-responsive" width="60%"></a></td>
							<td width="20%"></td>
							<td align="center"><a href="reportdivision"><img src="<?php echo base_url('images/consolidate.png');?>" class="img-circle img-responsive" width="60%"></a></td>
							<td width="20%"></td>
							<td align="center"><a href="reportregional"><img src="<?php echo base_url('images/consolidate.png');?>" class="img-circle img-responsive" width="70%"></a></td>
						</tr>
						<tr>
							<td align="center"><button type="button" class="btn btn-info" style="color:black;width:100%;" onclick="location.href='survey'"><b>Fill-up CSS Form</b></button></td>
							<td width="20%"></td>
							<td align="center"><button type="button" class="btn btn-info" style="color:black;width:100%;" onclick="location.href='reportsection'"><b>Consolidate Report By Section</b></button></td>
							<td width="20%"></td>
							<td align="center"><button type="button" class="btn btn-info" style="color:black;width:100%;" onclick="location.href='reportdivision'"><b>Consolidate Report By Division</b></button></td>
							<td width="20%"></td>
							<td align="center"><button type="button" class="btn btn-info" style="color:black;width:100%;" onclick="location.href='reportregional'"><b>Consilidate Report By Region</b></button></td>
						</tr>

						<tr><td height="40px"></td></tr>

						<tr>
							<td align="center"><a href="archievedsection"><img src="<?php echo base_url('images/folders.png');?>" class="img-circle img-responsive" width="60%"></a></td>	
							<td width="20%"></td>
							<td align="center"><a href="archieveddivision"><img src="<?php echo base_url('images/folders.png');?>" class="img-circle img-responsive" width="60%"></a></td>	
							<td width="20%"></td>
							<td align="center"><a href="archievedregion"><img src="<?php echo base_url('images/folders.png');?>" class="img-circle img-responsive" width="60%"></a></td>
							<td width="20%"></td>
							<td align="center"><a href="ro7_select"><img src="<?php echo base_url('images/logo.png');?>" class="img-circle img-responsive" width="60%"></a></td>
						</tr>
						<tr>
							<td align="center"><button type="button" class="btn btn-info" style="color:black;width:100%;" onclick="location.href='archievedsection'"><b>All CSS Forms Per Section(PDF)</b></button></td>
							<td width="20%"></td>
							<td align="center"><button type="button" class="btn btn-info" style="color:black;width:100%;" onclick="location.href='archieveddivision'"><b>All CSS Forms Per Division(PDF)</b></button></td>							
							<td width="20%"></td>
							<td align="center"><button type="button" class="btn btn-info" style="color:black;width:100%;" onclick="location.href='archievedregion'"><b>All CSS Forms Per Region(PDF)</b></button></td>
							<td width="20%"></td>
							<td align="center"><button type="button" class="btn btn-info" style="color:black;width:100%;" onclick="location.href='ro7_select'"><b>DOH RO7 REPORT</b></button></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<footer class="container-fluid" style="background-color:black;">
			<h4>Copyright &copy;&nbsp; <span>2016</span>&nbsp;&nbsp;<span><a href="" style="text-decoration:none;">DEPARTMENT OF HEALTH <b>Regional Office-7</b></span></h4>
			<h5><b><p style="color:blue;">Production:DOH_IT</p></b></h5>
		</footer>
	</body>
</html>