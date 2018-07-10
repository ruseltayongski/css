<footer class="container-fluid" style="background-color:black;">
	<h4>Copyright &copy;&nbsp; <span>2016</span>&nbsp;&nbsp;<span><a href="" style="text-decoration:none;">DEPARTMENT OF HEALTH <b>Regional Office-7</b></span></h4>
	<h5><b><p style="color:blue;">Production:DOH_IT</p></b></h5>
</footer>
<script type="text/javascript">
	function dayClear(){
		$("#day").val("");
		$("#day1").val("");
	}
	function dayValid()
	{
		document.getElementById("DayError").innerHTML="";
		
		var day = $("#day").val();
		var day1 = $("#day1").val();
		var monthValue = 0;

		switch($("#month").val()){
			case "January" : monthValue = 31; break;
			case "Febuary" : monthValue = 29; break;
			case "March" : monthValue = 31; break;
			case "May" : monthValue = 31; break;
			case "July" : monthValue = 31; break;
			case "August" : monthValue = 31; break;
			case "October" : monthValue = 31; break;
			case "December" : monthValue = 31; break;
			default:
				monthValue = 30;
		}

		if(day <= 0 || day > monthValue){
			$("#day").val("");
		}
		if(day1 <= 0 || day1 > monthValue){
			$("#day1").val("");
		}

	}
	function daysRequired()
	{	
		var day = $("#day").val();
		var day1 = $("#day1").val();

		var arrayValue = ['0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32'];
		var dayValue = arrayValue[day];
		var dayValue1 = arrayValue[day1];

		if(dayValue>=dayValue1){
			$("#day").val("");
			$("#day1").val("");
			$("#day").attr("required",true);
			$("#day1").attr("required",true);
			document.getElementById("DayError").innerHTML="<h5><b>Invalid Days</b></h5>";
		}
	}
	function monthRequired(){
		$("#day").attr("required",false);
		$("#day1").attr("required",false);
	}
</script>