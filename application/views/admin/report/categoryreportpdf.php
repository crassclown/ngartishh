<?php

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Laporan Periode');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

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
$pdf->SetFont('dejavusans', '', 10);

// add a page
$pdf->AddPage('L');

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

// create some HTML content
$html = '<h1 style="text-align:center">Laporan Publish Karya Seniman</h1>
    <label>Kategori : '.$var_cat.'</label>
';
// <img src="'.base_url('assets/images/icons/Ngartish.png').'" alt="test alt attribute" width="100" height="100" border="0" /><img src="images/tcpdf_box.svg" alt="test alt attribute" width="100" height="100" border="0" /><img src="images/logo_example.jpg" alt="test alt attribute" width="100" height="100" border="0" />

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Ln(8);

$table = '<table style="border:1px solid black;">';
$table .='<tr>
            <th style="border:1px solid black;text-align:center"><b>Gambar</b></th>
            <th style="border:1px solid black;text-align:center"><b>Kategori</b></th>
            <th style="border:1px solid black;text-align:center"><b>Judul Seni</b></th>
            <th style="border:1px solid black;text-align:center"><b>Keterangan Deskripsi</b></th>
            </tr>';
            if(is_object($category) || is_array($category)){
                foreach($category as $record){
                    $table .= '<tr>
                                <td style="border:1px solid black;text-align:center;"><img style="width:600%;" src="'.base_url('assets/images/content/'.$record->photos).'"/></td>
                                <td style="border:1px solid black;text-align:center;"><br /><br />'.$record->name.'</td>
                                <td style="border:1px solid black;text-align:center;"><br /><br />'.$record->title.'</td>
                                <td style="border:1px solid black;text-align:center;"><br /><br />'.$record->deskripsi.'</td>
                                </tr>';
                }
            }else{
                $table .= '<tr>
                                <td colspan="4" style="border:1px solid black;text-align:center;">Maaf, Karya Tidak di Temukan</td>
                                </tr>';
            }
$table .='</table>';

$pdf->writeHTML($table, true, false, true, false, '');
// reset pointer to the last page
$pdf->lastPage();
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+