<?php
require 'template/header.php';


  

    $query = $db->query("SELECT * FROM tl_type");
$data = [];
    while ($result = $query->fetch_object()) {
        $data [] = $result;
    }






?>

        <div class="row" style="width: 110%; margin-right: 0.3%;  " >
            <div class="col-12" style="width:90%;">
                <div class="card" >
                    <div class="card-header" 
>
                        <div  class="btn-group">
                             <h4 class="card-text">List Type</h4>
                             
                        </div>
                    </div>
                    <div class="card-body" style="width:80%; padding-right: 5%;">
<section class="container py-5" style="margin-left:0.1%;">
                        <table class="table table-striped table-hover" style="width:80%;">
                            <thead>
                            <tr>
                                <th>#</th>
                                 <th>Type</th>
                                <th>Price</th>
                                <th>Remarks</th>
                                
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
                                         <td><?= $value->tltype ?></td>
                                        <td><?= $value->tlprice ?></td>
                                       
                                        <td><?= $value->remarks ?></td>
                                        

                                       
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

<?php require 'template/footer.php' ?>