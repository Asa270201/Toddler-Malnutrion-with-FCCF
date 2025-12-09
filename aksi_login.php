<?php
include('koneksi.php');
if(isset($_POST['login'])){
    $username = $_POST['username'];
	$password = $_POST['password'];
	$sqladm = mysqli_query($koneksi, "select * from admin where username='$username' and pass='$password'");
	$hitung_admin = mysqli_num_rows($sqladm);
	if($hitung_admin > 0){
		$radm = mysqli_fetch_array ($sqladm);
		session_start();
		$_SESSION['role'] = 'admin';
		$_SESSION['nama'] = $radm["nama"];
		$_SESSION["useradm"]= $radm["username"];
		$_SESSION["passadm"]= $radm["pass"];
		echo "<meta http-equiv='Refresh' Content='1; URL=home.php?page=kerusakan'>";
	}
	else if ($hitung_admin == 0){
		$sqluser = mysqli_query($koneksi,"select * from pasien where username='$username' and pass='$password'");
		$hitung_user = mysqli_num_rows($sqluser);
		if($hitung_user > 0){
			$ruser = mysqli_fetch_array ($sqluser);
			session_start();
			$_SESSION['role'] = 'user';
			$_SESSION['nama'] = $ruser["nama"];
			$_SESSION['iduser'] = $ruser["id_pasien"];
			$_SESSION["useruser"]= $ruser["username"];
			$_SESSION["passuser"]= $ruser["pass"];
			echo "<meta http-equiv='Refresh' Content='2; URL=home.php?page=diagnosa'>";
			
		}
		else if($hitung_user == 0){
			echo "<meta http-equiv='Refresh' Content='1; URL=index.php?page=login'>";
		}
	}
}
?>
 