<?php
error_reporting(E_ERROR || E_WARNING);
require 'template/header.php';
include './inc/database.php';
include './Model/dealerModel.php';

$dealer1 = new Dealer();
$result = $dealer1->listallDealers();

//$data = [];
//if (isset($_POST['searchsupp'])) {
//
//    $namede = $_POST['namede'];
//
//    $query = $db->query("SELECT * FROM `dealers` WHERE  name='$namede' AND status='1' ");
//
//    while ($result = $query->fetch_object()) {
//        $data [] = $result;
//    }
//} else {
//
//    $query = $db->query("SELECT * FROM `dealers` WHERE status='1' ");
//
//    while ($result = $query->fetch_object()) {
//        $data [] = $result;
//    }
//}
?>
<section class="container py-5" style="margin-left:2%;">
    <script>
        function load() {
            var result = "<?= $_SESSION['megde'] ?>";
//            var result = "<? = $_SESSION['supp']" ? > ";
            if (result == 2) {
                swal("Good job!", "Updated Successfuly", "success");
            }
          
            else if (result = 3) {
                swal("Good job! !", "Delete Successfuly !", "success");
            }



        }
<?php
unset($_SESSION["megde"]);
?>
    </script>

    <div class="row" style="width: 130%; margin-right: 0.3%;  " >
        <div class="col-12" style="width:135%;margin-right: 0.1%; ">
            <div class="card" >
                <div class="card-header" >
                    <div  class="btn-group">
                        <form acction="listDealers.php" method="post">


                            <tr>

                                <td> <h4 class="card-text">List Dealers</h4> </td>
                                <td style="padding-left:190%; ">  <input type="text" name="searchde" placeholder="serch dealers"></td>
                                <td style="padding-left:125%; "> <button type="submit" name="search" >Search</button> </td>
                            </tr>



                        </form>
                    </div>
                </div>
                <div class="card-body" style="width:100%; padding-right: 1%;">

                    <table class="table table-striped table-hover" style="width:100%;">
                        <thead>
                            <tr>
                                <th>#</th>

                                <th>Name</th>
                                <th>Address</th>
                                <th>NIC</th>
                                <th>Mobile #</th>
                                <th>Land No. #</th>
                                <th>eMail</th>
<!--                                <th>Payment Method </th>-->
                                <th>Remarks</th>
                                <th>Register Date</th>
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
                                        <td><?= $value['name'] ?></td>
                                        <td><?= $value['address'] ?></td>
                                        <td><?= $value['nic_no'] ?></td>
                                        <td><?= $value['mobile'] ?></td>
                                        <td><?= $value['tel'] ?></td>
                                        <td><?= $value['email'] ?></td>
                                        <td><?= $value['remarks'] ?></td>
                                        <td><?= $value['created_at'] ?></td>
                                        


                                        <td>
                                            <a href="editDealers.php?id=<?= $value['de_id'] ?>"><i class="fa fa-2x fa-edit"></i></a>
                                            <a href="Controler/dealerControler.php?action=delete&id=<?= $value['de_id'] ?>"
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