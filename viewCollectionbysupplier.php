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
        //$('#date').datepicker({dateFormat:'yy-mm'});
document.getElementById('passbook_2').value=$('#passbook').val();
document.getElementById('date_2').value=$('#date').val();
        $('#colecition_div').load('search_colectionbypassbook.php', {'passbook_no': $('#passbook').val(), 'date_value': $('#date').val()});
    }
    function loadPdf(){
        
        window.open('colection_invoicepdf.php?passbook='+$('#passbook').val()+"&month="+$('#date').val());
    }

</script>

<section class="container py-5" style="margin-left:0.1%;">
    <script>
        function load() {
            var result = "<?= $_SESSION['mespayment'] ?>";
  
            if (result == 2) {
                swal("Good job!", "Added successfuly", "success");
            }
            if (result == 3) {
                swal("Warning !", " Added invalid !", "error");
            }
        }
    </script>
    <?php
        unset($_SESSION["mespayment"]);
    ?>
    <div class="row" style="width: 120%; margin-right: 0.3%;  " >
        <div class="col-12" style="width:100%;">
            <div class="card" >
                <div class="card-header" >
                    <div class="row" >
                        <div class="col-md-9 " style="margin-left: 10px;">
                            <p><h4 class="card-text">List Suppliers</h4></p>
                            <div class="form-inline " >
                                <div class="form-group">
                                    <label for="passbook">Passbook No:</label>
                                    <input type="text" name="passbook"class="form-control" id="passbook">
                                </div>
                                <div class="form-group">
                                    <label for="date">Date:</label>
                                    <input type="date" name="date" class="form-control" id="date">
                                </div>
                                <div class="col-md-1" >
                                    <button  type="submit" class="btn btn-success"onclick="loaddata();">Search</button> 
                                </div>

                            </div>



                        </div>
                        <div class="col-md-1 " style="padding-top: 50px;padding-left: 130px">
                            <form action="Controler/supplierControler.php?action=payment" method="POST">
                                
                                <input type="hidden" id="passbook_2" name="passbook_2">
                                <input type="hidden" id="date_2" name="date_2">
                                <button style="float: left;" type="submit" class="btn btn-primary"> <span class="glyphicon glyphicon-file"></span></i>Save</button> 
                            </form>
                            <button style="margin-left: 10px" type="button" class="btn btn-warning" onclick="loadPdf();"> <span class="glyphicon glyphicon-print"></span></i>Print</button> 
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div id="colecition_div" >

                        </div>

                    </div>
               
                </div>


               
            </div>
        </div>
    </div>
</section>

<?php require 'template/footer.php' ?>