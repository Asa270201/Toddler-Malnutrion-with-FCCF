<?php
include"koneksi.php";
$r=mysqli_fetch_array(mysqli_query($koneksi, "select * from kerusakan where kode='$_GET[kode]'"));
?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">EDIT DATA KERUSAKAN</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="post" action="">
                            	<div class="form-group">
                                    <label>Kode Kerusakan</label>
                                    <input type="text" class="form-control" id="kode" name="kode" value="<?php echo "$r[kode]";?>" placeholder="Kode Kerusakan" readonly/>
                                </div>
                                <div class="form-group">
                                    <label>Nama Kerusakan</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo "$r[nama]";?>" placeholder="Nama Kerusakan"/>
                                </div>
                                <center>
                                    <button type="submit" value="submit" name="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" onclick=window.location.href='?page=kerusakan' class='btn btn-warning'>Kembali</button>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
error_reporting(0);
if(isset($_POST['submit'])){
mysqli_query($koneksi, "update kerusakan set nama='$_POST[nama]' where kode='$_POST[kode]'");

echo"<script>alert('Data Berhasil Diedit..!!');window.location.href='?page=kerusakan'</script>";
}