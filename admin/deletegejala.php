<?php
include "koneksi.php";
mysqli_query($koneksi, "DELETE FROM gejala where id_gejala='$_GET[id_gejala]'");
echo "<script type='text/javascript'>
alert('Data berhasil dihapus..!');
</script>";
echo "<script>document.location='home.php?page=gejala';</script>";
?>