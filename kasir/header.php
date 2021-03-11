<div class="header-section">
    <!--toggle button start-->
    <a class="toggle-btn"><i class="fa fa-bars"></i></a>
    <!--notification menu start -->
    <div class="menu-right">
        <ul class="notification-menu">
            <li>
                <div class="btn btn-default dropdown-toggle" data-toggle="dropdown">

                   Login sebagai <?php echo $_SESSION['username']; ?>
                  
                </div>
                <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                    <li><a href="logout.php"><i class="fa fa-sign-out"></i> Log Out</a></li>
                </ul>
            </li>

        </ul>
    </div>
    <!--notification menu end -->

</div>