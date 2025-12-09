	<div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">TAMBAH DATA ADMIN</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="post">
                            	<div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" />
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Password"/>
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap"/>
                                </div>
                                <center>
                                    <button type="submit" value="submit" name="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" onclick=window.location.href='?page=admin' class='btn btn-warning'>Kembali</button>
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
		mysqli_query($koneksi, "INSERT INTO admin VALUES (
					'',
					'$_POST[username]',
                    '$_POST[pass]',
					'$_POST[nama]')");

	echo"<script>alert('Data Berhasil Disimpan!');window.location.href='home.php?page=admin'</script>";
	}				
?>