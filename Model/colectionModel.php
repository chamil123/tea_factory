<?php

include '../inc/database.php';

class Colection {

    function addCollection($suplier_id, $branch_id, $nquantity, $t_type, $toprice, $remarks) {
        global $con;
        $sql = "INSERT INTO tbl_dailycolection (supp_id,id,net_qu,tlt_id,total_price,remarks) VALUES($suplier_id,$branch_id,$nquantity, $t_type, $toprice, '$remarks')";
        $query = mysqli_query($con, $sql);
        if ($query) {
            return TRUE;
        } else {
            return False;
        }
    }

    function autocomplete($data) {
        global $con;
        $sql = "SELECT passbook_no FROM supplier WHERE passbook_no LIKE '%$data%' order by passbook_no ";
        $query = mysqli_query($con, $sql);
        return $query;
    }

    function getSupplierIdBypassBookNo($pbno) {
        global $con;
        $sql = "SELECT 
                    tc.supp_id
                FROM
                    supplier tc
                WHERE
                    tc.passbook_no = $pbno";
        $query = mysqli_query($con, $sql);
        return $query;
    }

    function getAllCollections() {
        global $con;
        $sql = "SELECT 
                    td.dc_id,
                    ts.passbook_no,
                    DATE_FORMAT(td.date, '%Y-%m-%d')AS col_date,
                    ts.name AS supller_name,
                    tb.branch_name AS branch_name,
                    td.net_qu,
                    tl.tl_type AS tea_type,
                    td.total_price,
                    td.remarks
                FROM
                    tbl_dailycolection td
                        INNER JOIN
                    supplier ts ON td.supp_id = ts.supp_id
                        INNER JOIN
                    tbl_branch tb ON td.id = tb.id
                        INNER JOIN
                    tbl_leaves tl ON td.tlt_id = tl.tlt_id";
        $query = mysqli_query($con, $sql);
        return $query;
    }

    function giveColectionpb_date() {
        global $con;
        $sql = "SELECT 
                    tdc.dc_id,
                    ts.name AS supplier_name,
                    tb.branch_name,
                    tdc.net_qu,
                    tbl.tl_type AS tea_type,
                    tdc.total_price,
                    tdc.remarks,
                    @date_f:=DATE_FORMAT(tdc.date, '%Y-%m-%d') AS col_date,
                    CONCAT(YEAR(tdc.date),'-',LPAD(MONTH(tdc.date),2,0))AS yr_mn,
                    ts.passbook_no
                FROM
                    tbl_dailycolection tdc
                        INNER JOIN
                    supplier ts ON tdc.supp_id = ts.supp_id
                        INNER JOIN
                    tbl_branch tb ON tdc.id = tb.id
                        INNER JOIN
                    tbl_leaves tbl ON tdc.tlt_id = tbl.tlt_id
           ";
        $query = mysqli_query($con, $sql);
        return $query;
    }

    function getColectionbyid($id) {
        global $con;
        $sql = "SELECT 
                   td.dc_id,
                    ts.passbook_no,
                    ts.name, 
                    tb.branch_name,
                    td.net_qu,
                    tl.tl_type,
                    td.total_price,
                    td.remarks
                FROM
                    tbl_dailycolection td
                        INNER JOIN
                    supplier ts ON td.supp_id = ts.supp_id
                        INNER JOIN
                    tbl_branch tb ON td.id = tb.id
                        INNER JOIN
                    tbl_leaves tl ON td.tlt_id = tl.tlt_id WHERE dc_id=$id";
        $query = mysqli_query($con, $sql);
        return $query;
    }

    function updateColection($suplier_id, $branch_id, $nquantity, $t_type, $toprice, $remarks, $id) {
        global $con;
        $sql = "UPDATE tbl_dailycolection SET supp_id=$suplier_id,id=$branch_id,net_qu=$nquantity,tlt_id=$t_type,total_price=$toprice,remarks='$remarks' WHERE dc_id=$id";
        $query = mysqli_query($con, $sql);
        return $query;
    }

    function getTotal_advance($passbookno) {
        global $con;
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
                        ts1.passbook_no='$passbookno'";
        $query_adv = mysqli_query($con, $sql_adv);
        return $query_adv;
    }

    function getTotalpamentpb_date($passbookno) {
        global $con;
        $sql = "SELECT 
                    tdc.dc_id,
                    ts.name AS supplier_name,
                    tb.branch_name,
                    tdc.net_qu,
                    tbl.tl_type AS tea_type,
                    tdc.total_price,
                    tdc.remarks,
                    @date_f:=DATE_FORMAT(tdc.date, '%Y-%m-%d') AS col_date,
                    CONCAT(YEAR(tdc.date),'-',LPAD(MONTH(tdc.date),2,0))AS yr_mn,
                    ts.passbook_no
                FROM
                    tbl_dailycolection tdc
                        INNER JOIN
                    supplier ts ON tdc.supp_id = ts.supp_id
                        INNER JOIN
                    tbl_branch tb ON tdc.id = tb.id
                        INNER JOIN
                    tbl_leaves tbl ON tdc.tlt_id = tbl.tlt_id
        WHERE ts.passbook_no = '$passbookno'";
        $query = mysqli_query($con, $sql);
        return $query;
    }

}
