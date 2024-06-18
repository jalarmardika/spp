<?php
if (isset($_POST['submit'])) {
	include '../koneksi.php';

	$id = $_POST['id'];
	$jurusan = $_POST['jurusan'];
	mysqli_query($koneksi,"UPDATE prodi SET prodi='$jurusan' WHERE id_prodi='$id'");

	header("location:jurusan.php?pesan=edit");
}
?>