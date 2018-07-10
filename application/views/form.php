<?php
  require_once('pdf/tcpdf/examples/tcpdf_include.php');
	
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Customer Satisfactory Survey');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,"Republic of the Philippines,Department of Health", PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 15);

// add a page
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 8);

$check=base_url('images/check.png');
$blank=base_url('images/blank.png');

if(isset($_SESSION['sec']))
	$form=$this->database->cssSection($_SESSION['section'],$_SESSION['year'],$_SESSION['month']);
elseif(isset($_SESSION['div']))
	$form=$this->database->cssDivision($_SESSION['division'],$_SESSION['year'],$_SESSION['month']);
elseif(isset($_SESSION['regional']))
	$form=$this->database->cssRegional($_SESSION['year'],$_SESSION['month']);
elseif(isset($_SESSION['negative']))
	$form=$this->database->cssNegative($_SESSION['year'],$_SESSION['month'],'no');

foreach($form as $css){
if($css['cssstat']=="yes"){
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
	if($css['purpose'.$i] == 1){
		$css['purpose'.$i]=$check;
	}
	else
		$css['purpose'.$i]=$blank;
	if($i != 4)
		$css['assistant'.$i]!= '' ? $css['assistant'.$i]=$check : $css['assistant'.$i]=$blank;
	if($i != 6)
		$css['apply'.$i]!='' ? $css['apply'.$i]=$check : $css['apply'.$i]=$blank;
}
for($a=1;$a<=6;$a++){
	for($b=1;$b<=4;$b++){
		if($css['rating'.$a]==$b){
			$css['rating'.$a.$b]=$check;
		}
		else
			$css['rating'.$a.$b]=$blank;
	}
}
if($css['satisfied']=='yes'){
	$satisfiedyes=$check;
	$satisfiedno=$blank;
}
else{
	$satisfiedyes=$blank;
	$satisfiedno=$check;
}

$temp[]=
	'<table cellspacing="2" cellpadding="2" border="0">'.
		'<tr><td colspan="8" align="center" style="font-size:20px;"><b>Client Satisfaction Survey</b></td></tr>'.
		'<tr><td></td></tr>'.
		'<tr>'.
			'<td width="140px">Date: <b><u>'.$css['month'].' '.$css['day'].', '.$css['year'].'</u></b></td>'.
			'<td width="100px">Time: <b><u>'.$css['timezone'].'</u></b></td>'.
			'<td width="100px">From: [<img src="'.$yes.'" style="width:10px;height:40%">]DOH</td>'.
			'<td width="100px">From: [<img src="'.$no.'" style="width:10px;height:40%">]NON-DOH</td>'.
		'</tr>'.
		'<tr>'.
			'<td width="270px">Office Visited: <b><u>'.$css['section'].'</u></b></td>'.
			'<td width="250px">Staff who rendered services: <b><u>'.$css['rendered'].'</u></b></td>'.
		'</tr>'.
		'<tr><td></td></tr>'.
		'<tr>'.
			'<td width="20px">1.</td>'.
			'<td>What is the purpose of your visit/transaction?</td>'.
		'</tr>'.
		'<tr>'.
			'<td width="30px"></td>'.
			'<td width="250px">[<img src="'.$css['purpose1'].'" style="width:10px;height:40%">]Submit report/documents</td>'.
		'</tr>'.
		'<tr>'.
			'<td width="30px"></td>'.
			'<td width="250px">[<img src="'.$css['purpose2'].'" style="width:10px;height:40%">]Attend meeting</td>'.
		'</tr>'.
		'<tr>'.
			'<td width="30px"></td>'.
			'<td width="250px">[<img src="'.$css['purpose3'].'" style="width:10px;height:40%">]Inquire,request data, request documents</td>'.
		'</tr>'.
		'<tr>'.
			'<td width="30px"></td>'.
			'<td width="90px">[<img src="'.$css['purpose4'].'" style="width:10px;height:40%">]Seek assistant:</td>'.
			'<td width="70px">[<img src="'.$css['assistant1'].'" style="width:10px;height:40%">]Technical</td>'.
			'<td width="50px">[<img src="'.$css['assistant2'].'" style="width:10px;height:40%">]Legal</td>'.
			'<td width="70px">[<img src="'.$css['assistant3'].'" style="width:10px;height:40%">]Medical</td>'.
		'</tr>'.
		'<tr>'.
			'<td width="30px"></td>'.
			'<td width="250px">[<img src="'.$css['purpose5'].'" style="width:10px;height:40%">]Interview,research</td>'.
		'</tr>'.
		'<tr>'.
			'<td width="30px"></td>'.
			'<td width="250px">[<img src="'.$css['purpose6'].'" style="width:10px;height:40%">]Follow-up documents</td>'.
		'</tr>'.
		'<tr>'.
			'<td width="30px"></td>'.
			'<td width="70px">[<img src="'.$css['purpose7'].'" style="width:10px;height:40%">]Apply for:</td>'.
			'<td width="60px">[<img src="'.$css['apply1'].'" style="width:10px;height:40%">]License</td>'.
			'<td width="85px">[<img src="'.$css['apply2'].'" style="width:10px;height:40%">]Accreditation</td>'.
			'<td width="80px">[<img src="'.$css['apply3'].'" style="width:10px;height:40%">]Certification</td>'.
			'<td width="85px">[<img src="'.$css['apply4'].'" style="width:10px;height:40%">]Registration</td>'.
			'<td width="90px">[<img src="'.$css['apply5'].'" style="width:10px;height:40%">]Authentication</td>'.
		'</tr>'.
		'<tr>'.
			'<td width="30px"></td>'.
			'<td width="250px">[<img src="'.$css['purpose8'].'" style="width:10px;height:40%">]Others(Please specify) <b><u>'.$css['others'].'</u></b></td>'.
		'</tr>'.

		'<tr><td></td></tr>'	.
		'<tr>'.
			'<td width="20px">2.</td>'.
			'<td width="390px">How long did you wait before you accomplished the purpose of your visit/transaction?</td>'.
			'<td width="50px">Hours: <b><u></u>'.$hours.'</b></td>'.
			'<td width="70px">Minuite: <b><u></u>'.$css['minuite'].'</b></td>'.
		'</tr>'.
		'<tr><td></td></tr>'.
		'<tr>'.
			'<td width="20px">3.</td>'.
			'<td width="300px">Your choice and response using the rating scale.</td>'.
		'</tr>'.		
	'</table>'.




	'<table cellspacing="1" cellpadding="5" border="1">'.
		'<tr>'.
			'<td align="center" width="250px"><b>Statement</b></td>'.
			'<td align="center" width="100px"><b>Strongly Agree</b></td>'.
			'<td align="center" width="100px"><b>Agree</b></td>'.
			'<td align="center" width="100px"><b>Disagree</b></td>'.
			'<td align="center" width="100px"><b>Strongly Disagree</b></td>'.
		'</tr>'.
		'<tr>'.
			'<td>Received the appropriate services needed</td>'.
			'<td align="center"><img src="'.$css['rating11'].'" style="height:15px"></td>'.
			'<td align="center"><img src="'.$css['rating12'].'" style="height:15px"></td>'.
			'<td align="center"><img src="'.$css['rating13'].'" style="height:15px"></td>'.
			'<td align="center"><img src="'.$css['rating14'].'" style="height:15px"></td>'.
		'</tr>'.
		'<tr>'.
			'<td>Timely response was given</td>'.
			'<td align="center"><img src="'.$css['rating21'].'" style="height:15px"></td>'.
			'<td align="center"><img src="'.$css['rating22'].'" style="height:15px"></td>'.
			'<td align="center"><img src="'.$css['rating23'].'" style="height:15px"></td>'.
			'<td align="center"><img src="'.$css['rating24'].'" style="height:15px"></td>'.
		'</tr>'.
		'<tr>'.
			'<td>The staff was well-informed</td>'.
			'<td align="center"><img src="'.$css['rating31'].'" style="height:15px"></td>'.
			'<td align="center"><img src="'.$css['rating32'].'" style="height:15px"></td>'.
			'<td align="center"><img src="'.$css['rating33'].'" style="height:15px"></td>'.
			'<td align="center"><img src="'.$css['rating34'].'" style="height:15px"></td>'.
		'</tr>'.
		'<tr>'.
			'<td>The staff was courteous and apprachable</td>'.
			'<td align="center"><img src="'.$css['rating41'].'" style="height:15px"></td>'.
			'<td align="center"><img src="'.$css['rating42'].'" style="height:15px"></td>'.
			'<td align="center"><img src="'.$css['rating43'].'" style="height:15px"></td>'.
			'<td align="center"><img src="'.$css['rating44'].'" style="height:15px"></td>'.
		'</tr>'.
		'<tr>'.
			'<td>The service rendred were just,hones and fair</td>'.
			'<td align="center"><img src="'.$css['rating51'].'" style="height:15px"></td>'.
			'<td align="center"><img src="'.$css['rating52'].'" style="height:15px"></td>'.
			'<td align="center"><img src="'.$css['rating53'].'" style="height:15px"></td>'.
			'<td align="center"><img src="'.$css['rating54'].'" style="height:15px"></td>'.
		'</tr>'.
		'<tr>'.
			'<td>The workplace was clean and organized</td>'.
			'<td align="center"><img src="'.$css['rating61'].'" style="height:15px"></td>'.
			'<td align="center"><img src="'.$css['rating62'].'" style="height:15px"></td>'.
			'<td align="center"><img src="'.$css['rating63'].'" style="height:15px"></td>'.
			'<td align="center"><img src="'.$css['rating64'].'" style="height:15px"></td>'.
		'</tr>'.
		'</table>'.

		'<table cellspacing="5" cellpadding="5" border="0">'.
		'<tr><td></td></tr>'.
		'<tr>'.
			'<td width="20px">4.</td>'.
			'<td width="310px">As a whole, are you satisfied with the services provided/received?</td>'.
			'<td width="50px">[<img src="'.$satisfiedyes.'" style="width:10px;height:40%">] Yes</td>'.
			'<td>[<img src="'.$satisfiedno.'" style="width:10px;height:40%">] No</td>'.
		'</tr>'.
		'<tr>'.
			'<td width="20x">5.</td>'.
			'<td width="188px">Comments/Suggestion/Recomendation: </td>'.
			'<td width="400px"><b><u>'.$css['suggestion'].'</u></b></td>'.
		'</tr>'.
		'<tr><td></td></tr>'.
		'<tr>'.
			'<td width="200px"><b>Contact Information(optional)</b></td>'.
		'</tr>'.
		'<tr>'.
			'<td width="20px"></td>'.
			'<td width="230">Name: <b><u>'.$css['cname'].'</u></b></td>'.
			'<td>Tel.No.: <b><u></u>'.$css['ccno'].'</b></td>'.
		'</tr>'.
		'<tr>'.
			'<td width="20px"></td>'.
			'<td width="230">Office: <b><u>'.$css['coffice'].'</u></b></td>'.
			'<td>E-mail add.: <b><u></u>'.$css['cemail'].'</b></td>'.
		'</tr>'.
		'<tr><td></td></tr>'.
		'<tr>'.
			'<td width="200px"><br><strong>Encoded By:</strong>'.$this->database->userid($css['encoded_by'])['userfname'].' '.$this->database->userid($css['encoded_by'])['userlname'].'</td>'.
		'</tr>'.
		'<tr><td></td></tr>'.
		'<tr><td></td></tr>'.
		'<tr><td></td></tr>'.
		'<tr><td></td></tr>'.
		'<tr><td></td></tr>'.
		'<tr><td></td></tr>'.
	'</table>';
} 
	
// -----------------------------------------------------------------------------

for($m=0;$m<count($temp);$m++){
	$temporary=$temporary.$temp[$m];
}

$tbl = <<<EOD
		$temporary
EOD;
$pdf->writeHTML($tbl, true, false, false, false, '');


// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('Fillup-css.pdf', 'i');

//============================================================+
// END OF FILE
//============================================================+

