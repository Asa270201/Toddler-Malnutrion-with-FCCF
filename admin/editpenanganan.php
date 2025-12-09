<?php
include"koneksi.php";
$r=mysqli_fetch_array(mysqli_query($koneksi, "select * from penanganan where kode='$_GET[kode]'"));
?>
	<div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">EDIT DATA PENANGANAN</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="post" action="">
                            	<div class="form-group">
                                    <label>Kode Penanganan</label>
                                    <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Penanganan" value="<?php echo "$r[kode]";?>" readonly />
                                </div>
                                <div class="form-group">
                                    <label>Penanganan</label>
                                    <input type="text" class="form-control" id="penanganan" name="penanganan" placeholder="Nama Penanganan" value="<?php echo "$r[penanganan]";?>"/>
                                </div>
                                <center>
                                    <button type="submit" value="submit" name="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" onclick=window.location.href='?page=penanganan' class='btn btn-warning'>Kembali</button>
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
mysqli_query($koneksi, "update penanganan set penanganan='$_POST[penanganan]' where kode='$_POST[kode]'");

echo"<script>alert('Data Berhasil Diedit..!!');window.location.href='?page=penanganan'</script>";
}