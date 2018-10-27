<?php

include '../inc/database.php';

class Dealer {

    function addDealer($name, $address, $nic, $mobile, $ho_no, $email, $remarks) {
        global $con;
        $sql = "INSERT INTO tbl_customer(name,address,nic_no,mobile,tel,email,remarks) VALUES ('$name','$address','$nic',$mobile,$ho_no,'$email','$remarks')";
        $query = mysqli_query($con, $sql);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function listallDealers() {
        global $con;
        $sql = "SELECT * FROM tbl_customer  WHERE status=1";
        $query = mysqli_query($con, $sql);
        return $query;
    }

    function getDealersbyid($id) {
        global $con;
        $sql = "SELECT * FROM tbl_customer  WHERE de_id=$id";
        $query = mysqli_query($con, $sql);
        return $query;
    }
    function upadateDealer($name,$address,$nic,$mobile,$ho_no,$email,$remarks,$id){
        global $con;
        $sql="UPDATE tbl_customer SET name='$name',address='$address',nic_no='$nic',mobile='$mobile',tel='$ho_no',email='$email',remarks='$remarks'WHERE de_id=$id";
        $query=  mysqli_query($con, $sql);
        return $query;
        
    }
    function deleteDealer($id){
        global $con;
        $sql="UPDATE tbl_customer SET status=0 WHERE de_id=$id";
        $query=  mysqli_query($con, $sql);
        if ($query){
            return TRUE;
        }  else {
            return FALSE; 
        }
    }
    function addInvoice($invoice_no, $dealer_name, $invoice_date, $total, $user_id) {
        global $con;
        $sql = "INSERT INTO tbl_invoice(invoice_no,invoice_dealer_name,invoice_date,invoice_total,user_id,invoice_status) VALUES ('$invoice_no', '$dealer_name', '$invoice_date', $total, $user_id,'0')";
        $query = mysqli_query($con, $sql);
        if ($query) {
            return $con->insert_id;
        } else {
            return FALSE;
        }
    }
    function addInvoiceItems($selRow, $price,$qty,$amount,$last_id){
         global $con;
        $sql = "INSERT INTO tbl_invoice_item(inv_item_type,inv_item_price,inv_item_qty,inv_item_amount,invoice_id) VALUES ('$selRow', $price,$qty,$amount,$last_id)";
        $query = mysqli_query($con, $sql);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    } function viewAllInvoices() {
        global $con;
        $sql = "SELECT 
                    *
                FROM
                    tbl_invoice ti";
        $query = mysqli_query($con, $sql);
        return $query;
    }function getInvoiceById($inv_id) {
        global $con;
        $sql = "SELECT 
                    *
                FROM
                    tbl_invoice ti
                WHERE
                    ti.invoice_id=$inv_id";
        $query = mysqli_query($con, $sql);
        return $query;
    }function getInvoiceItemsById($inv_id) {
        global $con;
        $sql = "SELECT 
                    *
                FROM
                    tbl_invoice ti
                        INNER JOIN
                    tbl_invoice_item tim ON ti.invoice_id = tim.invoice_id
                        INNER JOIN
                    tbl_dryteatype tdt ON tim.inv_item_type = tdt.dtt_id
                WHERE
                    ti.invoice_id =$inv_id";
        $query = mysqli_query($con, $sql);
        return $query;
    }
}


//  
//    function deleteSupplier($id){
//        global $con;
//        $sql="UPDATE supplier SET status=0 WHERE supp_id =$id";
//        $query=  mysqli_query($con, $sql);
//        if ($query){
//            return TRUE;
//        }  else {
//            return FALSE;
//        }
//    }
//
//}
?>
    