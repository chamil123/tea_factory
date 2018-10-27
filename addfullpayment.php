<?php
error_reporting(E_ERROR || E_WARNING);
require 'template/header.php';
include './inc/database.php';
include './Model/supplierModel.php';

$supp = new Supplier();
$result = $supp->giveallSuppliers();
?>
<script type="text/javascript" src="public/js/jquery-1.8.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="public/css/jquery.autocomplete.css" />

<script type="text/javascript" src="public/js/jquery.js"></script>
<script type="text/javascript" src="public/js/jquery.autocomplete.js"></script>
<script>
    $(document).ready(function() {

        $("#passbook").autocomplete("loadpassbookno.php", {
            selectFirst: true
        });
    });
    function loaddata() {
        $('#colecition_div').load('search_colectionbypassbook.php',{'passbook_no':$('#passbook').val(),'date_value':$('#date').val()});
    }

</script>
<section class="container py-5">
<!--    <script>
        function load() {
            var result = "<?= $_SESSION['msgsupp'] ?>";
//            var result = "<? = $_SESSION['supp']" ? > ";
            if (result == 1) {
                swal("Good job!", "Data added", "success");
            }
          
            else if (result = 5) {
                swal("Warning !", "Supplier Added invalid !", "error");
            }



        }
<?php
unset($_SESSION["msgsupp"]);
?>
    </script>-->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-text">Monthly Payments</h4>
                    <div class="form-inline" >
                                <div class="form-group">
                                    <label for="passbook">Passbook No:</label>
                                    <input type="text" name="passbook"class="form-control" id="passbook">
                                </div>
                                <div class="form-group">
                                    <label for="date">Date:</label>
                                    <input type="date" name="date" class="form-control" id="date">
                                </div>
                                <div class="col-md-1">
                                    <button  type="submit" class="btn btn-default"onclick="loaddata();">Submit</button> 
                                </div>

                            </div>
                </div>
                
                <div class="card-body">
                    <form action="Controler/supplierControler.php?action=add" method="post" class="needs-validation" novalidate>
 
                        <div class="form-group row">
                            <label for="tamount" class="col-sm-2 col-form-label">Total Amount</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" id="tamount" name="tamount"
                                       placeholder="">
                                <div class="invalid-feedback">
                                    Please enter valid passbook Number.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="adamount" class="col-sm-2 col-form-label">Advance Amount</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" id="adamount" name="adamount"
                                       placeholder="">
                                <div class="invalid-feedback">
                                    Please enter valid name.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="adamount" class="col-sm-2 col-form-label">Balance</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" id="adamount" name="adamount"
                                       placeholder="">
                                <div class="invalid-feedback">
                                    Please enter valid name.
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pay_met" class="col-sm-2 col-form-label">Payment Method</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="pay_met" name="pay_met" class="custom-select"
                                        required>
                                    <option value="">Select method</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Cheque">Cheque </option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a Payment Method.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="regi_date" class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-10">
                                <input type="date" required class="form-control" name="regi_date" id="date"
                                       placeholder="">
                                <div class="invalid-feedback">
                                    Please enter register date.
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
                                <button type="submit" name="addsupplier" class="btn btn-primary">Pay</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require 'template/footer.php' ?>