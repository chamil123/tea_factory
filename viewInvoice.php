<?php
error_reporting(E_ERROR || E_WARNING);
require 'template/header.php';
include './inc/database.php';
include './Model/dealerModel.php';
$invoice=new Dealer();

$invoice_id=$_GET['invoice_id'];
$result=$invoice->getInvoiceById($invoice_id);
$row= mysqli_fetch_assoc($result);

$resultInvItems=$invoice->getInvoiceItemsById($invoice_id);


?>

<script type="text/javascript" src="public/js/jquery-1.8.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="public/css/jquery.autocomplete.css" />

<script type="text/javascript" src="public/js/jquery.js"></script>
<script type="text/javascript" src="public/js/jquery.autocomplete.js"></script>
<section class="container py-5" style="margin-left:10%;">
    <style>
        .table td {
            padding: 0.3rem; 
        }
    </style>

  

    <div class="row" style="width: 100%; margin-right: 0.3%;  " >
        <div class="col-12" style="width:90%;">
            <div class="card" >
                <div class="card-header" >
                    <div  class="btn-group">
                        <h4 class="card-text">Invoice</h4>

                    </div>
                </div>
                <form action="Controler/dealerControler.php?action=invoice" method="POST">
                    <div class="col-md-5" style="margin-left: 8px;margin-top: 20px;margin-bottom: -10px">
                        <div class="form-group row">
                            <label for="example-search-input" class="col-4 col-form-label">Invoice No :</label>
                            <div class="col-8">
                                <input class="form-control" type="text" value="<?php echo $row['invoice_no']; ?>"  id="invoice_no" name="invoice_no">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-4 col-form-label">Dealer Name :</label>
                            <div class="col-8">
                                 <input class="form-control" type="text" value="<?php echo $row['invoice_dealer_name']; ?>"  id="invoice_no" name="invoice_no">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" class="col-4 col-form-label">Date :</label>
                            <div class="col-8">
                                <input class="form-control" type="text"  id="invoice_date" value="<?php echo $row['invoice_date']?>" name="invoice_date">
                            </div>
                        </div>

                    </div>
                    <div class="card-body" style="width:100%;">
                        <table width="100%"   id="table1" class="table table-bordered">
                            <thead >
                           
                            <th ><strong >Tea Type</strong></th>
                            <th  ><strong>Price</strong> </th>
                            <th ><strong>Qty</strong> </th>
                            <th ><strong>Amount</strong> </th>

                            </thead>
                           <?php
                           $total=0;
                           while ($rowit= mysqli_fetch_assoc($resultInvItems)){
                               $total+=$rowit['inv_item_amount'];
                               ?>
                            <tr>
                                <td><?php echo $rowit['drytea_type']?></td>
                                <td><?php echo $rowit['inv_item_price']?></td>
                                <td><?php echo $rowit['inv_item_qty']?></td>
                                <td align="right"><?php echo $rowit['inv_item_amount']?></td>
                            </tr>
                           <?php } ?>
                        </table>
                        <div class="col-md-12">
                            <!--<div class="col-md-4" style="border: 1px solid;float: left">sasasas</div>-->
                            <div  style="float: right;margin-top: -10px;margin-right: -13px;width: 360px">
                                <div class="form-group row">
                                    <label for="example-search-input" class="col-3 col-form-label">Total :</label>
                                    <div class="col-9">
                                        <input class="form-control" type="text"  id="total" style="text-align:right" value="<?=$total;?>" name="total">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require 'template/footer.php' ?>