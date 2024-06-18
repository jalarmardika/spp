<?php
if (isset($_GET['id'])) {
	include '../koneksi.php';

	$id = $_GET['id'];
	$hapus = mysqli_query($koneksi,"DELETE FROM periode WHERE id_periode='$id'");
	if ($hapus) {
		header("location:periode.php?pesan=hapus");
	}else{
		header("location:periode.php?pesan=dilarangHapus");
	}
}
?>