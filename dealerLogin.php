<?php
error_reporting(E_ERROR || E_WARNING);
session_start();

require './inc/database.php';
include './Model/LoginModel.php';
$login=new Login();


if (isset($_SESSION['user_id'])) {
    header("location: dashboard.php");
    exit();
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $error = [];
    //Input Validations
    if (empty($username)) {
        $error[] = 'Username can\'t be empty.';
    }
    if (empty($password)) {
        $error[] = 'Password can\'t be empty.';
    }
    //If there are input validations, redirect back to the login form
    if (!empty($error)) {
        $_SESSION['error'] = $error;
        session_write_close();
        header("location: login.php");
        exit();
    }
   $result = $login->validateUnAndPw($username, $password);
    if ($result) {
        if ($result->num_rows > 0) {
            $user = $result->fetch_object();
            session_regenerate_id();
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_name'] = $user->username;
            $_SESSION['name'] = $user->name;
            $_SESSION['role'] = $user->user_role;
            session_write_close();
           
            header("location: dashboard.php");
            
            exit();
        } else {
            header("location: login.php");
            $_SESSION['error'] = array('Your User name or Password Incurrect. Please enter valid data ..!!');
        session_write_close();
            
            exit();
        }
    } else {
        $_SESSION['error'] = array('Please try again later. Internal error occured..!!');
        session_write_close();
        header("location: login.php");
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
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
    <body>
        <div class="container py-5 mt-lg-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 login-bg"></div>
                        <div class="col-md-5 mx-auto">
                            <div class="login-panel">
                                <!-- form card login -->
                                <div class="card rounded-0">
                                    <div class="card-header">
                                        <h3 class="mb-0 text-center">Login</h3>
                                    </div>
                                    <div class="card-body">
                                        <?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])) { ?>
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <?php
                                                foreach ($_SESSION['error'] as $error) {
                                                    echo "<li>$error</li>";
                                                }
                                                ?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <?php
                                            unset($_SESSION['error']);
                                        }
                                        ?>
                                        <form class="form needs-validation" action="login.php" role="form" autocomplete="off"
                                              novalidate
                                              method="POST">
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control form-control-lg rounded-0"
                                                       name="username" autocomplete="off"
                                                       id="username" required>
                                                <div class="invalid-feedback">Oops, you missed this one.</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control form-control-lg rounded-0"
                                                       id="password" autocomplete="off"
                                                       required name="password">
                                                <div class="invalid-feedback">Enter your password too!</div>
                                            </div>
                                            <button type="submit" name="login" class="btn btn-success btn-lg btn-block"
                                                    id="btnLogin">Login
                                            </button>
                                        </form>
                                    </div>
                                    <!--/card-block-->
                                </div>
                                <!-- /form card login -->

                            </div>

                        </div>
                    </div>
                    <!--/row-->

                </div>
                <!--/col-->

            </div>


            <!--/row-->
        </div>
        <footer class="container-fluid login-footer">
        </footer>
        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>
    </body>
</html>
