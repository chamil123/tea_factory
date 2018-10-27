<?php

if (!isset($_SESSION)) {
    session_start();
}
include '../Model/productionModel.php';
$production = new Production();
error_reporting(E_ERROR || E_WARNING);
$action = $_GET['action'];
if (isset($_POST['addpro'])) {
    if ($action == "add") {
        $product_type = $_POST['product_type'];
        $pquantity = $_POST['pquantity'];
        $pdate = $_POST['pdate'];
        $remarks = $_POST['remarks'];

        $result = $production->addProduction($product_type, $pquantity, $pdate, $remarks);
        $searchresult = $production->searchstokbyteatype($product_type);
        $type_id = 0;
        while ($row = mysqli_fetch_assoc($searchresult)) {
            $type_id = $row['dtt_id'];
        }

        if ($type_id > 0) {

            $production->updateStock($product_type, $pquantity);
        } else {
            $production->addStock($product_type, $pquantity);
        }
        if ($result > 0) {
            $_SESSION['msgpro'] = 1;
            header("Location:../addProduction.php");
        } else {
            $_SESSION['msgpro'] = 5;
            header("Location:../addProduction.php");
        }
    }
}
if (isset($_POST['upadate_colect'])) {
    if ($action == "update") {
        $id = $_GET['id'];
        $passbook = $_POST['passbook'];
        $branch_id = $_POST['branch1'];
        $nquantity = $_POST['nquantity'];
        echo 'type : ' . $t_type = $_POST['t_type'];
        $toprice = $_POST['toprice'];
        $remarks = $_POST['remarks'];

        $result = $collection->getSupplierIdBypassBookNo($passbook);
        $value = mysqli_fetch_assoc($result);
        $suplier_id = $value['supp_id'];
        $updatecollection = $collection->updateColection($suplier_id, $branch_id, $nquantity, $t_type, $toprice, $remarks, $id);
        if ($updatecollection > 0) {
            $_SESSION['msgcol'] = 2;
            header("Location:../viewCollections.php");
        } else {
            $_SESSION['msgcol'] = 5;
            header("Location:../viewCollections.php");
        }
    }
}
?>