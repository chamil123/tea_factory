<?php
class Advance_Payements{
    function addadPayment($suplier_id, $adamount, $pay_met, $regi_date,$remarks) {
        global $con;
     $sql = "INSERT INTO tbl_advpayment (supp_id,advance_amount,pay_method,pay_date,remarks) VALUES($suplier_id,$adamount,'$pay_met', '$regi_date', '$remarks')";
        $query = mysqli_query($con, $sql);
        if ($query) {
            return TRUE;
        } else {
            return False;
        }
    }
    function getAdvance(){
        global $con;
       $sql = "SELECT 
                    ad.advpay_id,
                    ts.name AS supplier_name,
                    ad.advance_amount,
                    ad.pay_method,
                    ad.remarks,
                    ad.pay_date,
                   @date_f:=DATE_FORMAT(ad.pay_date, '%Y-%m-%d') AS col_date,
                    CONCAT(YEAR(ad.pay_date),'-',LPAD(MONTH(ad.pay_date),2,0))AS yr_mn,
                    ts.passbook_no
                FROM
                    tbl_advpayment ad
                        INNER JOIN
                    supplier ts ON ad.supp_id = ts.supp_id
                    WHERE ad.status=1";
        $query = mysqli_query($con, $sql);
        return $query;
        
    }
    
     function getAdvancebyid($id) {
        global $con;
       $sql = "SELECT
                    ad.advpay_id,
                    ad.advance_amount,
                    ad.pay_method,
                    ad.remarks,
                    ad.pay_date,
                    ts.passbook_no 
         FROM tbl_advpayment ad
         INNER JOIN
         supplier ts ON ad.supp_id=ts.supp_id
         WHERE advpay_id=$id";
        $query = mysqli_query($con, $sql);
        return $query;
    }
    function updateAdvancepayment($suplier_id,$adamount,$pay_met,$regi_date,$remarks,$id) {
        global $con;
       $sql = "UPDATE tbl_advpayment SET supp_id=$suplier_id,advance_amount=$adamount,pay_method='$pay_met',pay_date='$regi_date',remarks='$remarks' WHERE advpay_id=$id";
        $query = mysqli_query($con, $sql);
        return $query;
    }

}

?>
