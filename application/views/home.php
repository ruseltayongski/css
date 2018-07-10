<html>
  <title>Department Of Health</title>
  <head>
    <link rel="shorcut icon" type="images/icon" href="<?php echo base_url('images/logo.png');?>">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.css');?>">
    <script src="<?php echo base_url('bootstrap/js/bootstrap.js');?>"></script>
    <script src="<?php echo base_url('js/jquery-1.11.3.min.js');?>"></script>
    <script ></script>
  </head>
  <style>
  html, body, .container-table {
    height: 100%;
  }
  .container-table {
    display: table;
  }
  .vertical-center-row {
    display: table-cell;
    vertical-align: middle;
  }
  </style>
  <body style="background:linear-gradient(360deg,green,lavender)">
    <div style="position:absolute;"><img src="<?php echo base_url('images/css.png');?>" ></div>
    <div class="container container-table">
      <div class="row vertical-center-row">
        <div align="center">  
          <table>
            <tr>
               <td align="center"><a href="<?php echo base_url('css/survey');?>"><img src="<?php echo base_url('images/client.png');?>" class="img-circle img-responsive" width="70%" height="70%"></a></td>
               <td width="120"></td>
               <td align="center"><a href="<?php echo base_url('css/LoginPage');?>"><img src="<?php echo base_url('images/user.png');?>" class="img-circle img-responsive" width="70%" height="70%"></a></td>
               <td width="120"></td>
               <td align="center"><a href="<?php echo base_url('css/LoginPage');?>"><img src="<?php echo base_url('images/admins.png');?>" class="img-circle img-responsive" width="70%" height="70%"></a></td>
             </tr>
             <tr>
              <td align="center"><button type="button" class="btn btn-info" onclick="location.href='css/survey'" style="color:black;width:110px;"><b>Client</b></button></td>
               <td width="120"></td>
                <td align="center"><button type="button" class="btn btn-info" onclick="location.href='css/LoginPage';" style="color:black;width:110px;"><b>User</b></button></td>
               <td width="120"></td>
               <td align="center"><button type="button" class="btn btn-info" onclick="location.href='css/LoginPage';" style="color:black;width:110px;"><b>Admin</b></button></td>
             </tr>
          </table> 
        </div> 
      </div>
    </div>
  <footer class="container-fluid" style="background-color:black;" id="footer">
      <h4>Copyright &copy;&nbsp;<span id="year">2016</span>&nbsp;&nbsp;<span><a href="" style="text-decoration:none;">DEPARTMENT OF HEALTH <b>Regional Office 7</b></a></span></h4>
      <h5><b><p style="color:blue">Production:DOH7_IT</b></p></h5>
      <!-- <h6><p style="color:black;">Developer:&nbsp;Rusel Tayong</p></h6> -->
  </footer>
  </body>
</html>