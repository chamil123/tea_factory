<?php
require 'template/header.php';


include './inc/database.php';
include './Model/dryteatypeModel.php';

$drytea = new Dryteatype();
$result = $drytea->getallDryteatype();

//    $query = $db->query("SELECT * FROM tl_type");
//$data = [];
//    while ($result = $query->fetch_object()) {
//        $data [] = $result;
//    }
?>
<section class="container py-5" style="margin-left:0.1%;">

    <div class="row" style="width: 110%; margin-right: 0.3%;  " >
        <div class="col-12" style="width:90%;">
            <div class="card" >
                <div class="card-header" >
                    <div  class="btn-group">
                        <h4 class="card-text">List Dry Tea Type</h4>

                    </div>
                </div>
                <div class="card-body" style="width:80%; padding-right: 5%;">

                    <table class="table table-striped table-hover" style="width:80%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> Dry Tea Type</th>
                                <th>Price</th>
                                <th>Remarks</th>

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
                                        <td><?= $value['drytea_type'] ?></td>
                                        <td><?= $value['dtprice'] ?></td>

                                        <td><?= $value['remarks'] ?></td>



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