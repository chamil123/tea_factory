<?php
error_reporting(E_ERROR || E_WARNING);
require 'template/header.php';
include './inc/database.php';
include './Model/teatypeModel.php';
$tealeaf = new Teatype();
$result = $tealeaf->getAllDryTeaLeaf();
$resultSup = $tealeaf->getSuppleir();
?>
<script type="text/javascript" src="public/js/jquery-1.8.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="public/css/jquery.autocomplete.css" />

<script type="text/javascript" src="public/js/jquery.js"></script>
<script type="text/javascript" src="public/js/jquery.autocomplete.js"></script>
<section class="container py-5" style="margin-left:10%;">
    <style>
        .table td {
            padding: 0.1rem; 
        }
    </style>
    <script>
        tea = [];

        $(document).ready(function () {
            $.ajax({
                type: "POST",
                url: "getDryTeaTypes.php",
                success: function (data) {
                    var pro = JSON.parse(data);
                    for (var i in pro) {
                         var id = pro[i].dtt_id;
                        var type = pro[i].drytea_type;
                        var price = pro[i].dtprice;
                        tea.push([type, price,id]);
                    }
                }
            });
        });
        var i = 1;

        function addRow() {
            
            var total = 0;
//
            var tbl = document.getElementById('table1');
            var lastRow = tbl.rows.length;
            var iteration = lastRow - 1;
            var row = tbl.insertRow(lastRow);

            document.getElementById('row').value = lastRow - 1;

            var checkCell = row.insertCell(0);
            var el0 = document.createElement('input');
            el0.class = 'require-one';
            el0.type = 'checkbox';
            el0.name = 'check_' + i;
            el0.id = 'check_' + i;

            checkCell.appendChild(el0);
            var firstCell = row.insertCell(1);
            var select = document.createElement("select");
            select.setAttribute('name', 'selRow' + i);
            select.setAttribute('id', 'selRow' + i);
            select.setAttribute('onchange', 'liad("' + i + '")');
            select.setAttribute('class', 'form-control');

            for (var j = 0; j < tea.length; j++) {
                var option = document.createElement("option");
                option.value = tea[j][2];
                option.text = tea[j][0];
                select.add(option);
            }

            firstCell.appendChild(select);

            var secondCell = row.insertCell(2);
            var el2 = document.createElement('input');
            el2.type = 'text';
            el2.name = 'price_' + i;
            el2.id = 'price_' + i;

            el2.className = 'form-control';
            secondCell.appendChild(el2);

            var thirdCell = row.insertCell(3);
            var el3 = document.createElement('input');
            el3.type = 'text';
            el3.name = 'qty_' + i;
            el3.id = 'qty_' + i;
            el3.setAttribute('onkeyup', 'getAmount("' + i + '")');

            el3.className = 'form-control';
            thirdCell.appendChild(el3);

            var forthCell = row.insertCell(4);
            var el4 = document.createElement('input');
            el4.type = 'text';
            el4.name = 'amount_' + i;
            el4.id = 'amount_' + i;
            el4.className = 'form-control';
//            el4.value = memberid;
            forthCell.appendChild(el4);
            i++;
            for (var r = 1; r < lastRow; r++) {
                var row_val = lastRow - 2;
                var amt = document.getElementById('amount_' + String(r - 1)).value;
                total += parseFloat(amt);
            }
            document.getElementById('total').value = total;
        }
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
        function liad(val) {
            
            var dtId = $('#selRow' + String(val) + ' :selected').val();
            $.ajax({
                type: "POST",
                url: "getDryteatypeAjax.php?id=" +dtId,
                success: function (data) {
                    var pro = JSON.parse(data);
                    for (var i in pro) {
                        var price = pro[i].dtprice;
                        document.getElementById('price_' + String(val)).value = price;
                    }
                }
            });
            
            
//            document.getElementById('price_' + String(val)).value = price;
        }
        function getAmount(val) {
            var tbl = document.getElementById('table1');
            var lastRow = tbl.rows.length;
            var total = 0;
            var price = document.getElementById('price_' + String(val)).value;
            var qty = document.getElementById('qty_' + String(val)).value;
            document.getElementById('amount_' + String(val)).value = price * qty;


            for (var r = 1; r < lastRow; r++) {
                var row_val = lastRow - 2;
                var amt = document.getElementById('amount_' + String(r - 1)).value;
                total += parseFloat(amt);
            }
            document.getElementById('total').value = total;
        }
        function loadDropVal() {
            var dtId = $('#selRow0').val();
            
             $.ajax({
                type: "POST",
                url: "getDryteatypeAjax.php?id=" +dtId,
                success: function (data) {
                    var pro = JSON.parse(data);
                    for (var i in pro) {
                        var price = pro[i].dtprice;
                         document.getElementById('price_0').value = price;
                    }
                }
            });

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
                        <h4 class="card-text">Invoice</h4>

                    </div>
                </div>
                <form action="Controler/dealerControler.php?action=invoice" method="POST">
                    <div class="col-md-5" style="margin-left: 8px;margin-top: 20px;margin-bottom: -10px">
                        <div class="form-group row">
                            <label for="example-search-input" class="col-4 col-form-label">Invoice No :</label>
                            <div class="col-8">
                                <input class="form-control" type="text" value="<?php echo 'INV/TEA/' . date("Yhs"); ?>"  id="invoice_no" name="invoice_no">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-4 col-form-label">Dealer Name :</label>
                            <div class="col-8">
                                <select class="form-control" id="dealer_name" name="dealer_name">
                                    <option>Select Dealer</option>
                                    <?php while ($row = mysqli_fetch_assoc($resultSup)) { ?>
                                        <option><?php echo $row['name']; ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" class="col-4 col-form-label">Date :</label>
                            <div class="col-8">
                                <input class="form-control" type="date"  id="invoice_date" name="invoice_date">
                            </div>
                        </div>

                    </div>
                    <div class="card-body" style="width:100%;">
                        <table width="100%"   id="table1" class="table table-bordered">
                            <thead >
                            <th ><strong >Select</strong></th>
                            <th ><strong >Tea Type</strong></th>
                            <th  ><strong>Price</strong> </th>
                            <th ><strong>Qty</strong> </th>
                            <th ><strong>Amount</strong> </th>

                            </thead>
                            <tr >
                            <input type="hidden" name="row" id="row" value="0"/>
                            <td><input name="check_0" type="checkbox" id="name_0" /></td>
                            <td>
                                <select class="form-control" id="selRow0" name="selRow0" onchange="loadDropVal()">
                                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <option value="<?php echo $row['dtt_id'] ?>"><?php echo $row['drytea_type']; ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </td>
                            <td><input name="price_0" type="text" id="price_0" class="form-control" /></td>
                            <td><input name="qty_0" type="text" id="qty_0" class="form-control" onkeyup="getAmount(0)" /></td>
                            <td><input name="amount_0" type="text" id="amount_0" class="form-control" /></td>
                            </tr>

                        </table>
                        <div class="col-md-12">
                            <!--<div class="col-md-4" style="border: 1px solid;float: left">sasasas</div>-->
                            <div  style="float: right;margin-top: -10px;margin-right: -13px;width: 360px">
                                <div class="form-group row">
                                    <label for="example-search-input" class="col-3 col-form-label">Total :</label>
                                    <div class="col-9">
                                        <input class="form-control" type="text"  id="total" name="total">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="button" value="Add" class="btn btn-success" onclick="addRow();" />
                        <input name="Submit" type="submit" class="btn btn-info" value="Issue" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require 'template/footer.php' ?>