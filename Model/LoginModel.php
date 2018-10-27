<?php

include '../inc/database.php';

class Login {

    function validateUnAndPw($username,$password) {
        global $con;
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
        $query = mysqli_query($con, $sql);
        return $query;
    }

  
}

?>