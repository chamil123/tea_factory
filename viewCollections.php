<?php
error_reporting(E_ERROR || E_WARNING);
require 'template/header.php';
include './inc/database.php';
include './Model/colectionModel.php';

$collection = new Colection();
$result = $collection->getAllCollections();



//    $query = $db->query("SELECT * FROM tl_type");
//$data = [];
//    while ($result = $query->fetch_object()) {
//        $data [] = $result;
//    }
?>
<section class="container py-5" style="margin-left:10%;">
       <script>
        function load() {
            var result = "<?= $_SESSION['msgcol'] ?>";
  //            var result = "<? = $_SESSION['supp']" ? > ";
            if (result == 2) {
                swal("Good job!", "update successfuly", "success");
            }
            if (result == 5) {
              swal("Good job!", "DELETE successfuly", "success");
            }
        }
    </script>
    <?php
        unset($_SESSION["msgcol"]);
        ?>

    <div class="row" style="width: 100%; margin-right: 0.3%;  " >
        <div class="col-12" style="width:90%;">
            <div class="card" >
                <div class="card-header" >
                    <div  class="btn-group">
                        <h4 class="card-text">Daily Collection</h4>

                    </div>
                </div>
                <div class="card-body" style="width:100%;">

                    <table class="table table-striped table-hover" style="width:100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Passbook No.</th>
                                <th>Supplier Name</th>
                                <th>Branch</th>
                                <th>Net quantity</th>
                                <th>Tea type</th>
                                <th>Price</th>
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
                                        <td><?= $value['col_date'] ?></td>
                                        <td><?= $value['passbook_no'] ?></td>
                                        <td><?= $value['supller_name'] ?></td>
                                        <td><?= $value['branch_name'] ?></td>
                                        <td><?= $value['net_qu'] ?></td>
                                        <td><?= $value['tea_type'] ?></td>
                                        <td><?= $value['total_price'] ?></td>
                                        <td><?= $value['remarks'] ?></td>

                                        <td>
                                            <a href="editTealeaf.php.?id=<?= $value['dc_id'] ?>"><i class="fa fa-2x fa-edit"></i></a>
                                            <a href="Controler/supplierControler.php?action=delete&id=<?= $value['supp_id'] ?>"
                                               onclick="return confirm('Are you sure want to delete thiis record?')"
                                               style="color:#dc3545"><i class="fa fa-2x fa-remove"></i></a>
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