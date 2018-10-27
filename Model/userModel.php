<?php

include '../inc/database.php';

class User {

    function addUser($name, $nic, $address, $mobile, $tel, $email, $gender, $user_role, $user_name, $password) {
        global $con;
        $sql = "INSERT INTO users (name,nic,address,mobile,tel_no,email,gender,role_id,username,password) VALUES('$name','$nic','$address',$mobile,$tel,'$email','$gender','$user_role','$user_name','$password')";
        $query = mysqli_query($con, $sql);
        if ($query) {
            return TRUE;
        } else {
            return False;
        }
    }

    function giveallUsers() {
        global $con;
        $sql = "SELECT 
                    *
                FROM
                    users tu
                        INNER JOIN
                    role tr ON tu.role_id = tr.role_id
                WHERE
                    status = 1";
        $query = mysqli_query($con, $sql);
        return $query;
    }

    function getUserbyuserid($id) {
        global $con;
        $sql = "SELECT * FROM users WHERE id=$id";
        $query = mysqli_query($con, $sql);
        return $query;
    }

    function updateUser($name, $nic, $address, $mobile, $tel, $email, $gender, $user_role, $user_name, $password,$id) {
        global $con;
       $sql = "UPDATE users SET name='$name',nic='$nic',address='$address',mobile=$mobile,tel_no=$tel,email='$email',gender='$gender',role_id='$user_role',username='$user_name',password='$password',updated_at='".date("Y-m-d h:i:s")."' WHERE id=$id";
        $query = mysqli_query($con, $sql);
        return $query;
    }
    
    
    function deleteUser($id){
        global $con;
        $sql = "UPDATE users SET status=0 WHERE id=$id";
        $query = mysqli_query($con, $sql);
        if ($query) {
            return TRUE;
        } else {
            return False;
        }
    }
     function getrole() {
        global $con;
        $sql = "SELECT * FROM role";
        $query = mysqli_query($con, $sql);
        return $query;
    }
    function getrolefromuserid($id) {
        global $con;
        $sql = "SELECT * FROM users WHERE id=$id";
        $query = mysqli_query($con, $sql);
        return $query;
    }
}

?>