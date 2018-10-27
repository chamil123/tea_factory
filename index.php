<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Tea Factory::Home</title>
        <link rel="stylesheet" href="public/css/bootstrap.css">
        <link rel="stylesheet" href="public/css/bootstrap-grid.css">
        <link rel="stylesheet" href="public/css/style.css">
        <script src="public/js/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
        <script src="public/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    </head>
    <body style="background: #008975">

        <div class="container-fluid">

            <div class="row">
                <div class="col-3 mt-5 pt-5" style="margin-top: 150px !important;">

                    <div class="card text-white bg-primary" style="width: 18rem;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item active"><a href="index.php" style="color: #ffffff"
                                                                  class="card-link">Home</a></li>
                            <li class="list-group-item"><a href="dealerLogin.php" class="card-link">PRODUCTS</a></li>
                            <li class="list-group-item"><a href="#" class="card-link">ABOUT</a></li>
                            <?php
                            if (isset($_SESSION['user_id'])) {
                                ?>
                                <li class="list-group-item"><a href="dashboard.php" class="card-link">Go to Dashboard</a>
                                </li>
                                <li class="list-group-item">
                                    <a class="card-link" href="logout.php">
                                        <img class="logout-avatar rounded" src="public/image/avatar.png">
                                        Logout
                                    </a>
                                </li>
                            <?php } else {
                                ?>
                                <li class="list-group-item"><a href="login.php" class="card-link">LOGIN</a></li>
                            <?php } ?>

                        </ul>
                    </div>

                </div>
                <div class="col-9  mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-text">Welcome to Tea factory</h2>
                        </div>
                        <div class="card-body">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="public/image/01.jpg" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="public/image/02.jpg" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="public/image/03.jpg" alt="Third slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                   data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                   data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
