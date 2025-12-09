<?php
include('koneksi.php');

if(isset($_POST['daftar'])){
    $username = $_POST['username'];
    $password = $_POST['pass'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $usia = $_POST['usia'];
    $hp = $_POST['hp'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO pasien (username, pass, nama, jk, usia, hp, email, alamat) 
            VALUES ('$username', '$password', '$nama', '$jk', '$usia', '$hp', '$email', '$alamat')";
    
    if(mysqli_query($koneksi, $sql)){
        // Jika registrasi berhasil, buat sesi pengguna
        session_start();
        $_SESSION['role'] = 'user';
        $_SESSION['nama'] = $nama;
        $_SESSION['iduser'] = mysqli_insert_id($koneksi);
        $_SESSION["useruser"] = $username;
        $_SESSION["passuser"] = $password;
        // Alihkan ke halaman diagnosa
        echo "<meta http-equiv='Refresh' Content='1; URL=home.php?page=diagnosa'>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
}
?>
