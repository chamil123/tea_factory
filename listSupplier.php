<?php
error_reporting(E_ERROR || E_WARNING);
require 'template/header.php';
include './inc/database.php';
include './Model/supplierModel.php';

$supp = new Supplier();
$result = $supp->giveallSuppliers();


//if(isset($_POST['searchsupp'])){
//
//    $passbook_no=$_POST['searchsupp'];
//
//    $query = $db->query("SELECT * FROM supplier WHERE passbook_no='$passbook_no' AND status='1' ");
//
//    while ($result = $query->fetch_object()) {
//        $data [] = $result;
//    }
//}else{
//
//    $query = $db->query("SELECT * FROM supplier WHERE status='1' ");
//
//    while ($result = $query->fetch_object()) {
//        $data [] = $result;
//    }
//}
?>
<section class="container py-5" style="margin-left:0.1%;">
    <script>
        function load() {
            var result = "<?= $_SESSION['msgsupp'] ?>";
  //            var result = "<? = $_SESSION['supp']" ? > ";
            if (result == 2) {
                swal("Good job!", "update successfuly", "success");
            }
            if (result == 3) {
                swal("Good job!", "DELETE successfuly", "success");
            }
        }
    </script>
    <?php
        unset($_SESSION["msgsupp"]);
        ?>
    <div class="row" style="width: 130%; margin-right: 0.3%;  " >
        <div class="col-12" style="width:100%;">
            <div class="card" >
                <div class="card-header" >
                    <div  class="btn-group">
                        <form acction="listSupplier.php" method="post">


                            <tr>

                                <td> <h4 class="card-text">List Suppliers</h4> </td>
                                <td style="padding-left:190%; ">  <input type="text" name="searchsupp" placeholder="serch supplier"></td>
                                <td style="padding-left:125%; "> <button type="submit" name="search" >Search</button> </td>
                            </tr>



                        </form>
                    </div>
                </div>
                <div class="card-body" style="width:100%; padding-right: 5%;">

                    <table class="table table-striped table-hover" style="width:80%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Passbook No.</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>NIC</th>
                                <th>Mobile #</th>
                                <th>eMail</th>
                                <th>supply_type</th>
                                <th>Payment Method </th>
                                <th>Register Date</th>
                                <th>Remarks</th>
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
                                        <td> <?= 'MT' . $value['passbook_no'] ?></td>
                                        <td><?= $value['name'] ?></td>
                                        <td><?= $value['address'] ?></td>
                                        <td><?= $value['id_no'] ?></td>
                                        <td><?= $value['mobile_no'] ?></td>
                                        <td><?= $value['email'] ?></td>
                                        <td><?= $value['supp_type'] ?></td>
                                        <td><?= $value['payment_met'] ?></td>
                                        <td><?= $value['regi_date'] ?></td>
                                        <td><?= $value['remarks'] ?></td>


                                        <td>
                                            <a href="editSupplier.php?id=<?= $value['supp_id'] ?>"><i class="fa fa-2x fa-edit"></i></a>
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