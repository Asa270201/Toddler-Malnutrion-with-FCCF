<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Sistem Pakar Diagnosa Kerusakan Gigi</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">            
                <a class="navbar-brand" href="index.php">
                    <h3><font color="#ffffff">SISTEM PAKAR DIAGNOSA KERUSAKAN GIGI<br/>FORWARD CHAINING & CERTAINTY FACTOR</font></h3>
                </a>
            </div>

            <div class="left-div">
                <div class="user-settings-wrapper">
                    <img src="assets/img/logo.png">
                </div>
            </div>
        </div>
    </div>
    
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="index.php">BERANDA</a></li>
                            <li><a href="index.php?page=login">REGISTER/LOGIN</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
    <?php
        if (isset($_GET['page'])){
            $page = $_GET['page'];
            if($page == 'login'){
                include('login.php');
            }
                        
        }else{
    ?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <center><h1 style="font-family:Vijaya; font-size: 35pt"><b>SELAMAT DATANG</h1>
                <h2 style="font-family:Vijaya;">Di Sistem Pakar Diagnosa Kerusakan Gigi</h2>
                
            </div><br/>
            <div class="row">
                <div class="col-md-6 col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>INFORMASI</h4>
                        </div>
                        <div class="panel-body">
                            <p><b>Sistem pakar</b> adalah sistem berbasis komputer yang menggunakan pengetahuan, fakta dan teknik penalaran dalam memecahkan masalah yang biasanya hanya dapat dipecahkan oleh seorang pakar dalam bidang tersebut (<i>Muhammad Silmi, 2013</i>).</p>
                            <p><b>Certainty Factor</b> adalah sistem berbasis komputer yang menggunakan pengetahuan, fakta dan teknik penalaran dalam memecahkan masalah yang biasanya hanya dapat dipecahkan oleh seorang pakar dalam bidang tersebut (<i>Muhammad Silmi, 2013</i>).</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>PETUNJUK</h4>
                        </div>
                        <div class="panel-body">
                            <p>Cara Menggunakan Sistem Pakar ini: <br>
                            1. Untuk melakukan konsultasi dengan sistem Anda harus login sebagai Member.(*) <br>
                            &nbsp;&nbsp;&nbsp;
                            *Belum memiliki akun dapat registrasi terlebih dahulu di menu <a href="?page=login"> Registrasi</a> <br>
                            2. Login Member. <br>
                            3. Pilih gejala yang dialami, kemudian klik button diagnosa. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    Copyright ©2020 <i class="fa fa-heart pulse"></i> <b><a href="http://www.mycoding.net" target="_blank">My Coding</a></b>
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
