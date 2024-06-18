<?php
if (isset($_POST['submit'])) {
	include '../koneksi.php';

	$id = $_POST['id'];
	$username = $_POST['username'];
	$level = $_POST['level'];
	$telp = $_POST['telp'];
	if ($_POST['pass'] != '') {
		$pass = md5($_POST['pass']);
		mysqli_query($koneksi,"UPDATE petugas SET username='$username',level='$level',telp='$telp',password='$pass' WHERE id='$id'");
	} else {
		mysqli_query($koneksi,"UPDATE petugas SET username='$username',level='$level',telp='$telp' WHERE id='$id'");
	}

	header("location:pengguna.php?pesan=edit");
}
?>