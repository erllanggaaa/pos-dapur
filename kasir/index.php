<?php
session_start();
error_reporting(0);
//define("SITE_HOST", "http://".$_SERVER['HTTP_HOST']."/kasir/");//.HOST_URI);
//error_reporting(0);
include 'config.php';   //  echo $_SESSION['username']; exit();
include 'function.php';
if (!empty($_SESSION["username"]) && !empty($_SESSION['password'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <title>Dapur Yulia</title>
        <!--icheck-->

        <!--   
          <link href="assets/js/iCheck/skins/minimal/minimal.css" rel="stylesheet">
          <link href="assets/js/iCheck/skins/square/square.css" rel="stylesheet">
          <link href="assets/js/iCheck/skins/square/red.css" rel="stylesheet">
          <link href="assets/js/iCheck/skins/square/blue.css" rel="stylesheet"> 
        -->

        <!-- data picker -->

        <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-datepicker/css/datepicker-custom.css"/>
        <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-timepicker/css/timepicker.css"/>
        <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-colorpicker/css/colorpicker.css"/>
        <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
        <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-datetimepicker/css/datetimepicker-custom.css"/>


        <!-- data picker end -->

        <!-- cart jancuk -->
        <link href="../assets/js/iCheck/skins/square/square.css" rel="stylesheet">
        <link href="../assets/js/iCheck/skins/square/red.css" rel="stylesheet">
        <link href="../assets/js/iCheck/skins/square/blue.css" rel="stylesheet">

        <!--dashboard calendar-->
        <link href="../assets/css/clndr.css" rel="stylesheet">

        <!--file upload-->
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-fileupload.min.css" />
        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="../assets/js/morris-chart/morris.css">

        <!--common-->
        <link href="../assets/css/style.css" rel="stylesheet">
        <link href="../assets/css/style-responsive.css" rel="stylesheet">

        <script src="../js/html5shiv.js"></script>
        <script src="../js/respond.min.js"></script>
        <!--[endif]-->
    </head>

    <body class="sticky-header">

    <section>
        <!-- left side start-->
        <?php include("sidebar.php"); ?>
        <!-- left side end-->

        <!-- main content start-->
        <div class="main-content">
            <?php include("header.php"); ?>
            <!--body wrapper start-->
            <?php
            // include 'menuatas-member.php';
            if (isset($_GET['hal']) && strlen($_GET['hal']) > 0) {
                $hal = str_replace(".", "/", $_GET['hal']) . ".php";
            } else {
                $hal = "dashboard.php";
            }
            if (file_exists($hal)) {
                include($hal);
            } else {
                include("dashboard.php");
            }
            ?>
            <!--body wrapper end-->
            <!--footer section start-->
            <?php include("footer.php"); ?>
            <!--footer section end-->
        </div>
        <!-- main content end-->
    </section>

    <!-- Placed js at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery-1.10.2.min.js"></script>
    <script src="../assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="../assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/modernizr.min.js"></script>
    <script src="../assets/js/jquery.nicescroll.js"></script>

    <script src="../assets/js/easypiechart/jquery.easypiechart.js"></script>
    <script src="../assets/js/easypiechart/easypiechart-init.js"></script>

    <script src="../assets/js/sparkline/jquery.sparkline.js"></script>
    <script src="../assets/js/sparkline/sparkline-init.js"></script>

    <script src="../js/iCheck/jquery.icheck.js"></script>
    <script src="../js/icheck-init.js"></script>

    <script src="../assets/js/flot-chart/jquery.flot.js"></script>
    <script src="../assets/js/flot-chart/jquery.flot.tooltip.js"></script>
    <script src="../assets/js/flot-chart/jquery.flot.resize.js"></script>
    <script src="../assets/js/flot-chart/jquery.flot.pie.resize.js"></script>
    <script src="../assets/js/flot-chart/jquery.flot.selection.js"></script>
    <script src="../assets/js/flot-chart/jquery.flot.stack.js"></script>
    <script src="../assets/js/flot-chart/jquery.flot.time.js"></script>
    <script src="../assets/js/main-chart.js"></script>
    <script src="../assets/js/jquery-1.10.2.min.js"></script>
    <script src="../assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="../assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/modernizr.min.js"></script>
    <script src="../assets/js/jquery.nicescroll.js"></script>


    <script type="text/javascript" src="../assets/js/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="../assets/js/data-tables/DT_bootstrap.js"></script>

    <script src="../assets/js/editable-table.js"></script>

    <script src="../assets/asseys/js/editable-table.js"></script>

    <script type="text/javascript" src="../js/jquery.validate.min.js"></script>
    <script src="../js/validation-init.js"></script>

    <!-- cart -->
    <?php
    if ($_GET['hal'] == 'dashboard') {
        ?>
        <script src="../assets/js/morris-chart/morris.js"></script>
        <script src="../assets/js/morris-chart/raphael-min.js"></script>
        <!--
        <script src="assets/js/calendar/clndr.js"></script>
        <script src="assets/js/calendar/evnt.calendar.init.js"></script>
        <script src="assets/js/calendar/moment-2.2.1.js"></script>
        -->
        <script src="../assets/js/underscore-min.js"></script>
        <!-- <script src="assets/js/scripts.js"></script>  -->
        <script src="../assets/js/dashboard-chart-init-edi.js"></script>
        <!--Dashboard Charts-->

        <?php
    }
    ?>
    <!-- cart -->
    <script type="text/javascript" src="../assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-daterangepicker/moment.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
    <script src="../assets/js/pickers-init.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <!--file upload-->
    <script type="text/javascript" src="../assets/js/bootstrap-fileupload.min.js"></script>
    <!-- <script src="assets/js/edi.js"></script> -->
    <script>
        jQuery(document).ready(function () {
            EditableTable.init();
        });
    </script>

    </body>
    </html>
    <?php
} else {
    header("Location: ../login.php");
}
?>