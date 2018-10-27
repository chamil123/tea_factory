<?php
error_reporting(E_ERROR || E_WARNING);
require 'template/header.php';
//include './inc/database.php';
//include './Model/userModel.php';

$user = new User();
$result = $user->giveallUsers();

//
//$query = $db->query("SELECT * FROM users WHERE status='1' ");
//$data = [];
//while ($result = $query->fetch_object()) {
//    $data [] = $result;
//}
?>
<section class="container py-5">
    <script>
        function load() {
            var result = "<?= $_SESSION['mesuser'] ?>";
            //            var result = "<? = $_SESSION['supp']" ? > ";
            if (result == 2) {
                swal("Good job!", "Update successfuly", "success");
            }
            else if (result == 3) {
                swal("Good job!", "DELETE successfuly", "success");
            }
        }
    </script>
    <?php
    unset($_SESSION["mesuser"]);
    ?>

    <div class="row" >
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-text">List User</h4>

                </div>
                <div class="card-body">

                    <table class="table table-striped table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>NIC</th>
                                <th>Mobile #</th>
                                <th>eMail</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>User Role</th>
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
                                        <td><?= $value['nic'] ?></td>
                                        <td><?= $value['mobile'] ?></td>
                                        <td><?= $value['email'] ?></td>
                                        <td><?= $value['address'] ?></td>
                                        <td><?= $value['gender'] ?></td>
                                        <td class="text-center"><label
                                                class="badge <?= $value['role_name'] == 'Subject Clerk' ? 'badge-warning' : 'badge-success' ?>"><?= $value['role_name'] ?></label>
                                        </td>
                                        <td>
                                             <?php if($row['role_id']==1){ ?>
                                            <a href="editUser.php?id=<?= $value['id'] ?>"><i class="fa fa-2x fa-edit"></i></a>
                                             <?php }?>
                                            <a href="Controler/userControler.php?action=delete&id=<?= $value['id'] ?>"
                                               onclick="return confirm('Are you sure want to delete thiis record?')"
                                               style="color:#dc3545"><i class="fa fa-2x fa-remove"></i></a>
        <!--                                            <a href="delete.php?id=<?= $value['id'] ?>"
                                               onclick="return confirm('Are you sure want to delete thiis record?')"
                                               style="color:#dc3545"><i class="fa fa-2x fa-remove"></i></a>-->
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