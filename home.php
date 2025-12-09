<?php
include('koneksi.php');
session_start();
if (empty($_SESSION['role'])){
    "<meta http-equiv='Refresh' Content='1; URL=home.php'>";
}
else{
    $role = $_SESSION['role'];
    $nama_lengkap = $_SESSION['nama'];
?>

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
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="wrapper d-flex align-items-stretch">
			<nav style="background-color: #00D9A5;" id="sidebar">
				<div class="custom-menu">
			<button style="background-color: #00D9A5; color: white;" type="button" id="sidebarCollapse" class="btn">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4 pt-5">
		  		<h1><a href="index.html" class="logo">ASA-Health</a></h1>
	        <ul class="list-unstyled components mb-5">
            <?php
                            if($role == 'admin'){
                            ?>
                                <li><a href="home.php?page=kerusakan">Malnutrisi</a></li>
                                <li><a href="home.php?page=gejala">Gejala</a></li>
                                <li><a href="home.php?page=penanganan">Penanganan</a></li>
                                <li><a href="home.php?page=rulepenanganan">Aturan</a></li>
                                <li><a href="home.php?page=nilaimbmd">Pengetahuan</a></li>
                                <li><a href="home.php?page=member">Pasien</a></li>
                                <li><a href="home.php?page=hasil_konsultasi">Hasil Konsultasi</a></li>
                                <li><a href="home.php?page=admin">Admin</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            <?php
                            }
                            else if ($role == 'user'){
                            ?>
                                <li><a href="home.php?page=diagnosa">Konsultasi</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            <?php
                            }
                            ?>
	        </ul>
	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
      <div class="content-wrapper ">
        <div class="container">
            <div class="row">
                <h1 style="font-family:Vijaya; font-size: 35pt"><b>SELAMAT DATANG <?php echo strtoupper($nama_lengkap);?></h1>
                
            </div><br/>
        </div>
        <?php
        if (isset($_GET['page'])){
            $page = $_GET['page'];
            if($page == 'home'){
                include('home.php');
            }
            else if ($page == 'kerusakan'){
                include('admin/kerusakan.php');
            }
            else if ($page == 'tambahkerusakan'){
                include('admin/tambahkerusakan.php');
            }
            else if ($page == 'editkerusakan'){
                include('admin/editkerusakan.php');
            }
            else if ($page == 'deletekerusakan'){
                include('admin/deletekerusakan.php');
            }
            else if ($page == 'gejala'){
                include('admin/gejala.php');
            }
            else if ($page == 'tambahgejala'){
                include('admin/tambahgejala.php');
            }
            else if ($page == 'editgejala'){
                include('admin/editgejala.php');
            }
            else if ($page == 'deletegejala'){
                include('admin/deletegejala.php');
            }
            else if ($page == 'penanganan'){
                include('admin/penanganan.php');
            }
            else if ($page == 'tambahpenanganan'){
                include('admin/tambahpenanganan.php');
            }
            else if ($page == 'editpenanganan'){
                include('admin/editpenanganan.php');
            }
            else if ($page == 'deletepenanganan'){
                include('admin/deletepenanganan.php');
            }
            else if ($page == 'rulepenanganan'){
                include('admin/rulepenanganan.php');
            }
            else if ($page == 'tambahrulepenanganan'){
                include('admin/tambahrulepenanganan.php');
            }
            else if ($page == 'editrulepenanganan'){
                include('admin/editrulepenanganan.php');
            }
            else if ($page == 'deleterulepenanganan'){
                include('admin/deleterulepenanganan.php');
            }
            else if ($page == 'nilaimbmd'){
                include('admin/nilaimbmd.php');
            }
            else if ($page == 'tambahnilaimbmd'){
                include('admin/tambahnilaimbmd.php');
            }
            else if ($page == 'editnilaimbmd'){
                include('admin/editnilaimbmd.php');
            }
            else if ($page == 'deletenilaimbmd'){
                include('admin/deletenilaimbmd.php');
            }
            else if ($page == 'member'){
                include('admin/member.php');
            }
            else if ($page == 'hasil_konsultasi'){
                include('admin/hasil_konsultasi.php');
            }
            else if ($page == 'deletemember'){
                include('admin/deletemember.php');
            }
            else if ($page == 'admin'){
                include('admin/admin.php');
            }
            else if ($page == 'tambahadmin'){
                include('admin/tambahadmin.php');
            }
            else if ($page == 'deleteadmin'){
                include('admin/deleteadmin.php');
            }
    
        else if ($page == 'diagnosa'){
                include('diagnosa.php');
            }
        else if ($page == 'konsultasi'){
            include('konsultasi.php');
        }
        else if ($page == 'komentar'){
                include('komentar.php');
            }
        }
        else{
        ?>
    <?php
        }
    ?>
    </div>
    </div>
</div>

    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<?php
}
?>