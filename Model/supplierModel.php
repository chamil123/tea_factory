<?php
include '../inc/database.php';
class Supplier {

    function addSupplier($passbook, $name, $address, $nic, $mobile, $email, $supp_type, $pay_met, $regi_date, $remarks) {
       
        global $con;
        $sql = "INSERT INTO supplier (passbook_no,name,address,id_no,mobile_no,email,supp_type,payment_met,regi_date,remarks) VALUES ('$passbook','$name','$address','$nic',$mobile,'$email','$supp_type','$pay_met',' $regi_date','$remarks')";
        $query = mysqli_query($con, $sql);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    function giveallSuppliers(){
        global $con;
        $sql = "SELECT * FROM supplier WHERE status=1 ";
        $query = mysqli_query($con,$sql);
        return $query;
    }
    
    function getSupplierbysuppid($id) {
        global $con;
        $sql = "SELECT * FROM supplier WHERE supp_id=$id";
        $query = mysqli_query($con, $sql);
        return $query;
    }

    function updateSupplier($passbook, $name, $address, $nic, $mobile, $email, $supp_type, $pay_met, $regi_date, $remarks,$id) {
        global $con;
       $sql = "UPDATE supplier SET passbook_no='$passbook',name='$name',address='$address',id_no='$nic',mobile_no=$mobile,email='$email',supp_type='$supp_type',payment_met='$pay_met',regi_date='$regi_date',remarks='$remarks' WHERE supp_id=$id";
        $query = mysqli_query($con, $sql);
        return $query;
    }
    function deleteSupplier($id){
        global $con;
        $sql="UPDATE supplier SET status=0 WHERE supp_id =$id";
        $query=  mysqli_query($con, $sql);
        if ($query){
            return TRUE;
        }  else {
            return FALSE;
        }
    }
    function addPayment($suplier_id,$date_value2,$net_total){
        global $con;
        $sql = "INSERT INTO monthly_payment (supp_id,date,total_amount) VALUES ($suplier_id,'$date_value2',$net_total)";
        $query = mysqli_query($con, $sql);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
   

}
?>
    