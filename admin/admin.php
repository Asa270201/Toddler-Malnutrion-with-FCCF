	<div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">DATA ADMIN</h4>
                </div>                
            </div>
            <div class="col-md-8 col-md-offset-2">

                <button type="button" onclick=window.location.href='?page=tambahadmin' class='btn' style="float:right;background-color: #00D9A5;color: white;">Tambah Data Admin</button><br><br>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Username</th>
                                <th>Nama Lengkap</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php
							include "koneksi.php";
							$sql= mysqli_query($koneksi, "SELECT * FROM admin");
							$no=1;
							while($row = mysqli_fetch_array($sql)){
							?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['nama']; ?></td>
                                <td>
					  			<a onclick="return confirm ('Yakin Data ini Dihapus..?')" href="?page=deleteadmin&id_admin=<?php echo $row['id_admin'];?>" class='btn btn-warning'>Hapus</a>
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