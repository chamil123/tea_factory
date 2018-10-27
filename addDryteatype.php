<?php
require 'template/header.php';
?>


<section class="container py-5" style="width: 50%;">
    <script>
        function load() {
            var result = "<?= $_SESSION['dttype'] ?>";
//            var result = "<? = $_SESSION['supp']" ? > ";
            if (result == 1) {
                swal("Good job!", "Data added", "success");
            }
          
            else if (result == 5) {
                swal("Warning !", "Added invalid !", "error");
            }



        }
<?php
unset($_SESSION["dttype"]);
?>
    </script>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-text">Add Dry Tea Type</h4>
                </div>
                <div class="card-body">
                    <form action="Controler/dryteatypeContorler.php?action=add" method="post" class="needs-validation" novalidate>
                        
                        <div class="form-group row">
                            <label for="dttype" class="col-sm-2 col-form-label">Type</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" id="dtprice" name="dttype"
                                       placeholder="Enter Type">
                                <div class="invalid-feedback">
                                    Please enter Dry Tea Type.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dtprice" class="col-sm-2 col-form-label">Price (1kg)</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" id="dtprice" name="dtprice"
                                       placeholder="Enter Price">
                                <div class="invalid-feedback">
                                    Please enter price.
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
                                <button type="submit" name="adddtea" class="btn btn-primary">Add</button>
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
require 'template/footer.php'
?>


