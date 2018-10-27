<?php

include './inc/database.php';
global $con;
$id=$_GET['id'];
    $sql = "SELECT 
                tdt.dtt_id, tdt.dtprice
            FROM
                tbl_dryteatype tdt
            WHERE
                tdt.dtt_id=$id";

$result = mysqli_query($con, $sql);
$array_curency = array();
while ($row = mysqli_fetch_array($result)) {
    $array_curency[] = $row;
}
echo json_encode($array_curency);
?>
