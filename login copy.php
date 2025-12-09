<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="home/assets/css/maicons.css">
    <link rel="stylesheet" href="home/assets/css/bootstrap.css">
    <link rel="stylesheet" href="home/assets/vendor/owl-carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="home/assets/vendor/animate/animate.css">
    <link rel="stylesheet" href="home/assets/css/theme.css">
</head>
<body>

<header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">Asa</span>-Health</a>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="btn btn-primary ml-lg-3" href="index.php">Back to Home</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="login.php">Login / Register</a>
            </li>
          </ul>
        </div>  <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>

<div class="content-wrapper mb-3 mt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">REGISTER/LOGIN</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>REGISTRASI</b>
                    </div>
                    <div class="panel-body">
                        <form method="post">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required />
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required />
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jk" class="form-control" required>                
                                    <option value="" selected disabled>Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Usia</label>
                                <input type="number" class="form-control" id="usia" name="usia" placeholder="Usia" required />
                            </div>
                            <div class="form-group">
                                <label>No. HP</label>
                                <input type="text" class="form-control" id="hp" name="hp" placeholder="No. HP" required />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required />
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" rows="5" name="alamat" placeholder="Alamat" required></textarea>
                            </div>
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <button type="submit" value="daftar" name="daftar" class="btn btn-primary">Register</button>
                        </form>
                        <?php
                        if(isset($_POST['daftar'])){
                            include "koneksi.php";
                            $username = $_POST['username'];
                            $pass = $_POST['pass'];
                            $nama = $_POST['nama'];
                            $jk = $_POST['jk'];
                            $usia = $_POST['usia'];
                            $hp = $_POST['hp'];
                            $email = $_POST['email'];
                            $alamat = $_POST['alamat'];

                            $sql = "INSERT INTO pasien (username, pass, nama, jk, usia, hp, email, alamat) 
                                    VALUES ('$username', '$pass', '$nama', '$jk', '$usia', '$hp', '$email', '$alamat')";
                            if(mysqli_query($koneksi, $sql)){
                                echo "Registrasi berhasil!";
                            } else {
                                echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
                            }
                            mysqli_close($koneksi);
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>LOGIN</b>
                    </div>
                    <div class="panel-body">
                        <p>*Apabila Belum Memilik Username Dan Password Silahkan Registrasi</p>
                        <form method="post" action="aksi_login.php">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
                            </div>
                            <button type="submit" value="login" name="login" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="page-footer">
    <div class="container">
      <div class="row px-md-3">
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Company</h5>
          <ul class="footer-menu">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Career</a></li>
            <li><a href="#">Editorial Team</a></li>
            <li><a href="#">Protection</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>More</h5>
          <ul class="footer-menu">
            <li><a href="#">Terms & Condition</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Advertise</a></li>
            <li><a href="#">Join as Doctors</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Our partner</h5>
          <ul class="footer-menu">
            <li><a href="#">One-Fitness</a></li>
            <li><a href="#">One-Drugs</a></li>
            <li><a href="#">One-Live</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Contact</h5>
          <p class="footer-link mt-2">351 Willow Street Franklin, MA 02038</p>
          <a href="#" class="footer-link">701-573-7582</a>
          <a href="#" class="footer-link">healthcare@temporary.net</a>

          <h5 class="mt-3">Social Media</h5>
          <div class="footer-sosmed mt-3">
            <a href="#" target="_blank"><span class="mai-logo-facebook-f"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-twitter"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-google-plus-g"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-instagram"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-linkedin"></span></a>
          </div>
        </div>
      </div>

      <hr>
    </div>
  </footer>

<script src="home/assets/js/jquery-3.5.1.min.js"></script>
<script src="home/assets/js/bootstrap.bundle.min.js"></script>
<script src="home/assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>
<script src="home/assets/vendor/wow/wow.min.js"></script>
<script src="home/assets/js/theme.js"></script>
</body>
</html>
