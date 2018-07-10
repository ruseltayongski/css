<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login Page</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
    <link rel="shorcut icon" type="images/icon" href="<?php echo base_url();?>logo.png">
    <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.css">
    <script src="<?php echo base_url();?>bootstrap/js/bootstrap.js/"></script>
    <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>
    <script ></script>
</head>
<body>

<div id="container">
	<h1>Login</h1>
	<?php
	$is_logged_in=$this->session->userdata('is_logged_in');
	if(!$is_logged_in){
	?>
		<form action="<?php echo base_url();?>main/validate_credentials" method="POST">
		 <div id="container">
			Username:<input type="text" name="email" required><br><br>
			Password:<input type="text" name="password" required><br><br>
			<button class='btn btn-success' type='submit' name='login'> Login </button>
		 </div>
		 <footer>Copyright by: Rusel T. Tayong</footer>
		</form>
	<?php
	}
	else
		redirect('main/members');
	?>
</div>

</body>
</html>