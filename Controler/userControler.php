
<?php

if (!isset($_SESSION)) {
    session_start();
}
include '../Model/userModel.php';
$user = new User();
error_reporting(E_ERROR || E_WARNING);
$action = $_GET['action'];
if (isset($_POST['add_user'])) {
    if ($action == "add") {

        $name = $_POST['name'];
        $nic = $_POST['nic'];
        $address = $_POST['address'];
        $mobile = $_POST['mobile'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $user_role = $_POST['user_role'];
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        if ($password == $cpassword) {
            $adduser = $user->addUser($name, $nic, $address, $mobile, $tel, $email, $gender, $user_role, $user_name, $password);
            if ($adduser == 1) {

                $_SESSION['mesuser'] = 1;
                header("Location:../addUser.php");
            } else {

                $_SESSION['mesuser'] = 5;
                header("Location:../addUser.php");
            }
        }
    }
}
if (isset($_POST['update_user'])) {
    if ($action == "update") {
        $id = $_GET['id'];

        $name = $_POST['name'];
        $nic = $_POST['nic'];
        $address = $_POST['address'];
        $mobile = $_POST['mobile'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $user_role = $_POST['user_role'];
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        //$cpassword = $_POST['cpassword'];
        $updateuser = $user->updateUser($name, $nic, $address, $mobile, $tel, $email, $gender, $user_role, $user_name, $password, $id);

        if ($updateuser > 0) {
            $_SESSION['mesuser'] = 2;
            header("Location:../listUsers.php");
        }
    }
}
if ($action == 'delete') {
    $id = $_GET['id'];

    $deleteuser = $user->deleteUser($id);

    if ($deleteuser > 0) {

        $_SESSION['mesuser'] = 3;
        header("Location:../listUsers.php");
    }
}
?>
