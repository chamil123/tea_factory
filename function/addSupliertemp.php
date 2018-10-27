
<?php
require_once '../template/header.php'; 
 


if (isset($_POST['add_user'])) {

    $name = clean($_POST['name'], $db);
    $nic = clean($_POST['nic']);
    $address = clean($_POST['address']);
    $mobile = clean($_POST['mobile']);
    $tel = clean($_POST['tel']);
    $email = clean($_POST['email']);
    $gender = clean($_POST['gender']);
    $user_role = clean($_POST['user_role']);
    $user_name = clean($_POST['user_name']);
    $password = clean($_POST['password']);
    $cpassword = clean($_POST['cpassword']);

    if ($password == $cpassword) {
        $sql = "INSERT INTO users (name,nic,address,mobile,tel_no,email,gender,user_role,username,password) 
                          VALUES('$name','$nic','$address','$mobile','$tel','$email','$gender','$user_role','$user_name','$password')";
        if ($db->query($sql)) {
            $_SESSION['message'] = 'The user registration has been saved successfuly..!!';
            session_write_close();
            header("location: listUsers.php");
        } else {
            $_SESSION['error'] = 'Please try again later. Internal error occured..!!';
            session_write_close();
            header("location: listUsers.php");
        }

    } else {
        $_SESSION['error'] = 'The password and confirm password are not the same.!!';
        session_write_close();
        header("location: addUser.php");
    }
}


?>


<section class="container py-5">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-text">Add User</h4>
                </div>
                <div class="card-body">
                    <form action="addUser.php" method="post" class="needs-validation" novalidate>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" id="name" name="name"
                                       placeholder="Enter Your name">
                                <div class="invalid-feedback">
                                    Please enter valid name.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nic" class="col-sm-2 col-form-label">NIC</label>
                            <div class="col-sm-10">
                                <input type="text" required maxlength="10" class="form-control" name="nic" id="nic"
                                       placeholder="Enter NIC No">
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
                                <div class="invalid-feedback">
                                    Please enter address.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mobile" class="col-sm-2 col-form-label">Mobile No</label>
                            <div class="col-sm-10">
                                <input type="number"
                                       class="form-control" name="mobile"
                                       id="mobile"
                                       placeholder="Enter Mobile No">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tel" class="col-sm-2 col-form-label">Telephone No</label>
                            <div class="col-sm-10">
                                <input type="number"
                                       class="form-control" name="tel"
                                       id="tel"
                                       placeholder="Enter Telephone No">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">eMail</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email"
                                       id="email" placeholder="Enter email address">
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
                                    <option value="User">Standard User</option>
                                    <option value="Admin">Administrator</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a User Role.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_name" class="col-sm-2 col-form-label">User Name</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" name="user_name" id="user_name"
                                       placeholder="Enter User Name">
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
                                       placeholder="Enter Password">
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
                                       placeholder="Enter Confirm Password">
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
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
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
require '../template/footer.php'
?>

