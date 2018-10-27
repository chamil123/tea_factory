<?php

if (!isset($_SESSION)) {
    session_start();
}

include '../Model/supplierModel.php';
include '../Model/colectionModel.php';
$supplier = new Supplier();
$collection = new Colection();
error_reporting(E_ERROR || E_WARNING);
$action = $_GET['action'];
if (isset($_POST['addsupplier'])) {
    if ($action == "add") {
        $passbook = $_POST['passbook'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $nic = $_POST['nic'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $supp_type = $_POST['supp_type'];
        $pay_met = $_POST['pay_met'];
        $regi_date = $_POST['regi_date'];
        $remarks = $_POST['remarks'];

        $addsuppliers = $supplier->addSupplier($passbook, $name, $address, $nic, $mobile, $email, $supp_type, $pay_met, $regi_date, $remarks);
        if ($addsuppliers > 0) {
            $_SESSION['msgsupp'] = 1;
            header("Location:../addSupplier.php");
        } else {
            $_SESSION['sumsgsupppp'] = 5;
            header("Location:../addSupplier.php");
        }
    }
}
if (isset($_POST[update_supp])) {
    if ($action == "update") {
        $id = $_GET['id'];
        $passbook = $_POST['passbook'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $nic = $_POST['nic'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $supp_type = $_POST['supp_type'];
        $pay_met = $_POST['pay_met'];
        $regi_date = $_POST['regi_date'];
        $remarks = $_POST['remarks'];

        $upsuppliers = $supplier->updateSupplier($passbook, $name, $address, $nic, $mobile, $email, $supp_type, $pay_met, $regi_date, $remarks, $id);
        if ($upsuppliers > 0) {
            $_SESSION['msgsupp'] = 2;
            header("Location:../listSupplier.php");
        } else {
            $_SESSION['msgsupp'] = 5;
            header("Location:../listSupplier.php");
        }
    }
}
if ($action == 'delete') {
    $id = $_GET['id'];
    $deletesupplier = $supplier->deleteSupplier($id);
    if ($deletesupplier > 0) {
        $_SESSION['msgsupp'] = 3;
        header("Location:../listSupplier.php");
    }
}if ($action == 'payment') {
    $passbookno = $_POST['passbook_2'];
    $date_value2 = $_POST['date_2'];
    $month = substr($date_value2, 0, 7);

    $result_tot = $collection->getTotalpamentpb_date($passbookno);
    $total = 0;
    while ($row = mysqli_fetch_assoc($result_tot)) {
        if ($month == $row['yr_mn']) {
            $total+=$row['total_price'];
        }
    }
    
  $result_totad = $collection->getTotal_advance($passbookno);
    $total_adv = 0;
    while ($row = mysqli_fetch_assoc($result_totad)) {
 
        if ($month == $row['yr_mns']) {

            $total_adv+=$row['advance_amount'];
        }
    }
 
    
    
    

    $net_total = $total - $total_adv;

    $result = $collection->getSupplierIdBypassBookNo($passbookno);
    $value = mysqli_fetch_assoc($result);
    $suplier_id = $value['supp_id'];

    $supplier->addPayment($suplier_id, $date_value2, $net_total);
    if ($supplier > 0) {
            $_SESSION['mespayment'] = 2;
            header("Location:../viewCollectionbysupplier.php");
        } else {
            $_SESSION['mespayment'] = 5;
            header("Location:../viewCollectionbysupplier.php");
        }
    
}
?>
