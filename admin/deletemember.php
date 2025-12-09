<?php
include "koneksi.php";
mysqli_query($koneksi, "DELETE FROM pasien where id_pasien='$_GET[id_pasien]'");
echo "<script type='text/javascript'>
alert('Data berhasil dihapus..!');
</script>";
echo "<script>document.location='home.php?page=member';</script>";
?>