<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">DATA LAPORAN PASIEN</h4>
            </div>                
        </div>
        <div class="col-md-12">
            <div class="text-right mb-3">
                <button style="background-color: #00D9A5;color: white;" class="btn" onclick="printTable()">Cetak Tabel</button>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Username</th>
                            <th>Nama Lengkap</th>  
                            <th width="11%">Jenis Kelamin</th>
                            <th width="10%">Usia</th>
                            <th>Hasil Diagnosa</th>
                            <th width="10%">Presentase</th>
                            <th width="10%">Cetak</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "koneksi.php";
                        $sql = mysqli_query($koneksi, "SELECT * FROM pasien");
                        $no = 1;
                        while ($row = mysqli_fetch_array($sql)) {
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['jk']; ?></td>
                            <td><?php echo $row['usia']; ?></td>
                            <td>
                                <?php
                                $konsul_sql = mysqli_query($koneksi, "SELECT * FROM konsultasi WHERE id_pasien='" . $row['id_pasien'] . "'");
                                $konsul = mysqli_fetch_array($konsul_sql);
                                if ($konsul) {
                                    echo $konsul['kerusakan'];
                                } else {
                                    echo "Belum ada diagnosa";
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($konsul) {
                                    echo $konsul['persentase'] . "%";
                                } else {
                                    echo "-";
                                }
                                ?>
                            </td>
                            <td>
                                <?php if ($konsul) { ?>
                                    <a href="admin/print_history.php?id=<?php echo $row['id_pasien']; ?>" class="btn btn-primary" target="_blank">Cetak</a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php
                        $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function printTable() {
        window.print();
    }
</script>
