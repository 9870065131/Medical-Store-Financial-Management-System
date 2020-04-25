<?php 

    session_start();
    include "include/db.php";
    error_reporting(0);

    if (!isset($_SESSION['username'])) {
        header('Location:login.php');
    }
    else{
        $username = $_SESSION['username'];
    }

     $from=date('Y-m-d',strtotime($_POST['from']));
     $to=date('Y-m-d',strtotime($_POST['to']));

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script type="text/javascript" charset="utf8" src="js/jquery-3.3.1.js"></script>
        <link href="css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" charset="utf8" src="js/dataTables.bootstrap4.min.js"></script>

		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <script src="https://cdn.syncfusion.com/ej2/dist/ej2.min.js"></script>
        <link href="https://cdn.syncfusion.com/ej2/material.css" rel="stylesheet">
        <style>
            body {
                background-color: #EAEAEA;
            }
            
            .container-fluid {
                margin-top: 70px;
                background-color: #f7f7f7;
            }
            
            #date {
                font-size: 20px;
                font-weight: bold;
                margin-left: 950px;
                margin-top: 4px;
                color: #FFFFFF;
                position: fixed;
            }
            
            #txt {
                font-size: 21px;
                font-weight: bold;
                margin-left: 1080px;
                margin-right: 100px;
                margin-top: 4px;
                color: #FFFFFF;
                position: fixed;
            }
            
            #error {
                color: red;
                display: none;
            }
        </style>
    </head>

    <body onload="startTime()">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-primary">
            <a class="navbar-brand" href="#">New Diamond Medical Store</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">

                </ul>
                <form class="form-inline my-2 my-lg-0" method="post" action="logout.php">
                    <b><span style='color: #FFFFFF;'>Welcome, 
         <?php echo $_SESSION['username']; ?></span></b> &nbsp
                    <input type="submit" class="btn btn-danger btn-md" value="Logout" />
                </form>
            </div>
        </nav>

        <div class="container-fluid">
            <br>
            <div class="row">
                <div class="col-md-6 ">

                    <div class="col-xs-6 col-xs-offset-3" id="exampleTableContainer">
                        <?php echo $msg; ?>
                            <form action="index.php" method="POST" id="first_form" name="form1">
                                <table class="table table-bordered table-*-responsive table-sm" id="dataTable" cellspacing="0">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th scope="col" style="color:white;">
                                                <center>
                                                    <h6>Currency</h6></center>
                                            </th>
                                            <th scope="col" style="color:white;">
                                                <center>
                                                    <h6>Quantity</h6></center>
                                            </th>
                                            <th scope="col" style="color:white;">
                                                <center>
                                                    <h6>Total</h6></center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="item-row ">
                                            <td style='width: 70px'>
                                                <center><b>2000</b></center>
                                            </td>
                                            <td style='width: 70px'>
                                                <input type="number" id="q1" class="form-control">
                                            </td>
                                            <td class="total_price" style='width: 70px'>
                                                <center>
                                                    <input id="p1" class="form-control" readonly value="0.00" />
                                                </center>
                                            </td>
                                        </tr>
                                        <tr class="item-row ">
                                            <td style='width: 70px'>
                                                <center><b>500</b></center>
                                            </td>
                                            <td style='width: 70px'>
                                                <input type="number" id="q2" class="form-control">
                                            </td>
                                            <td class="total_price" style='width: 70px'>
                                                <center>
                                                    <input id="p2" class="form-control" readonly value="0.00" />
                                                </center>
                                            </td>
                                        </tr>
                                        <tr class="item-row ">
                                            <td style='width: 70px'>
                                                <center><b>200</b></center>
                                            </td>
                                            <td style='width: 70px'>
                                                <input type="number" id="q3" class="form-control">
                                            </td>
                                            <td class="total_price" style='width: 70px'>
                                                <center>
                                                    <input id="p3" class="form-control" readonly value="0.00" />
                                                </center>
                                            </td>
                                        </tr>
                                        <tr class="item-row ">
                                            <td style='width: 70px'>
                                                <center><b>100</b></center>
                                            </td>
                                            <td style='width: 70px'>
                                                <input type="number" id="q4" class="form-control">
                                            </td>
                                            <td class="total_price" style='width: 70px'>
                                                <center>
                                                    <input id="p4" class="form-control" readonly value="0.00" />
                                                </center>
                                            </td>
                                        </tr>
                                        <tr class="item-row ">
                                            <td style='width: 70px'>
                                                <center><b>50</b></center>
                                            </td>
                                            <td style='width: 70px'>
                                                <input type="number" id="q5" class="form-control">
                                            </td>
                                            <td class="total_price" style='width: 70px'>
                                                <center>
                                                    <input id="p5" class="form-control" readonly value="0.00" />
                                                </center>
                                            </td>
                                        </tr>
                                        <tr class="item-row ">
                                            <td style='width: 70px'>
                                                <center><b>20</b></center>
                                            </td>
                                            <td style='width: 70px'>
                                                <input type="number" id="q6" class="form-control">
                                            </td>
                                            <td class="total_price" style='width: 70px'>
                                                <center>
                                                    <input id="p6" class="form-control" readonly value="0.00" />
                                                </center>
                                            </td>
                                        </tr>
                                        <tr class="item-row ">
                                            <td style='width: 70px'>
                                                <center><b>10</b></center>
                                            </td>
                                            <td style='width: 70px'>
                                                <input type="number" id="q7" class="form-control">
                                            </td>
                                            <td class="total_price" style='width: 70px'>
                                                <center>
                                                    <input id="p7" class="form-control" readonly value="0.00" />
                                                </center>
                                            </td>
                                        </tr>
                                        <tr class="item-row ">
                                            <td style='width: 70px'>
                                                <center><b>5</b></center>
                                            </td>
                                            <td style='width: 70px'>
                                                <input type="number" id="q8" class="form-control">
                                            </td>
                                            <td class="total_price" style='width: 70px'>
                                                <center>
                                                    <input id="p8" class="form-control" readonly value="0.00" />
                                                </center>
                                            </td>
                                        </tr>
                                        <tr class="item-row ">
                                            <td style='width: 70px'>
                                                <center><b>2</b></center>
                                            </td>
                                            <td style='width: 70px'>
                                                <input type="number" id="q9" class="form-control">
                                            </td>
                                            <td class="total_price" style='width: 70px'>
                                                <center>
                                                    <input id="p9" class="form-control" readonly value="0.00" />
                                                </center>
                                            </td>
                                        </tr>
                                        <tr class="item-row ">
                                            <td style='width: 70px'>
                                                <center><b>1</b></center>
                                            </td>
                                            <td style='width: 70px'>
                                                <input type="number" id="q10" class="form-control">
                                            </td>
                                            <td class="total_price" style='width: 70px'>
                                                <center>
                                                    <input id="p10" class="form-control" readonly value="0.00" />
                                                </center>
                                            </td>
                                        </tr>
                                        <tr class="item-row ">
                                            <td class="currency" style='width: 70px' align="right">
                                                <center><b>Google Pay</b></center>
                                            </td>
                                            <td class="google_pay" style='width: 70px'>
                                                <div>
                                                    <center>
                                                        <input type="number" id="q11" class="form-control" />
                                                    </center>
                                                </div>
                                            </td>
                                            <td class="total_price" style='width: 70px'>
                                                <center>
                                                    <input id="p11" class="form-control" readonly value="0.00" />
                                                </center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="total-line" align="right">
                                                <b>Total Amount</b>
                                            </td>
                                            <td class="total-value" style='width: 70px'>
                                                <input type="number" id="total_amount" class="form-control" name="total_amount" readonly value="0" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" style="color:white; background-color: #007bff;">
                                                <center><span><b><h6>Calculation</h6></b></span></center>
                                            </td>
                                        </tr>
                                        <tr class="item-row">
                                            <td colspan="2" class="total-line">
                                                <center><b>Total Counter</b></center>
                                            </td>
                                            <td style='width: 70px'>

                                                <input type="number" id="total_counter" name="total_counter" class="form-control">
                                            </td>

                                        </tr>
                                        <tr class="item-row">
                                            <td colspan="2" class="total-line">
                                                <center><b>Total Deposit</b></center>
                                            </td>
                                            <td style='width: 70px'>

                                                <input type="number" id="total_deposit" name="total_deposit" class="form-control">
                                            </td>
                                        </tr>
                                        <tr class="item-row">
                                            <td colspan="2" class="total-line">
                                                <center><b>Total Difference</b></center>
                                            </td>
                                            <td style='width: 70px'>
                                                <div>
                                                    <center>
                                                        <input type="number" id="difference" class="form-control" name="difference" readonly value="0.00" />
                                                    </center>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="item-row">
                                            <td colspan="3" style='width: 70px'>
                                                <center>
                                                    <input type="submit" name="save_record" id="save_record" class="btn btn-success btn-md" value="Save Record" />
                                                </center>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            <?php

                                    if(isset($_POST['save_record'])) {
                                            date_default_timezone_set('Asia/Kolkata');
                                            $currentTime = date('Y-m-d');
                                            $total_amount = $_POST['total_amount'];
                                            $total_counter= $_POST['total_counter'];
                                            $total_deposit = $_POST['total_deposit'];
                                            $difference = $_POST['difference'];

                                           $result = mysqli_query($mysqli, "INSERT INTO record(cdate,total_amount,total_counter,total_deposit,difference) VALUES('$currentTime','$total_amount','$total_counter','$total_deposit','$difference')");

                                            if($result == true){
                                                $msg = '<div class="alert alert-success"><strong>Record</strong> has been Saved.</div>';
                                            }else{
                                                $msg = '<div class="alert alert-danger">Record not Saved</div>';
                                            }
                                    }
                        ?>
                    </div>

                </div>

                <!-- Second Part !-->

                <div class="col-md-6 ">
                    <form method="POST">
                        <div class="col-xs-6 col-xs-offset-3">
                            <table class="table table-bordered table-*-responsive table-sm" id="dataTable" cellspacing="0">
                                <thead class="bg-primary">
                                    <tr>
                                        <th colspan="3" scope="col" style="color:white;">
                                            <center>
                                                <h6>Search Record</h6></center>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="item-row">
                                        <td colspan="2">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input id="datepicker_from" class="form-control" type="text" name="from" placeholder="From">
                                                    <script>
                                                        var datepicker = new ej.calendars.DatePicker({
                                                            width: "255px"
                                                        });
                                                        datepicker.appendTo('#datepicker_from');
                                                    </script>
                                                </div>
                                                <div class="col-md-6">
                                                    <input id="datepicker_to" class="form-control" type="text" name="to" placeholder="To">
                                                    <script>
                                                        var datepicker = new ej.calendars.DatePicker({
                                                            width: "255px"
                                                        });
                                                        datepicker.appendTo('#datepicker_to');
                                                    </script>
                                                </div>
                                            </div>
                                        </td>
                                        <td style='width: 50px'>
                                            <div>
                                                <center>
                                                    <span class="glyphicon glyphicon-print"></span>
                                                    <input type="submit" name="searchdata" class="btn btn-primary btn-md" value="Search" />
                                                </center>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>

                        </div>
                    </form>
                    <div class="row">

                        <div class="col-md-12 ">
                            <form method="POST">
                                <div class="col-xs-6 col-xs-offset-3">
                                    <table id="example" class="table table-bordered table-*-responsive table-sm" cellspacing="0">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th scope="col" style="color:white;">
                                                    <center>
                                                        <h6>Date</h6></center>
                                                </th>
                                                <th scope="col" style="color:white;">
                                                    <center>
                                                        <h6>Total Amount</h6></center>
                                                </th>
                                                <th scope="col" style="color:white;">
                                                    <center>
                                                        <h6>Total Counter</h6></center>
                                                </th>
                                                <th scope="col" style="color:white;">
                                                    <center>
                                                        <h6>Total Deposit</h6></center>
                                                </th>
                                                <th scope="col" style="color:white;">
                                                    <center>
                                                        <h6>Difference</h6></center>
                                                </th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <?php
                                                if (isset($_POST['searchdata'])){

                                                    $oquery=$mysqli->query("SELECT * FROM record WHERE cdate between '$from' and '$to'");

                                                    while($orow = $oquery->fetch_array()){

                                                        ?>
                                                <tr>
                                                    <td>
                                                        <center>
                                                            <?php echo $orow['cdate']?>
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <?php echo $orow['total_amount']?>
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <?php echo $orow['total_counter']?>
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <?php echo $orow['total_deposit']?>
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <?php echo $orow['difference']?>
                                                        </center>
                                                    </td>
                                                </tr>
                                                <?php 
                                                }
                                            }
                                        ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>
                                                    <center>
                                                        <h6><b>Total</b></h6></center>
                                                </th>
                                                <?php

                                                         $aquery=$mysqli->query("SELECT sum(total_amount) ,sum(total_counter),sum(total_deposit),sum(difference) FROM record  WHERE cdate BETWEEN '$from' AND '$to'");

                                                        while($rows = $aquery->fetch_array()) {

                                                    ?>

                                                    <th>
                                                        <center>
                                                            <h6><b><?php echo $rows['sum(total_amount)']?></b></h6></center>
                                                    </th>

                                                    <th>
                                                        <h6><b><center>

                                                    <?php echo $rows['sum(total_counter)']?>
                                                    </center>
                                                   </b></h6></th>
                                                    <th>
                                                        <h6><b><center><?php echo $rows['sum(total_deposit)']?></center></b></h6></th>
                                                    <th>
                                                        <h6><b><center><?php echo $rows['sum(difference)']?></center></b></h6></th>
                                            </tr>
                                            <?php 
                                                }

                                        ?>
                                        </tfoot>
                                    </table>

                                </div>
                            </form>

                        </div>

                    </div>

                </div>

            </div>
        </div>
        <br>
        <br>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="position: fixed;bottom:0px;width: 100%">
            <a class="navbar-brand" href="#"></a>

            <div class="collapse navbar-collapse" id="navbarColor01">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">V 1.0 </a>
                    </li>
                    <li class="nav-item active">
                        <p id="date"></p>
                        <p id="txt"></p>
                    </li>
                </ul>
            </div>
        </nav>
        <script>
            $(document).ready(function() {

                addition();
                $("#q1,#q2,#q3,#q4,#q5,#q6,#q7,#q8,#q9,#q10,#q11,#p1,#p2,#p3,#p4,#p5,#p6,#p7,#p8,#p9,#p10,#p11,#total_amount").on("keydown keyup", addition);
            });

            function addition() {
                $("#p1").val(Number($("#q1").val() * 2000));
                $("#p2").val(Number($("#q2").val() * 500));
                $("#p3").val(Number($("#q3").val() * 200));
                $("#p4").val(Number($("#q4").val() * 100));
                $("#p5").val(Number($("#q5").val() * 50));
                $("#p6").val(Number($("#q6").val() * 20));
                $("#p7").val(Number($("#q7").val() * 10));
                $("#p8").val(Number($("#q8").val() * 5));
                $("#p9").val(Number($("#q9").val() * 2));
                $("#p10").val(Number($("#q10").val() * 1));
                $("#p11").val(Number($("#q11").val()));

                $("#total_amount").val(Number($("#p1").val()) + Number($("#p2").val()) + Number($("#p3").val()) + Number($("#p4").val()) + Number($("#p5").val()) + Number($("#p6").val()) + Number($("#p7").val()) + Number($("#p8").val()) + Number($("#p9").val()) + Number($("#p10").val()) + Number($("#p11").val()));
            }

            $(document).ready(function() {

                sum();
                $("#total_counter, #total_deposit").on("keydown keyup", sum);
            });

            function sum() {
                $("#difference").val(Number($("#total_counter").val()) - Number($("#total_deposit").val()));
            }

            var el_up = document.getElementById("date");
            var today = new Date();
            var dateObj = new Date();
            var month = String(dateObj.getMonth() + 1).padStart(2, '0');
            var day = String(dateObj.getDate()).padStart(2, '0');
            var year = dateObj.getFullYear();
            var output = day + '/' + month + '/' + year;
            el_up.innerHTML = output;

            function startTime() {
                var today = new Date();
                var h = today.getHours();
                var m = today.getMinutes();
                var s = today.getSeconds();
                m = checkTime(m);
                s = checkTime(s);
                document.getElementById('txt').innerHTML =
                    h + ":" + m + ":" + s;
                var t = setTimeout(startTime, 500);
            }

            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i
                };
                return i;
            }

            $('#example').DataTable({
                drawCallback: function() {

                }
            });
        </script>
    </body>

    </html>