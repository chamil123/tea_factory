<?php
include './inc/database.php';
global $con;
$sql = "SELECT dtt_id,dtprice,drytea_type FROM tbl_dryteatype";
$result = mysqli_query($con, $sql);

$array_curency = array();
while ($row = mysqli_fetch_array($result)) {

    $array_curency[] = $row;
}
echo json_encode($array_curency);
?>