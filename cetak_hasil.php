<body onload=javascript:window:print()>

<?php
error_reporting(0);
session_start();

include 'koneksi.php';

if (!isset($_SESSION['GEJALA'])) {
  exit("<script>location.href='home.php?page=diagnosa';</script>");
}
$gejala = $_SESSION['GEJALA'];
$md_user = $_SESSION['MD_USER'];
$kerusakan = array();
$cf = array();

# PROSES PERHITUNGAN CF

$q = mysqli_query($koneksi, "select * from kerusakan");
if (mysqli_num_rows($q) > 0) {
  while ($h = mysqli_fetch_array($q)) {
      $id = $h['id_kerusakan'];
      $kerusakan[$id] = array($h['kode'], $h['nama']);

      $mb_lama = 0;
      $md_lama = 0;
      $mb_baru = 0;
      $md_baru = 0;
      $mb_sementara = 0;
      $md_sementara = 0;
      $gejala_ke = 0;
      $total_gejala = 0;

      $qq = mysqli_query($koneksi, "select * from nilaipakar where id_kerusakan='" . $id . "' order by id_nilai");
      while ($hh = mysqli_fetch_array($qq)) {
          $total_gejala++;
          $id_gejala = $hh['id_gejala'];
          if (in_array($id_gejala, $gejala)) {
              $gejala_ke++;
              if ($gejala_ke == 1) {
                  $mb_lama = 0;
                  $md_lama = 0;
                  $mb_baru = $hh['mb'];
                  $md_baru = $md_user[$id_gejala];
                  $mb_sementara = $hh['mb'];
                  $md_sementara = $md_user[$id_gejala];
              } else {
                  $mb_lama = $mb_sementara;
                  $md_lama = $md_sementara;
                  $mb_baru = $hh['mb'];
                  $md_baru = $md_user[$id_gejala];
                  $mb_sementara = $mb_lama + $mb_baru * (1 - $mb_lama);
                  $md_sementara = $md_lama + $md_baru * (1 - $md_lama);
              }
          }
      }
      if ($gejala_ke > 0 && $gejala_ke == $total_gejala) {
          $nilai = round(($mb_sementara * $md_sementara * 0.92), 4);
          $nilai_kerusakan[$id] = $nilai;
          $cf[] = array($nilai, $id);
      }
  }
}

# URUTKAN NILAI
usort($cf, function($a, $b) {
  if ($a[0] == $b[0]) {
      return 0;
  }
  return ($a[0] < $b[0]) ? 1 : -1;
});

$nama_kerusakan = '';
$daftar = '';
$no = 0;
for ($i = 0; $i < count($cf); $i++) {
  if($cf[$i][0] > 0){
      if ($nama_kerusakan == '') {
          $nama_kerusakan = $kerusakan[$cf[$i][1]][1];
          $nilai_tertinggi = $cf[$i][0] * 100;
      }
      $no++;
      $nilai = ($cf[$i][0] * 100);
      $kpp = $kerusakan[$cf[$i][1]][0];
      $pp = $kerusakan[$cf[$i][1]][1];
      $daftar .= '
          <tr>
          <td style="text-align:center;"><font color="#000000">' . $no . '</td>
          <td><font color="#000000">' . $kerusakan[$cf[$i][1]][0] . '</td>
          <td><font color="#000000">' . $kerusakan[$cf[$i][1]][1] . '</td>
          <td style="text-align:center;"><font color="#000000">' . $nilai . ' %</td>
          <td style="text-align:center;"><font color="#000000">' . $no . '</td>
          </tr>
      ';
  }
}

?>

<div align="center">
<div id="right_col" style="font-size:10px;width:770px " align="center">
	<table cellpadding="0" cellspacing="0" width="100%" >
	<tr>
	<td valign="top">
	<div style="text-align:center;font-family:Arial, Helvetica, sans-serif;line-height:26px;padding-top:0px;height:90px;">
	<span style="font-size:18px;font-weight:bold;"><br>Sistem Pakar Diagnosa Kerusakan Gigi</span><br />
	</div>
	<div style="border-bottom:2px solid #000;"></div>
	<br>
	<div">
	<?php
$q = mysqli_query($koneksi, "SELECT * FROM pasien WHERE id_pasien='$_SESSION[iduser]'");
$h = mysqli_fetch_array($q);

$qw5 = mysqli_query($koneksi, "select * from kerusakan where nama='$nama_kerusakan'");
$hw5 = mysqli_fetch_array($qw5);
$aaa1 = $hw5['kode'];?>

<table width="100%" border="0" cellspacing="0" cellpadding="4" style="float:left;">
	<tr>
		<td valign="top">Nama Member </td>
		<td>: <?php echo "$h[nama]"; ?></td>
	</tr>
	<tr>
		<td width="200" valign="top">Jenis Kelamin</td>
		<td>: <?php echo "$h[jk]"; ?></td>
	</tr>
	<tr>
		<td width="200" valign="top">Alamat</td>
		<td>: <?php echo "$h[alamat]"; ?></td>
	</tr>
	<tr>
		<td width="200" valign="top">NoHP</td>
		<td>: <?php echo "$h[hp]"; ?></td>
	</tr>
	<tr>
		<td width="200" valign="top">Tanggal Konsultasi</td>
		<td>: <?php
		function tanggal_indonesia($tanggal){
        $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
        );

        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }

    echo tanggal_indonesia(date('Y-m-d')); ?></td>
	</tr>
</table>
</div> <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<table width="100%" border="0" cellspacing="0" cellpadding="4" style="float:left;">
	<tr>
		<td width="200" valign="top">NAMA KERUSAKAN </td>
		<td>:<strong> <?php echo strtoupper($nama_kerusakan); ?></strong></td>
	</tr>

	<tr>
		<td width="200" valign="top">PENANGANAN</td>
		<td><?php
$qw = mysqli_query($koneksi, "select rule_penanganan.*,kerusakan.* from rule_penanganan, kerusakan where kerusakan.nama='$nama_kerusakan' AND rule_penanganan.kode_kerusakan=kerusakan.kode");
while ($hw = mysqli_fetch_array($qw)) {
  $no++;
  $penanganan = $hw['kode_penanganan'];
  $rr = mysqli_query($koneksi, "select * from penanganan where kode='$penanganan'");
  $dd = mysqli_fetch_array($rr);
  echo ": $dd[penanganan] <br>";
}
?></td>
	</tr>
</table>


	<div style="clear:both;height:20px"></div>
	<table width="100%" class="tabel_t4" cellpadding="0" cellspacing="0" border="1">
	<thead>
	<tr>
		<th align="center" width="30">NO</th>
		<th align="center" width="100">KODE</th>
		<th align="center">NAMA KERUSAKAN</th>
		<th align="center" width="100">NILAI</th>
		<th align="center" width="100">RANK</th>
	</tr>
	</thead>
	<tbody>
		<?php
echo $daftar;
?>
	</tbody>
	</table>


	</td>
	</tr>
	</table>


<br />
*Berkonsultasilah dengan dokter anak terdekat !!!
