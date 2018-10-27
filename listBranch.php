<?php
error_reporting(E_ERROR || E_WARNING);
require 'template/header.php';
include './inc/database.php';
include './Model/branchModel.php';

$branch = new Branch();
$result = $branch->getallbrnches();



//    $query = $db->query("SELECT * FROM tl_type");
//$data = [];
//    while ($result = $query->fetch_object()) {
//        $data [] = $result;
//    }
?>
<section class="container py-5" style="margin-left:10%;">

    <div class="row" style="width: 100%; margin-right: 0.3%;  " >
        <div class="col-12" style="width:90%;">
            <div class="card" >
                <div class="card-header" >
                    <div  class="btn-group">
                        <h4 class="card-text">Branches</h4>

                    </div>
                </div>
                <div class="card-body" style="width:100%;">

                    <table class="table table-striped table-hover" style="width:100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Branch</th>
                                <th>Location</th>
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
                                        <td><?= $value['branch_name'] ?></td>
                                        <td><?= $value['location'] ?></td>
                                        <td><?= $value['remarks'] ?></td>

                                        <td>
                                            <a href="editBranch.php?id=<?= $value['b_id'] ?>"><i class="fa fa-2x fa-edit"></i></a>
                                            <a href="deleteBranch.php?id=<?= $value['b_id'] ?>"
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