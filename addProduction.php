
<?php
error_reporting(E_ERROR || E_WARNING);
require_once 'template/header.php';
include './inc/database.php';
include './Model/productionModel.php';
$production = new Production();
$result=$production->getTeatype();


//include './Model/teatypeModel.php';
//$teatype = new Teatype();
//$resulttea = $teatype->getallteatype();

?>


<section class="container py-5">
    <script>
        function load() {
            var result = "<?= $_SESSION['msgpro'] ?>";
//            var result = "<? = $_SESSION['supp']" ? > ";
            if (result == 1) {
                swal("Good job!", "Data added", "success");
            }
          
            else if (result == 5) {
                swal("Warning !", "Added invalid !", "error");
            }



        }
<?php
unset($_SESSION["msgpro"]);
?>
    </script>
        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-text">Add Production</h4>
                </div>
                <div class="card-body">
                    <form action="Controler/productionControler.php?action=add" method="post" class="needs-validation" novalidate>

                        <div class="form-group row">
                            <label for="product_type" class="col-sm-2 col-form-label">Product Type</label>
                            <div class="col-sm-10">
                                <select class='form-control' id='product_type' name='product_type' class='custom-select' required>
                                    <option value=''>Select one</option>
                                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <option value='<?php echo $row['dtt_id'] ?>'><?php echo $row['drytea_type']; ?></option> 
                                    <?php }
                                    ?>
                                </select>
                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pquantity" class="col-sm-2 col-form-label">Quantity</label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" name="pquantity" id="pquantity"
                                       placeholder="Enter net quantity">
                                <div class="invalid-feedback">
                                    Please enter quantity #.
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pdate" class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-10">
                                <input type="date"  class="form-control" name="pdate" id="pdate"

                                       <div class="invalid-feedback">

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
                                <button type="submit" name="addpro" class="btn btn-primary">Add</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                    </form>
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



