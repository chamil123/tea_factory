
<?php
if (!isset($_SESSION)) {
    session_start();
}
error_reporting(E_ERROR || E_WARNING);
require 'template/header.php';
//require './inc/database.php';
//include './Model/userModel.php';
$user = new User();
$result_role = $user->getrole();
?>


<section class="container py-5">
    <script>
        function load() {
            var result = "<?= $_SESSION['mesuser'] ?>";
            if (result == 1) {
            
                swal("Good job!", "You clicked the button!", "success");
            }
            else if (result == 5) {
                
                swal("Warning !", "User Added invalid !", "error");

            }
<?php
unset($_SESSION["mesuser"]);
$_SESSION["mesuser"] = '';
?>
        }

    </script>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-text">Add User</h4>
                </div>
                <div class="card-body">
                    <form action="Controler/userControler.php?action=add" method="post" class="needs-validation" novalidate>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" id="name" name="name"
                                       placeholder="Enter Your name"  required>
                                <div class="invalid-feedback">
                                    Please enter valid name.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nic" class="col-sm-2 col-form-label">NIC</label>
                            <div class="col-sm-10">
                                <input type="text" required maxlength="10" class="form-control" name="nic" id="nic"
                                       placeholder="Enter NIC No"  required>
                                <div class="invalid-feedback">
                                    Please enter NIC #.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="address" id="address"
                                          placeholder="Enter Address"></textarea>
                                <div class="invalid-feedback"  required>
                                    Please enter address.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mobile" class="col-sm-2 col-form-label"> Mobile No</label>
                            <div class="col-sm-10">
                                <input type="number"
                                       class="form-control" name="mobile"
                                       id="mobile" placeholder="Enter  Mobile No"  required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tel" class="col-sm-2 col-form-label">Telephone No</label>
                            <div class="col-sm-10">
                                <input type="number"
                                       class="form-control" name="tel"
                                       id="tel"
                                       placeholder="Enter Telephone No"  required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">eMail</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email"
                                       id="email" placeholder="Enter email address"  required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="gender" name="gender" class="custom-select" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a gender.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_role" class="col-sm-2 col-form-label">User Role</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="user_role" name="user_role" class="custom-select"
                                        required>
                                    <option value="">Select User Role</option>
                                    <?php while ($row = mysqli_fetch_assoc($result_role)) { ?>
                                        <option value="<?php echo $row['role_id'] ?>"><?php echo $row['role_name'] ?></option>
                                    <?php } ?>
                                   
                                <div class="invalid-feedback">
                                    Please select a User Role.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_name" class="col-sm-2 col-form-label">User Name</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" name="user_name" id="user_name"
                                       placeholder="Enter User Name"  required>
                                <div class="invalid-feedback">
                                    Please enter UserName.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" required minlength="3" class="form-control" name="password"
                                       id="password"
                                       placeholder="Enter Password"  required>
                                <div class="invalid-feedback">
                                    Please enter valid password.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cpassword" class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <input type="password" required minlength="3" class="form-control" name="cpassword"
                                       id="cpassword"
                                       placeholder="Enter Confirm Password"  required>
                                <div class="invalid-feedback">
                                    Please enter valid confirm password.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">

                            <div class="col-sm-10 offset-2">
                                <button type="submit" name="add_user" class="btn btn-primary">Add User</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
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

<?php
require 'template/footer.php'
?>

