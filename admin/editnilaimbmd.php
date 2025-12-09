	<div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">EDIT NILAI MB</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?php
                            include"koneksi.php";
                            $r=mysqli_fetch_array(mysqli_query($koneksi, "select * from nilaipakar where id_nilai='$_GET[id_nilai]'"));
                            ?>
                            <form method="post" action="">
                                <input type="text" class="form-control" name="id_nilai" value="<?php echo "$r[id_nilai]";?>" hidden="hidden">
                            	<div class="form-group">
                                    <label>Kerusakan</label>
                                    <select name="id_kerusakan" class="form-control">
                                        <option value="" selected disabled>Pilih Kerusakan</option>
                                        <?php
                                        $g=mysqli_query($koneksi, "select * from kerusakan order by kode");
                                            while($rp=mysqli_fetch_array($g)){
                                                if($r['id_kerusakan']==$rp['id_kerusakan']){
                                                $select="selected";
                                                }else{
                                                    $select="";
                                                }
                                            echo"<option $select value='$rp[id_kerusakan]'>$rp[nama]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Gejala</label>
                                    <select name='id_gejala' class="form-control">
                                        <option value="" selected disabled>Pilih Gejala</option>
                                        <?php
                                        $g1=mysqli_query($koneksi, "select * from gejala order by kode");
                                            while($rp1=mysqli_fetch_array($g1)){
                                                if($r['id_gejala']==$rp1['id_gejala']){
                                                    $select="selected";
                                                }else{
                                                    $select="";
                                                }
                                            echo"<option $select value='$rp1[id_gejala]'>$rp1[nama_gejala]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nilai MB</label>
                                    <input type="text" class="form-control" id="mb" name="mb" value="<?php echo "$r[mb]";?>" placeholder="Nilai MB" />
                                </div>
                                <center>
                                    <button type="submit" value="submit" name="submit" class="btn btn-primary">Simpan</button>
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
        mysqli_query($koneksi, "update nilaipakar set id_kerusakan='$_POST[id_kerusakan]', id_gejala='$_POST[id_gejala]',mb='$_POST[mb]' where id_nilai='$_POST[id_nilai]'");

    echo"<script>alert('Data Berhasil Disimpan!');window.location.href='home.php?page=nilaimbmd'</script>";
                    }
?>