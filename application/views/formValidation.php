<?php $this->load->view('include/header');
	  set_time_limit(0);
	  ini_set('memory_limit', '-1');
?>
<html>
	<title>Fill-up Form</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('style.css');?>">
	<style type="text/css">
		hr {
	    display: block;
	    height: 1px;
	    border: 0;
	    border-top: 1px solid #ccc;
	    margin: 1em 0;
	    padding: 0; 
		}
	</style>
	</head>
	<body>
		<div id="loading"></div>
		<div id="outer" style="background-color:white;color:black;">
    <?php

           		$check=base_url('images/check.png');
				$blank=base_url('images/blank.png');

           			if($_SESSION['oVisited']=="yes"){
						$yes=$check;
						$no=$blank;	
					}
					else{
						$yes=$blank;
						$no=$check;
					}
					if($css['hours']==0){
						$hours='';
					}
					for($i=1;$i<=8;$i++){
						if($_SESSION['purpose'.$i] == 1){
							$css['purpose'.$i]=$check;
						}
						else
							$css['purpose'.$i]=$blank;
						if($i != 4)
							$_SESSION['assistant'.$i]!= '' ? $css['assistant'.$i]=$check : $css['assistant'.$i]=$blank;
						if($i != 6)
							$_SESSION['apply'.$i]!='' ? $css['apply'.$i]=$check : $css['apply'.$i]=$blank;
					}
					for($a=1;$a<=6;$a++){
						for($b=1;$b<=4;$b++){
							if($_SESSION['rating'.$a]==$b){
								$css['rating'.$a.$b]=$check;
							}
							else
								$css['rating'.$a.$b]=$blank;
						}
					}
					if($_SESSION['satisfied']=='yes'){
						$satisfiedyes=$check;
						$satisfiedno=$blank;
					}
					else{
						$satisfiedyes=$blank;
						$satisfiedno=$check;
					}
           	?>
           	<center><h1 style="color:green;">CSS Form Validation</h1></center>
		    <table cellspacing="15" cellpadding="15" border="0">
				<tr>
					<td>Date: <b><u><?=$_SESSION['date'];?></u></b></td>
					<td>Time: <b><u><?=$_SESSION['timezone'];?></u></b></td>
					<td>From: [<img src="<?=$yes;?>" style="width:20px;height:40%"> ]DOH</td>
					<td>From: [<img src="<?=$no;?>" style="width:20px;height:40%"> ]NON-DOH</td>
				</tr>
				<tr>
					<td>Office Visited: <b><u><?=$_SESSION['office']?></u></b></td>
					<td><p style="margin-left:40px;">Staff who rendered services: <b><u><?=$_SESSION['rendered'];?></u></b></td>
				</tr>
			</table>
			<br>
			<table border="0">
				<tr>
					<td colspan="3">1. What is the purpose of your visit/transaction?</td>
				</tr>
				<tr>
					<td></td>
					<td>[<img src="<?=$css['purpose1']?>" style="width:20px;height:40%">]Submit report/documents</td>
				</tr>
			<tr>
			<td></td>
				<td>[<img src="<?=$css['purpose2']?>" style="width:20px;height:40%">]Attend meeting</td>
			</tr>
			<tr>
				<td></td>
				<td>[<img src="<?=$css['purpose3']?>" style="width:20px;height:40%">]Inquire,request data, request documents</td>
			</tr>
			<tr>
				<td></td>
				<td>
					[<img src="<?=$css['purpose4']?>" style="width:20px;height:40%">]Seek assistant:
					<p style="margin-left:50px;">[<img src="<?=$css['assistant1']?>" style="width:20px;height:40%">]Technical</p>
					<p style="margin-left:20px;">[<img src="<?=$css['assistant2']?>" style="width:20px;height:40%">]Legal</p>
					<p style="margin-left:20px;">[<img src="<?=$css['assistant3']?>" style="width:20px;height:40%">]Medical</p>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>[<img src="<?=$css['purpose5']?>" style="width:20px;height:40%">]Interview,research</td>
			</tr>
			<tr>
				<td></td>
				<td>[<img src="<?=$css['purpose6']?>" style="width:20px;height:40%">]Follow-up documents</td>
			</tr>
			<tr>
				<td></td>
				<td>
					[<img src="<?=$css['purpose7']?>" style="width:20px;height:40%">]Apply for:
					<p style="margin-left:50px;">[<img src="<?=$css['apply1']?>" style="width:20px;height:40%">]License</p>
					<p style="margin-left:20px;">[<img src="<?=$css['apply2']?>" style="width:20px;height:40%">]Accreditation</p>
					<p style="margin-left:20px;">[<img src="<?=$css['apply3']?>" style="width:20px;height:40%">]Certification</p>
					<p style="margin-left:20px;">[<img src="<?=$css['apply4']?>" style="width:20px;height:40%">]Registration</p>
					<p style="margin-left:20px;">[<img src="<?=$css['apply5']?>" style="width:20px;height:40%">]Authentication</p>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>[<img src="<?=$css['purpose8']?>" style="width:20px;height:40%">]Others(Please specify) <b><u><?=$_SESSION['others']?></u></b></td>
			</tr>

			<tr><td></td></tr>
			<tr>
				<td>2.</td>
				<td>How long did you wait before you accomplished the purpose of your visit/transaction?
					<p style="margin-left:20px">Hours: <b><u></u><?=$_SESSION['hour']?></b>
					<p style="margin-left:20px">Minuite: <b><u></u><?=$_SESSION['minuite']?></b>
				</td>
			</tr>
			<tr><td></td></tr>
			<tr>
				<td>3.</td>
				<td>Your choice and response using the rating scale.</td>
			</tr>
			</table>
			<br>
			<table cellspacing="1" cellpadding="5" border="1">
			<tr>
				<td align="center" width="250px"><b>Statement</b></td>
				<td align="center" width="100px"><b>Strongly Agree</b></td>
				<td align="center" width="100px"><b>Agree</b></td>
				<td align="center" width="100px"><b>Disagree</b></td>
				<td align="center" width="100px"><b>Strongly Disagree</b></td>
			</tr>
			<tr>
				<td>Received the appropriate services needed</td>
				<td align="center"><img src="<?=$css['rating11']?>" style="width:20px;height:40%"></td>
				<td align="center"><img src="<?=$css['rating12']?>" style="width:20px;height:40%"></td>
				<td align="center"><img src="<?=$css['rating13']?>" style="width:20px;height:40%"></td>
				<td align="center"><img src="<?=$css['rating14']?>" style="width:20px;height:40%"></td>
			</tr>
			<tr>
				<td>Timely response was given</td>
				<td align="center"><img src="<?=$css['rating21']?>" style="width:20px;height:40%"></td>
				<td align="center"><img src="<?=$css['rating22']?>" style="width:20px;height:40%"></td>
				<td align="center"><img src="<?=$css['rating23']?>" style="width:20px;height:40%"></td>
				<td align="center"><img src="<?=$css['rating24']?>" style="width:20px;height:40%"></td>
			</tr>
			<tr>
				<td>The staff was well-informed</td>
				<td align="center"><img src="<?=$css['rating31']?>" style="width:20px;height:40%"></td>
				<td align="center"><img src="<?=$css['rating32']?>" style="width:20px;height:40%"></td>
				<td align="center"><img src="<?=$css['rating33']?>" style="width:20px;height:40%"></td>
				<td align="center"><img src="<?=$css['rating34']?>" style="width:20px;height:40%"></td>
			</tr>
			<tr>
				<td>The staff was courteous and apprachable</td>
				<td align="center"><img src="<?=$css['rating41']?>" style="width:20px;height:40%"></td>
				<td align="center"><img src="<?=$css['rating42']?>" style="width:20px;height:40%"></td>
				<td align="center"><img src="<?=$css['rating43']?>" style="width:20px;height:40%"></td>
				<td align="center"><img src="<?=$css['rating44']?>" style="width:20px;height:40%"></td>
			</tr>
			<tr>
				<td>The service rendred were just,hones and fair</td>
				<td align="center"><img src="<?=$css['rating51']?>" style="width:20px;height:40%"></td>
				<td align="center"><img src="<?=$css['rating52']?>" style="width:20px;height:40%"></td>
				<td align="center"><img src="<?=$css['rating53']?>" style="width:20px;height:40%"></td>
				<td align="center"><img src="<?=$css['rating54']?>" style="width:20px;height:40%"></td>
			</tr>
			<tr>
				<td>The workplace was clean and organized</td>
				<td align="center"><img src="<?=$css['rating61']?>" style="width:20px;height:40%"></td>
				<td align="center"><img src="<?=$css['rating62']?>" style="width:20px;height:40%"></td>
				<td align="center"><img src="<?=$css['rating63']?>" style="width:20px;height:40%"></td>
				<td align="center"><img src="<?=$css['rating64']?>" style="width:20px;height:40%"></td>
			</tr>
			</table>
			<br>
			<table cellspacing="5" cellpadding="5" border="0">
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr>
				<td>4.</td>
				<td colspan="2">As a whole, are you satisfied with the services provided/received?</td>
				<td>[<img src="<?=$satisfiedyes?>" style="width:20px;height:40%">] Yes</td>
				<td>[<img src="<?=$satisfiedno?>" style="width:20px;height:40%">] No</td>
			</tr>
			</table>
			<br>
			<table>
			<tr>
				<td width="20x">5.</td>
				<td width="188px">Comments/Suggestion/Recomendation: </td>
				<td width="400px"><b><u><?=$_SESSION['suggestion']?></u></b></td>
			</tr>
			</table>
			<br>
			<table>
			<tr>
				<td width="200px" colspan="3"><b>Contact Information(optional)</b></td>
			</tr>
			<tr>
				<td width="20px"></td>
				<td width="230">Name: <b><u><?=$_SESSION['cname']?></u></b></td>
				<td>Tel.No.: <b><u></u><?=$_SESSION['ccno']?></b></td>
			</tr>
			<tr>
				<td width="20px"></td>
				<td width="500px">Office: <b><u><?=$_SESSION['coffice']?></u></b></td>
				<td>E-mail add.: <b><u></u><?=$_SESSION['cemail']?></b></td>
			</tr>
			</table>
			<hr style="background-color:red;">
			<center>
			<form method="POST">
				<button class="btn btn-primary glyphicon glyphicon-send" style="display:inline;margin-right:30px; width:20%;" type="button" onclick="addCss();" id="submit"> SUBMIT </button>
				<button class="btn btn-danger glyphicon glyphicon-cancel" style="width:20%;" type="button" onclick="location.href='survey'"> CANCEL </button>
			</form>
		</center>
		</div>
	</body>
	<script src="<?php echo base_url('js/spin.js');?>"></script>
	<script type="text/javascript">
		var opts = {
		  lines: 13 // The number of lines to draw
		, length: 28 // The length of each line
		, width: 14 // The line thickness
		, radius: 42 // The radius of the inner circle
		, scale: 1 // Scales overall size of the spinner
		, corners: 1 // Corner roundness (0..1)
		, color: '#000' // #rgb or #rrggbb or array of colors
		, opacity: 0.25 // Opacity of the lines
		, rotate: 0 // The rotation offset
		, direction: 1 // 1: clockwise, -1: counterclockwise
		, speed: 1 // Rounds per second
		, trail: 60 // Afterglow percentage
		, fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
		, zIndex: 2e9 // The z-index (defaults to 2000000000)
		, className: 'spinner' // The CSS class to assign to the spinner
		, top: '50%' // Top position relative to parent
		, left: '50%' // Left position relative to parent
		, shadow: false // Whether to render a shadow
		, hwaccel: false // Whether to use hardware acceleration
		, position: 'absolute' // Element positioning
		}
		
		function addCss(){
			var target = document.getElementById('loading');
			var spinner = new Spinner(opts).spin(target);	
			
			var url = "ajax?action=addCss";
			$("#submit").attr("disabled",true);
			$.get(url,function(data){
			    console.log(data);
				if(data == "true"){
                    window.location="survey";
                } else {
				    alert("Please contact to IT Section");
                    Lobibox.notify('warning',{
                        msg:'Error submitting..'
                    });
                }
			});
		}
	</script>
</html>