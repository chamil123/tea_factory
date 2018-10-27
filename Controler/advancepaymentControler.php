<?php

if (!isset($_SESSION)) {
    session_start();
}
include '../Model/advancepaymentModel.php';
include '../Model/colectionModel.php';
$collection = new Colection();
$advance = new Advance_Payements();
error_reporting(E_ERROR || E_WARNING);
$action = $_GET['action'];

if ($action == "add") {

    $passbookno = $_POST['passbookno'];
    $adamount = $_POST['adamount'];
    $pay_met = $_POST['pay_met'];
    $regi_date = $_POST['regi_date'];
    $remarks = $_POST['remarks'];

    $result = $collection->getSupplierIdBypassBookNo($passbookno);
    $value = mysqli_fetch_assoc($result);
    $suplier_id = $value['supp_id'];

    $addadvance = $advance->addadPayment($suplier_id, $adamount, $pay_met, $regi_date, $remarks);
//    if ($addadvance > 0) {
//        $_SESSION['msgad'] = 1;
//        header("Location:../viewCollections.php");
//    }
}
if (isset($_POST[update_adv])) {
    if ($action == "update") {
         $id=$_GET['id'];
        $passbookno = $_POST['passbookno'];
        $adamount = $_POST['adamount'];
        $pay_met = $_POST['pay_met'];
        $regi_date = $_POST['regi_date'];
        $remarks = $_POST['remarks'];

        $result = $collection->getSupplierIdBypassBookNo($passbookno);
        $value = mysqli_fetch_assoc($result);
        $suplier_id = $value['supp_id'];


        $upadvance = $advance->updateAdvancepayment($suplier_id,$adamount,$pay_met,$regi_date,$remarks,$id);
        if ($upadvance > 0) {
            $_SESSION['msgad'] = 2;
            header("Location:../viewAdvacspayment.php");
        } else {
            $_SESSION['msgad'] = 5;
            header("Location:../viewAdvacspayment.php");
        }
    }
}
?>