<?php
error_reporting(0);
$id = $_GET['id'];
$queryRowCategory = mysql_query("SELECT * FROM category where category_id = '" . $id . "'");
$rowCategory = mysql_fetch_array($queryRowCategory);
if (isset($_POST['ubah'])) {
    $queryUpdate = mysql_query("UPDATE category SET 
                                    category_name = '" . $_POST['category_name'] . "',
                                    category_status = '" . $_POST['category_status'] . "'
                                    WHERE category_id = '" . $id . "'
                                     ");

}
if ($queryUpdate) {
    echo "<script> alert('Data Berhasil Disimpan'); location.href='index.php?hal=master/category/list' </script>";
    exit;
}

?>
<!--body wrapper start-->
<div class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    EDIT KATEGORI
                </header>
                <div class="panel-body">
                    <div class=" form">
                        <form class="cmxform form-horizontal adminex-form" id="commentForm" method="POST" action="">

                            <div class="form-group ">
                                <label for="cname" class="control-label col-lg-2" style="text-align: left;">Nama
                                    Kategori</label>
                                <div class="col-lg-6">
                                    <input class="form-control" id="cname" name="category_name" minlength="2"
                                           type="text" value="<?php echo $rowCategory['category_name'] ?>" required/>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="cname" class="control-label col-lg-2"
                                       style="text-align: left;">Status</label>
                                <div class="col-lg-6">
                                    <select class="form-control" name="category_status">
                                        <option value="Y">Active</option>
                                        <option value="N">Not Active</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <!-- update asli -->
                                    <input type="submit" value="UPDATE" class="btn btn-primary" name="ubah">
                                    <!--  <button class="btn btn-primary" type="submit" name="ubah">UPDATE</button> -->
                                    <a href="?hal=master/category/list">
                                        <button class="btn btn-default" type="button">CANCEL</button>
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