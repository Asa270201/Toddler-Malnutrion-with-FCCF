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
                                    <label>Kode & Nama Kerusakan</label>
                                    <select name="kode_kerusakan" class="form-control">                
                                        <option value="" selected disabled>Pilih Kode Kerusakan</option>
                                        <?php 
                                        $g=mysqli_query($koneksi, "select * from kerusakan order by kode");
                                            while($rp=mysqli_fetch_array($g)){
                                            echo"<option value='$rp[kode]'>$rp[kode] - $rp[nama]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kode & Nama Penanganan</label>
                                    <select name="kode_penanganan" class="form-control">                
                                        <option value="" selected disabled>Pilih Kode Penanganan</option>
                                        <?php 
                                        $g=mysqli_query($koneksi, "select * from penanganan order by kode");
                                            while($rp=mysqli_fetch_array($g)){
                                            echo"<option value='$rp[kode]'>$rp[kode] - $rp[penanganan]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <center>
                                    <button type="submit" value="submit" name="submit" class="btn" style="background-color: #00D9A5;color: white;">Simpan</button>
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
    include"koneksi.php";
    if(isset($_POST['submit'])){
        mysqli_query($koneksi, "INSERT INTO rule_penanganan VALUES (
                    '',
                    '$_POST[kode_kerusakan]',
                    '$_POST[kode_penanganan]')");

    echo"<script>alert('Data Berhasil Disimpan!');window.location.href='home.php?page=rulepenanganan'</script>";
                    }
?>