<?php
include "koneksi.php";
mysqli_query($koneksi, "DELETE FROM admin where id_admin='$_GET[id_admin]'");
echo "<script type='text/javascript'>
alert('Data berhasil dihapus..!');
</script>";
echo "<script>document.location='home.php?page=admin';</script>";
?>