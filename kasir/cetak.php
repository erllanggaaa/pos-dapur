<?php
function isi_keranjang()
{
    $isikeranjang = array();
    $sid = session_id();
    $sql = mysql_query("SELECT * FROM orders_temp WHERE id_session='$sid'");

    while ($r = mysql_fetch_array($sql)) {
        $isikeranjang[] = $r;
    }
    return $isikeranjang;
}

$isikeranjang = isi_keranjang();
$jml = count($isikeranjang);

if ($jml == 0) {
    echo "<script> alert('Product masih kosong'); location.href='index.php?hal=pos' </script>";
    exit();
}

//$tgl_skrg = date("Y-m-d");
$jam_skrg = date("H:i:s");


// simpan data pemesanan
mysql_query("INSERT INTO 
                orders(nama_petugas, tgl_order, jam_order) 
                 VALUES ('" . $_SESSION['username'] . "',NOW(),'$jam_skrg')");
//exit();
// mendapatkan nomor orders
$id_orders = mysql_insert_id();
// panggil fungsi isi_keranjang dan hitung jumlah produk yang dipesan


// simpan data detail pemesanan
for ($i = 0; $i < $jml; $i++) {
    mysql_query("INSERT INTO orders_detail(id_orders, product_id, jumlah) 
                   VALUES('$id_orders',{$isikeranjang[$i]['product_id']}, {$isikeranjang[$i]['jumlah']})");

    mysql_query("UPDATE product SET product_stock=product_stock - {$isikeranjang[$i]['jumlah']} WHERE product_id={$isikeranjang[$i]['product_id']}");


}
//exit();
for ($i = 0; $i < $jml; $i++) {

    mysql_query("DELETE FROM orders_temp WHERE id_orders_temp = {$isikeranjang[$i]['id_orders_temp']}");
}
//exit();
$daftarproduk = mysql_query("SELECT * FROM orders_detail,product 
                                     WHERE orders_detail.product_id=product.product_id 
                                     AND id_orders='$id_orders'");
//exit();
?>
<!--header start -->

<!-- header end -->
<div class="wrapper">

    <div class="row blog">

        <div class="col-md-7">

            <div class="panel">
                <div class="panel-body"> 
                    <h1>Cash Rp. <?php echo number_format(str_replace(".", "", $_POST['cash']), 0, ',', '.'); ?></h1>
                </div>
            </div>

            <div class="panel">
                <div class="panel-body">
                    <!--      <h1 class="text-center mtop35"><a href="#"><i class="fa fa-shopping-cart"></i> 12 Item </a></h1> -->
                    <div class="blog-post">
                        <div class="media">
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Sub Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $total = 0;
                                    while ($data = mysql_fetch_array($daftarproduk)) {
                                        $sub_total = +$data['product_price'] * $data['jumlah'];
                                        $total += $sub_total;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $data['product_name'] ?></td>
                                            <td>
                                                Rp. <?php echo number_format($data['product_price'], 0, ',', '.'); ?></td>
                                            <td><?php echo $data['jumlah']; ?></td>
                                            <td>Rp. <?php echo number_format($sub_total, 0, ',', '.'); ?></td>
                                        </tr>
                                    <?php }
                                    ?>
                                    <tr>
                                        <td colspan="3">
                                            `<b>Total</b>
                                        </td>
                                        <td><b>Rp.
                                            <?php echo number_format($total, 0, ',', '.'); ?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" align="reight">

                                        <!-- print new -->
                                        <form method="post" action="struct_print.php" target="_blank">
                                            <input type="hidden" name="cash" value="<?php echo $_POST['cash']; ?>">

                                            <input type="hidden" name="id_orders" value="<?php echo $id_orders; ?>">

                                         <button class="btn btn-primary" type="submit">
                                                <i class="fa fa-print"></i> Print
                                            </button>
                           <!--              <a class="btn btn-primary btn-lg" target="_blank" href="struct_print.php"><i class="fa fa-print"></i> Print </a> -->
                                        </form>
                                        <!-- print end -->

                                           <!--  <button class="btn btn-primary" onclick="PrintElem('#struk')" type="submit">
                                                <i class="fa fa-print"></i> print
                                            </button> -->
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div id="struk">
                <!-- struk -->
                <div style="width:327px; 
                padding:0 10px 20px 10px; 
                margin:0 auto; 
                background:#ffffff; color:#4d4d4d;
                 font:13px /1.5 Tahoma; border:4px double #dddddd;">


                    <table cellpadding="0" cellspacing="0" border="0">
                        <tbody>

                        <tr>
                            <td valign="top"
                                style="width:100px; padding:10px 0; border-bottom:4px double #dddddd;text-align: center;">
                                <img src="../assets/images/logo-struk.png" style="margin:0 auto; width:75px; border:0;">
                            </td>


                            <td colspan="2" valign="top"
                                style="width:180px; padding:10px 0; border-bottom:4px double #dddddd; text-align:center; font-size:11px; line-height:16px;    padding-top: 20px;">
                                DAPUR YULIA<br>
                            </td>
                        </tr>

                        <tr>
                            <td valign="top" style="width:100px; padding:10px 0 0 0; font-size:11px; ">
                                Nota : <?php echo $id_orders; ?> </td>
                            <td colspan="2" valign="top" style="width:100px; padding:10px 0 0 0;font-size:11px; "> Kasir
                                : Kasir Dapur Yulia
                            </td>
                        </tr>

                        <?php

                        //exit();
                        $CetakNota = mysql_query("SELECT * FROM orders_detail,product 
                                     WHERE orders_detail.product_id=product.product_id 
                                     AND id_orders='$id_orders'");
                        $totalcetak = 0;
                        $itemcetak = 0;
                        while ($datacetak = mysql_fetch_array($CetakNota)) {
                            $subtotalcetak = +$datacetak['jumlah'] * $datacetak['product_price'];
                            $totalcetak += $subtotalcetak;
                            $itemcetak += $datacetak['jumlah'];
                            ?>
                            <tr>
                                <td valign="top"
                                    style="width:100px; padding:10px 0 0 0; font-size:11px; "><?php echo $datacetak['jumlah']; ?></td>
                                <td valign="top" style="width:100px; padding:10px 0 0 0;font-size:11px; ">
                                    <?php echo $datacetak['product_name']; ?>
                                </td>
                                <td style="font-size:11px; text-align: right;">
                                    Rp. <?php echo number_format($subtotalcetak, 0, ',', '.'); ?>,-</td>
                            </tr>
                            </tr>
                            <?php
                        }
                        ?>

                        <tr>
                            <td></td>
                            <td valign="top" style="width:100px; padding:10px 0 0 0;font-size:11px; "><b>Total</b></td>
                            <td valign="top" style="width:100px; padding:10px 0 0 0;font-size:11px;text-align: right; ">
                                <b>Rp. <?php echo number_format($totalcetak, 0, ',', '.'); ?>,-</b></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td valign="top" style="width:100px; padding:3px 0 0 0;font-size:11px; "><b>Tunai</b></td>
                            <td valign="top" style="width:100px; padding:3px 0 0 0;font-size:11px;text-align: right; ">
                                <b>Rp. <?php echo number_format(str_replace(".", "", $_POST['cash']), 0, ',', '.'); ?>,-</b></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td valign="top" style="width:100px; padding:3px 0 0 0;font-size:11px; "><b>Kembali</b></td>
                            <td valign="top" style="width:100px; padding:3px 0 0 0;font-size:11px;text-align: right;">
                                <b>Rp. <?php
                                $kembali = str_replace(".", "", $_POST['cash']) - $totalcetak;
                                echo number_format($kembali, 0, ',', '.');
                                ?>,-</b>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3" valign="top"
                                style="text-align: center;width:100px; padding:10px 0 0 0;font-size:11px; ">
                                ***************<?php echo date("Y-m-d") . "-" . date("H:i:s"); ?>**************
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align: center;font-size:11px; ">TERIMAKASIH</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align: center;font-size:11px; ">SUDAH BERKUNJUNG KE TEMPAT KAMI
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- struk end -->
        </div>
    </div>
</div>

