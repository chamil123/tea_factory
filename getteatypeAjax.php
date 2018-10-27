<?php

include './inc/database.php';
$id=$_GET['id'];
global $con;

    $sql = "SELECT * FROM tbl_leaves WHERE tlt_id=$id";

$result = mysqli_query($con, $sql);
$array_curency = array();
while ($row = mysqli_fetch_array($result)) {
    $array_curency[] = $row;
}
echo json_encode($array_curency);
?>
