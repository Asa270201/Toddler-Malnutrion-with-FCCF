<?php
# Assuming database connection ($koneksi) and session variables are already set

function konversi_md($nilai){
    return $nilai;
}

if (!isset($_SESSION['GEJALA'])) {
    exit("<script>location.href='home.php?page=diagnosa';</script>");
}

$gejala = $_SESSION['GEJALA'];
$md_user = $_SESSION['MD_USER'];
$kerusakan = array();
$cf = array();
$forward_chaining = array();

# PROSES PERHITUNGAN CF
$q = mysqli_query($koneksi, "SELECT * FROM kerusakan");
if (mysqli_num_rows($q) > 0) {
    while ($h = mysqli_fetch_array($q)) {
        $id = $h['id_kerusakan'];
        $kerusakan[$id] = array($h['kode'], $h['nama']);

        $mb_sementara = 0;
        $md_sementara = 0;
        $gejala_ke = 0;
        $total_gejala = 0;
        $conditions_met = array();

        $qq = mysqli_query($koneksi, "SELECT * FROM nilaipakar WHERE id_kerusakan='" . $id . "' ORDER BY id_nilai");
        while ($hh = mysqli_fetch_array($qq)) {
            $total_gejala++;
            $id_gejala = $hh['id_gejala'];

            if (in_array($id_gejala, $gejala)) {
                $conditions_met[] = $id_gejala;
                $gejala_ke++;
                if ($gejala_ke == 1) {
                    $mb_sementara = $hh['mb'];
                    $md_sementara = isset($md_user[$id_gejala]) ? $md_user[$id_gejala] : 0;
                } else {
                    $mb_sementara = $mb_sementara + $hh['mb'] * (1 - $mb_sementara);
                    $md_sementara = $md_sementara + (isset($md_user[$id_gejala]) ? $md_user[$id_gejala] : 0) * (1 - $md_sementara);
                }
            }
        }
        if ($gejala_ke > 0 && $gejala_ke == $total_gejala) {
            $nilai = round(($mb_sementara * $md_sementara * 0.92), 4);
            $nilai_kerusakan[$id] = $nilai;
            $cf[] = array($nilai, $id);
            $forward_chaining[] = array('conditions' => $conditions_met, 'result' => $h['kode'], 'cf_value' => $nilai);
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

$list_gejala = '';
$no = 0;
$q = mysqli_query($koneksi, "SELECT * FROM gejala ORDER BY kode");
if (mysqli_num_rows($q) > 0) {
    while ($h = mysqli_fetch_array($q)) {
        if (isset($_SESSION['GEJALA'])) {
            $id_gejala = $h['id_gejala'];
            if (in_array($id_gejala, $_SESSION['GEJALA'])) {
                $no++;
                $list_gejala .= '
                    <tr>
                    <td valign="top" width="30">' . $no . '</td>
                    <td valign="top" width="70">' . $h['kode'] . '</td>
                    <td valign="top">' . $h['nama_gejala'] . ' ('.strtoupper(konversi_md(isset($md_user[$id_gejala]) ? $md_user[$id_gejala] : 'Data tidak tersedia')).')</td>
                    </tr>
                ';
            }
        }
    } 
}

if (empty($cf)) {
    $daftar = '<tr><td colspan="5" style="text-align:center;"><font color="#000000">Tidak terdiagnosa Malnutrisi</font></td></tr>';
    $nilai_tertinggi = 0;
    $nama_kerusakan = 'Tidak Terdiagnosa';
    $forward_chaining = array();
}

# Prepare Penanganan
$penanganan = 'Tidak ada penanganan yang diperlukan.';
if ($nama_kerusakan !== 'Tidak Terdiagnosa') {
    $qw = mysqli_query($koneksi, "SELECT rule_penanganan.*,kerusakan.* FROM rule_penanganan, kerusakan WHERE kerusakan.nama='$nama_kerusakan' AND rule_penanganan.kode_kerusakan=kerusakan.kode");
    $penanganan_list = [];
    while ($hw = mysqli_fetch_array($qw)) {
        $penanganan = $hw['kode_penanganan'];
        $rr = mysqli_query($koneksi, "SELECT * FROM penanganan WHERE kode='$penanganan'");
        $dd = mysqli_fetch_array($rr);
        $penanganan_list[] = $dd['penanganan'];
    }
    $penanganan = implode('<br>', $penanganan_list);
}

# Insert into history table
$gejala_list = implode(', ', array_map(function($id) use ($koneksi) {
    $result = mysqli_query($koneksi, "SELECT nama_gejala FROM gejala WHERE id_gejala='$id'");
    $row = mysqli_fetch_assoc($result);
    return $row ? $row['nama_gejala'] : 'Gejala tidak ditemukan';
}, $gejala));

$insert_tbl_history_query = "INSERT INTO tbl_history (id_pasien, gejala, hasil_diagnosa, nilai_cf, penanganan) VALUES ('$_SESSION[iduser]', '$gejala_list', '$nama_kerusakan', '$nilai_tertinggi', '$penanganan')";
$insert_tbl_history_result = mysqli_query($koneksi, $insert_tbl_history_query) or die(mysqli_error($koneksi));

# Insert into konsultasi table
$insert_konsultasi_query = "INSERT INTO konsultasi (id_pasien, kerusakan, persentase) VALUES ('$_SESSION[iduser]', '$nama_kerusakan', '$nilai_tertinggi')";
$insert_konsultasi_result = mysqli_query($koneksi, $insert_konsultasi_query) or die(mysqli_error($koneksi));

$qw5 = mysqli_query($koneksi, "SELECT * FROM kerusakan WHERE nama='$nama_kerusakan'");
if (mysqli_num_rows($qw5) > 0) {
    $hw5 = mysqli_fetch_array($qw5);
    $aaa1 = isset($hw5['kode']) ? $hw5['kode'] : 'Data tidak tersedia';
} else {
    $aaa1 = 'Data tidak tersedia';
}
?>
<div style="clear:both;height:20px;"></div>

Gejala-gejala yang anda alami :
<table class="table table-striped table-hover table-bordered">
  <tbody>
    <?php echo $list_gejala; ?>
  </tbody>
</table>
<br/><br/>

<?php if (!empty($forward_chaining)) : ?>
Rule-rule Yang tereksekusi dari proses forward chaining
<table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th style="text-align:center;"><font color="#000000">IF</th>
      <th style="text-align:center;"><font color="#000000">THEN</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($forward_chaining as $fc) {
        $condition_names = array();
        foreach ($fc['conditions'] as $condition) {
            $result = mysqli_query($koneksi, "SELECT nama_gejala FROM gejala WHERE id_gejala='$condition'");
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                $condition_names[] = $row['nama_gejala'];
            }
        }
        echo '<tr>';
        echo '<td style="text-align:left;padding-left:10px;"><font color="#000000">' . implode(' AND ', $condition_names) . '</td>';
        echo '<td style="text-align:left;padding-left:10px;"><font color="#000000">' . $fc['result'] . '</td>';
        echo '</tr>';
    }
    ?>
  </tbody>
</table>
<?php endif; ?>

<br/><br/>
<?php
// Tabel Nilai CF USER dan CF PAKAR
foreach ($forward_chaining as $fc) {
    // Array to hold the names of the symptoms
    $condition_names = [];

    // Fetch the names of the symptoms (gejala) based on the condition IDs
    foreach ($fc['conditions'] as $condition) {
        $result = mysqli_query($koneksi, "SELECT nama_gejala FROM gejala WHERE id_gejala='$condition'");
        $row = mysqli_fetch_assoc($result);
        
        // Add the name of the symptom to the array
        $condition_names[] = isset($row['nama_gejala']) ? $row['nama_gejala'] : 'Gejala tidak ditemukan';
    }

    // Display the rule using the names of the symptoms
    echo "Tabel Nilai Keyakinan";
    echo '<h4>Rule: IF '. implode(' AND ', $condition_names). ' THEN '. $fc['result']. ' (CF Value: '. round($fc['cf_value'] * 100, 2). ')</h4>';
    echo '<table class="table table-striped table-hover table-bordered">';
    echo '<thead>';
    echo '<tr>';
    echo '<th style="text-align:center;"><font color="#000000">NO</th>';
    echo '<th style="text-align:center;"><font color="#000000">KODE GEJALA</th>';
    echo '<th style="text-align:center;"><font color="#000000">NAMA GEJALA</th>';
    echo '<th style="text-align:center;"><font color="#000000">NILAI CF</th>';
    // echo '<th style="text-align:center;"><font color="#000000">NILAI KEYAKINAN PAKAR</th>'; // New Column for CF Pakar
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    $no = 0;
    foreach ($fc['conditions'] as $condition) {
        $no++;
        $result = mysqli_query($koneksi, "SELECT * FROM gejala WHERE id_gejala='$condition'");
        $row = mysqli_fetch_assoc($result);
        
        // Ensure that $md_user[$condition] exists before using it
        $nilai_cf_user = isset($md_user[$condition]) ? konversi_md($md_user[$condition]) : 'Data tidak tersedia';
        
        // Ambil nilai CF PAKAR dari tabel nilaipakar
        $mb_pakar_query = mysqli_query($koneksi, "SELECT mb FROM nilaipakar WHERE id_gejala='$condition' AND id_kerusakan='". $fc['result']. "'");
        if ($mb_pakar_query && mysqli_num_rows($mb_pakar_query) > 0) {
            $mb_pakar_row = mysqli_fetch_assoc($mb_pakar_query);
            $nilai_cf_pakar = $mb_pakar_row['mb'];
        } else {
            $nilai_cf_pakar = 'Data tidak tersedia'; // Set a default message if no data is found
        }
        
        echo '<tr>';
        echo '<td style="text-align:center;"><font color="#000000">'. $no. '</td>';
        echo '<td style="text-align:center;"><font color="#000000">'. (isset($row['kode']) ? $row['kode'] : 'Data tidak tersedia'). '</td>';
        echo '<td style="text-align:center;"><font color="#000000">'. (isset($row['nama_gejala']) ? $row['nama_gejala'] : 'Data tidak tersedia'). '</td>';
        echo '<td style="text-align:center;"><font color="#000000">'. $nilai_cf_user. '</td>'; // Display nilai CF USER (konversi MD)
        // echo '<td style="text-align:center;"><font color="#000000">'. $nilai_cf_pakar. '</td>'; // Display nilai CF Pakar
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}
?>


<br><br>

Hasil Diagnosa
<table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th style="text-align:center;" width="30"><font color="#000000">NO</th>
      <th style="text-align:center;" width="100"><font color="#000000">KODE</th>
      <th style="text-align:center;"><font color="#000000">NAMA MALNUTRISI</th>
      <th style="text-align:center;" width="70"><font color="#000000">CF</th>
      <th style="text-align:center;" width="70"><font color="#000000">RANK</th>
    </tr>
  </thead>
  <tbody>
    <?php echo $daftar; ?>
  </tbody>
</table>

<table class="table table-bordered">
  <tbody>
    <tr>
    <td width="150"><font color="#000000"><strong>Nama Malnutrisi</strong></td>
    <td><font color="#000000"><strong><?php echo strtoupper($nama_kerusakan); ?></strong></font></td>
    </tr>

    <tr>
    <td width="150" valign="top"><font color="#000000"><strong>Penanganan</strong></font></td>
    <td><font color="#000000"><?php
if ($nama_kerusakan !== 'Tidak Terdiagnosa') {
    $qw = mysqli_query($koneksi, "SELECT rule_penanganan.*,kerusakan.* FROM rule_penanganan, kerusakan WHERE kerusakan.nama='$nama_kerusakan' AND rule_penanganan.kode_kerusakan=kerusakan.kode");
    while ($hw = mysqli_fetch_array($qw)) {
        $penanganan = $hw['kode_penanganan'];
        $rr = mysqli_query($koneksi, "SELECT * FROM penanganan WHERE kode='$penanganan'");
        $dd = mysqli_fetch_array($rr);
        echo "$dd[penanganan] <br>";
    }
} else {
    echo "Tidak ada penanganan yang diperlukan.";
}
?></td>
    </tr>
  </tbody>
</table>

<center>
<a href="cetak_hasil.php?id=<?php echo $_SESSION['iduser']; ?>" target="_blank" class="btn" style="background-color: #00D9A5;color: white;">Cetak</a>
</center>
</div>
