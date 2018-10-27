

<html>
<?php
require 'template/header.php';
?>    
    <head>
        <style>
        .panel {
    border: 1px solid background; 
    border-radius:0;
    transition: box-shadow 0.5s;
}

.panel:hover {
    box-shadow: 5px 0px 40px rgba(0,0,0, .2);
}

.panel-footer .btn:hover {
    border: 1px solid background;
    background-color: #fff !important;
    color: background;
}

.panel-heading {
    color: #fff !important;
    background-color:background !important;
    padding: 25px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    border-bottom-left-radius: 0px;
    border-bottom-right-radius: 0px;
}

.panel-footer {
    background-color: #fff !important;
}

.panel-footer h3 {
    font-size: 32px;
}

.panel-footer h4 {
    color: #aaa;
    font-size: 14px;
}

.panel-footer .btn {
    margin: 15px 0;
    background-color: background;
    color: #fff;
}
        </style>   
        
        
    </head>
    
    <body>
       
<div class="container-fluid">
  <div class="text-center">
      
      <div class="container-fluid bg-3 text-center">    
          <h3 style="">Madola Tea Factory </h3><br>
  <div class="row">
    <div class="col-sm-3">
     
        <button><p>Users</p><a href="listUsers.php"><img src="public/image/images1.jpg" class="img-responsive" style="width:50%" alt="Image"></a></button>
    </div>
    <div class="col-sm-3"> 
      
        <button><p>Supplier</p><a href="listSupplier.php"><img src="public/image/images4.jpg" class="img-responsive" style="width:50%" alt="Image"> </a></button>
    </div>
    <div class="col-sm-3"> 
     
      <button> <p>Tea Leaf</p><img src="public/image/images3.jpg" class="img-responsive" style="width:50%;height:20%;" alt="Image"></button>
    </div>
    <div class="col-sm-3">
      
      <button><p>Tea Types</p><img src="public/image/images2.png" class="img-responsive" style="width:50%; height:20%;" alt="Image"></button>
    </div>
  </div>
</div><br>
    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h2>Number of Suppliers</h2>
        </div>
        <div class="panel-body">
          <p><strong>100</strong> suppliers</p>
        </div>
        <div class="panel-footer">
<!--          <h3>$19</h3>
          <h4>per month</h4>-->
<!--          <button class="btn btn-lg">Sign Up</button>-->
        </div>
      </div> 
    </div> 
    <div class="col-sm-4">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h2>Quantity of Tea Leaf </h2>
        </div>
        <div class="panel-body">
          <p><strong>100</strong> today</p>
           <p><strong>100</strong> yesterday</p>
        </div>
        <div class="panel-footer">
<!--           <button class="btn btn-lg">Sign Up</button>-->
        </div>
      </div> 
    </div> 
   <div class="col-sm-4">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h2>Quantity of Tea Type</h2>
        </div>
        <div class="panel-body">
          <p><strong>100</strong> Green Tea</p>
          <p><strong>50</strong> Dust Tea</p>
          
        </div>
        <div class="panel-footer">
          
<!--          <button class="btn btn-lg">Sign Up</button>-->
        </div>
      </div> 
    </div> 
  </div>
</div>
    </body>
    <?php require 'template/footer.php' ?>
</html>

<!-- if ($user->user_role=='Admin'){
            header("location: dashboard.php");
            }
            elseif ($user->user_role=='User') {
             header("location: listsupplier.php");
        }-->