<?php
$this->load->view('include/header');
	if(isset($_POST['generate'])){
		$cssstat=$_POST['cssstat'];
			$_SESSION['oVisited']=$_POST['cssstat'];
			if(isset($_POST['section'])){
				$dep=$this->database->deptdivision($_POST['section']);
				$section=$dep['section'];
				$division=$dep['division'];
			}
			$_SESSION['office']=$section;
			$_SESSION['division']=$division;
			$rendered=$_POST['rendered'];
			$_SESSION['rendered']=$rendered;
			!empty($_POST['purpose1']) ? $purpose1=$_POST['purpose1'] : $purpose1=0;
			!empty($_POST['purpose2']) ? $purpose2=$_POST['purpose2'] : $purpose2=0;
			!empty($_POST['purpose3']) ? $purpose3=$_POST['purpose3'] : $purpose3=0;
			!empty($_POST['purpose4']) ? $purpose4=$_POST['purpose4'] : $purpose4=0;
			!empty($_POST['purpose5']) ? $purpose5=$_POST['purpose5'] : $purpose5=0;
			!empty($_POST['purpose6']) ? $purpose6=$_POST['purpose6'] : $purpose6=0;
			!empty($_POST['purpose7']) ? $purpose7=$_POST['purpose7'] : $purpose7=0;
			!empty($_POST['purpose8']) ? $purpose8=$_POST['purpose8'] : $purpose8=0;
			$_SESSION['purpose1']=$purpose1; $_SESSION['purpose2']=$purpose2; $_SESSION['purpose3']=$purpose3;
			$_SESSION['purpose4']=$purpose4; $_SESSION['purpose5']=$purpose5; $_SESSION['purpose6']=$purpose6;
			$_SESSION['purpose7']=$purpose7; $_SESSION['purpose8']=$purpose8;

			isset($_POST['assistant1']) ? $assistant1=$_POST['assistant1'] : $assistant1='';
			isset($_POST['assistant2']) ? $assistant2=$_POST['assistant2'] : $assistant2='';
			isset($_POST['assistant3']) ? $assistant3=$_POST['assistant3'] : $assistant3='';
			isset($_POST['apply1']) ? $apply1=$_POST['apply1'] : $apply1='';
			isset($_POST['apply2']) ? $apply2=$_POST['apply2'] : $apply2='';
			isset($_POST['apply3']) ? $apply3=$_POST['apply3'] : $apply3='';
			isset($_POST['apply4']) ? $apply4=$_POST['apply4'] : $apply4='';
			isset($_POST['apply5']) ? $apply5=$_POST['apply5'] : $apply5='';
			isset($_POST['others']) ? $others=$_POST['others'] : $others='';
			$_SESSION['assistant1']=$assistant1;
			$_SESSION['assistant2']=$assistant2;
			$_SESSION['assistant3']=$assistant3;
			$_SESSION['apply1']=$apply1;
			$_SESSION['apply2']=$apply2;
			$_SESSION['apply3']=$apply3;
			$_SESSION['apply4']=$apply4;
			$_SESSION['apply5']=$apply5;
			$_SESSION['others']=$others;

            !empty($_POST['hours']) ? $hours=$_POST['hours'] : $hours=0;
            !empty($_POST['minuite']) ? $minuite=$_POST['minuite'] : $minuite=0;
			$_SESSION['hours']=$hours;
			$_SESSION['minuite']=$minuite;


            !empty($_POST['rating1']) ? $rating1=$_POST['rating1'] : $rating1=0;
            !empty($_POST['rating2']) ? $rating2=$_POST['rating2'] : $rating2=0;
            !empty($_POST['rating3']) ? $rating3=$_POST['rating3'] : $rating3=0;
            !empty($_POST['rating4']) ? $rating4=$_POST['rating4'] : $rating4=0;
            !empty($_POST['rating5']) ? $rating5=$_POST['rating5'] : $rating5=0;
            !empty($_POST['rating6']) ? $rating6=$_POST['rating6'] : $rating6=0;

			$_SESSION['rating1']=$rating1;
			$_SESSION['rating2']=$rating2;
			$_SESSION['rating3']=$rating3;
			$_SESSION['rating4']=$rating4;
			$_SESSION['rating5']=$rating5;
			$_SESSION['rating6']=$rating6;

			$satisfied=$_POST['satisfied']; $suggestion=$_POST['suggestion']; $cname=$_POST['cname'];
			$coffice=$_POST['coffice']; $ccno=$_POST['ccno']; $cemail=$_POST['cemail']; $stat=1;
			$_SESSION['satisfied']=$satisfied; $_SESSION['suggestion']=$suggestion; $_SESSION['cname']=$cname;
			$_SESSION['coffice']=$coffice; $_SESSION['ccno']=$ccno; $_SESSION['cemail']=$cemail;


			if(isset($_SESSION['user'])){
				$year=$_POST['year'];
				$monthA=array("January","Febuary","March","April","May","June","July","August","September","October","November","December");
	      		$month=$monthA[$_POST['month']];
				$day=$_POST['day'];
			}
			else{
				$year=date('y');
				$yearS=15;
				$count=0;
				for($j=2015;$j<=7000;$j++){
					$yearA[]=$j;
					if($year==$yearS){
						break;
					}
					$count++;
					$yearS++;
				}
				$year=$yearA[$count];
				$monthA=array(array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec")
					 ,array("January","Febuary","March","April","May","June","July","August","September","October","November","December"));
				$m=date('M');
				for($i=0;$i<count($monthA[0]);$i++){
					if($m==$monthA[0][$i]){
						$pos=$i;
						break;
					}
				}
				$month=$monthA[1][$pos];
				$day=date('d');
			}
			//GET PHYSICAL ADDRESS
			ob_start(); // Turn on output buffering
	        system('ipconfig /all'); //Execute external program to display output
	        $mycom=ob_get_contents(); // Capture the output into a variable
	        ob_clean(); // Clean (erase) the output buffer
	        $findme = "Physical";
	        $pmac = strpos($mycom, $findme); // Find the position of Physical text
	        $mac=substr($mycom,($pmac+36),17); // Get Physical Address
	        // END OF PHYSICAL ADDRESS
	        //TIME
	        ini_set("date.timezone", "Asia/Singapore");//SET THE TIME TO ASS/SINGAPORE
	        $hour=date("h",time());
	        $timezone=date("H:i",time());
	        /////SESSSION
	        $_SESSION['year']=$year;
	        $_SESSION['month']=$month;
	        $_SESSION['day'] = $day;
	        $_SESSION['date']=$month.' '.$day.','.'20'.$year;
	        $_SESSION['timezone']=$timezone;
	        $_SESSION['mac']=$mac;
	        
	        redirect("css/formValidation");

	}
?>
<style type="text/css">
	.select2{
		color: black;
		position: absolute;
	}
</style>	
	<!--The style inside the body is an Inline CSS-->
	<body style = "background:linear-gradient(180deg, green, lavender)">
	<?php if(isset($_SESSION['user'])){  ?>
	<div style="position:absolute;right:150px;top:30px;">
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
     <?php
     	}
     ?>
		<form method="POST">	
			<center>
				<div style = "margin-top:3%">
					<table style = "background:green;color:white;border:2px;border-radius:10px;border-top-radius:300px;">
						<tr>
							<td><img src="<?=base_url('images/surveyheader.png'); ?>" style = 'height:150px;width:868px;border-radius:10px;'></td>
						</tr>
						
						<!--
						<tr>
							<td>
								<h1>Temporary Closed</h1>
								<button type="button" class="btn btn-info" onclick="location.href='/css';"><p class="glyphicon glyphicon-arrow-left" style="color:black;"> BACK </p></button>
							</td>
						</tr>
						-->
					
						<?php include('survey_include.php'); ?> 
					</table>
					<!--End of Main table-->
				</div>
				<!--End of Outermost container-->
			</center>
			
			<!--Copyright part-->
			<div style = "background:linear-gradient(0deg, #006600, #006633);height:10%;width:100%;padding:10px;margin-top:2px;">    
				<center><h3 style = "color:green">DOH Customer Survey Form Rev. 2</h3></center>
			</div>
		</form>
<script type="text/javascript">

$(".select2").select2();

function services(){
	var service=document.getElementById('service');
	var rendered=document.getElementById('rendered').value;
	rendered != '' ? service.innerHTML='' : service.innerHTML='Required';
}
function visit(){
	document.getElementById("visited").innerHTML='';
}
function display(){
	var day = document.getElementById("day").value;

	//var element=["satisfied","dateErr","transaction","rating","err2","service","stats","visited"];
	var element=["satisfied","dateErr","transaction","rating","service","stats","visited"];
	for(var i=0; i<element.length;i++){
		if(i==1){
			if(day=='')
				document.getElementById(element[i]).innerHTML="Required";
		}	
		else 
			document.getElementById(element[i]).innerHTML="Required";
	}
}
display();
<?php if(isset($_SESSION['ok'])): $_SESSION['ok']=null; ?>
Lobibox.notify('success',{
	msg:'Thank you for submitting..'
});
<?php endif; ?>

var submit = false;
function selectrequired()
{
	if (
		document.getElementById("purpose1").checked || document.getElementById("purpose2").checked ||
		document.getElementById("purpose3").checked || document.getElementById("purpose4").checked ||
		document.getElementById("purpose5").checked || document.getElementById("purpose6").checked ||
	    document.getElementById("purpose7").checked || document.getElementById("purpose8").checked 
	   ) 
	{
		this.selectfalse();

	}
	else
	{
		document.getElementById("transaction").innerHTML = "Required";
		var c4=0;
		for(var d=0; d<7;d++)
		{
			c4++;
			document.getElementById("purpose"+c4).required=true;
		}
	}
}

function selectfalse()
{
	//////start trapping for radios
		/*var true1 = false;
		var true2 = false;
		var true3 = false;
		var true4 = false;
		var true5 = false;
		var true6 = false;
		var true7 = false;
		var radios1 = document.getElementsByName('rating1');
		for (var i = 0, length = radios1.length; i < length; i++) {
		    if (radios1[i].checked) {
		    	alert("asda");
		        true1 = true;
		        break;
		    }
		}
		var radios2 = document.getElementsByName('rating2');
		for (var z = 0, length = radios2.length; z < length; z++) {
		    if (radios2[z].checked) {
		        true2 = true;
		        break;
		    }
		}
		var radios3 = document.getElementsByName('rating3');
		for (var x = 0, length = radios3.length; x < length; x++) {
		    if (radios3[x].checked) {
		        true3 = true;
		        break;
		    }
		}
		var radios4 = document.getElementsByName('rating4');
		for (var y = 0, length = radios4.length; y < length; y++) {
		    if (radios4[y].checked) {
		        true4 = true;
		        break;
		    }
		}
		var radios5 = document.getElementsByName('rating5');
		for (var q = 0, length = radios5.length; q < length; q++) {
		    if (radios5[q].checked) {
		        true5 = true;
		        break;
		    }
		}
		var radios6 = document.getElementsByName('rating6');
		for (var w = 0, length = radios6.length; w < length; w++) {
		    if (radios6[w].checked) {
		        true6 = true;
		        break;
		    }
		}
		var radios7 = document.getElementsByName('satisfied');
		for (var f = 0, length = radios7.length; f < length; f++) {
		    if (radios7[f].checked) {
		    	alert("haha");
		        true7 = true;
		        break;
		    }
		}
		if(true1 && true2 && true3 && true4 && true5 && true6 && true7){
			alert("Ohyeeee!");
			if(submit){
				$("#generates").attr("disabled",true);
			}
			this.submit = true;
		}
		if(true7){
			alert("haha");
		}*/
	/////end of trapping for radios	
	var p1=document.getElementById("purpose1");
	var p2=document.getElementById("purpose2");
	var p3=document.getElementById("purpose3");
	var p4=document.getElementById("purpose4");
	var p5=document.getElementById("purpose5");
	var p6=document.getElementById("purpose6");
	var p7=document.getElementById("purpose7");
	var p8=document.getElementById("purpose8");
	var x = document.getElementById("minuite").value;
	if(x > 60 || x == '' || x == 0)
	{	
		document.getElementById("minuite").value='';
		//document.getElementById("minuite").required=true;
		//document.getElementById("err2").innerHTML = "Required";
	}
	else
	{
		document.getElementById("err2").innerHTML = '';
		document.getElementById("minuite").required=false;
	}

	if(p4.checked)
	{
		document.getElementById("assistant").innerHTML="You must select at least one";	
		var c2=0;
		var c3=0;
		for(var b=0; b<3;b++)
		{
			c2++;
			document.getElementById("assistant"+c2).disabled=false;			
		}
		for(var c=0; c<3;c++)
		{
			c3++;
			document.getElementById("assistant"+c3).required=true;			
		}
	}
	else
	{
		document.getElementById("assistant").innerHTML ='';
		var c11=0;
		var c12=0;
		var c13=0;
		for(var l=0; l<3;l++)
		{
			c11++;
			document.getElementById("assistant"+c11).disabled=true;			
		}
		for(var m=0; m<3;m++)
		{
			c12++;
			document.getElementById("assistant"+c12).required=false;			
		}
		for(var n=0; n<3;n++)
		{
			c13++;
			document.getElementById("assistant"+c13).checked=false;	
		}
	}

	if(p7.checked)
	{
		document.getElementById("apply").innerHTML="You must select at least one";
		var c5=0;
		var c6=0;
		for(var e=0; e<5;e++)
		{
			c5++;
			document.getElementById("apply"+c5).disabled=false;			
		}
		for(var f=0; f<5;f++)
			
		{
			c6++;
			document.getElementById("apply"+c6).required=true;			
		}
	}
	else
	{
		document.getElementById("apply").innerHTML ='';
		var c7=0;
		var c8=0;
		var c9=0;
		for(var g=0; g<5;g++)
		{
			c7++;
			document.getElementById("apply"+c7).disabled=true;			
		}
		for(var h=0; h<5;h++)
		{
			c8++;
			document.getElementById("apply"+c8).required=false;			
		}
		for(var j=0; j<5;j++)
		{
			c9++;
			document.getElementById("apply"+c9).checked=false;	
		}
	}
	if(document.getElementById("assistant1").checked || document.getElementById("assistant2").checked || document.getElementById("assistant3").checked)
	{
		document.getElementById("assistant").innerHTML="";
		var c10=0;
		for(var k=0; k<3; k++)
		{
			c10++;
			document.getElementById("assistant"+c10).required=false;
		}
	}

	var otherstext=document.getElementById("otherstext");
	var others=document.getElementById("others");
 	if(p8.checked)
 	{
 		otherstext.innerHTML="Required";
 		document.getElementById("others").disabled=false;
 		document.getElementById("others").required=true;
 	}
 	else
 	{
 		document.getElementById("others").disabled=true; 
		document.getElementById("others").value = '';
		otherstext.innerHTML='';
 	}
 	if(others.value!='')
 	{
 		otherstext.innerHTML='';	
 	}

	if(p1.checked || p2.checked || p3.checked || p4.checked || p5.checked || p6.checked || p7.checked || p8.checked)
	{
		document.getElementById("transaction").innerHTML ='';
		var c1=0;
		for(var a=0; a<8;a++)
		{
			c1++;
			document.getElementById("purpose"+c1).required=false;
		}
	}
	else
		document.getElementById("transaction").innerHTML="Required";

	if 
		(
		document.getElementById("apply1").checked || document.getElementById("apply2").checked ||
		document.getElementById("apply3").checked || document.getElementById("apply4").checked ||
		document.getElementById("apply5").checked
	    )
	{
		document.getElementById("apply").innerHTML ='';
		var count=0;
		for(var i=0; i<5;i++)
		{
			count++;
			document.getElementById("apply"+count).required=false;
		}			
	}
}

function radio(){
	document.getElementById("rating").innerHTML="";
}
function satisfieds(){
	document.getElementById("satisfied").innerHTML="";
}
function stats(){
	document.getElementById('stats').innerHTML='';
}

function dateChecked()
{
	var month=document.getElementById("month").value;
	var day=document.getElementById("day").value;
	var year=document.getElementById("year").value;
	var mDay=0;
	var cDay=0;
	var feb=0;
	var head=31;
	var tail=30;
	if(year == 16){ feb=29 } else{ feb=28; }
	var arrayM=[0,1,2,3,4,5,6,7,8,9,10,11];
	for(var i=0;i<12;i++){
		if(arrayM[i]==month){
			cDay=i;
			break;		
		}
	}
	var arrayDays= [head,feb,head,tail,tail,head,tail,head,tail,head,tail,head];
	mDay=arrayDays[cDay];
	if(day > mDay || day <= 0){
		document.getElementById("day").required=true;
		document.getElementById("day").value="";
		var dayErr=document.getElementById("dateErr").innerHTML="Invalid Month";
	}
	else if(day != 0)
		document.getElementById("dateErr").innerHTML="";
}
function hourstrapping(){
	if($("#hours").val()==0){
		$("#hours").val('');
	}
}
function clearMonth(){
	$("#day").val('');
}
</script>
</body>
</html>