<?php
if (isset($_POST['submit'])) {
	include '../koneksi.php';

	$kls = $_POST['kls'];
	mysqli_query($koneksi,"INSERT INTO kelas VALUES('','$kls')");
	header("location:kelas.php?pesan=berhasil");
}
?>
