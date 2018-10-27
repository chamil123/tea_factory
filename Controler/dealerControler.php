<?php

if (!isset($_SESSION)) {
    session_start();
}
include '../Model/dealerModel.php';
$dealer = new Dealer();
error_reporting(E_ERROR || E_WARNING);
$action = $_GET['action'];
if (isset($_POST['adddealer'])) {
    if ($action == "add") {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $nic = $_POST['nic'];
        $mobile = $_POST['mobile'];
        $ho_no = $_POST['ho_no'];
        $email = $_POST['email'];
        //$pay_met = $_POST['pay_met'];
        $remarks = $_POST['remarks'];
        $adddealer = $dealer->addDealer($name, $address, $nic, $mobile, $ho_no, $email, $remarks);
        if ($adddealer > 0) {
            $_SESSION['addde'] = 1;
            header("Location:../addDealers.php");
        } else {
            $_SESSION['addde'] = 5;
            header("Location:../addDealers.php");
        }
    }
}
if (isset($_POST['updatedealer'])) {
    if ($action == 'update') {
        $id = $_GET['id'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $nic = $_POST['nic'];
        $mobile = $_POST['mobile'];
        $ho_no = $_POST['ho_no'];
        $email = $_POST['email'];
        //$pay_met = $_POST['pay_met'];
        $remarks = $_POST['remarks'];
        $dealer = $dealer->upadateDealer($name, $address, $nic, $mobile, $ho_no, $email, $remarks, $id);
        if ($dealer > 0) {
            $_SESSION['megde'] = 2;
            header("Location:../listDealers.php");
        } else {
            $_SESSION['megde'] = 5;
            header("Location:../listDealers.php");
        }
    }
}
if ($action == 'delete') {
    $id = $_GET['id'];
    $deletedealer = $dealer->deleteDealer($id);
    if ($deletedealer > 0) {
        $_SESSION['megde'] = 3;
        header("Location:../listDealers.php");
    }
}

if ($action == 'invoice') {
    $row = $_POST['row'];
    $invoice_no = $_POST['invoice_no'];
    $dealer_name = $_POST['dealer_name'];
    $invoice_date = $_POST['invoice_date'];
    $total = $_POST['total'];
    $user_id = $_SESSION['user_id'];
    $last_id = $dealer->addInvoice($invoice_no, $dealer_name, $invoice_date, $total, $user_id);

    for ($i = 0; $i <= $row; $i++) {
        $selRow = $_POST["selRow$i"];
        $price = $_POST["price_$i"];
        $qty = $_POST["qty_$i"];
        $amount = $_POST["amount_$i"];
//        echo 'ssfddasd ;' . $selRow . " / " . $price . "/ " . $qty ."/ ".$amount. "<br/>";
        $dealer->addInvoiceItems($selRow, $price, $qty, $amount, $last_id);
    }
    if ($last_id > 0) {
        $_SESSION['invoice'] = 1;
        header("Location:../listInvoice.php");
    }
//    echo '$last_id : ' . $last_id;
//    echo 'asas : '.$invoice_no."<br/>".$dealer_name."<br/>".$invoice_date."<br/>".$total."<br/>".$user_id;
}
?>
