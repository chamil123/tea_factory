<?php
error_reporting(E_ERROR || E_WARNING);
include './inc/database.php';
include './Model/colectionModel.php';
$auto=new Colection();
global $con;

$q = $_GET['q'];
$my_data = mysqli_real_escape_string($con, $q);
$result=$auto->autocomplete($my_data);
if ($result) {
    while ($row = mysqli_fetch_array($result)) {
        echo $row['passbook_no'] . "\n";
    }
}
?>