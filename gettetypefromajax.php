<?php

include './inc/database.php';

global $con;

    $sql = "SELECT 
    *
FROM
    dtytea_stok dts
        INNER JOIN
    tbl_dryteatype tdt ON dts.dtt_id = tdt.dtt_id";

$result = mysqli_query($con, $sql);
$array_curency = array();
while ($row = mysqli_fetch_array($result)) {
    $array_curency[] = $row;
}
echo json_encode($array_curency);
?>
