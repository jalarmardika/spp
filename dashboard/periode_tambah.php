<?php
if (isset($_POST['submit'])) {
	include '../koneksi.php';

	$awal = $_POST['awal'];
	$akhir = $_POST['akhir'];
	mysqli_query($koneksi,"INSERT INTO periode VALUES('','$awal','$akhir')");
    header("location:periode.php?pesan=berhasil");
}
?>
