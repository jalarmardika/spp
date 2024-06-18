<?php
if (isset($_GET['id'])) {
	include '../koneksi.php';

	$id = $_GET['id'];
	$hapus = mysqli_query($koneksi,"DELETE FROM petugas WHERE id='$id'");
	if ($hapus) {
		header("location:pengguna.php?pesan=hapus");
	}else{
		header("location:pengguna.php?pesan=dilarangHapus");
	}
}
?>