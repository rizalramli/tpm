<!doctype html>
<html lang="en">
<?php 
session_start();
include "koneksi/koneksi.php";
if (!isset($_SESSION['username_user_karyawan'])) {
    header('location:index.php');
} 
?>

<head>
	<?php 
	include "koneksi/koneksi.php";
	include "partial_template/head.php"; 
	?>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<?php include "partial_template/header_karyawan.php"; ?>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<?php include "partial_template/sidebar_karyawan.php" ?>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<?php 
                if(!isset($_GET['halaman'])) {
                        error_reporting(0);
                    }
                    // if ($_GET['halaman'] == 'dashboard') {
                    //     include "dashboard/dashboard_admin.php";
                    // }
                    // Tutup Dashboard

                    // Parsing halaman Pegawai
                    if ($_GET['halaman'] == 'beranda') {
                        include "data/master/beranda/tampil.php";
					}
					if ($_GET['halaman'] == 'absensi') {
                        include "data/transaksi/absensi_karyawan/tampil.php";
					}
                ?>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<?php include "partial_template/javascript.php"; ?>
</body>

</html>