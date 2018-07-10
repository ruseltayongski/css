<?php
	$this->load->view('include/header1');
	$notedsec=$this->database->notedsec($_SESSION['section'],$_SESSION['fname'],$_SESSION['mname'],$_SESSION['lname']);
	$noteddiv=$this->database->noteddiv($_SESSION['division'],$_SESSION['fname'],$_SESSION['mname'],$_SESSION['lname']);

	$satisfiedyes=0;
  	$satisfiedno=0;
	$count=0;
	$countE=0;
	$internalcount=0;
	$externalcount=0;
	$otherscount=0;
	//PURPOSE
	$internalcountp1=0;
	$externalcountp1=0;
	$internalcountp2=0;
	$externalcountp2=0;
	$internalcountp3=0;
	$externalcountp3=0;
	$internalcountp4=0;
	$externalcountp4=0;
	$internalcountp5=0;
	$externalcountp5=0;
	$internalcountp6=0;
	$externalcountp6=0;
	$internalcountp7=0;
	$externalcountp7=0;
	$internalcountp8=0;
	$externalcountp8=0;
	//RATING INTERNAL
	$Ir1a=0;$Ir1b=0;$Ir1c=0;$Ir1d=0;
	$Ir2a=0;$Ir2b=0;$Ir2c=0;$Ir2d=0;
	$Ir3a=0;$Ir3b=0;$Ir3c=0;$Ir3d=0;
	$Ir4a=0;$Ir4b=0;$Ir4c=0;$Ir4d=0;
	$Ir5a=0;$Ir5b=0;$Ir5c=0;$Ir5d=0;
	$Ir6a=0;$Ir6b=0;$Ir6c=0;$Ir6d=0;
	//RATING EXTERNAL
	$Er1a=0;$Er1b=0;$Er1c=0;$Er1d=0;
	$Er2a=0;$Er2b=0;$Er2c=0;$Er2d=0;
	$Er3a=0;$Er3b=0;$Er3c=0;$Er3d=0;
	$Er4a=0;$Er4b=0;$Er4c=0;$Er4d=0;
	$Er5a=0;$Er5b=0;$Er5c=0;$Er5d=0;
	$Er6a=0;$Er6b=0;$Er6c=0;$Er6d=0;

	if(isset($_SESSION['regional'])){
		if(isset($_SESSION['days'])){
			$_SESSION['message']=$this->database->cssRegionalDays($_SESSION['year'],$_SESSION['month'],$_SESSION['day'],$_SESSION['day1']);
			$doh1="<h4><b>".'Days'.' '.$_SESSION['month'].' '.$_SESSION['day'].' upto '.$_SESSION['month'].' '.$_SESSION['day1'].', '.$_SESSION['year']."</b></h4>";
			$doh="<h4><b>DOH RO 7-".' REGIONAL'."</b></h4>";
		} else {
			$_SESSION['message']=$this->database->cssRegional($_SESSION['year'],$_SESSION['month']);
			$doh1="<h4><b>".$_SESSION['month']." ".$_SESSION['year']."</b></h4>";
			$doh="<h4><b>DOH RO 7-".' REGIONAL'."</b></h4>";	
		}
	}
	elseif(isset($_SESSION['div'])){
		if(isset($_SESSION['days'])){
			$_SESSION['message']=$this->database->cssDivisionDays($_SESSION['division'],$_SESSION['year'],$_SESSION['month'],$_SESSION['day'],$_SESSION['day1']);
			$doh1="<h4><b>".'Days'.' '.$_SESSION['month'].' '.$_SESSION['day'].' upto '.$_SESSION['month'].' '.$_SESSION['day1'].', '.$_SESSION['year']."</b></h4>";
			$doh="<h4><b>DOH RO 7- ".$_SESSION['division']."</b></h4>";
		} else {
			$_SESSION['message']=$this->database->cssDivision($_SESSION['division'],$_SESSION['year'],$_SESSION['month']);
			$doh1="<h4><b>".$_SESSION['month']." ".$_SESSION['year']."</b></h4>";
			$doh="<h4><b>DOH RO 7-".$_SESSION['division']."</b></h4>";
		}	
	}
	elseif(isset($_SESSION['sec'])){
		if(isset($_SESSION['days'])){
			$_SESSION['message']=$this->database->cssSectionDays($_SESSION['section'],$_SESSION['year'],$_SESSION['month'],$_SESSION['day'],$_SESSION['day1']);
			$doh1="<h4><b>".'Days'.' '.$_SESSION['month'].' '.$_SESSION['day'].' upto '.$_SESSION['month'].' '.$_SESSION['day1'].', '.$_SESSION['year']."</b></h4>";
			$doh="<h4 style='margin-bottom:40px;'><b>OFFICE/UNIT/SECTION: ".$_SESSION['section']."</b></h4>";
		} else {
			$_SESSION['message']=$this->database->cssSection($_SESSION['section'],$_SESSION['year'],$_SESSION['month']);
			$doh1="<h4><b>".$_SESSION['month']." ".$_SESSION['year']."</b></h4>";
			$doh="<h4 style='margin-bottom:40px;'><b>OFFICE/UNIT/SECTION: ".$_SESSION['section']."</b></h4>";
		}	
	}


	foreach($_SESSION['message'] as $css)
	{
		$count++;
		if($css['cssstat']=="yes")
			$internalcount++;
		elseif($css['cssstat']=="no")
		{
			$externalcount++;
			$countE++;
		}

		// if($css['others'] != null)
		// 	$otherscount++;
		
		$otherscount = ($internalcount+$externalcount) - $count;

		if($css['purpose1']==1 and $css['cssstat']=="yes")
			$internalcountp1++;
		elseif($css['purpose1']==1 and $css['cssstat']=="no")
			$externalcountp1++;

		if($css['purpose2']==1 and $css['cssstat']=="yes")
			$internalcountp2++;
		elseif($css['purpose2']==1 and $css['cssstat']=="no")
			$externalcountp2++;

		if($css['purpose3']==1 and $css['cssstat']=="yes")
			$internalcountp3++;
		elseif($css['purpose3']==1 and $css['cssstat']=="no")
			$externalcountp3++;

		if($css['purpose4']==1 and $css['cssstat']=="yes")
			$internalcountp4++;
		elseif($css['purpose4']==1 and $css['cssstat']=="no")
			$externalcountp4++;

		if($css['purpose5']==1 and $css['cssstat']=="yes")
			$internalcountp5++;
		elseif($css['purpose5']==1 and $css['cssstat']=="no")
			$externalcountp5++;

		if($css['purpose6']==1 and $css['cssstat']=="yes")
			$internalcountp6++;
		elseif($css['purpose6']==1 and $css['cssstat']=="no")
			$externalcountp6++;

		if($css['purpose7']==1 and $css['cssstat']=="yes")
			$internalcountp7++;
		elseif($css['purpose7']==1 and $css['cssstat']=="no")
			$externalcountp7++;

		if($css['purpose8']==1 and $css['cssstat']=="yes")
			$internalcountp8++;
		elseif($css['purpose8']==1 and $css['cssstat']=="no")
			$externalcountp8++;

		if($css['cssstat']=="yes")
		{

			switch($css['rating1'])
			{
				case 1:$Ir1a++;break;
				case 2:$Ir1b++;break;
				case 3:$Ir1c++;break;
				case 4:$Ir1d++;break;
			}

			switch($css['rating2'])
			{
				case 1:$Ir2a++;break;
				case 2:$Ir2b++;break;
				case 3:$Ir2c++;break;
				case 4:$Ir2d++;break;
			}

			switch($css['rating3'])
			{
				case 1:$Ir3a++;break;
				case 2:$Ir3b++;break;
				case 3:$Ir3c++;break;
				case 4:$Ir3d++;break;
			}

			switch($css['rating4'])
			{
				case 1:$Ir4a++;break;
				case 2:$Ir4b++;break;
				case 3:$Ir4c++;break;
				case 4:$Ir4d++;break;
			}

			switch($css['rating5'])
			{
				case 1:$Ir5a++;break;
				case 2:$Ir5b++;break;
				case 3:$Ir5c++;break;
				case 4:$Ir5d++;break;
			}

			switch($css['rating6'])
			{
				case 1:$Ir6a++;break;
				case 2:$Ir6b++;break;
				case 3:$Ir6c++;break;
				case 4:$Ir6d++;break;
			}
		}
		else
		{
			switch($css['rating1'])
			{
				case 1:$Er1a++;break;
				case 2:$Er1b++;break;
				case 3:$Er1c++;break;
				case 4:$Er1d++;break;
			}

			switch($css['rating2'])
			{
				case 1:$Er2a++;break;
				case 2:$Er2b++;break;
				case 3:$Er2c++;break;
				case 4:$Er2d++;break;
			}

			switch($css['rating3'])
			{
				case 1:$Er3a++;break;
				case 2:$Er3b++;break;
				case 3:$Er3c++;break;
				case 4:$Er3d++;break;
			}

			switch($css['rating4'])
			{
				case 1:$Er4a++;break;
				case 2:$Er4b++;break;
				case 3:$Er4c++;break;
				case 4:$Er4d++;break;
			}

			switch($css['rating5'])
			{
				case 1:$Er5a++;break;
				case 2:$Er5b++;break;
				case 3:$Er5c++;break;
				case 4:$Er5d++;break;
			}

			switch($css['rating6'])
			{
				case 1:$Er6a++;break;
				case 2:$Er6b++;break;
				case 3:$Er6c++;break;
				case 4:$Er6d++;break;
			}
		}
		
		///SATISTFIED
		if($css['satisfied']=='yes')
			$satisfiedyes++;
		elseif($css['satisfied']=='no')
			$satisfiedno++;
	}
	//PURPOSE TOTAL
	$totalp1=$internalcountp1+$externalcountp1;
	$totalp2=$internalcountp2+$externalcountp2;
	$totalp3=$internalcountp3+$externalcountp3;
	$totalp4=$internalcountp4+$externalcountp4;
	$totalp5=$internalcountp5+$externalcountp5;
	$totalp6=$internalcountp6+$externalcountp6;
	$totalp7=$internalcountp7+$externalcountp7;
	$totalp8=$internalcountp8+$externalcountp8;
	//RATING1 TOTAL
	$totalr1a=$Ir1a+$Er1a;
	$totalr1b=$Ir1b+$Er1b;
	$totalr1c=$Ir1c+$Er1c;
	$totalr1d=$Ir1d+$Er1d;
	//RATING2 TOTAL
	$totalr2a=$Ir2a+$Er2a;
	$totalr2b=$Ir2b+$Er2b;
	$totalr2c=$Ir2c+$Er2c;
	$totalr2d=$Ir2d+$Er2d;
	//RATING3 TOTAL
	$totalr3a=$Ir3a+$Er3a;
	$totalr3b=$Ir3b+$Er3b;
	$totalr3c=$Ir3c+$Er3c;
	$totalr3d=$Ir3d+$Er3d;
	//RATING4 TOTAL
	$totalr4a=$Ir4a+$Er4a;
	$totalr4b=$Ir4b+$Er4b;
	$totalr4c=$Ir4c+$Er4c;
	$totalr4d=$Ir4d+$Er4d;
	//RATING5 TOTAL
	$totalr5a=$Ir5a+$Er5a;
	$totalr5b=$Ir5b+$Er5b;
	$totalr5c=$Ir5c+$Er5c;
	$totalr5d=$Ir5d+$Er5d;

	//RATING5 TOTAL
	$totalr6a=$Ir6a+$Er6a;
	$totalr6b=$Ir6b+$Er6b;
	$totalr6c=$Ir6c+$Er6c;
	$totalr6d=$Ir6d+$Er6d;

	//PERCENT RATING1 ALL
	$totalr1a != 0 ? $totalr1palla=($totalr1a/$count)*100 : $totalr1palla=0;
	$totalr1b != 0 ? $totalr1pallb=($totalr1b/$count)*100 : $totalr1pallb=0;
	$totalr1c != 0 ? $totalr1pallc=($totalr1c/$count)*100 : $totalr1pallc=0;
	$totalr1d != 0 ? $totalr1palld=($totalr1d/$count)*100 : $totalr1palld=0;

	//PERCENT RATING2 ALL
	$totalr2a != 0 ? $totalr2palla=($totalr2a/$count)*100 : $totalr2palla=0;  
	$totalr2b != 0 ? $totalr2pallb=($totalr2b/$count)*100 : $totalr2pallb=0;
	$totalr2c != 0 ? $totalr2pallc=($totalr2c/$count)*100 : $totalr2pallc=0;
	$totalr2d != 0 ? $totalr2palld=($totalr2d/$count)*100 : $totalr2palld=0;

	//PERCENT RATING3 ALL
	$totalr3a != 0 ? $totalr3palla=($totalr3a/$count)*100 : $totalr3palla=0;  
	$totalr3b != 0 ? $totalr3pallb=($totalr3b/$count)*100 : $totalr3pallb=0;
	$totalr3c != 0 ? $totalr3pallc=($totalr3c/$count)*100 : $totalr3pallc=0;
	$totalr3d != 0 ? $totalr3palld=($totalr3d/$count)*100 : $totalr3palld=0;

	//PERCENT RATING4 ALL
	$totalr4a != 0 ? $totalr4palla=($totalr4a/$count)*100 : $totalr4palla=0;  
	$totalr4b != 0 ? $totalr4pallb=($totalr4b/$count)*100 : $totalr4pallb=0;
	$totalr4c != 0 ? $totalr4pallc=($totalr4c/$count)*100 : $totalr4pallc=0;
	$totalr4d != 0 ? $totalr4palld=($totalr4d/$count)*100 : $totalr4palld=0;

	//PERCENT RATING5 ALL
	$totalr5a != 0 ? $totalr5palla=($totalr5a/$count)*100 : $totalr5palla=0;  
	$totalr5b != 0 ? $totalr5pallb=($totalr5b/$count)*100 : $totalr5pallb=0;
	$totalr5c != 0 ? $totalr5pallc=($totalr5c/$count)*100 : $totalr5pallc=0;
	$totalr5d != 0 ? $totalr5palld=($totalr5d/$count)*100 : $totalr5palld=0;

	//PERCENT RATING6 ALL
	$totalr6a != 0 ? $totalr6palla=($totalr6a/$count)*100 : $totalr6palla=0;  
	$totalr6b != 0 ? $totalr6pallb=($totalr6b/$count)*100 : $totalr6pallb=0;
	$totalr6c != 0 ? $totalr6pallc=($totalr6c/$count)*100 : $totalr6pallc=0;
	$totalr6d != 0 ? $totalr6palld=($totalr6d/$count)*100 : $totalr6palld=0;

	//PERCENT RATING1 EXTERNAL
	$Er1a !=0 ? $Etotalr1palla=($Er1a/$countE)*100 : $Etotalr1palla=0;
	$Er1b !=0 ? $Etotalr1pallb=($Er1b/$countE)*100 : $Etotalr1pallb=0;
	$Er1c !=0 ? $Etotalr1pallc=($Er1c/$countE)*100 : $Etotalr1pallc=0;
	$Er1d !=0 ? $Etotalr1palld=($Er1d/$countE)*100 : $Etotalr1palld=0;

	//PERCENT RATING2 EXTERNAL
	$Er2a !=0 ? $Etotalr2palla=($Er2a/$countE)*100 : $Etotalr2palla=0;
	$Er2b !=0 ? $Etotalr2pallb=($Er2b/$countE)*100 : $Etotalr2pallb=0;
	$Er2c !=0 ? $Etotalr2pallc=($Er2c/$countE)*100 : $Etotalr2pallc=0;
	$Er2d !=0 ? $Etotalr2palld=($Er2d/$countE)*100 : $Etotalr2palld=0;

	//PERCENT RATING3 EXTERNAL
	$Er3a !=0 ? $Etotalr3palla=($Er3a/$countE)*100 : $Etotalr3palla=0;
	$Er3b !=0 ? $Etotalr3pallb=($Er3b/$countE)*100 : $Etotalr3pallb=0;
	$Er3c !=0 ? $Etotalr3pallc=($Er3c/$countE)*100 : $Etotalr3pallc=0;
	$Er3d !=0 ? $Etotalr3palld=($Er3d/$countE)*100 : $Etotalr3palld=0;

	//PERCENT RATING4 EXTERNAL
	$Er4a !=0 ? $Etotalr4palla=($Er4a/$countE)*100 : $Etotalr4palla=0;
	$Er4b !=0 ? $Etotalr4pallb=($Er4b/$countE)*100 : $Etotalr4pallb=0;
	$Er4c !=0 ? $Etotalr4pallc=($Er4c/$countE)*100 : $Etotalr4pallc=0;
	$Er4d !=0 ? $Etotalr4palld=($Er4d/$countE)*100 : $Etotalr4palld=0;

	//PERCENT RATING5 EXTERNAL
	$Er5a !=0 ? $Etotalr5palla=($Er5a/$countE)*100 : $Etotalr5palla=0;
	$Er5b !=0 ? $Etotalr5pallb=($Er5b/$countE)*100 : $Etotalr5pallb=0;
	$Er5c !=0 ? $Etotalr5pallc=($Er5c/$countE)*100 : $Etotalr5pallc=0;
	$Er5d !=0 ? $Etotalr5palld=($Er5d/$countE)*100 : $Etotalr5palld=0;

	//PERCENT RATING6 EXTERNAL
	$Er6a !=0 ? $Etotalr6palla=($Er6a/$countE)*100 : $Etotalr6palla=0;
	$Er6b !=0 ? $Etotalr6pallb=($Er6b/$countE)*100 : $Etotalr6pallb=0;
	$Er6c !=0 ? $Etotalr6pallc=($Er6c/$countE)*100 : $Etotalr6pallc=0;
	$Er6d !=0 ? $Etotalr6palld=($Er6d/$countE)*100 : $Etotalr6palld=0;
	
$decimal= array(0.00,10.00,20.00,30.00,40.00,50.00,60.00,70.00,80.00,90.00,100.00);
in_array($totalr1palla, $decimal) ? $tmp1a = number_format($totalr1palla,0) : $tmp1a = number_format($totalr1palla,2); 
in_array($totalr1pallb, $decimal) ? $tmp1b = number_format($totalr1pallb,0) : $tmp1b = number_format($totalr1pallb,2);
in_array($totalr1pallc, $decimal) ? $tmp1c = number_format($totalr1pallc,0) : $tmp1c = number_format($totalr1pallc,2);
in_array($totalr1palld, $decimal) ? $tmp1d = number_format($totalr1palld,0) : $tmp1d = number_format($totalr1palld,2);
//RATING 2 FINAL RESULT
in_array($totalr2palla, $decimal) ? $tmp2a = number_format($totalr2palla,0) : $tmp2a = number_format($totalr2palla,2);
in_array($totalr2pallb, $decimal) ? $tmp2b = number_format($totalr2pallb,0) : $tmp2b = number_format($totalr2pallb,2);
in_array($totalr2pallc, $decimal) ? $tmp2c = number_format($totalr2pallc,0) : $tmp2c = number_format($totalr2pallc,2);
in_array($totalr2palld, $decimal) ? $tmp2d = number_format($totalr2palld,0) : $tmp2d = number_format($totalr2palld,2);
//RATING 3 FINAL RESULT
in_array($totalr3palla, $decimal) ? $tmp3a = number_format($totalr3palla,0) : $tmp3a = number_format($totalr3palla,2);
in_array($totalr3pallb, $decimal) ? $tmp3b = number_format($totalr3pallb,0) : $tmp3b = number_format($totalr3pallb,2);
in_array($totalr3pallc, $decimal) ? $tmp3c = number_format($totalr3pallc,0) : $tmp3c = number_format($totalr3pallc,2);
in_array($totalr3palld, $decimal) ? $tmp3d = number_format($totalr3palld,0) : $tmp3d = number_format($totalr3palld,2);
//RATING 4 FINAL RESULT
in_array($totalr4palla, $decimal) ? $tmp4a = number_format($totalr4palla,0) : $tmp4a = number_format($totalr4palla,2);
in_array($totalr4pallb, $decimal) ? $tmp4b = number_format($totalr4pallb,0) : $tmp4b = number_format($totalr4pallb,2);
in_array($totalr4pallc, $decimal) ? $tmp4c = number_format($totalr4pallc,0) : $tmp4c = number_format($totalr4pallc,2);
in_array($totalr4palld, $decimal) ? $tmp4d = number_format($totalr4palld,0) : $tmp4d = number_format($totalr4palld,2);
//RATING 5 FINAL RESULT
in_array($totalr5palla, $decimal) ? $tmp5a = number_format($totalr5palla,0) : $tmp5a = number_format($totalr5palla,2);
in_array($totalr5pallb, $decimal) ? $tmp5b = number_format($totalr5pallb,0) : $tmp5b = number_format($totalr5pallb,2);
in_array($totalr5pallc, $decimal) ? $tmp5c = number_format($totalr5pallc,0) : $tmp5c = number_format($totalr5pallc,2);
in_array($totalr5palld, $decimal) ? $tmp5d = number_format($totalr5palld,0) : $tmp5d = number_format($totalr5palld,2);
//RATING 6 FINAL RESULT
in_array($totalr6palla, $decimal) ? $tmp6a = number_format($totalr6palla,0) : $tmp6a = number_format($totalr6palla,2);
in_array($totalr6pallb, $decimal) ? $tmp6b = number_format($totalr6pallb,0) : $tmp6b = number_format($totalr6pallb,2);
in_array($totalr6pallc, $decimal) ? $tmp6c = number_format($totalr6pallc,0) : $tmp6c = number_format($totalr6pallc,2);
in_array($totalr6palld, $decimal) ? $tmp6d = number_format($totalr6palld,0) : $tmp6d = number_format($totalr6palld,2);

//RATING 1 EXTERNAL FINAL RESULT
in_array($Etotalr1palla, $decimal) ? $Etmp1a = number_format($Etotalr1palla,0) : $Etmp1a = number_format($Etotalr1palla,2);
in_array($Etotalr1pallb, $decimal) ? $Etmp1b = number_format($Etotalr1pallb,0) : $Etmp1b = number_format($Etotalr1pallb,2);
in_array($Etotalr1pallc, $decimal) ? $Etmp1c = number_format($Etotalr1pallc,0) : $Etmp1c = number_format($Etotalr1pallc,2);
in_array($Etotalr1palld, $decimal) ? $Etmp1d = number_format($Etotalr1palld,0) : $Etmp1d = number_format($Etotalr1palld,2);
//RATING 2 EXTERNAL FINAL RESULT
in_array($Etotalr2palla, $decimal) ? $Etmp2a = number_format($Etotalr2palla,0) : $Etmp2a = number_format($Etotalr2palla,2);
in_array($Etotalr2pallb, $decimal) ? $Etmp2b = number_format($Etotalr2pallb,0) : $Etmp2b = number_format($Etotalr2pallb,2);
in_array($Etotalr2pallc, $decimal) ? $Etmp2c = number_format($Etotalr2pallc,0) : $Etmp2c = number_format($Etotalr2pallc,2);
in_array($Etotalr2palld, $decimal) ? $Etmp2d = number_format($Etotalr2palld,0) : $Etmp2d = number_format($Etotalr2palld,2);
//RATING 3 EXTERNAL FINAL RESULT
in_array($Etotalr3palla, $decimal) ? $Etmp3a = number_format($Etotalr3palla,0) : $Etmp3a = number_format($Etotalr3palla,2);
in_array($Etotalr3pallb, $decimal) ? $Etmp3b = number_format($Etotalr3pallb,0) : $Etmp3b = number_format($Etotalr3pallb,2);
in_array($Etotalr3pallc, $decimal) ? $Etmp3c = number_format($Etotalr3pallc,0) : $Etmp3c = number_format($Etotalr3pallc,2);
in_array($Etotalr3palld, $decimal) ? $Etmp3d = number_format($Etotalr3palld,0) : $Etmp3d = number_format($Etotalr3palld,2);
//RATING 4 EXTERNAL FINAL RESULT
in_array($Etotalr4palla, $decimal) ? $Etmp4a = number_format($Etotalr4palla,0) : $Etmp4a = number_format($Etotalr4palla,2);
in_array($Etotalr4pallb, $decimal) ? $Etmp4b = number_format($Etotalr4pallb,0) : $Etmp4b = number_format($Etotalr4pallb,2);
in_array($Etotalr4pallc, $decimal) ? $Etmp4c = number_format($Etotalr4pallc,0) : $Etmp4c = number_format($Etotalr4pallc,2);
in_array($Etotalr4palld, $decimal) ? $Etmp4d = number_format($Etotalr4palld,0) : $Etmp4d = number_format($Etotalr4palld,2);
//RATING 5 EXTERNAL FINAL RESULT
in_array($Etotalr5palla, $decimal) ? $Etmp5a = number_format($Etotalr5palla,0) : $Etmp5a = number_format($Etotalr5palla,2);
in_array($Etotalr5pallb, $decimal) ? $Etmp5b = number_format($Etotalr5pallb,0) : $Etmp5b = number_format($Etotalr5pallb,2);
in_array($Etotalr5pallc, $decimal) ? $Etmp5c = number_format($Etotalr5pallc,0) : $Etmp5c = number_format($Etotalr5pallc,2);
in_array($Etotalr5palld, $decimal) ? $Etmp5d = number_format($Etotalr5palld,0) : $Etmp5d = number_format($Etotalr5palld,2);
//RATING 6 EXTERNAL FINAL RESULT
in_array($Etotalr6palla, $decimal) ? $Etmp6a = number_format($Etotalr6palla,0) : $Etmp6a = number_format($Etotalr6palla,2);
in_array($Etotalr6pallb, $decimal) ? $Etmp6b = number_format($Etotalr6pallb,0) : $Etmp6b = number_format($Etotalr6pallb,2);
in_array($Etotalr6pallc, $decimal) ? $Etmp6c = number_format($Etotalr6pallc,0) : $Etmp6c = number_format($Etotalr6pallc,2);
in_array($Etotalr6palld, $decimal) ? $Etmp6d = number_format($Etotalr6palld,0) : $Etmp6d = number_format($Etotalr6palld,2);
	if(isset($_POST['generate']))
	{
		$_SESSION['comment1']=$_POST['comment1'];
		$_SESSION['comment2']=$_POST['comment2'];
		$_SESSION['comment3']=$_POST['comment3'];

		if(isset($_SESSION['sec'])){
			$comment1=$_POST['comment1'];
			$comment2=$_POST['comment2'];
			$comment3=$_POST['comment3'];
			$year=$_SESSION['year'];
			$month=$_SESSION['month'];					
			$commentAdd=$this->database->commentSection($_SESSION['prepname'],$_SESSION['preppos'],$_SESSION['section'],$_SESSION['division'],$comment1,$comment2,$comment3,$year,$month);
		}
        $_SESSION['dateSubmit']=$_POST['dateSubmit'];
		$temp=$this->database->appr($_POST['apprname']);
		$_SESSION['apprname']=$temp['userfname'].' '.$temp['usermname'].'. '.$temp['userlname'];
		$_SESSION['apprpos']=$temp['userposition'];
        echo "<script>window.open('pdf')</script>";
	}
?>
<!DOCTYPE HTML>
	<title>Monthly Report Web</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('style.css');?>">
	</head>
	<body>
		<div id="outer" style="background-color:white;color:black;">
			<div style="position:absolute;right:50px;top:10px;">
       	        <div class="logout btn-group">
                    <button style="height:34px;" type="button" class="btn btn-primary"><p class="glyphicon glyphicon-user">Welcome, <?php echo $_SESSION['prepname'];?></p></button>
	                <button style="height:34px;" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
	                   <span class="caret"></span>
	                </button>
	                <ul class="dropdown-menu" role="menu">
	                	<li><a class="glyphicon glyphicon-off" href="logout">LogOut</a></li>
	                </ul>
                </div>
           </div>

           <center>
			<?php 
				echo "<h4><b>Monthly Report of Customer Feedback</b></h4>";
				echo $doh1;
			?>
			</center>	
			
			<?php echo $doh;?>
			<p id = "header">I. Introduction:</p>
			<p id = "sub">Number of Customers &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; :</p><input id="view" name="NumCust" type="text" value= "<?php echo $count; ?>" readonly /> <br>
			<p id = "sub">Identification of Customers &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; : Internal:<input id="view" name="Internal" type="text" value= "<?php echo $internalcount; ?>" readonly>
							  External:<input id="view" name="External" type="text" value= "<?php echo $externalcount; ?>" readonly> Did not specify:<input id="view" name="NotSpec" type="text" value= "<?php echo $otherscount ?>" readonly><br>
			<p id = "sub">Methodology of Distributing the Form &nbsp; :
				<br><br>
			<table cellspacing="0" cellpadding="1" border="3">
					<tr>
						<td style="background-color:lightgreen" rowspan="2" align="center"><b>Purpose of Visit</b></td>
						<td style="background-color:lightgreen" colspan="3" align="center"><b>No. of Respondents</b></td>
					</tr>
					<tr>
						<td>Internal</td>
						<td style="background-color:pink">External</td>
						<td>Total</td>
					</tr>
					<tr>
						<td>1. Submit report/document</td>
						<center>
						<td align="center"><?= $internalcountp1 ?></td>
					    <td align="center" style="background-color:pink"><?= $externalcountp1 ?></td>
					    <td align="center"><?= $totalp1 ?></td>
					</tr>
					<tr>
						<td>2. Attend meeting/training</td>
						<td align="center"><?= $internalcountp2 ?></td>
					    <td align="center" style="background-color:pink"><?= $externalcountp2 ?></td>
					    <td align="center"><?= $totalp2 ?></td>
					</tr>
					<tr>
						<td>3. Inquire/request data/document</td>
						<td align="center"><?= $internalcountp3 ?></td>
					    <td align="center" style="background-color:pink"><?= $externalcountp3 ?></td>
					    <td align="center"><?= $totalp3 ?></td>
					</tr>
					<tr>
						<td>4. Seek assistance: Technical/Legal/Medical</td>
						<td align="center"><?= $internalcountp4 ?></td>
					    <td align="center" style="background-color:pink"><?= $externalcountp4 ?></td>
					    <td align="center"><?= $totalp4 ?></td>
					</tr>
					<tr>
						<td>5. Interview, research</td>
						<td align="center"><?= $internalcountp5 ?></td>
					    <td align="center" style="background-color:pink"><?= $externalcountp5 ?></td>
					    <td align="center"><?= $totalp5 ?></td>
					</tr>
					<tr>
						<td>6. Follow-up documents</td>
						<td align="center"><?= $internalcountp6 ?></td>
					    <td align="center" style="background-color:pink"><?= $externalcountp6 ?></td>
					    <td align="center"><?= $totalp6 ?></td>
					</tr>
					<tr>
						<td>7. Apply for license/ accreditation/ certificate/ regulatory/ authentication</td>
						<td align="center"><?= $internalcountp7 ?></td>
					    <td align="center" style="background-color:pink"><?= $externalcountp7 ?></td>
					    <td align="center"><?= $totalp7 ?></td>
					</tr>
					<tr>
						<td>8. Others (Specified)</td>
						<td align="center"><?= $internalcountp8 ?></td>
					    <td align="center" style="background-color:pink"><?= $externalcountp8 ?></td>
					    <td align="center"><?= $totalp8 ?></td>
					</tr>
					<tr>
						<td>*Did not specify purpose</td>
						<td></td>
						<td style="background-color:pink"></td>
						<td></td>
					</tr>
			</table>		
			<table cellspacing="0" cellpadding="1" border="3" style="margin-top:30px;">
				<tr>
					<td style="background-color:lightgreen" colspan="17"><b>II. Highlights of findings:</b> Monthly Report of Summary of Customer Satisfaction Survey Form</td>
				</tr>
				<tr>
					<td rowspan="3" align="center"><b>Statement</b></td>
					<td width="120" colspan="4"><b>Strongly Agree</b></td>
					<td width="120" colspan="4"><b>Agree</b></td>
					<td width="120" colspan="4"><b>Disagree</b></td>
					<td width="120" colspan="4"><b>Strongly Disagree</b></td>
				</tr>
				<tr>
					<td colspan="2">Frequency</td><td align="center" colspan="2">%</td>
					<td colspan="2">Frequency</td><td align="center" colspan="2">%</td>
					<td colspan="2">Frequency</td><td align="center" colspan="2">%</td>
					<td colspan="2">Frequency</td><td align="center" colspan="2">%</td>
				</tr>
				<tr>
					<td>Ext</td>
					<td style="background-color:pink">All</td>
					<td>Ext</td>
					<td style="background-color:pink">All</td>
					<td>Ext</td>
					<td style="background-color:pink">All</td>
					<td>Ext</td>
					<td style="background-color:pink">All</td>
					<td>Ext</td>
					<td style="background-color:pink">All</td>
					<td>Ext</td>
					<td style="background-color:pink">All</td>
					<td>Ext</td>
					<td style="background-color:pink">All</td>
					<td>Ext</td>
					<td style="background-color:pink">All</td>
				</tr>
				<tr>
					<td>1.Received the appropriate services needed</td>
					<td><?php echo $Er1a;?></td>
					<td style="background-color:pink"><?php echo $totalr1a;?></td>
					<td><?= $Etmp1a ?></td>
					<td style="background-color:pink"><?= $tmp1a ?></td>
					<td><?php echo $Er1b;?></td>
					<td style="background-color:pink"><?php echo $totalr1b;?></td>
					<td><?= $Etmp1b ?></td>
					<td style="background-color:pink"><?= $tmp1b ?></td>
					<td><?php echo $Er1c;?></td>
					<td style="background-color:pink"><?php echo $totalr1c;?></td>
					<td><?= $Etmp1c ?></td>
					<td style="background-color:pink"><?= $tmp1c ?></td>
					<td><?php echo $Er1d;?></td>
					<td style="background-color:pink"><?php echo $totalr1d;?></td>
					<td><?= $Etmp1d ?></td>
					<td style="background-color:pink"><?= $tmp1d ?></td>
				</tr>
				<tr>
					<td>2.Timely response was given</td>
					<td><?php echo $Er2a;?></td>
					<td style="background-color:pink"><?php echo $totalr2a;?></td>
					<td><?= $Etmp2a?></td>
					<td style="background-color:pink"><?= $tmp2a ?></td>
					<td><?php echo $Er2b;?></td>
					<td style="background-color:pink"><?php echo $totalr2b;?></td>
					<td><?= $Etmp2b ?></td>
					<td style="background-color:pink"><?= $tmp2b ?></td>
					<td><?php echo $Er2c;?></td>
					<td style="background-color:pink"><?php echo $totalr2c;?></td>
					<td><?= $Etmp2c ?></td>
					<td style="background-color:pink"><?= $tmp2c ?></td>
					<td><?php echo $Er2d;?></td>
					<td style="background-color:pink"><?php echo $totalr2d;?></td>
					<td><?= $Etmp2d ?></td>
					<td style="background-color:pink"><?= $tmp2d ?></td>
				</tr>
				<tr>
					<td>3.The staff was well-informed</td>
					<td><?php echo $Er3a;?></td>
					<td style="background-color:pink"><?php echo $totalr3a;?></td>
					<td><?= $Etmp3a ?></td>
					<td style="background-color:pink"><?= $tmp3a ?></td>
					<td><?php echo $Er3b;?></td>
					<td style="background-color:pink"><?php echo $totalr3b;?></td>
					<td><?= $Etmp3b ?></td>
					<td style="background-color:pink"><?= $tmp3b ?></td>
					<td><?php echo $Er3c;?></td>
					<td style="background-color:pink"><?php echo $totalr3c;?></td>
					<td><?= $Etmp3c ?></td>
					<td style="background-color:pink"><?= $tmp3c ?></td>
					<td><?php echo $Er3d;?></td>
					<td style="background-color:pink"><?php echo $totalr3d;?></td>
					<td><?= $Etmp3d ?></td>
					<td style="background-color:pink"><?= $tmp3d ?></td>
				</tr>
				<tr>
					<td>4.The staff was courteus and approachable</td>
					<td><?php echo $Er4a;?></td>
					<td style="background-color:pink"><?php echo $totalr4a;?></td>
					<td><?= $Etmp4a ?></td>
					<td style="background-color:pink"><?= $tmp4a ?></td>
					<td><?php echo $Er4b;?></td>
					<td style="background-color:pink"><?php echo $totalr4b;?></td>
					<td><?= $Etmp4b ?></td>
					<td style="background-color:pink"><?= $tmp4b ?></td>
					<td><?php echo $Er4c;?></td>
					<td style="background-color:pink"><?= $totalr4c ?></td>
					<td><?= $Etmp4c ?></td>
					<td style="background-color:pink"><?= $tmp4c ?></td>
					<td><?php echo $Er4d;?></td>
					<td style="background-color:pink"><?php echo $totalr4d;?></td>
					<td><?= $Etmp4d ?></td>
					<td style="background-color:pink"><?= $tmp4d; ?></td>
				</tr>
				<tr>
					<td>5.The services rendered were just, honest and fair</td>
					<td><?php echo $Er5a;?></td>
					<td style="background-color:pink"><?php echo $totalr5a;?></td>
					<td><?= $Etmp5a ?></td>
					<td style="background-color:pink"><?= $tmp5a ?></td>
					<td><?php echo $Er5b;?></td>
					<td style="background-color:pink"><?php echo $totalr5b;?></td>
					<td><?= $Etmp5b ?></td>
					<td style="background-color:pink"><?= $tmp5b ?></td>
					<td><?php echo $Er5c;?></td>
					<td style="background-color:pink"><?php echo $totalr5c;?></td>
					<td><?= $Etmp5c ?></td>
					<td style="background-color:pink"><?= $tmp5c ?></td>
					<td><?php echo $Er5d;?></td>
					<td style="background-color:pink"><?php echo $totalr5d;?></td>
					<td><?= $Etmp5d ?></td>
					<td style="background-color:pink"><?= $tmp5d ?></td>
				</tr>
				<tr>
					<td>6.The workplace was clean and organized</td>
					<td><?php echo $Er6a;?></td>
					<td style="background-color:pink"><?php echo $totalr6a;?></td>
					<td><?= $Etmp6a ?></td>
					<td style="background-color:pink"><?= $tmp6a ?></td>
					<td><?php echo $Er6b;?></td>
					<td style="background-color:pink"><?php echo $totalr6b;?></td>
					<td><?= $Etmp6b ?></td>
					<td style="background-color:pink"><?= $tmp6b ?></td>
					<td><?php echo $Er6c;?></td>
					<td style="background-color:pink"><?php echo $totalr6c;?></td>
					<td><?= $Etmp6c ?></td>
					<td style="background-color:pink"><?= $tmp6c ?></td>
					<td><?php echo $Er6d;?></td>
					<td style="background-color:pink"><?php echo $totalr6d;?></td>
					<td><?= $Etmp6d ?></td>
					<td style="background-color:pink"><?= $tmp6d ?></td>
				</tr>
				<tr>
					<td>Overall Customer Satisfaction</td>
					<td style="border:0"></td>
					<td style="border:0"></td>
					<td style="border:0"></td>
					<td style="border:0"><b>Yes=<?= $satisfiedyes?></b></td>
					<td style="border:0"></td>
					<td style="border:0"></td>
					<td style="border:0"></td>
					<td style='border:0;' colspan='9'><b>No=<?= $satisfiedno?><b></td>
				</tr>
			</table>
		<form method="POST">
			<table align="center" style="margin-top:40px;">
				<?php if(isset($_SESSION['sec']) or isset($_SESSION['regional'])): ?>
					<tr>
						<td width="25%">
							<p id = "header"><b>III. Analysis and Interpretation:</b></p>
							<textarea class="ckeditor" id="analysis" placeholder="Type here..." name="comment1" ></textarea>
						</td>
						<td width="25%">
							<p id = "header"><b>IV. Recommendation:</b></p>
							<textarea class="ckeditor" id="recommendation" placeholder="Type here..." name="comment2"></textarea>
						</td>
						<td width="25%">
							<p id = "header"><b>V. Action Taken/Action to Taken/Action:</b></p>
							<textarea class="ckeditor" placeholder="Type here..." name="comment3"></textarea>
						</td>
					</tr>
				<?php endif ?>	
				<tr>
					<td>
						<b>Report Noted By:</b>
						<select class="form-control" name="apprname" style = "border-radius:5px; width:100%;background-color:lightgreen;color:black;">
			                <option value="">Select Name</option>
			                <?php
			                	if(isset($_SESSION['div'])){ 
			                		foreach($noteddiv as $row){
			                ?>
			                   		<option value="<?php echo $row['userfname'];?>"><?php echo $row['userfname'].' '.$row['usermname'].' '.$row['userlname']."=======".$row['usersection'];?></option>	                
			                	
			                <?php
			                		}
			            		}
			            		elseif(isset($_SESSION['sec'])){
			            			foreach($notedsec as $row){
			                ?>
			                   		<option value="<?php echo $row['userfname'];?>"><?php echo $row['userfname'].' '.$row['usermname'].' '.$row['userlname']."=======".$row['usersection'];?></option>	                
			                	
			                <?php
			                		}	
			            		}
			            		elseif(isset($_SESSION['regional'])){
			            			$notedreg=$this->database->userappr();
			            			foreach($notedreg as $row){
			                ?>
			                		<option value="<?php echo $row['userfname'];?>"><?php echo $row['userfname'].' '.$row['usermname'].' '.$row['userlname']."=======".$row['usersection'];?></option>	
			            	
			            	<?php	
			                		}
			            		}
			                ?>
			            </select>
	        		</td>
	        	</tr>
                <tr>
                    <td><h4><p style="display:inline;">Date Submitted:<input type="text" name="dateSubmit"/></p></h4></td>
                </tr>
				<tr>
					<td>
					<?php if(isset($_SESSION['div'])){?>
						<button class="btn btn-danger" type="submit" name = "generate" style="display:inline;" >Generate Division(PDF)</button>
					<?php 
						}
						elseif(isset($_SESSION['sec'])){
					?>
						<button class="btn btn-primary" type="submit" name = "generate" style="display:inline;" s>Generate Section(PDF)</button>
					<?php } elseif(isset($_SESSION['regional'])) { ?>
						<button class="btn btn-danger" type="submit" name = "generate" style="display:inline;background:green;" >Generate Region(PDF)</button>
					<?php } ?>
					</td>
				</tr>
			</table>
			</center>
		</form>
		</div>
	</body>
</html>