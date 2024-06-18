<?php
if (isset($_GET['id'])) {
	include '../koneksi.php';

	$id = $_GET['id'];
	$hapus = mysqli_query($koneksi,"DELETE FROM prodi WHERE id_prodi='$id'");
	if ($hapus) {
		header("location:jurusan.php?pesan=hapus");
	}else{
		header("location:jurusan.php?pesan=dilarangHapus");
	}
}
?>