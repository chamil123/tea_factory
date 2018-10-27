
<?php
require_once 'template/header.php';
?>


<section class="container py-5">
    <script>
        function load() {
            var result = "<?= $_SESSION['addde'] ?>";
//            var result = "<? = $_SESSION['supp']" ? > ";
            if (result == 1) {
                swal("Good job!", "Data added", "success");
            }

            else if (result == 5) {
                swal("Warning !", "Dealer Added invalid !", "error");
            }



        }
<?php
unset($_SESSION["addde"]);
?>
    </script>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-text">Add Dealers</h4>
                </div>
                <div class="card-body">
                    <form action="Controler/dealerControler.php?action=add" method="post" class="needs-validation" novalidate>


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
                            <label for="mobile" class="col-sm-2 col-form-label">Mobile No</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="mobile" id="mobile"
                                       placeholder="Enter Mobile No">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ho_no" class="col-sm-2 col-form-label">Home No</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="ho_no" id="ho_no"
                                       placeholder="Enter Home No">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">eMail</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email"
                                       id="email" placeholder="Enter email address">
                            </div>
                        </div>
                        
                        </div>

                        <div class="form-group row">
                            <label for="remarks" class="col-sm-2 col-form-label">Remarks</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="remarks" id="remarks"
                                          placeholder="Enter remarks"></textarea>
                                <div class="invalid-feedback">
                                    Please enter comments.
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-sm-10 offset-2">
                                <button type="submit" name="adddealer" class="btn btn-primary">Add</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--<script>
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
</script>-->

<?php
require 'template/footer.php'
?>



