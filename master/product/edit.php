<?php 
error_reporting(0);
$id = $_GET['id'];
$queryRowProduct = mysql_query("SELECT * FROM product where product_id = '".$id."'");
$rowProduct = mysql_fetch_array($queryRowProduct);
    if (isset($_POST['ubah'])) {  
      if (!empty($_FILES) && $_FILES['product_images']['size'] >0 && $_FILES['user_foto']['error'] == 0){  
            //$random = substr(number_format(time() * rand(),0,'',''),0,10);
            $images = $_FILES['product_images']['name'];
            $move = move_uploaded_file($_FILES['product_images']['tmp_name'],'assets/images/product/'.$images);  

            if ($move) {  
              $queryUpdate  = mysql_query("UPDATE product SET 
                                    product_name      = '".$_POST['product_name']."',
                                    product_price     = '".str_replace(".", "", $_POST['product_price'])."',
                                    product_desc      = '".$_POST['product_desc']."',
                                    product_images    = '".$images."',
                                    product_stock     = '".str_replace(".", "", $_POST['product_stock'])."',
                                    category_id       = '".$_POST['product_category']."'
                                    WHERE product_id     = '".$id."'
                                     ");
                $file = "assets/images/product/".$rowProduct['product_images'];
                unlink($file);
                                             
            }

      }else{  
         $queryUpdate=mysql_query("UPDATE product SET 
                                    product_name      = '".$_POST['product_name']."',
                                    product_price     = '".str_replace(".", "", $_POST['product_price'])."',
                                    product_desc      = '".$_POST['product_desc']."',
                                    product_stock     = '".str_replace(".", "", $_POST['product_stock'])."',
                                    category_id       = '".$_POST['product_category']."'  
                                    WHERE product_id     = '".$id."'
                                     "); 
                                    
      } 
      if ($queryUpdate) {
         echo "<script> alert('Data Berhasil Disimpan'); location.href='index.php?hal=master/product/list' </script>";exit;
      }
    }
 ?>
        <!--body wrapper start-->
        <div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           EDIT MENU
                        </header>
                        <div class="panel-body">
                            <div class=" form">
                                <form class="cmxform form-horizontal adminex-form" id="commentForm" method="POST" enctype="multipart/form-data"  action="">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2" style="text-align: left;">Nama</label>
                                        <div class="col-lg-5">
                                            <input class=" form-control" id="cname" name="product_name" minlength="2" type="text" value="<?php echo $rowProduct['product_name']  ?>" required/>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2" style="text-align: left;">Foto</label>
                                        <div class="col-lg-5">
                                            <img src="assets/images/product/<?php echo $rowProduct['product_images']; ?>" width="50%">
                                            <input class=" form-control" id="cname" name="product_images" minlength="2" type="file"/>
                                        </div>
                                    </div>

                                     <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2" style="text-align: left;">Kategori</label>
                                        <div class="col-lg-3">
                                            <select name="product_category" class="form-control " >
                                                <option value="">--pilih kategori--</option>
                                            <?php 
                                              $no = 0;
                                              $queryCategory = mysql_query("SELECT * FROM category ORDER BY category_id DESC");
                                              while ($rowCategory  = mysql_fetch_array($queryCategory)) {
                                                if($rowProduct['category_id'] == $rowCategory['category_id']){
                                            ?>
                                                <option value="<?php echo $rowCategory['category_id']; ?>" selected><?php echo $rowCategory['category_name'] ?></option>
                                            <?php

                                                }else{
                                            ?>
                                                 <option value="<?php echo $rowCategory['category_id']; ?>"><?php echo $rowCategory['category_name'] ?></option>
                                            <?php }
                                            } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2" style="text-align: left;">Harga </label>
                                        <div class="col-lg-5">
                                            <input class="form-control " id="tanpa-rupiah" type="text" name="product_price" value="<?php echo number_format($rowProduct['product_price'], 0, ',', '.');  ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-2" style="text-align: left;">Stok</label>
                                        <div class="col-lg-2">
                                            <input class="form-control " id="tanpa-rupiah" type="text" name="product_stock" value="<?php echo $rowProduct['product_stock']; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="ccomment" class="control-label col-lg-2" style="text-align: left;">Deskripsi</label>
                                        <div class="col-lg-5">
                                            <textarea class="form-control " id="ccomment" name="product_desc" required><?php echo $rowProduct['product_desc']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-5">
                                            <button class="btn btn-primary" type="submit" name="ubah">UPDATE</button>
                                            <a href="?hal=master/product/list">
                                            <button class="btn btn-default" type="button">Cancel</button>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!--body wrapper end-->

