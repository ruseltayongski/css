<?php $this->load->view('include/header1');

$_SESSION['consolidated']=true;
$_SESSION['archieved']=false;

$_SESSION['year']=true;
$_SESSION['regional']=null;
$_SESSION['div']=null;
$_SESSION['sec']=null;

if(isset($_POST['year']))
{
    $_SESSION['year']=$_POST['year'];
    echo "<script>window.open('generateweb')</script>";
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
            <div id="container" style="background:linear-gradient(160deg,green,lavender);margin-top:12%;">
                <?php if(isset($_SESSION['user'])) { ?>
                    <div style="position:absolute;"><button type="button" class="btn btn-primary" onclick="location.href='user'"><p class="glyphicon glyphicon-arrow-left">BACK</p></button></div>
                <?php } else{ ?>
                    <div style="position:absolute;"><button type="button" class="btn btn-primary" onclick="location.href='admin'"><p class="glyphicon glyphicon-arrow-left">BACK</p></button></div>
                <?php } ?>
                <img src="<?php echo base_url('images/header.png');?>" alt="1" width="40%" height="60"></img>
                <form method="POST">
                    <div class="form-group">
                        <h3>Yearly</h3>
                        <select class="form-control" id="year" name="year" style="width:40%;margin-top:20px;" required>
                            <option value="">Select Year</option>
                            <?php
                            for($i = date('Y'); $i >= 2014 ; $i--){
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                            ?>
                        </select><br>
                        <button type="submit" class="btn btn-primary" style="margin-top:20px;margin-bottom:10px;background:green;" >Generate Report By Month In Region</button><hr>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('include/footer');?>
</body>
</html>
