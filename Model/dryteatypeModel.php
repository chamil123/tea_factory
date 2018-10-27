<?php

include '../inc/database.php';

class Dryteatype {

    function addDryteatype($dttype,$dtprice,$remarks) {
        global $con;
        $sql = "INSERT INTO tbl_dryteatype (drytea_type,dtprice,remarks) VALUES('$dttype','$dtprice','$remarks')";
        $query = mysqli_query($con, $sql);
        if ($query) {
            return TRUE;
        } else {
            return False;
        }
    }

    function getallDryteatype() {
        global $con;
        $sql = "SELECT * FROM tbl_dryteatype";
        $query = mysqli_query($con, $sql);
        return $query;
    }
//
//    function getUserbyuserid($id) {
//        global $con;
//        $sql = "SELECT * FROM users WHERE id=$id";
//        $query = mysqli_query($con, $sql);
//        return $query;
//    }

  
}

?>