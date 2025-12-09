<?php
include"koneksi.php";
$r=mysqli_fetch_array(mysqli_query($koneksi, "select * from gejala where kode='$_GET[kode]'"));
?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">EDIT DATA GEJALA</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="post" action="">
                            	<div class="form-group">
                                    <label>Kode Gejala</label>
                                    <input type="text" class="form-control" id="kode" name="kode" value="<?php echo "$r[kode]";?>" placeholder="Kode Gejala" readonly/>
                                </div>
                                <div class="form-group">
                                    <label>Nama Gejala</label>
                                    <input type="text" class="form-control" id="nama_gejala" name="nama_gejala" value="<?php echo "$r[nama_gejala]";?>" placeholder="Nama Gejala"/>
                                </div>
                                <center>
                                    <button type="submit" value="submit" name="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" onclick=window.location.href='?page=gejala' class='btn btn-warning'>Kembali</button>
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
mysqli_query($koneksi, "update gejala set nama_gejala='$_POST[nama_gejala]' where kode='$_POST[kode]'");

echo"<script>alert('Data Berhasil Diedit..!!');window.location.href='?page=gejala'</script>";
}