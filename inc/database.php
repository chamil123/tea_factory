<?php

static $con;

$db_host="127.0.0.1";
$db_name="Tea_fac";
$db_user="root";
$db_password="";
$db_port="3306";

$con=new mysqli($db_host,$db_user,$db_password,$db_name);
if($con->connect_error){
    echo 'Failed';
    die();
}
?>