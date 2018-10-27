
<?php
error_reporting(E_ERROR||E_WARNING);
require_once 'template/header.php';
include './inc/database.php';
include './Model/supplierModel.php';

$id=$_GET['id'];
//var_dump($id);
$supp1=new Supplier();
$result=$supp1->getSupplierbysuppid($id);
$supp= mysqli_fetch_assoc($result);
print_r($row);
?>

<section class="container py-5">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-text">Edit Supplier </h4>
                </div>
                <div class="card-body">
                    <form action="Controler/supplierControler.php?action=update&id=<?php echo $id ?>" method="post" class="needs-validation" novalidate>

                        <div class="form-group row">
                            <label for="passbook" class="col-sm-2 col-form-label">Passbook Number</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" id="passbook" name="passbook"
                                       value="<?= $supp['passbook_no'] ?>" placeholder="Enter Passbook Number">
                                <div class="invalid-feedback">
                                    Please enter valid passbook Number.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" id="name" name="name"
                                       value="<?= $supp['name'] ?>" placeholder="Enter Your name">
                                <div class="invalid-feedback">
                                    Please enter valid name.
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="address" id="address"
                                           placeholder="Enter Address"> <?= $supp['address'] ?> </textarea>
                                <div class="invalid-feedback">
                                    Please enter address.
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nic" class="col-sm-2 col-form-label">NIC</label>
                            <div class="col-sm-10">
                                <input type="text" required maxlength="10" class="form-control" name="nic" id="nic"
                                       value="<?= $supp['id_no'] ?>" placeholder="Enter NIC No">
                                <div class="invalid-feedback">
                                    Please enter NIC #.
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-sm-2 col-form-label">Mobile No</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="mobile" id="mobile"
                                       value="<?= $supp['mobile_no'] ?>"  placeholder="Enter Mobile No">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">eMail</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email"
                                       value="<?= $supp['email'] ?>" id="email" placeholder="Enter email address">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="supp_type" class="col-sm-2 col-form-label">Supply Type</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="supp_type" name="supp_type" class="custom-select" required>
                                    <option value="">Select type</option>
                                    <option value="Hand Deliver" <?= $supp['supp_type'] == 'Hand Deliver' ? 'selected' : '' ?>>Hand Deliver</option>
                                    <option value="With Transport" <?= $supp['supp_type'] == 'With Transport' ? 'selected' : '' ?>>With Transport</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a Supply Type .
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pay_met" class="col-sm-2 col-form-label">Payment Method</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="pay_met" name="pay_met" class="custom-select"
                                        required>
                                    <option value="">Select method</option>
                                    <option value="Cash" <?= $supp['payment_met'] == 'Cash' ? 'selected' : '' ?>>Cash</option>
                                    <option value="Cheque" <?= $supp['payment_met'] == 'Cheque' ? 'selected' : '' ?>>Cheque </option>
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
                                       value="<?= $supp['regi_date'] ?>" placeholder="">
                                <div class="invalid-feedback">
                                    Please enter register date.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="remarks" class="col-sm-2 col-form-label">Remarks</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="remarks" id="remarks"
                                          placeholder="Enter remarks"><?= $supp['remarks'] ?></textarea>
                                <div class="invalid-feedback">
                                    Please enter comments.
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-sm-10 offset-2">
                                <button type="submit" name="update_supp" class="btn btn-primary">Update</button>
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

