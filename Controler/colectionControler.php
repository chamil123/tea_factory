<?php

if (!isset($_SESSION)) {
    session_start();
}
include '../Model/colectionModel.php';
$collection = new Colection();
error_reporting(E_ERROR || E_WARNING);
$action = $_GET['action'];
if ($action == "add") {
    $passbook = $_POST['passbook'];
    $branch_id = $_POST['branch1'];
    $nquantity = $_POST['nquantity'];
    echo 'type : ' . $t_type = $_POST['t_type'];
    $toprice = $_POST['toprice'];
    $remarks = $_POST['remarks'];

    $result = $collection->getSupplierIdBypassBookNo($passbook);
    $value = mysqli_fetch_assoc($result);
    $suplier_id = $value['supp_id'];
    $addcollection = $collection->addCollection($suplier_id, $branch_id, $nquantity, $t_type, $toprice, $remarks);
    if ($addcollection > 0) {
        $_SESSION['msgcoll'] = 1;
        header("Location:../viewCollections.php");
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
        $updatecollection = $collection->updateColection($suplier_id,$branch_id,$nquantity,$t_type,$toprice,$remarks,$id);
        if ($updatecollection > 0) {
            $_SESSION['msgcol'] = 2;
            header("Location:../viewCollections.php");
        }else{
            $_SESSION['msgcol'] = 5;
            header("Location:../viewCollections.php");
        }
    }
}
?>