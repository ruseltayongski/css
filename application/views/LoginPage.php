<html>
	<title>DEPARTMENT OF HEALTH</title>
  <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.css');?>" />
  <script src="<?php echo base_url('js/jquery-1.11.3.min.js');?>"></script>
  <script src="<?php echo base_url('bootstrap/js/bootstrap.js');?>"></script>
  <script src="<?php echo base_url('js/tayong.js');?>"></script>
  <link rel="shortcut icon" type="image/ico" href="<?php echo base_url('images/logo.png');?>">
  <style>
    body{
      background: #bbb;
    }
    .container{
	  mmargin: 0 auto;
    background-color: #ccc;
    margin-top:100px;
    width: 600px;
	  height: fixed;
    }
  </style>
  <head><title>Login</title>
	</head>
	<body style="background:-moz-linear-gradient(360deg, green, lavender);background:-webkit-linear-gradient(360deg, green, lavender);">
       <a href="<?php echo base_url('css');?>"><img src="<?php echo base_url('images/css.png');?>" alt="1" width="120%" height="100"></a>
    </div>
    <br>
    <br>
	<center>
    <div class="container" style="background:linear-gradient(180deg, green, lavender)">
          <!-- login body-->
			<img src="<?php echo base_url('images/header.png');?>" alt="1" width="40%" height="60">
              <form method="post" action="<?php echo base_url('css/LoginAccess');?>">
				          <br><br>
                     <input style="font-size:17px;width:40%;" type="text" name="username" placeholder="Username" required><br><br>
                     <input style="font-size:17px;width:40%;" type="password" name="password" placeholder="Password" required>
				          <br><br>
                  <div class="form-group-has-feedback">
                      <button style="font-size:17px;width:40%;" class="btn btn-info" type="submit" name="login"><b>Log In</b></button>
                  </div>
              </form>
			  <div class="form-group-has-feedback">
			   <a href="register">Don't have an account?</a>
			   </div>
         <?php
          if(isset($_SESSION['stat']))
          {
            echo "<br><div class='alert alert-warning'>";
            echo "<strong>Message!</strong> Your account has been registered into our database,however it needs approval. Please contact the administrator. Thank you.";
            echo "</div>";
            session_regenerate_id();
            session_destroy();
          }
          elseif(isset($_SESSION['error']))
          {
              echo "<div class='alert alert-danger'>".
                  "<strong>Sorry!</strong> Account don't exist".
                  "</div>";
              session_regenerate_id();
              session_destroy();
          }
        ?><br>
     </div>
     </center>
  </body>
</html>