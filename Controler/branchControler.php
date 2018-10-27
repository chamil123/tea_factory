<?php

if (!isset($_SESSION)) {
    session_start();
}
include '../Model/branchModel.php';
$branch1 = new Branch();
error_reporting(E_ERROR || E_WARNING);
$action = $_GET['action'];
if (isset($_POST['addbranch'])) {
    if ($action == 'add') {
        $branch = $_POST['branch'];
        $location = $_POST['location'];
        $remarks = $_POST['remarks'];
        $addbranch=$branch1->addBranch($branch,$location,$remarks);
        if ($addbranch>0){
            $_SESSION['megb']=1;
            header("Location:../addBranch.php");
        }  else {
            $_SESSION['megb']=5;
             header("Location:../addBranch.php");
        }
    }
}

//include '../Model/supplierModel.php';
//$supplier = new Supplier();
//error_reporting(E_ERROR || E_WARNING);
//$action = $_GET['action'];
//if (isset($_POST['addsupplier'])) {
//    if ($action == "add") {
//        $passbook = $_POST['passbook'];
//        $name = $_POST['name'];
//        $address = $_POST['address'];
//        $nic = $_POST['nic'];
//        $mobile = $_POST['mobile'];
//        $email = $_POST['email'];
//        $supp_type = $_POST['supp_type'];
//        $pay_met = $_POST['pay_met'];
//        $regi_date = $_POST['regi_date'];
//        $remarks = $_POST['remarks'];
//
//        $addsuppliers = $supplier->addSupplier($passbook, $name, $address, $nic, $mobile, $email, $supp_type, $pay_met, $regi_date, $remarks);
//        if ($addsuppliers > 0) {
//            echo 'A';
//            $_SESSION['msgsupp'] = 1;
//            header("Location:../addSupplier.php");
//        } else {
//            echo 'B';
//            $_SESSION['sumsgsupppp'] = 5;
//            header("Location:../addSupplier.php");
//        }
//    }
//}
//if (isset($_POST[update_supp])) {
//    if ($action == "update") {
//        $id = $_GET['id'];
//        $passbook = $_POST['passbook'];
//        $name = $_POST['name'];
//        $address = $_POST['address'];
//        $nic = $_POST['nic'];
//        $mobile = $_POST['mobile'];
//        $email = $_POST['email'];
//        $supp_type = $_POST['supp_type'];
//        $pay_met = $_POST['pay_met'];
//        $regi_date = $_POST['regi_date'];
//        $remarks = $_POST['remarks'];
//
//        $upsuppliers = $supplier->updateSupplier($passbook, $name, $address, $nic, $mobile, $email, $supp_type, $pay_met, $regi_date, $remarks, $id);
//        if ($upsuppliers > 0) {
//            $_SESSION['msgsupp'] = 2;
//            header("Location:../listSupplier.php");
//        } else {
//            $_SESSION['msgsupp'] = 5;
//            header("Location:../listSupplier.php");
//        }
//    }
//}
?>

