<?php
error_reporting(E_ERROR || E_WARNING);
session_start();
//require 'C:\xampp\htdocs\tea_factory\inc\database.php';
require './inc/database.php';

include 'Model/userModel.php';
$user = new User();

if (!isset($_SESSION['user_id'])) {
    header("location: login.php");
    exit();
}
$result = $user->getrolefromuserid($_SESSION['user_id']);
$row = mysqli_fetch_assoc($result);
$row['role_id'];
//print_r($row['role_id']);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Tea Factory::</title>
        <link rel="stylesheet" href="public/css/bootstrap.css">
        <link rel="stylesheet" href="public/css/bootstrap-grid.css">
        <link rel="stylesheet" href="public/css/style.css">
        <link rel="stylesheet" href="public/css/font-awesome/css/font-awesome.css">
        <script src="public/js/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
        <script src="public/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
        <script src="../public/js/sampletable.js"></script>
<!--        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>-->
        <script src="public/js/sweetalert.min.js"></script>
        <link rel="stylesheet" href="public/css/sweetalert.css">
        
        <script src="public/amcharts/amcharts/amcharts.js"></script>
        <script src="public/amcharts/amcharts/serial.js"></script>
        
        
        
        




    </head>
    <body onload="load();">

        <div class="container-fluid app" >
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="#"><strong>Tea Factory</strong></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <div>         

                        <ul class="navbar-nav mr-auto">

                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                            </li>

                        </ul >
                    </div>
                    <div>         

                        <ul class="navbar-nav mr-auto">

                            <li class="nav-item active">
                                <a class="nav-link" href="dashboard.php">DashBoard </a>
                            </li>

                        </ul >
                    </div>
                    
                   
                     
                    <div style="align: right;">
                        <ul class="navbar-nav ml-auto"  >
                            <li class="nav-item dropdown " >
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    User
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <?php if ($row['role_id'] == 1) { ?>
                                        <a class="dropdown-item" href="addUser.php">Add User</a>
                                    <?php } ?>
                                    <a class="dropdown-item" href="listUsers.php">List Users</a>
                                    <a class="dropdown-item" href="addBranch.php">Add Branch</a>
                                    <a class="dropdown-item" href="listBranch.php">List Branch</a>

                                </div>
                            </li>
                        </ul>

                    </div>

                    <div style="align: right;">
                        <ul class="navbar-nav ml-auto"  >
                            <li class="nav-item dropdown " >
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    Supplier
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="addSupplier.php">Add Suppliers</a>
                                    <a class="dropdown-item" href="listSupplier.php">List Suppliers</a>

                                </div>
                            </li>
                        </ul>

                    </div>

                    <div style="align: right;">
                        <ul class="navbar-nav ml-auto"  >
                            <li class="nav-item dropdown " >
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    Tea Leaf
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="addtltype.php">Add Tea Leaf Type</a>
                                    <a class="dropdown-item" href="listTltype.php">List Tea Leaf Type</a>
                                    <a class="dropdown-item" href="addTealeaf.php">Add Tea Leaf </a>
                                    <a class="dropdown-item" href="viewCollections.php">List Tea Leaf </a>
                                    <a class="dropdown-item" href="viewCollectionbysupplier.php">Daily Collection </a>
                                </div>
                            </li>
                        </ul>

                    </div>
                    <div style="align: right;">
                        <ul class="navbar-nav ml-auto"  >
                            <li class="nav-item dropdown " >
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    Dealers
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="addDealers.php">Add Dealers</a>
                                    <a class="dropdown-item" href="listDealers.php">List Dealers</a>
                                    <a class="dropdown-item" href="DealerInvoice.php">Create Invoice</a>
                                    <a class="dropdown-item" href="listInvoice.php">List Invoice</a>
                                </div>

                            </li>
                        </ul>

                    </div>

                    <div style="align: right;">
                        <?php if ($row['role_id'] == 1 || $row['role_id'] == 4) { ?>
                            <ul class="navbar-nav ml-auto"  >
                                <li class="nav-item dropdown " >
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false">
                                        Stock
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="addDryteatype.php">Add Dry Tea</a>
                                        <a class="dropdown-item" href="listDryteatype.php">List dry tea</a>
                                        <a class="dropdown-item" href="addProduction.php">Add Products</a>
                                        <a class="dropdown-item" href="listDealers.php">List dry tea stok</a>

                                    </div>
                                </li>
                            </ul>
                        <?php } ?>
                        <?php if ($row['role_id'] == 3) { ?>
                            <ul class="navbar-nav ml-auto"  >
                                <li class="nav-item dropdown " >
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false">
                                        Stock
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="listDealers.php">List dry tea</a>
                                        <a class="dropdown-item" href="listDealers.php">List dry tea stok</a>

                                    </div>
                                </li>
                            </ul>
                        <?php } ?>
                    </div>

                    <div style="align: right;">
                        <?php if ($row['role_id'] == 1 || $row['role_id'] == 4) { ?>
                            <ul class="navbar-nav ml-auto"  >
                                <li class="nav-item dropdown " >
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false">
                                        Payment
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="addAdvancepayment.php"> Advance Payment</a>
                                        <a class="dropdown-item" href="viewAdvacspayment.php">Advance payment List</a>
                                        <a class="dropdown-item" href="addfullpayment.php">Monthly Payments</a>
                                        <a class="dropdown-item" href="addStock.php"></a>
                                        <a class="dropdown-item" href="listDealers.php">List Dealers</a>

                                    </div>

                                </li>
                            </ul>
                        <?php } ?> 
                        <?php if ($row['role_id'] == 3) { ?>
                            <ul class="navbar-nav ml-auto"  >
                                
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                      
                                        <a class="dropdown-item" href="viewAdvacspayment.php">Advance payment List</a>
                                        

                                    </div>

                                </li>
                            </ul>
                        <?php } ?> 
                    </div>
                    <div style="align: right;">
                        <ul class="navbar-nav ml-auto"  >
                            <li class="nav-item dropdown " >
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    Order
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="addOrder.php"> Purchase Order</a>
                                    <a class="dropdown-item" href="sample.php">List Dealers as</a>
                                    <a class="dropdown-item" href="addStock.php">Add Tea</a>
                                    <a class="dropdown-item" href="listDealers.php">List Dealers</a>

                                </div>

                            </li>
                        </ul>

                    </div>

                    <!--            <div >
                                <ul class="navbar-nav mr-auto">
                                  
                                    <li class="nav-item active">
                                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                                    </li>
                                   
                                    <ul >
                                   
                                    <li class="nav-item">
                                        <a class="nav-link" href="addUser.php">Add User</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="listUsers.php">List Users</a>
                                    </li>
                                    </ul>
                                </ul>
                            </div>-->




                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <img class="logout-avatar rounded" src="public/image/avatar.png">
                                <?= $_SESSION['name'] ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <!--                        <a class="dropdown-item" href="#">Edit Profile</a>-->
                                <!--                        <a class="dropdown-item" href="#">Change Password</a>-->
                                <a class="dropdown-item" href="logout.php">
                                    <span class="fa fa-sign-out"></span> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <section class="container pt-2 alert-container">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
                            ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <h4 class="alert-heading">Well done!</h4>
                                <p><?= $_SESSION['message'] ?></p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php
                            unset($_SESSION['message']);
                        }
                        if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
                            ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <h4 class="alert-heading">oopz!</h4>
                                <p><?= $_SESSION['error'] ?></p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php
                            unset($_SESSION['error']);
                        }
                        ?>
                    </div>
                </div>
        </div>
