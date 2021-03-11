<?php
$id_session = session_id();
$grand_total = mysql_query("SELECT SUM(product_price * jumlah) AS TOTAL FROM  
        `product`
        INNER JOIN `orders_temp` 
            ON (`product`.`product_id` = `orders_temp`.`product_id`) 
                                            WHERE orders_temp.id_session='" . $id_session . "'");
$rowGrandTotal = mysql_fetch_array($grand_total);
?>
<div class="wrapper">
    <div class="row blog">

        <div class="col-md-8">
            <div class="panel">
                <div class="panel-body">
                    <input type="text" placeholder="Search Menu" id="keywords" class="form-control blog-search"
                           onkeyup="searchFilter()">
                </div>
            </div>
            <div class="panel">
                <div class="panel-body"><h2>Daftar Menu</h2>
                    <div class="panel-body">
                        <div id="show_product" class="media-gal">
                            <?php $queryProduct = mysql_query("SELECT * FROM product");
                            while ($rowsProduct = mysql_fetch_array($queryProduct)) { ?>
                                <div class="images item ">
                                    <a href="cart.php?mod=basket&act=add&id=<?php echo $rowsProduct['product_id'] ?>">
                                        <img src="../assets/images/product/<?php echo $rowsProduct['product_images']; ?>"
                                             alt=""/>
                                        <p><?php echo $rowsProduct['product_name']; ?> </p>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel">
                <div class="panel-body">
                    <h1>Rp. <?php echo number_format($rowGrandTotal['TOTAL'], 0, ',', '.'); ?></h1>
                </div>
            </div>
            <div class="panel">
                <div class="panel-body">

                    <div class="blog-post">

                        <div class="media">
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td></td>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Sub Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $query = "SELECT *
                                        FROM
                                            `product`
                                            INNER JOIN `orders_temp` 
                                                ON (`product`.`product_id` = `orders_temp`.`product_id`) 
                                        WHERE orders_temp.id_session='" . $id_session . "'";

                                    $result = mysql_query($query);
                                    $no = 1;
                                    $total = 0;

                                    while ($data = mysql_fetch_array($result)) {
                                        $sub_total = +$data['product_price'] * $data['jumlah'];
                                        $total += $sub_total;
                                        ?>
                                        <tr>
                                            <td>
                                                <a href="cart.php?mod=basket&act=del&id=<?php echo $data['id_orders_temp'] ?>"><i
                                                            class="fa fa-times" style="color: red"></i></a>
                                            </td>
                                            <td>
                                                <?php echo $data['product_name'] ?></td>
                                            <td><?php echo number_format($data['product_price'], 0, ',', '.'); ?></td>
                                            <td><?php echo $data['jumlah']; ?></td>
                                            <td><?php echo number_format($sub_total, 0, ',', '.'); ?></td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td colspan="4">
                                            Total
                                        </td>
                                        <td>
                                            <?php echo number_format($total, 0, ',', '.'); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" align="reight">

                                            <button class="btn btn-primary" type="submit" data-toggle="modal"
                                                    data-target="#myModal"><i class="fa fa-shopping-cart"></i> Bayar
                                            </button>
                                        </td>

                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                             aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true">&times;
                                                        </button>
                                                        <?php

                                                        ?>
                                                        <h4 class="modal-title">Grand Total :
                                                            Rp. <?php echo number_format($rowGrandTotal['TOTAL'], 0, ',', '.'); ?></h4>
                                                    </div>

                                                    <div class="modal-body row">
                                                        <div class="col-md-12">
                                                            <!--<form method="POST" action="?hal=cetak">-->
                                                                <form method="POST" action="?hal=cetak">
                                                                <div class="form-group">
                                                                    <label> Cash</label>

                                                                </div>


                                                                <div class="form-group">
                                                                    <input type="hidden" id="type1" name="grand_total"
                                                                           onKeyUp="kalkulatorTambah(getElementById('type1').value,this.value);"
                                                                           value="<?php echo number_format($rowGrandTotal['TOTAL'], 0, ',', '.'); ?>"/>

                                                                    <input type="text" class="form-control input-lg"
                                                                           id="type2" name="cash"
                                                                           onKeyUp="kalkulatorTambah(getElementById('type1').value,this.value);"
                                                                           value="<?php echo number_format($rowGrandTotal['TOTAL'], 0, ',', '.'); ?>"/>


                                                                </div>

                                                                <div class="form-group">

                                                                    <label> Kembalian</label>
                                                                    <input type="hidden" name="kembalian"
                                                                           id="kembalian">
                                                                    <h1>

                                                               <span id="result">
                                                                </span></h1>
                                                                </div>

                                                                <div class="pull-right">
                                                                    <button class="btn btn-primary btn-sm"
                                                                            type="submit"><i
                                                                                class="fa fa-check-square-o"></i> OK
                                                                    </button>
                                                                    <button class="btn btn-danger btn-sm"
                                                                            data-dismiss="modal" aria-hidden="true"
                                                                            type="button"><i class="fa fa-times"></i>
                                                                        Cancel
                                                                    </button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- end modal -->
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script type="text/javascript" src="jquery-1.11.2.min.js"></script> -->
<script>
    function searchFilter(page_num) {
        // page_num = page_num?page_num:0;
        var keywords = $('#keywords').val();
        // var sortBy = $('#sortBy').val();
        $.ajax({
            type: 'GET',
            url: 'getProduct.php',
            data: '?hal=post&keywords=' + keywords,
            beforeSend: function () {
                $('.loading-overlay').show();
            },
            success: function (html) {
                $('#show_product').html(html);
                $('.loading-overlay').fadeOut("slow");
            }
        });
    }

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++) if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
    }

    function kalkulatorTambah(type1, type2) {

        var a = parseInt(type1.replace(/,.*|[^0-9]/g, ''), 10); //eval(type1);
        var b = parseInt(type2.replace(/,.*|[^0-9]/g, ''), 10);
        var hasil = b - a;

        var jumlah = 'Rp. ' + hasil.toFixed(0).replace(/(d)(?=(ddd)+(?!d))/g, "$1.");
        //var total = NilaiRupiah(hasil);
        // console.info('hahah')
        document.getElementById('result').innerHTML = convertToRupiah(hasil);

        document.getElementById("kembalian").value = convertToRupiah(hasil); //document.getElementById("type2").value;

    }

    /* Tanpa Rupiah */
    var tanpa_rupiah = document.getElementById('type1');
    tanpa_rupiah.addEventListener('keyup', function (e) {
        tanpa_rupiah.value = formatRupiah(this.value);
    });

    var puser = document.getElementById('type2');
    puser.addEventListener('keyup', function (e) {
        puser.value = formatRupiah(this.value);
    });

</script>
