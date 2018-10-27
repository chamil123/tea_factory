<?php

include '../inc/database.php';

class Teatype {

    function addType($tltype, $tlprice, $remarks) {
        global $con;
        $sql = "INSERT INTO tbl_leaves (tl_type,price,remarks) VALUES('$tltype','$tlprice','$remarks')";
        $query = mysqli_query($con, $sql);
        if ($query) {
            return TRUE;
        } else {
            return False;
        }
    }

    function getallteatype() {
        global $con;
        $sql = "SELECT * FROM tbl_leaves";
        $query = mysqli_query($con, $sql);
        return $query;
    }

    function getAllDryTeaLeaf() {
        global $con;
        $sql = "SELECT * FROM tbl_dryteatype";
        $query = mysqli_query($con, $sql);
        return $query;
    }

    function getSuppleir() {
        global $con;
        $sql = "SELECT * FROM  supplier";
        $query = mysqli_query($con, $sql);
        return $query;
    }

}

?>