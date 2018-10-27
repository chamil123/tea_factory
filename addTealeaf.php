
<?php
error_reporting(E_ERROR || E_WARNING);
require_once 'template/header.php';
include './inc/database.php';
include './Model/branchModel.php';
$branch = new Branch();
$result = $branch->getallbrnches();

include './Model/teatypeModel.php';
$teatype = new Teatype();
$resulttea = $teatype->getallteatype();

?>
<script type="text/javascript" src="public/js/jquery-1.8.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="public/css/jquery.autocomplete.css" />

<script type="text/javascript" src="public/js/jquery.js"></script>
<script type="text/javascript" src="public/js/jquery.autocomplete.js"></script>

<section class="container py-5">
    <script>

        $(document).ready(function() {

            $("#passbook").autocomplete("loadpassbookno.php", {
                selectFirst: true
            });
//            load_val();
        });

       

    </script>
          
      <script>
        function load_val() {
            var nqty = document.getElementById("nquantity").value;
            if (nqty != "") {
                var leaf_id = $('#t_type').val();
                $.ajax({
                    type: "POST",
                    url: "getteatypeAjax.php?id=" + leaf_id,
                    success: function (data) {
                        var pro = JSON.parse(data);
                        for (var i in pro) {
                            var price = pro[i].price;
                            var duesub = (parseFloat(price)) * (parseFloat(nqty));
                            document.getElementById('toprice').value = duesub;
                        }
                    }
                });
            }else{
                 swal("Error!", "Field can't be empty", "error");
            }

        }
    </script>
        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-text">Add Tea Leaf</h4>
                </div>
                <div class="card-body">
                    <form action="Controler/colectionControler.php?action=add" method="post" class="needs-validation" novalidate>

                        <div class="form-group row">
                            <label for="passbook" class="col-sm-2 col-form-label">Passbook Number</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" id="passbook" name="passbook"
                                       placeholder="Enter Passbook Number">
                                <div class="invalid-feedback">
                                    Please enter valid passbook Number.
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="branch1" class="col-sm-2 col-form-label">Branch</label>
                            <div class="col-sm-10">
                                <select class='form-control' id='branch1' name='branch1' class='custom-select' required>
                                    <option value=''>Select one</option>
                                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <option value='<?php echo $row['id'] ?>'><?php echo $row['branch_name']; ?></option> 
                                    <?php }
                                    ?>
                                </select>
                                <?php
//                                echo "<select class='form-control' id='branch1' name='branch1' class='custom-select' required>"
//                                . "<option value=''>Select one</option>";
//                                if ($stmt = $db->query("$query")) {
//                                    while ($row1 = $stmt->fetch_assoc()) {
//                                        echo "<option value='$row1[br_id]'>$row1[branch]</option>";
//                                    }
//                                } else {
//                                    echo $connection->error;
//                                }
//                                echo "</select>";
                                ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nquantity" class="col-sm-2 col-form-label">Net Quantity</label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" name="nquantity" id="nquantity"
                                       placeholder="Enter net quantity">
                                <div class="invalid-feedback">
                                    Please enter quantity #.
                                </div>
                            </div>
                        </div>





                        <div class="form-group row">
                            <label for="tea_type" class="col-sm-2 col-form-label">Tea Type</label>
                            <div class="col-sm-10">

                                <select class='form-control' id='t_type' name='t_type' onchange="load_val(this);" class='custom-select' required>
                                    <option value=''>Select one</option>
                                    <?php while ($row = mysqli_fetch_assoc($resulttea)) { ?>
                                        <option value='<?php echo $row['tlt_id'] ?>'><?php echo $row['tl_type']; ?></option> 
                                    <?php }
                                    ?>
                                </select>

                                <?php
//                                echo "<select class='form-control' id='supp_type' name='tea_type' class='custom-select' required>"
//                                . "<option value=''>Select one</option>";
//
//
//                                if ($stmt1 = $db->query("$query1")) {
//                                    while ($row2 = $stmt1->fetch_assoc()) {
//
//                                        echo "<option value='$row2[tlt_id]'>$row2[tltype]</option>";
//                                    }
//                                } else {
//                                    echo $connection->error;
//                                }
//
//                                echo "</select>";
//                                
                                ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="toprice" class="col-sm-2 col-form-label">Total Price</label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" name="toprice" id="toprice"

                                       <div class="invalid-feedback">

                                </div>
                            </div>
                            <div class="form-group row">
                            <label for="remarks" class="col-sm-2 col-form-label">Remarks</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="remarks" id="remarks"
                                          placeholder="Enter remarks"></textarea>
                                <div class="invalid-feedback">
                                    Please enter comments.
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-sm-10 offset-2">
                                <button type="submit" name="add" class="btn btn-primary">Add</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</section>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

<?php
require 'template/footer.php'
?>



