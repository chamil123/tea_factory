<?php
require '../template/header.php';

$query = $db->query("SELECT * FROM users WHERE status='1' ");
$data = [];
while ($result = $query->fetch_object()) {
    $data [] = $result;
}
?>
    <section class="container py-5">

        <div class="row">
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
                            if (!empty($data)) {
                                $c = 0;
                                foreach ($data as $value) {
                                    $c++;
                                    ?>
                                    <tr>
                                        <td><?= $c ?></td>
                                        <td><?= $value->name ?></td>
                                        <td><?= $value->nic ?></td>
                                        <td><?= $value->mobile ?></td>
                                        <td><?= $value->email ?></td>
                                        <td><?= $value->address ?></td>
                                        <td><?= $value->gender ?></td>
                                        <td class="text-center"><label
                                                    class="badge <?= $value->user_role == 'User' ? 'badge-warning' : 'badge-success' ?>"><?= $value->user_role ?></label>
                                        </td>
                                        <td>
                                            <a href="editUser.php?id=<?= $value->id ?>"><i class="fa fa-2x fa-edit"></i></a>
                                            <a href="delete.php?id=<?= $value->id ?>"
                                               onclick="return confirm('Are you sure want to delete thiis record?')"
                                               style="color:#dc3545"><i class="fa fa-2x fa-remove"></i></a>
                                        </td>
                                    </tr>
                                <?php }
                            } else {
                                echo "<tr><td colspan='9'>No records found..</td></tr>";
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php require '../template/footer.php' ?>