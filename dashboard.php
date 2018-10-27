

<html>
    <?php
    require 'template/header.php';
    ?> 

    <head>
        <script src="public/amcharts/amcharts/amcharts.js"></script>
        <script src="public/amcharts/amcharts/serial.js"></script>
        <script src="public/js/jquery-1.8.3.min.js"></script>

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

        <script>
            var TeaType = [];

            function load() {
                $.ajax({
                    type: "POST",
                    url: "gettetypefromajax.php",
                    success: function(data) {

                        var pro = JSON.parse(data);
                        for (var i in pro) {
                            
                            var type = pro[i].drytea_type;
                            var qty = pro[i].remaining_qty;
                            var duesub = (parseFloat(price)) * (parseFloat(nqty));
                            document.getElementById('toprice').value = duesub;
                            TeaType.push({"type": type, "quantity": qty});
alert(TeaType);







                        }

                    }
                });


//                var TeaType = [
//                    {
//                        "remaining_qty": 65,
//                        "drytea_type": "qqq Tea"
//                    },
//                    {
//                        "remaining_qty": 50,
//                        "drytea_type": "hhhh Tea"
//                    },
//                    {
//                        "remaining_qty": 25,
//                        "drytea_type": "ddd Tea"
//                    }
//                ];


                AmCharts.ready(function() {
                    // SERIAL CHART
                    chart = new AmCharts.AmSerialChart();
                    chart.dataProvider = TeaType;
                    chart.categoryField = "drytea_type";
                    chart.startDuration = 1;
                    chart.plotAreaBorderColor = "#DADADA";
                    chart.plotAreaBorderAlpha = 1;
                    // this single line makes the chart a bar chart
                    chart.rotate = false;

                    // AXES
                    // Category
                    var categoryAxis = chart.categoryAxis;
                    categoryAxis.gridPosition = "start";
                    categoryAxis.gridAlpha = 0.1;
                    categoryAxis.axisAlpha = 0;

                    // Value
                    var valueAxis = new AmCharts.ValueAxis();
                    valueAxis.axisAlpha = 0;
                    valueAxis.gridAlpha = 0.1;
                    valueAxis.position = "left";
                    chart.addValueAxis(valueAxis);

                    // GRAPHS
                    // first graph
                    var graph1 = new AmCharts.AmGraph();
                    graph1.type = "column";
                    graph1.title = "Center cash";
                    graph1.valueField = "remaining_qty";
                    graph1.balloonText = "cash[[value]]";
                    graph1.lineAlpha = 0;
                    graph1.fillColors = "#FCC804";
                    graph1.fillAlphas = 1;
                    chart.addGraph(graph1);

//            // second graph
//            var graph2 = new AmCharts.AmGraph();
//            graph2.type = "column";
//            graph2.title = "past due";
//            graph2.valueField = "remaining_qty";
//            graph2.balloonText = "pd[[value]]";
//            graph2.lineAlpha = 0;
//            graph2.fillColors = "#FF751A";
//            graph2.fillAlphas = 1;
//            chart.addGraph(graph2);
                    // LEGEND
                    var legend = new AmCharts.AmLegend();
                    chart.addLegend(legend);

                    chart.creditsPosition = "top-right";

                    // WRITE
                    chart.write("chartdiv");
                });
            }
        </script>

    </head>

    <body>

        <div class="container-fluid">
            <div class="text-center">

                <div class="container-fluid bg-3 text-center">    
                    <h3 style="">Madola Tea Factory </h3><br>
                    <!--  <div class="row">
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
                      </div>-->
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
                <div id="chartdiv" style="width: 1000px; height:400px; ">

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