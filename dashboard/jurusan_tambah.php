<?php
if (isset($_POST['submit'])) {
	include '../koneksi.php';

	$prodi = $_POST['prodi'];
	mysqli_query($koneksi,"INSERT INTO prodi VALUES('','$prodi')");
	header("location:jurusan.php?pesan=berhasil");
}
?>