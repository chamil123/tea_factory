<?php
require 'template/header.php';

$data = [];
if(isset($_POST['search1'])){

    $tldate=$_POST['searchd'];

    $query = $db->query("SELECT * FROM tealeaf INNER JOIN supplier ON tealeaf.supp_id=supplier.supp_id INNER JOIN
            tl_price ON tealeaf.tlp_id=tl_price.tlp_id WHERE tealeaf.date='$tldate'");

    while ($result = $query->fetch_object()) {
        $data [] = $result;
    }
    
}else{

    $query = $db->query("SELECT * FROM tealeaf INNER JOIN supplier ON tealeaf.supp_id=supplier.supp_id INNER JOIN
            tl_price ON tealeaf.tlp_id=tl_price.tlp_id");

    while ($result = $query->fetch_object()) {
        $data [] = $result;
    }
}


?>
<section class="container py-5" style="margin-left:0.1%;">

        <div class="row" style="width: 110%; margin-right: 0.3%;  " >
            <div class="col-12" style="width:90%;">
                <div class="card" >
                    <div class="card-header" >
                        <div  class="btn-group">
                        <form acction="listTealeaf.php" method="post">

                          
                            <tr>
                                
                                <td> <h4 class="card-text">List Tea leaf  </h4> </td>
                                <td style="padding-left:190%; ">  <input type="date" name="searchd" placeholder="serch tea leaf"></td>
                                <td style="padding-left:125%; "> <button type="submit" name="search1" >Search</button> </td>
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
                                <th>Total Quantity</th>
                                 <th>Net Quantity</th>
                                <th>Date</th>
                                <th>Price (per kg)</th>
                                <th>Remarks</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $grandTotal=0;
                            if (!empty($data)) {
                                $c = 0;
                                foreach ($data as $value) {
                                    $c++;
                                    $grandTotal=$grandTotal+$value->net_qua;
                                    ?>
                               
                                    <tr>
                                        <td><?= $c ?></td>
                                        <td> <?= 'MT'.$value->passbook_no ?></td>
                                        <td><?= $value->total_qua?></td>
                                        <td><?= $value->net_qua ?></td>
                                        <td><?= $value->date ?></td>
                                        <td><?= $value->tlprice ?></td>
                                        <td><?= $value->remarks ?></td>
                                       
                                        

                                        
                                    </tr>
                                <?php }
                            } else {
                                echo "<tr><td colspan='9'>No records found..</td></tr>";
                            } ?>
                                    <tr>
                                        <td>Total</td>
                                        <td> </td>
                                        <td></td>
                                        <td><?php echo $grandTotal ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                       
                                                                                
                                    </tr> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php require 'template/footer.php' ?>