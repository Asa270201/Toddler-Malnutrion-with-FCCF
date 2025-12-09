
	<div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">DATA RULE Penanganan</h4>
                </div>                
            </div>
            <div class="col-md-8 col-md-offset-2">

            	<button type="button" onclick=window.location.href='?page=tambahrulepenanganan' class='btn' style="float:right;background-color: #00D9A5;color: white;">Tambah Data</button><br><br>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Kode Malnutrisi</th>
                                <th>Kode Penanganan</th>
                                <th width="19%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php
							include "koneksi.php";
							$sql= mysqli_query($koneksi, "SELECT * FROM rule_penanganan");
							$no=1;
							while($row = mysqli_fetch_array($sql)){
							?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row['kode_kerusakan']; ?></td>
                                <td><?php echo $row['kode_penanganan']; ?></td>
                                <td>
                                <a href="?page=editrulepenanganan&id_rule=<?php echo $row['id_rule'];?>" class='btn' style="background-color: #00D9A5;color: white;">Edit</a> 
					  			<a onclick="return confirm ('Yakin Data ini Dihapus..?')" href="?page=deleterulepenanganan&id_rule=<?php echo $row['id_rule'];?>" class='btn btn-warning'>Hapus</a>
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