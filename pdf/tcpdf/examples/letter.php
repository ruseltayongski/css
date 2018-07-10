<?php
//============================================================+
// File name   : example_051.php
// Begin       : 2009-04-16
// Last Update : 2013-05-14
//
// Description : Example 051 for TCPDF class
//               Full page background
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Full page background
 * @author Nicola Asuni
 * @since 2009-04-16
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
	//Page header
	public function Header() {
		// get the current page break margin
		$bMargin = $this->getBreakMargin();
		// get current auto-page-break mode
		$auto_page_break = $this->AutoPageBreak;
		// disable auto-page-break
		$this->SetAutoPageBreak(false, 0);
		// set bacground image
		$img_file = K_PATH_IMAGES.'demo.jpg';
		$this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
		// restore auto-page-break status
		$this->SetAutoPageBreak($auto_page_break, $bMargin);
		// set the starting point for the page content
		$this->setPageMark();
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 051');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(10, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

// remove default footer
$pdf->setPrintFooter(false);

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
$pdf->SetFont('times', '', 12.5);
$user = array(
        array(
                'name'=> 'JIMMY B. LOMOCSO JR.',
                'position'=> 'Web Developer',
                'address'=> 'Guadalupe, Cebu City',
                'contact'=> '0943 436 6254',
                'email'=> 'jimmy.lomocso@gmail.com'
            ),
        array(
                'name'=> 'ANNALOU D. CANUMHAY',
                'position'=> 'Marketing Associate',
                'address'=> 'Sambag 2, Cebu City',
                'contact'=> '09364886818',
                'email'=> 'annalou.canumhay@yahoo.com'
            ),
         array(
                'name'=> 'ANNALOU D. CANUMHAY',
                'position'=> 'Marketing Associate',
                'address'=> 'Sambag 2, Cebu City',
                'contact'=> '09364886818',
                'email'=> 'annalou.canumhay@yahoo.com'
            )
    );
// set font


foreach($user as $row):
// add a page
$pdf->AddPage();

// Print a text
$html = '
<font style="position:absolute;">Engr. Oscar A. Tuason</font><br />
<font>Hospital Administrator</font><br />
<font>Cebu Doctor\'s University Hospital</font>
';
$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Ln(14);

$html = '
<font>Ms. Chadelsa Binondo</font><br />
<font>HR Director</font><br />
<font>Cebu Doctor\'s University Hospital</font>
';
$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Ln(143);
$html = '
'.$row['name'].'<br />
'.$row['position'].'<br />
'.$row['address'].'<br />
'.$row['contact'].'<br />
'.$row['email'].'
';
$pdf->writeHTML($html, true, false, true, false, '');
endforeach;

//Close and output PDF document
$pdf->Output('letter.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
