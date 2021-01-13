<?php $this->load->view('include/header1');

if(isset($_POST['generate_report']))
{
    $_SESSION['consolidated']=true;
    $_SESSION['year'] = $_POST['year'];
    $_SESSION['css_report']= $this->database->css_report($_SESSION['year']);
    echo "<script>window.open('ro7_report')</script>";
}
?>
<title>DOH RO7 CSS REPORT</title>
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
            <div id="container" style="background:linear-gradient(160deg,green,lavender);margin-top:12%;">
                <?php if(isset($_SESSION['user'])) { ?>
                    <div style="position:absolute;"><button type="button" class="btn btn-primary" onclick="location.href='user'"><p class="glyphicon glyphicon-arrow-left">BACK</p></button></div>
                <?php } else{ ?>
                    <div style="position:absolute;"><button type="button" class="btn btn-primary" onclick="location.href='admin'"><p class="glyphicon glyphicon-arrow-left">BACK</p></button></div>
                <?php } ?>
                <img src="<?php echo base_url('images/header.png');?>" alt="1" width="40%" height="60">
                <form method="POST">
                    <h3>DOH RO7 CSS REPORT</h3>
                    <div class="form-group">
                        <select class="form-control" id="year" name="year" style="width:40%;margin-top:20px;" onchange="dayClear();" required>
                            <option value="">Select Year</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                        </select>
                        <button type="submit" class="btn btn-danger" style="margin-top:20px;margin-bottom:10px;" name="generate_report" onclick="monthRequired();"><i class="glyphicon glyphicon-file"></i> Generate Report</button>
                    </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('include/footer');?>
</body>
</html>