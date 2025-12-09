<?php
include "koneksi.php";
mysqli_query($koneksi, "DELETE FROM rule_penanganan where id_rule='$_GET[id_rule]'");
echo "<script type='text/javascript'>
alert('Data berhasil dihapus..!');
</script>";
echo "<script>document.location='home.php?page=rulepenanganan';</script>";
?>