	<div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">TAMBAH NILAI MB</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="post" action="">
                            	<div class="form-group">
                                    <label>Kerusakan</label>
                                    <select name="id_kerusakan" class="form-control">
                                        <option value="" selected disabled>Pilih Kode Kerusakan</option>
                                        <?php
                                        $g=mysqli_query($koneksi, "select * from kerusakan order by kode");
                                            while($rp=mysqli_fetch_array($g)){
                                            echo"<option value='$rp[id_kerusakan]'>$rp[nama]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Gejala</label>
                                    <select name="id_gejala" class="form-control">
                                        <option value="" selected disabled>Pilih Kode Penanganan</option>
                                        <?php
                                        $g=mysqli_query($koneksi, "select * from gejala order by kode");
                                            while($rp=mysqli_fetch_array($g)){
                                            echo"<option value='$rp[id_gejala]'>$rp[nama_gejala]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nilai MB</label>
                                    <input type="text" class="form-control" id="mb" name="mb" placeholder="Nilai MB" />
                                </div>
                                <center>
                                    <button type="submit" value="submit" name="submit" class="btn" style="background-color: #00D9A5;color: white;">Simpan</button>
                                    <button type="button" onclick=window.location.href='?page=nilaimbmd' class='btn btn-warning'>Kembali</button>
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
        mysqli_query($koneksi, "INSERT INTO nilaipakar VALUES (
                    '',
                    '$_POST[id_kerusakan]',
                    '$_POST[id_gejala]',
                    '$_POST[mb]')");

    echo"<script>alert('Data Berhasil Disimpan!');window.location.href='home.php?page=nilaimbmd'</script>";
                    }
?>