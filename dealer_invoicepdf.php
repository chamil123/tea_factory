<?php

require ("./fpdf/fpdf.php");
include './inc/database.php';
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial", "B", 16);
$pdf->Cell(0, 10, "Madola Tea Factory", 0, 1, 'C');
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(0, 6, "Tel:091 3489275 Fax:091 3589278", 0, 1, 'C');
$pdf->Cell(0, 6, "No.11,Madola Rd,Pinnaduwa,Galle", 0, 1, 'C');

$inv_id = $_GET['inv_id'];
global $con;
$invoice_data = "SELECT 
                *
            FROM
                tbl_invoice ti
            WHERE
                ti.invoice_id=$inv_id";
$query_s = mysqli_query($con, $invoice_data);
$row_s = mysqli_fetch_assoc($query_s);
//while ($row_s = mysqli_fetch_assoc($query_s)) {
//    $supplier_id = $row_s['supp_id'];
//}

$pdf->Cell(50, 6, '', 0, 1);
$pdf->Cell(50, 6, 'Dealer Name :', 0, 0);
$pdf->Cell(50, 6, $row_s['invoice_dealer_name'], 0, 0);
$pdf->Cell(50, 6, 'Invoice Number :', 0, 0);
$pdf->Cell(50, 6, $row_s['invoice_no'], 0, 1);
$pdf->Cell(50, 6, 'Date :', 0, 0);
$pdf->Cell(50, 6, $row_s['invoice_date'], 0, 1);

$pdf->Cell(55, 6, 'Type', 1, 0, 'B');
$pdf->Cell(45, 6, 'Price', 1, 0, 'B');
$pdf->Cell(45, 6, 'Quantity', 1, 0, 'B');
$pdf->Cell(45, 6, 'Amount', 1, 1, 'B');

global $con;
$invoice_item_data = "SELECT 
                            *
                        FROM
                            tbl_invoice ti
                                INNER JOIN
                            tbl_invoice_item tim ON ti.invoice_id = tim.invoice_id
                                INNER JOIN
                            tbl_dryteatype tdtp ON tim.inv_item_type = tdtp.dtt_id
                        WHERE
                            ti.invoice_id =$inv_id";
$query_item = mysqli_query($con, $invoice_item_data);
$total=0;
while ($row_item = mysqli_fetch_assoc($query_item)) {
    $pdf->Cell(55, 6,$row_item['drytea_type'] , 1, 0, 'B');
    $pdf->Cell(45, 6, $row_item['inv_item_price'], 1, 0, 'B');
    $pdf->Cell(45, 6, $row_item['inv_item_qty'], 1, 0, 'B');
    $pdf->Cell(45, 6,$row_item['inv_item_amount'], 1, 1,'R');
    $total+=$row_item['inv_item_amount'];
    
}
$pdf->Cell(145, 6,'total : ' , 0, 0, 'R');
$pdf->Cell(45, 6,$total , 1, 1, 'R');

$pdf->Cell(0, 6, "Thank You...", 0, 1, 'C');
$pdf->Output();
?>
