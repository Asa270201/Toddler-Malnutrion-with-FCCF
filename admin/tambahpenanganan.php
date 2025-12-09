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
                                    <label>Kode Penanganan</label>
                                    <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Penanganan" />
                                </div>
                                <div class="form-group">
                                    <label>Penanganan</label>
                                    <input type="text" class="form-control" id="penanganan" name="penanganan" placeholder="Nama Penanganan"/>
                                </div>
                                <center>
                                    <button type="submit" value="submit" name="submit" class="btn" style="background-color: #00D9A5;color: white;" >Simpan</button>
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
	include"koneksi.php";
	if(isset($_POST['submit'])){
		mysqli_query($koneksi, "INSERT INTO penanganan VALUES (
					'',
					'$_POST[kode]',
					'$_POST[penanganan]')");

	echo"<script>alert('Data Berhasil Disimpan!');window.location.href='home.php?page=penanganan'</script>";
					}
?>