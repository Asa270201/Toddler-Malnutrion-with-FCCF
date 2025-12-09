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
    <link rel="stylesheet" href="css/style_login.css">
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
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
          </ul>
        </div>  <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>

  <div class="wrapper" style="background-image: url('images/bg-registration-form-1.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="images/registration-form-1.jpg" alt="">
				</div>
				<form method="post" action="aksi_login.php">
					<h3>Login</h3>
					<div class="form-wrapper">
						<input type="text" class="form-control" id="username" name="username" placeholder="Username" required />
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
						<i class="zmdi zmdi-lock"></i>
					</div>
					<button type="submit" value="login" name="login" class="btn btn-primary">Login
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>

    <footer class="page-footer">
    <div class="container">
      <div class="row mt-4">
        <div class="col-md-6">
          <p class="mb-0">© 2024 <a href="https://macodeid.com/" target="_blank">ASA</a>. All rights reserved.</p>
        </div>
        <div class="col-md-6 text-md-right">
          <div class="social-mini-button">
            <a href="#"><span class="mai-logo-facebook-f"></span></a>
            <a href="#"><span class="mai-logo-twitter"></span></a>
            <a href="#"><span class="mai-logo-dribbble"></span></a>
            <a href="#"><span class="mai-logo-instagram"></span></a>
          </div>
        </div>
      </div>
    </div>
  </footer>

<script src="home/assets/js/jquery-3.5.1.min.js"></script>
<script src="home/assets/js/bootstrap.bundle.min.js"></script>
<script src="home/assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>
<script src="home/assets/vendor/wow/wow.min.js"></script>
<script src="home/assets/js/theme.js"></script>
</body>
</html>
