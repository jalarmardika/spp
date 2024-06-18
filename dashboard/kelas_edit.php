<?php
if (isset($_POST['submit'])) {
	include '../koneksi.php';

	$id = $_POST['id'];
	$kelas = $_POST['kelas'];
	mysqli_query($koneksi,"UPDATE kelas SET kelas='$kelas' WHERE id_kelas='$id'");

	header("location:kelas.php?pesan=edit");
}
?>