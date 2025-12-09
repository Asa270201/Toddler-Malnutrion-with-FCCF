	<div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">DATA PENANGANAN</h4>
                </div>                
            </div>
            <div class="col-md-8 col-md-offset-2">

            	<button type="button" onclick=window.location.href='?page=tambahpenanganan' class='btn' style="float:right;background-color: #00D9A5;color: white;">Tambah Data</button><br><br>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Kode Penanganan</th>
                                <th>Penanganan</th>
                                <th width="19%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php
							include "koneksi.php";
							$sql= mysqli_query($koneksi, "SELECT * FROM penanganan");
							$no=1;
							while($row = mysqli_fetch_array($sql)){
							?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row['kode']; ?></td>
                                <td><?php echo $row['penanganan']; ?></td>
                                <td>
                                <a href="?page=editpenanganan&kode=<?php echo $row['kode'];?>" class='btn' style="background-color: #00D9A5;color: white;">Edit</a> 
					  			<a onclick="return confirm ('Yakin Data ini Dihapus..?')" href="?page=deletepenanganan&id_penanganan=<?php echo $row['id_penanganan'];?>" class='btn btn-warning'>Hapus</a>
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