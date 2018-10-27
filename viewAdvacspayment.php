<?php
error_reporting(E_ERROR || E_WARNING);
require 'template/header.php';
include './inc/database.php';
include './Model/colectionModel.php';
include './Model/advancepaymentModel.php';

$collection=new Colection();
$advancepay = new Advance_Payements();
$passbook_no = $_REQUEST['passbook_no'];
$date_value = $_REQUEST['date_value'];

$pass = $collection->getSupplierIdBypassBookNo($passbook_no);
$row = mysqli_fetch_assoc($pass);


$result = $advancepay->getAdvance();

$year_month = substr($date_value, 0, 7);
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

        $('#colecition_div').load('search_advancepayment.php', {'passbook_no': $('#passbook').val(), 'date_value': $('#date').val()});
    }
//    function loadPdf(){
//        window.open('colection_invoicepdf.php?passbook='+$('#passbook').val()+"&month="+$('#date').val());
//    }

</script>

<section class="container py-5" style="margin-left:0.1%;">
    <script>
        function load() {
            var result = "<?= $_SESSION['msgad'] ?>";
  
            if (result == 2) {
                swal("Good job!", "update successfuly", "success");
            }
            if (result == 5) {
                swal("Good job!", "DELETE successfuly", "success");
            }
        }
    </script>
    <?php
        unset($_SESSION["msgad"]);
    ?>
    <div class="row" style="width: 130%; margin-right: 0.3%;  " >
        <div class="col-12" style="width:100%;">
            <div class="card" >
                <div class="card-header" >
                    <div class="row" >
                        <div class="col-md-10 " style="margin-left: 10px;">
                            <p><h4 class="card-text">Advance payment List</h4></p>
<!--                            <div class="form-inline " >
                                <div class="form-group">
                                    <label for="passbook">Passbook No:</label>
                                    <input type="text" name="passbook"class="form-control" id="passbook">
                                </div>
                                <div class="form-group">
                                    <label for="date">Date:</label>
                                    <input type="date" name="date" class="form-control" id="date">
                                </div>
                                <div class="col-md-1" >
                                    <button  type="submit" class="btn btn-default"onclick="loaddata();">Submit</button> 
                                </div>

                            </div>-->



                        </div>
                        <!--                        <div class="col-md-1 " style="padding-top: 50px;padding-left: 120px">
                                                    <button  type="button" class="btn btn-default" onclick="loadPdf();"> <span class="glyphicon glyphicon-print"></span></i>Print</button> 
                                                </div>-->
                    </div>
                    <div class="col-md-12">
                        <div id="colecition_div" >

                        </div>

                    </div>

                </div>
                <div class="card-body" style="width:100%;">

                    <table class="table table-striped table-hover" style="width:100%;" border="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Supplier Name</th>
                                <th>Date</th>
                                <th>Advance Amount (Rs.)</th>
                                <th>Payment Method </th>
                                <th>Remark</th>
                                 <th>Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($result)) {
                                $c = 0;
                            
                                while ($value = mysqli_fetch_assoc($result)) {

                                   
                                        $c++;
                                   
                                        ?>

                                        <tr>
                                            <td><?= $c ?></td>
                                            <td style="width: 300px;"><?= $value['supplier_name'] ?></td>
                                            <td><?= $value['pay_date'] ?></td>
                                            <td style="padding-left: 100px;"><?= $value['advance_amount'] ?></td>
                                            <td style="padding-left: 150px;"><?= $value['pay_method'] ?></td>                         
                                            <td><?= $value['remarks'] ?></td>
            <!--                                        <td style="width: 150px; text-align: right"> <?= $value['total_price'] ?></td>-->

                                                <td>
                                                    <a href="editAdvancepayment.php?id=<?= $value['advpay_id'] ?>"><i class="fa fa-2x fa-edit"></i></a>
                                            <a href="Controler/supplierControler.php?action=delete&id=<?= $value['advpay_id'] ?>"
                                               onclick="return confirm('Are you sure want to delete thiis record?')"
                                               style="color:#dc3545"><i class="fa fa-2x fa-remove"></i></a>
                                        </td>           

                                        </tr>
                                        <?php
                                   // }
                                }
                            } else {
                                echo "<tr><td colspan='9'>No records found..</td></tr>";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</section>

<?php require 'template/footer.php' ?>