<?php
include "koneksi.php";
mysqli_query($koneksi, "DELETE FROM kerusakan where id_kerusakan='$_GET[id_kerusakan]'");
echo "<script type='text/javascript'>
alert('Data berhasil dihapus..!');
</script>";
echo "<script>document.location='home.php?page=kerusakan';</script>";
?>