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

// add a page
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 8);

if($form){
	foreach($form as $row){
		$temp = "<tr>
					<td>".$row['section']."</td>
					<td>".$row['rendered']."</td>
					<td>".$row['suggestion']."</td>
					<td>".$row['month'].' '.$row['day'].', '.$row['year']."</td>
				</tr>";
		$tableRow = $tableRow.$temp; 
	}
}

$display = 
	'
	<h1>January - September</h1>
	<table cellspacing="1" cellpadding="5" border="1">
			<tr>
				<td style="background-color:lightgreen" align="center"><b>Section</b></td>
				<td style="background-color:lightgreen" align="center"><b>Staff who rendered</b></td>
				<td style="background-color:lightgreen" align="center"><b>Comment/Suggestion</b></td>
				<td style="background-color:lightgreen" align="center"><b>Date</b></td>
			</tr>'
			.$tableRow.
	'</table>';
	
// -----------------------------------------------------------------------------

$tbl = <<<EOD
		$display
EOD;
$pdf->writeHTML($tbl, true, false, false, false, '');


// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('Fillup-css.pdf', 'i');

//============================================================+
// END OF FILE
//============================================================+

