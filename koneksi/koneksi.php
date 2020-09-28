<?php

$koneksi = mysqli_connect("localhost", "root", "", "tpm");
if (!$koneksi) {
	echo "koneksi gagal = " . mysqli_connect_error();
}
?>