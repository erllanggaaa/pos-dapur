<?php

//memulai menggunakan mpdf
// Tentukan path yang tepat ke mPDF
$nama_dokumen='Struk'; //Beri nama file PDF hasil.
define('_MPDF_PATH','mpdf60/'); // Tentukan folder dimana anda menyimpan folder mpdf
include(_MPDF_PATH . "mpdf.php"); // Arahkan ke file mpdf.php didalam folder mpdf
$mpdf=new mPDF('utf-8', 'A4-P', 10.5, 'arial'); // Membuat file mpdf baru
 
//Memulai proses untuk menyimpan variabel php dan html
ob_start();
?>
<!doctype html>
<html>
    <head>
        <title>Cetak Struk</title>
    </head>
    <body>
<?php
include('config.php');
$id_orders =   $_POST['id_orders'];
$daftarproduk = mysql_query("SELECT * FROM orders_detail,product 
                                     WHERE orders_detail.product_id=product.product_id 
                                     AND id_orders='$id_orders'");
?>
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
                        include("config.php");
                        $id_orders =   $_POST['id_orders'];
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


</body>
</html>


<?php
//penulisan output selesai, sekarang menutup mpdf dan generate kedalam format pdf

$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Disini dimulai proses convert UTF-8, kalau ingin ISO-8859-1 cukup dengan mengganti $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>