<?php
include "koneksi.php";
mysqli_query($koneksi, "DELETE FROM penanganan where id_penanganan='$_GET[id_penanganan]'");
echo "<script type='text/javascript'>
alert('Data berhasil dihapus..!');
</script>";
echo "<script>document.location='home.php?page=penanganan';</script>";
?>