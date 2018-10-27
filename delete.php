<?php
session_start();

require_once 'inc/DB.php';

if ((!isset($_GET['id']) && empty($_GET['id']) || !(int)$_GET['id'])) {
    header("location: index.php");
}

$id = $_GET['id'];
$sql = "UPDATE users SET status='0' WHERE id='$id'";
if ($db->query($sql)) {
    $_SESSION['message'] = 'The user detail has been deleted successfuly..!!';
    session_write_close();
    header("location: listUsers.php");
} else {
    $_SESSION['error'] = 'Please try again later. Internal error occured..!!';
    session_write_close();
    header("location: listUsers.php");
}