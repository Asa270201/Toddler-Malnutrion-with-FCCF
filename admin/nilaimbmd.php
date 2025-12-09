	<div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">DATA PENGETAHUAN</h4>
                </div> 
            </div>
            <div class="col-md-8 col-md-offset-2">

            	<button type="button" onclick=window.location.href='?page=tambahnilaimbmd' class='btn' style="float:right;background-color: #00D9A5;color: white;">Tambah Nilai MB</button><br><br>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Kerusakan</th>
                                <th>Gejala</th>
                                <th>MB</th>
                                <th width="19%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php
                            include "koneksi.php";
                            $sql= mysqli_query($koneksi, "SELECT * FROM nilaipakar np,kerusakan k,gejala g where np.id_kerusakan=k.id_kerusakan and np.id_gejala=g.id_gejala");
                            $no=1;
                            while($row = mysqli_fetch_array($sql)){
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row['nama']; ?></td>
                                <td><?php echo $row['nama_gejala']; ?></td>
                                <td><?php echo $row['mb']; ?></td>
                                <td>
                                <a href="?page=editnilaimbmd&id_nilai=<?php echo $row['id_nilai'];?>" class='btn' style="background-color: #00D9A5;color: white;">Edit</a>
					  			<a onclick="return confirm ('Yakin Data ini Dihapus..?')" href="?page=deletenilaimbmd&id_nilai=<?php echo $row['id_nilai'];?>" class='btn btn-warning'>Hapus</a>
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