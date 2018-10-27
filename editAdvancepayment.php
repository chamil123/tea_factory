<?php
error_reporting(E_ERROR || E_WARNING);
require 'template/header.php';
include './inc/database.php';
include './Model/supplierModel.php';
include './Model/advancepaymentModel.php';

$supp = new Supplier();
$result = $supp->giveallSuppliers();

$id=$_GET['id'];
$advance1=new Advance_Payements();
$result1=$advance1->getAdvancebyid($id);
$advance2=  mysqli_fetch_assoc($result1);


?>
<script type="text/javascript" src="public/js/jquery-1.8.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="public/css/jquery.autocomplete.css" />

<script type="text/javascript" src="public/js/jquery.js"></script>
<script type="text/javascript" src="public/js/jquery.autocomplete.js"></script>
<script>
    function checkavilable(str)
    {
        var tot = $('#total').val();

        if (parseFloat(tot) < parseFloat(str)) {
            swal("Warning !", "Advance amount is over the total amount !", "error");
        }
//        var xmlhttp;
//        if (str == "")
//        {
//            document.getElementById("txtHint").innerHTML = "";
//            return;
//        }
//        if (window.XMLHttpRequest)
//        {// code for IE7+, Firefox, Chrome, Opera, Safari
//            xmlhttp = new XMLHttpRequest();
//        } else
//        {// code for IE6, IE5
//            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//        }
//        xmlhttp.onreadystatechange = function()
//        {
//            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
//            {
//                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
//            }
//        }
//        var branchNum = document.getElementById("member_br").value;
//        var centerNum = document.getElementById("centerNumber").value;
//        // xmlhttp.open("GET", "getUserName.php?q=" + str, true);
//        xmlhttp.open("GET", "getAvailablebalnce.php?payment="+str, true);
//        xmlhttp.send();
    }
    $(document).ready(function() {

        $("#passbook").autocomplete("loadpassbookno.php", {
            selectFirst: true
        });
    });
    function loaddata() {
        $('#colecition_div').load('search_colectionbypassbook.php', {'passbook_no': $('#passbook').val(), 'date_value': $('#date').val()});
        document.getElementById('passbookno').value = $('#passbook').val();
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
                    <h4 class="card-text">Advance Payments</h4>
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
                    <div class="col-md-12">
                        <div id="colecition_div" >

                        </div>

                    </div>
                </div>

                <div class="card-body">
                    <form action="Controler/advancepaymentControler.php?action=update&id" method="post" class="needs-validation" novalidate>
                        <input type="hidden" required class="form-control" id="passbookno" name="passbookno"
                               value="<?= $advance2['passbook_no']?>" placeholder="">

                        <div class="form-group row">
                            <label for="adamount" class="col-sm-2 col-form-label">Advance Amount</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" onkeyup="checkavilable(this.value)" id="adamount" name="adamount"
                                       value="<?= $advance2['advance_amount']?>"placeholder="">
                                <div class="invalid-feedback">
                                    Please enter valid amount.
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pay_met" class="col-sm-2 col-form-label">Payment Method</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="pay_met" name="pay_met" class="custom-select"
                                        required>
                                    <option value="<?= $advance2['pay_method']?>"><?= $advance2['pay_method']?></option>
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
                                       value="<?= $advance2['pay_date']?>"placeholder="">
                                <div class="invalid-feedback">
                                    Please enter register date.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="remarks" class="col-sm-2 col-form-label">Remarks</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="remarks" id="remarks"
                                          placeholder="Enter remarks"> <?= $advance2['remarks']?></textarea>
                                <div class="invalid-feedback">
                                    Please enter comments.
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-sm-10 offset-2">
                                <button type="submit" name="update_adv" class="btn btn-primary">Pay</button>
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