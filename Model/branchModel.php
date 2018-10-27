<?php

include '../inc/database.php';

class Branch {

    function addBranch($branch,$location,$remarks) {
        global $con;
        $sql = "INSERT INTO tbl_branch(branch_name,location,remarks) VALUES('$branch','$location','$remarks')";
        $query = mysqli_query($con, $sql);
        if ($query) {
            return TRUE;
        } else {
            return False;
        }
    }

    function getallbrnches() {
        global $con;
        $sql = "SELECT * FROM tbl_branch";
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