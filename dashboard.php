<?php
error_reporting(0);
?>
<div class="wrapper">
    <div class="row states-info">

        <a href="?hal=master/category/list" style="color: #fff;">
            <div class="col-md-4">
                <div class="panel blue-bg">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-tag"></i>
                            </div>
                            <div class="col-xs-8">
                                <span class="state-title"> Data Kategori </span>
                                <h4>Kategori</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="?hal=master/product/list" style="color: #fff;">
            <div class="col-md-4">
                <div class="panel green-bg">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-briefcase"></i>
                            </div>
                            <div class="col-xs-8">
                                <span class="state-title">Data  Menu  </span>
                                <h4>Menu</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="?hal=master/user/list" style="color: #fff;">
            <div class="col-md-4">
                <div class="panel yellow-bg">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="col-xs-8">
                                <span class="state-title">Data Users  </span>
                                <h4>Users</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </a>

   <!--  <div class="row">

        <div class="col-sm-6">
            <section class="panel">
                <header class="panel-heading">
                    TRANSAKSI DAY : <span style="color:#FF6600;"><?php echo date('d F Y'); ?></span>
                    <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                </header>
                <div class="panel-body">
                    <div id="graph-area1"></div>

                    <script>
                        var transDayStat = [{period: '1.00', Rp: 5155, Transaksi: '1'}, {
                            period: '2.00',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '3.00', Rp: 0, Transaksi: '0'}, {
                            period: '4.00',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '5.00', Rp: 0, Transaksi: '0'}, {
                            period: '6.00',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '7.00', Rp: 22097, Transaksi: '3'}, {
                            period: '8.00',
                            Rp: 77806,
                            Transaksi: '5'
                        }, {period: '9.00', Rp: 98711, Transaksi: '4'}, {
                            period: '10.00',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '11.00', Rp: 134765, Transaksi: '4'}, {
                            period: '12.00',
                            Rp: 97300,
                            Transaksi: '1'
                        }, {period: '13.00', Rp: 0, Transaksi: '0'}, {
                            period: '14.00',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '15.00', Rp: 0, Transaksi: '0'}, {
                            period: '16.00',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '17.00', Rp: 0, Transaksi: '0'}, {
                            period: '18.00',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '19.00', Rp: 0, Transaksi: '0'}, {
                            period: '20.00',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '21.00', Rp: 0, Transaksi: '0'}, {
                            period: '22.00',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '23.00', Rp: 0, Transaksi: '0'}, {period: '24.00', Rp: 0, Transaksi: '0'}];
                    </script>

                    <script>

                    </script>
                </div>
            </section>
        </div>

        <div class="col-sm-6">
            <section class="panel">
                <header class="panel-heading">
                    TRANSAKSI MONTH : <span style="color:#FF6600;"><?php echo date('F Y'); ?></span>
                    <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                </header>
                <div class="panel-body">
                    <div id="graph-area2"></div>

                    <script>
                        var transMonthStat = [{
                            period: '2017-05-01',
                            Rp: 435834,
                            Transaksi: '18'
                        }, {period: '2017-05-02', Rp: 0, Transaksi: '0'}, {
                            period: '2017-05-03',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '2017-05-04', Rp: 0, Transaksi: '0'}, {
                            period: '2017-05-05',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '2017-05-06', Rp: 0, Transaksi: '0'}, {
                            period: '2017-05-07',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '2017-05-08', Rp: 0, Transaksi: '0'}, {
                            period: '2017-05-09',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '2017-05-10', Rp: 0, Transaksi: '0'}, {
                            period: '2017-05-11',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '2017-05-12', Rp: 0, Transaksi: '0'}, {
                            period: '2017-05-13',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '2017-05-14', Rp: 0, Transaksi: '0'}, {
                            period: '2017-05-15',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '2017-05-16', Rp: 0, Transaksi: '0'}, {
                            period: '2017-05-17',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '2017-05-18', Rp: 0, Transaksi: '0'}, {
                            period: '2017-05-19',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '2017-05-20', Rp: 0, Transaksi: '0'}, {
                            period: '2017-05-21',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '2017-05-22', Rp: 0, Transaksi: '0'}, {
                            period: '2017-05-23',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '2017-05-24', Rp: 0, Transaksi: '0'}, {
                            period: '2017-05-25',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '2017-05-26', Rp: 0, Transaksi: '0'}, {
                            period: '2017-05-27',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '2017-05-28', Rp: 0, Transaksi: '0'}, {
                            period: '2017-05-29',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '2017-05-30', Rp: 0, Transaksi: '0'}, {
                            period: '2017-05-31',
                            Rp: 0,
                            Transaksi: '0'
                        }];
                    </script>


                    <script>

                    </script>
                </div>
            </section>
        </div>
 -->

    </div>

</div>