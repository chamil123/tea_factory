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

$pbno = $_GET['passbook'];
$date = $_GET['month'];
$month = substr($date, 0, 7);

global $con;
$sql_sid = "SELECT 
    ts.passbook_no, ts.supp_id
FROM
    supplier ts
WHERE
    ts.passbook_no=$pbno";
$query_s = mysqli_query($con, $sql_sid);

while ($row_s = mysqli_fetch_assoc($query_s)) {
    $supplier_id = $row_s['supp_id'];
}


$sql = "SELECT 
                    tdc.dc_id,
                    ts.name AS supplier_name,
                    tb.branch_name,
                    tdc.net_qu,
                    tbl.tl_type AS tea_type,
                    tdc.total_price,
                    tdc.remarks,
                    @date_f:=DATE_FORMAT(tdc.date, '%Y-%m-%d') AS col_date,
                     @yearmonth:=(CONCAT(YEAR(tdc.date),'-',LPAD(MONTH(tdc.date),2,0)))AS yr_mn,
                    ts.passbook_no
                FROM
                    tbl_dailycolection tdc
                        INNER JOIN
                    supplier ts ON tdc.supp_id = ts.supp_id
                        INNER JOIN
                    tbl_branch tb ON tdc.id = tb.id
                        INNER JOIN
                    tbl_leaves tbl ON tdc.tlt_id = tbl.tlt_id
                 WHERE ts.supp_id=$supplier_id";
$query = mysqli_query($con, $sql);
$pdf->SetFont("Arial", "", 12);
$total = 0;
while ($row = mysqli_fetch_assoc($query)) {
    if ($month == $row['yr_mn']) {
        $pdf->Cell(50, 6, $row['col_date'], 1, 0);
        $pdf->Cell(50, 6, $row['net_qu'], 1, 0);
        $pdf->Cell(50, 6, $row['tea_type'], 1, 0);
        $pdf->Cell(40, 6,$row['total_price'], 1, 1,'R');
        $total+=$row['total_price'];
    }
}

//        $sql1="SELE"
$pdf->Cell(100, 10, '', 0, 0);
$pdf->Cell(50, 10, 'Sub Total', 1, 0, 'R');
$pdf->Cell(40, 10, $total, 1, 1, 'R');
$pdf->Cell(100, 10, '', 0, 0);
$pdf->Cell(50, 10, 'Total Advance', 1, 0, 'R');

$sql_adv = "SELECT 
    ad.advpay_id,
    ad.supp_id,
    ad.pay_date,
    ad.advance_amount,
     @date_f:=DATE_FORMAT(ad.pay_date, '%Y-%m-%d') AS col_dates,
     @yearmonths:=(CONCAT(YEAR(ad.pay_date),'-',LPAD(MONTH(ad.pay_date),2,0)))AS yr_mns,
    ts1.passbook_no
FROM
    tbl_advpayment ad
    INNER JOIN
   supplier ts1 ON ad.supp_id = ts1.supp_id 
WHERE
    ts1.passbook_no=$pbno";
$query_adv = mysqli_query($con, $sql_adv);

$total_adv=0;
while ($row = mysqli_fetch_assoc($query_adv)) {
    if ($month == $row['yr_mns']) {
        //$pdf->Cell(40, 6, $row['advance_amount'], 1, 1);
        $total_adv+=$row['advance_amount'];
    }
}
$pdf->Cell(40, 10, $total_adv, 1, 1, 'R');
$pdf->Cell(100, 10, '', 0, 0);
$pdf->Cell(50, 10, 'Total', 1, 0, 'R');
$ftotal=$total-$total_adv;
$pdf->Cell(40, 10, $ftotal, 1, 1, 'R');
$pdf->SetFont("Arial", "B", 16);
$pdf->Cell(0, 6, "Thank You...", 0, 1, 'C');
$pdf->Output();
?>
