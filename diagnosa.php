	<div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">KONSULTASI</h4>
                </div>
            </div> 
<?php
error_reporting(0);
$iduser = '$_SESSION[iduser]';
if (isset($_POST['submit'])) {
	$gejala = array();
	$md_user = array();
	$q_gjl = mysqli_query($koneksi, "select * from gejala order by kode");
	while ($h_gjl = mysqli_fetch_array($q_gjl)) {
        $id_gejala = $h_gjl['id_gejala'];
        $md = $_POST['gejala'.$id_gejala];
        if($md > 0){
            $gejala[] = $id_gejala;
            $md_user[$id_gejala] = $md;
        }
    }
	if (empty($gejala)) {
		$error = '<p style="color: red;">Silahkan pilih gelaja terlebih dahulu.</p>';
	} else {
		$_SESSION['GEJALA'] = $gejala;
		$_SESSION['MD_USER'] = $md_user;
		$iduser = $_SESSION['id_pasien'];
		exit("<script>location.href='home.php?page=konsultasi';</script>");

	} 
}
if (isset($_POST['reset'])) {
	if (isset($_SESSION['GEJALA'])) {
		unset($_SESSION['GEJALA']);
		unset($_SESSION['MD_USER']);
	}
	exit("<script>location.href='home.php?page=diagnosa';</script>");

}

$list_gejala = '';
$no = 0;
$q = mysqli_query($koneksi, "select * from gejala order by kode");
if (mysqli_num_rows($q) > 0) {
	while ($h = mysqli_fetch_array($q)) {
		$qp = mysqli_query($koneksi, "select * from nilaipakar where id_gejala='$h[id_gejala]'");
        $hp = mysqli_fetch_array($qp);
        $id_gejala = $h['id_gejala'];
		?>

<?php
$no++;
	$list_gejala .= '
		  <tr>
			<td style="text-align:center;" width="30">' . $no . '</td>
			<td>APAKAH ' . $h['nama_gejala'] . ' ?</td>
           <td style="text-align:center;" width="30" valign="top" class="form-group" >
              <select name="gejala'.$id_gejala.'" class="form-control">
                <option>- Silahkan Pilih -</option>
                <option value="0">Tidak</option>
                <option value="0.2">Kurang Yakin</option>
                <option value="0.4">Sedikit Yakin</option>
                <option value="0.6">Cukup Yakin</option>
                <option value="0.8">Yakin</option>
                <option value="1">Sangat Yakin</option>
              </select>
              </td>
		  </tr>
		';
	}
} 

?>

<form action="" name="" method="post" enctype="multipart/form-data">
<?php
if (!empty($error)) {
	echo '
	   <div class="alert alert-error ">
		  ' . $error . '
	   </div>
	';
}
$q = mysqli_query($koneksi, "SELECT * FROM pasien WHERE id_pasien='$_SESSION[iduser]'");
$h = mysqli_fetch_array($q);
;?>

<div class="col-md-2"><font>Nama Pengguna</font></div><font>: <?php echo "$h[nama]"; ?></font><br />
<div class="col-md-2">Jenis Kelamin		  </div>: <?php echo "$h[jk]"; ?> <br />
<div class="col-md-2">Tanggal Konsultasi  </div>: <?php echo date('d-m-Y');?><br /><br />

<p>PILIH GEJALA SESUAI DENGAN TINGKAT KEYAKINAN YANG DIRASAKAN</p>

<table class="table table-striped table-bordered table-hover">
	<thead>
	  <tr>
		<td style="text-align:center;" width="30">NO</td>
		<td style="text-align:center;" width="300">GEJALA</td>
		<td style="text-align:center;" width="30">PILIHAN</td>
	  </tr>
	</thead>
	<tbody>
		<?php echo $list_gejala; //<input type="select" id="selectAll" />    ?>
	</tbody>
</table>
<center>
<button type="submit" name="reset" class="btn btn-warning"> Reset</button>
<button type="submit" name="submit" class="btn" style="background-color: #00D9A5;color: white;">Diagnosa</button>
</center>

</form>
</div>
</div>
<script>
jQuery(document).ready(function() {
	$("#selectAll").select(function () {
		if($(this).prop("select")==true){
			$(".form-group").attr("select",true);
			$(".form-group").parent("span").attr("class","select");
		}else{
			$(".form-group").attr("select",false);
			$(".form-group").parent("span").attr("class","");
		}
    });
})
</script> 