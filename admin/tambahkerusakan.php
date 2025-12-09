	<div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Tambah Data</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="post" action="">
                            	<div class="form-group">
                                    <label>Kode Kerusakan</label>
                                    <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Kerusakan" />
                                </div>
                                <div class="form-group">
                                    <label>Nama Kerusakan</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Kerusakan"/>
                                </div>
                                <center>
                                	<button type="submit" value="submit" name="submit" class="btn" style="background-color: #00D9A5;color: white;">Simpan</button>
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
	include"koneksi.php";
	if(isset($_POST['submit'])){
		mysqli_query($koneksi, "INSERT INTO kerusakan VALUES (
					'',
					'$_POST[kode]',
					'$_POST[nama]')");

	echo"<script>alert('Data Berhasil Disimpan!');window.location.href='home.php?page=kerusakan'</script>";
					}
?>