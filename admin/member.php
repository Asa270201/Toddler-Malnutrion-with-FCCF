	<div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">DATA PASIEN</h4>
                </div>                
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Username</th>
                                <th>Nama Lengkap</th>  
                                <th width="11%">Jenis Kelamin</th>
								<th width="10%">Usia</th>
								<th width="10%">NoHP</th>
								<th width="20%">Email</th>
                                <th width="20%">Alamat</th>
                                <th width="5%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php
							include "koneksi.php";
							$sql= mysqli_query($koneksi, "SELECT * FROM pasien");
							$no=1;
							while($row = mysqli_fetch_array($sql)){
							?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['nama']; ?></td>
                                <td><?php echo $row['jk']; ?></td>
								<td><?php echo $row['usia']; ?></td>
                                <td><?php echo $row['hp']; ?></td>
								<td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['alamat']; ?></td>
                                <td>
					  			<a onclick="return confirm ('Yakin Data ini Dihapus..?')" href="?page=deletemember&id_pasien=<?php echo $row['id_pasien'];?>" class='btn btn-warning'>Hapus</a>
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