<?php
error_reporting(E_ERROR || E_WARNING);
include './inc/database.php';
include './Model/colectionModel.php';

$collection = new Colection();
$passbook_no = $_REQUEST['passbook_no'];
$date_value = $_REQUEST['date_value'];

$pass = $collection->getSupplierIdBypassBookNo($passbook_no);
$row = mysqli_fetch_assoc($pass);


$result = $collection->giveColectionpb_date();

$year_month = substr($date_value, 0, 7);
?>

<div class="row" style="width: 100%; margin-right: 0.3%; margin-top: 20px;" >
    <div class="col-12" style="width:90%;">
        <div class="card" >
            <div class="card-header" >
                <div  class="btn-group">
                    <h4 class="card-text">Daily Collection</h4>

                </div>
            </div>
            <div class="card-body" style="width:100%;">

                <table class="table table-striped table-hover" style="width:100%;" border="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Supplier Name</th>
                            <th>Branch</th>
                            <th>Net quantity (Kg)</th>
                            <th>Tea type</th>                           
                            <th>Remark</th>
                            <th>Price</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($result)) {
                            $c = 0;
                            $total=0;
                            while ($value = mysqli_fetch_assoc($result)) {
                           
                                if ($year_month == $value['yr_mn']&&$passbook_no==$value['passbook_no']) {
                                    $c++;
                                    $total+=$value['total_price'];
                                    ?>

                                    <tr>
                                        <td><?= $c ?></td>
                                        <td><?= $value['col_date'] ?></td>
                                        <td><?= $value['supplier_name'] ?></td>
                                        <td><?= $value['branch_name'] ?></td>
                                        <td><?= $value['net_qu'] ?></td>
                                        <td><?= $value['tea_type'] ?></td>                         
                                        <td><?= $value['remarks'] ?></td>
                                        <td style="width: 150px; text-align: right"> <?= $value['total_price'] ?></td>

                                                <!--                                        <td>
                                                                                            <a href="editBranch.php?id=<?= $value['dc_id'] ?>"><i class="fa fa-2x fa-edit"></i></a>
                                                                                            <a href="deleteBranch.php?id=<?= $value['b_id'] ?>"
                                                                                               onclick="return confirm('Are you sure want to delete thiis record?')"
                                                                                               style="color:#dc3545"><i class="fa fa-2x fa-remove"></i></a>
                                                                                        </td>-->

                                    </tr>
                                    <?php
                                }
                            }
                        } else {
                            echo "<tr><td colspan='9'>No records found..</td></tr>";
                        }
                        ?>
                                    <tr>
                                        <td colspan="6"></td>
                                        <td align="right">Total :</td>
                                        <td><input  style="width: 150px; font-weight: bold;text-align: right"type="text" value="<?=$total?>" required class="form-control" id="total" name="total"
                                      </td>
                                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
