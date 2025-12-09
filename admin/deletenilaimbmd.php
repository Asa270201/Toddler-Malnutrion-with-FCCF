<?php
include "koneksi.php";
mysqli_query($koneksi, "DELETE FROM nilaipakar where id_nilai='$_GET[id_nilai]'");
echo "<script type='text/javascript'>
alert('Data berhasil dihapus..!');
</script>";
echo "<script>document.location='home.php?page=nilaimbmd';</script>";
?>