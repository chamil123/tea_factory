

<style>
    .column1{
        float: right;
        width: 45%;
        padding: 0%;

    }    

    .column2{
        float:right;
        width: 45%;
        padding: 0%;
     

    } 
    .column3{
        float:right;
        width: 10%;
        padding: 0%;

    } 

    .row:after {
        content: "";
        display: table;
        clear: both;
    }
</style>


<?php
require_once 'template/header.php';

//$query = $db->query("SELECT * FROM tl_type ");
//$tlp = $query->fetch_object();


$query = "SELECT * FROM dry_tea ";
$query1 = "SELECT * FROM branchs ";
if (isset($_POST['add'])) {
    $passbook = clean($_POST['passbook'], $db);
    $branch1 = clean($_POST['branch1']);
    $nquantity = clean($_POST['nquantity']);
    $teatype = clean($_POST['tea_type']);
    $tl_date = clean($_POST['tl_date']);
    $remarks = clean($_POST['remarks']);

//$query3= "SELECT * FROM supplier WHERE AND status='1'";
//    if ($stmt3 = $db->query("$query3")) {
//        while ($row3 = $stmt1->fetch_assoc()) {
//
//           $psno = $row3[passbook_no];
//        }
//    } 
//    $query = $db->query("SELECT * FROM supplier WHERE AND status='1'");
//    $pbook = $query->fetch_object();
//    $psno = $pbook->passbook_no;

    if ($psno == '$passbook') {
        $sid = $pbook->supp_id;



//        $query = $db->query("SELECT * FROM branchs WHERE br_id='$branch1'");
//        $brnch2 = $query->fetch_object();
//        $brid = $brnch2->br_id;
//
        $query = $db->query("SELECT * FROM tl_type WHERE tlt_id='$teatype'");
        $tlp1 = $query->fetch_object();
        $tlp2 = $tlp1->tlt_id;
        $tlp3 = $tlp1->tlprice;




        $sql = "INSERT INTO `tealeaf`( `supp_id`,br_id,`net_qua`,tlt_id,date, teaprice,`remarks`) 
            VALUES ('$sid','$branch1','$nquantity','$tlp2','$tl_date',$tlp3,'$remarks')";
        //header("location: addTealeaf.php");
//     $_SESSION['message'] = 'Supplier Do not Registered ..!!';
//            session_write_close();

        if ($db->query($sql)) {
            $_SESSION['message'] = 'Tea Leaf  saved successfuly..!!';
            session_write_close();
            //header("location: addTealeaf.php");
        } else {
            $_SESSION['error'] = 'Please try again later. Internal error occured..!!';
            session_write_close();
            //header("location: addTealeaf.php");
        }
    } else {
        echo 'This supplier do not registerd .....!!! ';
    }
}
?>


<section class="container py-5">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-text"> Create Order </h4>
                </div>
                <div class="card-body">
                    <form action="addOrder.php" method="post" class="needs-validation" novalidate>

                        <!--                        Column Create-->
                        <div   class="row" style="width:100%;" >
                            <div class="column1">

                                <div class="form-group row">
                                    <label for="quantity" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10" >
                                        <input type="text"  class="form-control" name="quantity" id="quantity"
                                               placeholder="Enter net quantity" >
                                        <div class="invalid-feedback">
                                            Please enter quantity #.
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="regi_date" class="col-sm-2 col-form-label">Order Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" required class="form-control" name="tl_date" id="date"
                                               placeholder="">
                                        <div class="invalid-feedback">
                                            Please enter register date.
                                        </div>
                                    </div>
                                </div>  

                            </div>
                            
                            <div class="column3">
                             
                            </div>

                            <div class="column2">

                                <div class="form-group row">
                                    <label for="quantity" class="col-sm-2 col-form-label">Branch</label>
                                    <div class="col-sm-10">
                                        <input type="text"  class="form-control" name="quantity" id="quantity"
                                               placeholder="Enter net quantity">
                                        <div class="invalid-feedback">
                                            Please enter quantity #.
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="regi_date" class="col-sm-2 col-form-label">Deliver Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" required class="form-control" name="tl_date" id="date"
                                               placeholder="">
                                        <div class="invalid-feedback">
                                            Please enter register date.
                                        </div>
                                    </div>
                                </div>  
                            </div>

                        </div>

                        <!--                        Column Close-->
                        
                        <div>
                            &nbsp;
                        </div>
                        <div id="wrapper">
<table align='center' cellspacing=2 cellpadding=5 id="data_table" border=1>
<tr>
<th>Item</th>
<th>Quantity </th>

</tr>



<tr>
    
<td><input type="text" id="new_name"></td>
<td><input type="text" id="new_country"></td>
<!--<td><input type="text" id="new_age"></td>-->
<td><input type="button" class="add" onclick="add_row();" value="Add Row"></td>
</tr>

</table>
</div>
                        
                        <div>

                            <div class="form-group row">
                                <label for="tea_type1" class="col-sm-2 col-form-label">Tea Type</label>
                                <div class="col-sm-10">
                                    <?php
                                    echo "<select class='form-control' id='tea_type1' name='tea_type1' class='custom-select' required>"
                                    . "<option value=''>Select one</option>";


                                    if ($stmt = $db->query("$query")) {
                                        while ($row1 = $stmt->fetch_assoc()) {

                                            echo "<option value='$row1[drytea_id]'>$row1[drytea_type]</option>";
                                        }
                                    } else {
                                        echo $connection->error;
                                    }

                                    echo "</select>";
                                    ?>
                                </div>
                            </div>







                            <div class="form-group row">
                                <label for="branch1" class="col-sm-2 col-form-label">Branch </label>
                                <div class="col-sm-10">
                                    <?php
                                    echo "<select class='form-control' id='branch1' name='branch1' class='custom-select' required>"
                                    . "<option value=''>Select one</option>";


                                    if ($stmt1 = $db->query("$query1")) {
                                        while ($row2 = $stmt1->fetch_assoc()) {

                                            echo "<option value='$row2[br_id]'>$row2[branch]</option>";
                                        }
                                    } else {
                                        echo $connection->error;
                                    }

                                    echo "</select>";
                                    ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                                <div class="col-sm-10">
                                    <input type="text"  class="form-control" name="quantity" id="quantity"
                                           placeholder="Enter net quantity">
                                    <div class="invalid-feedback">
                                        Please enter quantity #.
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="regi_date" class="col-sm-2 col-form-label">Date</label>
                                <div class="col-sm-10">
                                    <input type="date" required class="form-control" name="tl_date" id="date"
                                           placeholder="">
                                    <div class="invalid-feedback">
                                        Please enter register date.
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

<!--increase row-->
<script>
function edit_row(no)
{
 document.getElementById("edit_button"+no).style.display="none";
 document.getElementById("save_button"+no).style.display="block";
	
 var name=document.getElementById("name_row"+no);
 var country=document.getElementById("country_row"+no);
// var age=document.getElementById("age_row"+no);
	
 var name_data=name.innerHTML;
 var country_data=country.innerHTML;
 //var age_data=age.innerHTML;
	
 name.innerHTML="<input type='text' id='name_text"+no+"' value='"+name_data+"'>";
 country.innerHTML="<input type='text' id='country_text"+no+"' value='"+country_data+"'>";
 //age.innerHTML="<input type='text' id='age_text"+no+"' value='"+age_data+"'>";
}

function save_row(no)
{
 var name_val=document.getElementById("name_text"+no).value;
 var country_val=document.getElementById("country_text"+no).value;
 //var age_val=document.getElementById("age_text"+no).value;

 document.getElementById("name_row"+no).innerHTML=name_val;
 document.getElementById("country_row"+no).innerHTML=country_val;
 //document.getElementById("age_row"+no).innerHTML=age_val;

 document.getElementById("edit_button"+no).style.display="block";
 document.getElementById("save_button"+no).style.display="none";
}

function delete_row(no)
{
 document.getElementById("row"+no+"").outerHTML="";
}

function add_row()
{
 var new_name=document.getElementById("new_name").value;
 var new_country=document.getElementById("new_country").value;
 //var new_age=document.getElementById("new_age").value;
	
 var table=document.getElementById("data_table");
 var table_len=(table.rows.length)-1;
 var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td id='name_row"+table_len+"'>"+new_name+"</td><td id='country_row"+table_len+"'>"+new_country+"</td><td><input type='button' id='edit_button"+table_len+"' value='Edit' class='edit' onclick='edit_row("+table_len+")'> <input type='button' id='save_button"+table_len+"' value='Save' class='save' onclick='save_row("+table_len+")'> <input type='button' value='Delete' class='delete' onclick='delete_row("+table_len+")'></td></tr>";

 document.getElementById("new_name").value="";
 document.getElementById("new_country").value="";
 //document.getElementById("new_age").value="";
}
</script>


<?php
require 'template/footer.php'
?>



