<?php
include "../koneksi.php";

if (isset($_GET['id'])) {
    $id_pasien = $_GET['id'];

    // Retrieve data from tbl_history
    $query = "SELECT * FROM tbl_history INNER JOIN pasien ON tbl_history.id_pasien = pasien.id_pasien WHERE tbl_history.id_pasien='$id_pasien'";
    $result = mysqli_query($koneksi, $query);
    $history = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (!$history) {
        die("Data not found.");
    }
} else {
    die("Invalid ID.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hasil Konsultasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .table th {
            background-color: #f2f2f2;
            text-align: center;
        }
        .table td {
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hasil Konsultasi Pasien</h2>
        <?php
        foreach ($history as $row) {
            echo "Nama : {$row['nama']}<br><br>";
            echo "Gejala : {$row['gejala']}<br><br>";
            echo "Hasil Diagnosa : {$row['hasil_diagnosa']}<br><br>";
            echo "Tanggal Konsultasi : {$row['tanggal_konsultasi']}<br><br>";
        }
        ?>
    
        <table class="table">
            <thead>
                <tr>
                    <th>Penanganan</th>
                    <th>Nilai CF</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($history as $row) {
                    echo "<tr>";
                    echo "<td>{$row['penanganan']}</td>";
                    echo "<td>{$row['nilai_cf']}%</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <script>
            window.print();
        </script>
    </div>
</body>
</html>
