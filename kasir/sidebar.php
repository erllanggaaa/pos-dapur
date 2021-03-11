<div class="left-side sticky-left-side">
    <!--logo and iconic logo start-->
    <div class="logo">
        <a href="index.php"><img src="../assets/images/logo.png" alt=""></a>
    </div>

    <div class="logo-icon text-center">
        <a href="index.php"><img src="../assets/images/logo_icon.png" alt=""></a>
    </div>
    <!--logo and iconic logo end-->

    <div class="left-side-inner">
        <!-- visible to small devices only -->
        <!--sidebar nav start-->
        <ul class="nav nav-pills nav-stacked custom-nav">
            <?php $data = url($_GET['hal']); ?>
            <li><a href="?hal=dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
            <li><a href="?hal=pos"><i class="fa fa-money"></i> <span>Transaksi</span></a></li>
            <li><a href="?hal=master/transaksi/list"><i class="fa fa-book"></i> <span> Laporan Transaksi</span></a></li>
            <!-- <li class="menu-list <?php echo ($data[1] == 'laporan_product' || $data[1] == 'laporan_stock' || $data[1] == 'laporan_transaksi') ? 'nav-active' : ''; ?>">
                <a href="#"><i class="fa fa-file"></i> <span>Laporan</span></a>
                <ul class="sub-menu-list">
                    <li <?php echo $data[1] == 'laporan_stock' ? 'class=active' : ''; ?>><a
                                href="?hal=master/laporan_stock/list"> <i class="fa fa-bar-chart-o"></i>Laporan Product</a>
                    </li>
                    <li <?php echo $data[1] == 'laporan_product' ? 'class=active' : ''; ?>><a
                                href="?hal=master/laporan_product/list"> <i class="fa fa-bar-chart-o"></i>Laporan Stock</a>
                    </li>
                    <li <?php echo $data[1] == 'laporan_transaksi' ? 'class=active' : ''; ?>><a
                                href="?hal=master/laporan_transaksi/list"> <i class="fa fa-bar-chart-o"></i>Laporan
                            Transaksi</a></li>
                </ul>
            </li> -->
            <li><a href="logout.php"><i class="fa fa-sign-in"></i> <span>Logout</span></a></li>
        </ul>
        <!--sidebar nav end-->
    </div>
</div>
<!-- https://demo.dealpos.com/A/POS.aspx -->