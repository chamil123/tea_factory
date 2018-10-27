<?php
error_reporting(E_ERROR || E_WARNING);
require 'template/header.php';
include './inc/database.php';
include './Model/dealerModel.php';

$invoice = new Dealer();
$result = $invoice->viewAllInvoices();
?>
<section class="container py-5" style="margin-left:10%;">
    <script>
        function load() {
            var result = "<?= $_SESSION['invoice'] ?>";
            if (result == 1) {
                swal("Good job!", "Insert successfuly", "success");
            }

        }
    </script>
    <script>
    function loadPdf(invoice_id){
        alert(invoice_id);
        window.open('dealer_invoicepdf.php?inv_id='+invoice_id);
    }
</script>
    <?php
    unset($_SESSION["invoice"]);
    ?>

    <div class="row" style="width: 100%; margin-right: 0.3%;  " >
        <div class="col-12" style="width:90%;">
            <div class="card" >
                <div class="card-header" >
                    <div  class="btn-group">
                        <h4 class="card-text">View Invoices</h4>

                    </div>
                </div>
                <div class="card-body" style="width:100%;">

                    <table class="table table-striped table-hover" style="width:100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Invoice Number</th>
                                <th>Created Date</th>
                                <th>Dealer Name</th>
                                <th>Amount</th>
                                <th>Status</th>
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
                                        <td><?= $value['invoice_id'] ?></td>
                                        <td><?= $value['invoice_no'] ?></td>
                                        <td><?= $value['invoice_dealer_name'] ?></td>
                                        <td><?= $value['invoice_date'] ?></td>
                                        <td><?= $value['invoice_total'] ?></td>
                                        <td><?php
                                            if ($value['invoice_status'] == 0) {
                                                echo 'Active';
                                            } else {
                                                echo 'Delete';
                                            }
                                            ?></td>

                                        <td>
                                            <a href="viewInvoice.php?invoice_id=<?=$value['invoice_id']?>"><i class="fa fa-1x fa-file"></i></a>
                                            <a href=""
                                               onclick="loadPdf(<?=$value['invoice_id'] ?>);"
                                               style="color:#dc3545"><i class="fa fa-1x fa-print" ></i></a>
                                        </td>
                                    </tr>
                                    <?php
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