<?php

include '../inc/database.php';

class Production {

    function getTeatype() {
        global $con;
        $sql = "SELECT * FROM tbl_dryteatype";
        $query = mysqli_query($con, $sql);
        return $query;
    }

    function addProduction($product_type, $pquantity, $pdate, $remarks) {
        global $con;
        $sql = "INSERT INTO product (dtt_id,p_quantity,p_date,remarks) VALUES($product_type,$pquantity,'$pdate','$remarks')";
        $query = mysqli_query($con, $sql);
        if ($query) {
            return TRUE;
        } else {
            return False;
        }
    }

    function searchstokbyteatype($product_type) {
        global $con;
        echo $sql = "SELECT 
                    dts.dtt_id
                FROM
                   dtytea_stok dts

                WHERE
                    dts.dtt_id=$product_type";
        $query = mysqli_query($con, $sql);
        return $query;
    }

    function addStock($product_type, $pquantity) {
        global $con;
        $sql = "INSERT INTO dtytea_stok (dtt_id,remaining_qty) VALUES($product_type,$pquantity)";
        $query = mysqli_query($con, $sql);
        if ($query) {
            return TRUE;
        } else {
            return False;
        }
    }

    function updateStock($product_type, $pquantity) {
        global $con;
        $sql = "UPDATE dtytea_stok SET remaining_qty=remaining_qty+$pquantity WHERE dtt_id=$product_type";
        $query = mysqli_query($con, $sql);
        if ($query) {
            return TRUE;
        } else {
            return False;
        }
    }

//
//    function getSupplierIdBypassBookNo($pbno) {
//        global $con;
//        $sql = "SELECT 
//                    tc.supp_id
//                FROM
//                    supplier tc
//                WHERE
//                    tc.passbook_no = $pbno";
//        $query = mysqli_query($con, $sql);
//        return $query;
//    }
//
//    function getAllCollections() {
//        global $con;
//        $sql = "SELECT 
//                    td.dc_id,
//                    ts.passbook_no,
//                    DATE_FORMAT(td.date, '%Y-%m-%d')AS col_date,
//                    ts.name AS supller_name,
//                    tb.branch_name AS branch_name,
//                    td.net_qu,
//                    tl.tl_type AS tea_type,
//                    td.total_price,
//                    td.remarks
//                FROM
//                    tbl_dailycolection td
//                        INNER JOIN
//                    supplier ts ON td.supp_id = ts.supp_id
//                        INNER JOIN
//                    tbl_branch tb ON td.id = tb.id
//                        INNER JOIN
//                    tbl_leaves tl ON td.tlt_id = tl.tlt_id";
//        $query = mysqli_query($con, $sql);
//        return $query;
//    }
//
//    function giveColectionpb_date() {
//        global $con;
//        $sql = "SELECT 
//                    tdc.dc_id,
//                    ts.name AS supplier_name,
//                    tb.branch_name,
//                    tdc.net_qu,
//                    tbl.tl_type AS tea_type,
//                    tdc.total_price,
//                    tdc.remarks,
//                    @date_f:=DATE_FORMAT(tdc.date, '%Y-%m-%d') AS col_date,
//                    CONCAT(YEAR(tdc.date),'-',LPAD(MONTH(tdc.date),2,0))AS yr_mn,
//                    ts.passbook_no
//                FROM
//                    tbl_dailycolection tdc
//                        INNER JOIN
//                    supplier ts ON tdc.supp_id = ts.supp_id
//                        INNER JOIN
//                    tbl_branch tb ON tdc.id = tb.id
//                        INNER JOIN
//                    tbl_leaves tbl ON tdc.tlt_id = tbl.tlt_id
//           ";
//        $query = mysqli_query($con, $sql);
//        return $query;
//    }
//
//    function getColectionbyid($id) {
//        global $con;
//        $sql = "SELECT 
//                   td.dc_id,
//                    ts.passbook_no,
//                    ts.name, 
//                    tb.branch_name,
//                    td.net_qu,
//                    tl.tl_type,
//                    td.total_price,
//                    td.remarks
//                FROM
//                    tbl_dailycolection td
//                        INNER JOIN
//                    supplier ts ON td.supp_id = ts.supp_id
//                        INNER JOIN
//                    tbl_branch tb ON td.id = tb.id
//                        INNER JOIN
//                    tbl_leaves tl ON td.tlt_id = tl.tlt_id WHERE dc_id=$id";
//        $query = mysqli_query($con, $sql);
//        return $query;
//    }
//
//    function updateColection($suplier_id, $branch_id, $nquantity, $t_type, $toprice, $remarks, $id) {
//        global $con;
//        $sql = "UPDATE tbl_dailycolection SET supp_id=$suplier_id,id=$branch_id,net_qu=$nquantity,tlt_id=$t_type,total_price=$toprice,remarks='$remarks' WHERE dc_id=$id";
//        $query = mysqli_query($con, $sql);
//        return $query;
//    }
}
