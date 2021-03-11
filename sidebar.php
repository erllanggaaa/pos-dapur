<div class="left-side sticky-left-side">
    <!--logo and iconic logo start-->
    <div class="logo">
        <a href="index.php"><img src="assets/images/logo.png" alt=""></a>
    </div>

    <div class="logo-icon text-center">
        <a href="index.php"><img src="assets/images/logo_icon.png" alt=""></a>
    </div>
    <!--logo and iconic logo end-->

    <div class="left-side-inner">
        <!-- visible to small devices only -->
        <!--sidebar nav start-->
        <ul class="nav nav-pills nav-stacked custom-nav">
            <?php $data = url($_GET['hal']); ?>
            <li><a href="?hal=dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
            <li class="menu-list <?php echo ($data[1] == 'product' || $data[1] == 'category' || $data[1] == 'user') ? 'nav-active' : ''; ?>">
                <a href="#"><i class="fa fa-th-list"></i> <span>Master</span></a>
                <ul class="sub-menu-list">
                    <li <?php echo $data[1] == 'category' ? 'class=active' : ''; ?>><a href="?hal=master/category/list"><i
                                    class="fa fa-list"></i>Kategori</a></li>
                    <li <?php echo $data[1] == 'product' ? 'class=active' : ''; ?>><a href="?hal=master/product/list"><i
                                    class="fa fa-briefcase"></i> Menu</a></li>
                    <li <?php echo $data[1] == 'user' ? 'class=active' : ''; ?>><a href="?hal=master/user/list"> <i
                                    class="fa fa-users"> </i>Users</a></li>
                </ul>
            </li>
            <li><a href="logout.php"><i class="fa fa-sign-in"></i> <span>Logout</span></a></li>
        </ul>
        <!--sidebar nav end-->
    </div>
</div>
<!-- https://demo.dealpos.com/A/POS.aspx -->