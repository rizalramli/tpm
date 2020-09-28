<!doctype html>
<html lang="en">
<?php 
session_start();
include "koneksi/koneksi.php";
if (!isset($_SESSION['username_user'])) {
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
		<?php include "partial_template/header.php"; ?>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<?php include "partial_template/sidebar.php" ?>
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
                    if ($_GET['halaman'] == 'karyawan') {
                        include "data/master/karyawan/tampil.php";
					}
					if ($_GET['halaman'] == 'kriteria') {
                        include "data/master/kriteria/tampil.php";
					}
					if ($_GET['halaman'] == 'user') {
                        include "data/master/user/tampil.php";
					}
					if ($_GET['halaman'] == 'total_penjualan') {
                        include "data/transaksi/total_penjualan/tampil.php";
					}
					if ($_GET['halaman'] == 'absensi') {
                        include "data/transaksi/absensi/tampil.php";
					}
					if ($_GET['halaman'] == 'perhitungan_topsis') {
                        include "data/transaksi/perhitungan_topsis/tampil.php";
					}
					if ($_GET['halaman'] == 'perangkingan') {
                        include "data/transaksi/perangkingan/tampil.php";
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