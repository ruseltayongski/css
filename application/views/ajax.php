<?php
$action=$_GET['action'];
if($action=='list'){	
	$contacts = $this->database->userappr();
	header('content-type: application/json');
	echo json_encode($contacts);
}

elseif($action=='delete'){
	$id = $_GET['id'];
	$this->database->userdelete($id);
}

elseif($action=='update'){
	$id=$_POST['userid'];
	$fname=$_POST['userfname'];
	$mname=$_POST['usermname'];
	$lname=$_POST['userlname'];
	$sec=$_POST['usersection'];
	$div=$this->database->deptdivision($sec);
	$pos =$_POST['userposition'];
	$uname = $_POST['username'];
	$pword = $_POST['userpassword'];

	if($_POST['userlevel'] == "ADMIN")
		$level = 1;
	elseif($_POST['userlevel'] == "USER")
		$level = 0;
	else {
		$type=$this->database->userType($id);
		$level = $type['usertype'];
	}

	$this->database->useredit($fname,$mname,$lname,$sec,$div['division'],$pos,$uname,$pword,$level,$id);
}

elseif($action=='selectDepartment'){
	$department=$this->database->section();
	header('content-type: application/json');
	echo json_encode($department);
}

elseif($action=='department'){
	$department=$this->database->deptList();
	header('content-type: application/json');
	echo json_encode($department);
}

elseif($action == 'addDepartment'){
	$sec=$_POST['deptsec'];
	$div=$_POST['deptdiv'];
	$stat = 1;
	if($this->database->deptadd($sec,$div,$stat))
		echo "Na add na ang department";
	else
		echo "Wala na add ang department";
}

elseif($action=="deleteDepartment"){
	$id=$_GET['id'];
	if($this->database->deptdelete($id))
		echo "Na delete na ang department";
	else
		echo "Wala na delete";
}

elseif($action=='position'){
	$position=poslist();
	header("content-type: application/json");
	echo json_encode($position);
}

elseif($action == 'addPosition'){
	$posdesc = $_POST['posnames'];
	$posstat = 1;
	posadd($posdesc,$posstat);
	echo "Na add na ang Position";
}

elseif($action=="deletePosition"){
	$id=$_GET['id'];
	posdelete($id);
	echo "na delete na ang position";
}

elseif($action=='noted'){
	$noted=notedList();
	header('content-type: application/json');
	echo json_encode($noted);
}

elseif($action=="addNewUser"){
	$fname=$_POST['firstname'];
	$mname=$_POST['middlename'];
	$lname=$_POST['lastname'];
	$dept=$_POST['department'];
	$pos=$_POST['position'];
	$uname=$_POST['username'];
	$pword=$_POST['password'];
	$utype=0;
	$ustat=1;
	if($this->database->useradd($fname,$mname,$lname,$dept,$pos,$uname,$pword,$utype,$ustat))
		echo "Na add na";
	else
		echo "Wala na add";
}

elseif($action == 'addNoted'){
	$fname=$_POST['firstname'];
	$mname=$_POST['middlename'];
	$lname=$_POST['lastname'];
	$pos=$_POST['position'];
	$dept=$_POST['department'];
	/*$sig=$_POST['signature'];
	$usersignature = $_FILES["signature"]["name"];
	move_uploaded_file($_FILES["signature"]["tmp_name"],"../upload/" . $usersignature);*/
	$stat=1;
	$this->database->useradd($fname,$mname,$lname,$pos,$dept,$sig,$stat);
	echo "Na add na noted";
}

elseif($action=='addCss'){
    $cssstat = $_SESSION['oVisited'];
	$section = $_SESSION['office'];
	$division = $_SESSION['division'];
	$rendered = addslashes($_SESSION['rendered']);
	$purpose1 = $_SESSION['purpose1'];
	$purpose2 = $_SESSION['purpose2'];
	$purpose3 = $_SESSION['purpose3'];
	$purpose4 = $_SESSION['purpose4'];
	$purpose5 = $_SESSION['purpose5'];
	$purpose6 = $_SESSION['purpose6'];
	$purpose7 = $_SESSION['purpose7'];
	$purpose8 = $_SESSION['purpose8'];
    $assistant1 = $_SESSION['assistant1'];
	$assistant2 = $_SESSION['assistant2'];
	$assistant3 = $_SESSION['assistant3'];
	$apply1 = $_SESSION['apply1'];
	$apply2 = $_SESSION['apply2'];
	$apply3 = $_SESSION['apply3'];
	$apply4 = $_SESSION['apply4'];
	$apply5 = $_SESSION['apply5'];
	$others = addslashes($_SESSION['others']);
	$hours = $_SESSION['hours'];
	$minute = $_SESSION['minute'];
	$rating1 = $_SESSION['rating1'];
	$rating2 = $_SESSION['rating2'];
	$rating3 = $_SESSION['rating3'];
	$rating4 = $_SESSION['rating4'];
	$rating5 = $_SESSION['rating5'];
	$rating6 = $_SESSION['rating6'];
	$satisfied= $_SESSION['satisfied'];
	$suggestion = addslashes($_SESSION['suggestion']);
	$cname = addslashes($_SESSION['cname']);
	$coffice = addslashes($_SESSION['coffice']);
	$ccno = addslashes($_SESSION['ccno']);
	$cemail = addslashes($_SESSION['cemail']);
	$mac = addslashes($_SESSION['mac']);
	$stat = 1;
	$day = $_SESSION['day'];
	$month = $_SESSION['month'];
	$year = $_SESSION['year']; 
	$timezone = $_SESSION['timezone'];
	$hour = $_SESSION['hours'];
	$encoded_by = $_SESSION['userid'];
	$this->database->cssAdd($cssstat,$section,$division,$rendered,$purpose1,$purpose2,$purpose3,$purpose4,$purpose5,$purpose6,$purpose7,$purpose8,$assistant1,$assistant2,$assistant3,$apply1,$apply2,$apply3,$apply4,$apply5,$others,$hours,$minute,$rating1,$rating2,$rating3,$rating4,$rating5,$rating6,$satisfied,$suggestion,$cname,$coffice,$ccno,$cemail,$mac,$stat,$year,$month,$day,$timezone,$hour,$encoded_by);
}