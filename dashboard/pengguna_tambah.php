<?php
if (isset($_POST['submit'])) {
	include '../koneksi.php';

	$username = $_POST['username'];
	$pass = md5($_POST['pass']);
	$level = $_POST['level'];
	$telp = $_POST['telp'];
	mysqli_query($koneksi,"INSERT INTO petugas VALUES('','$username','$pass','$telp','$level')");
	header("location:pengguna.php?pesan=berhasil");
}
?>
