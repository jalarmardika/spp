<?php
if (isset($_POST['submit'])) {
	include '../koneksi.php';

	$id = $_POST['id'];
	$awal = $_POST['awal'];
	$akhir = $_POST['akhir'];
	mysqli_query($koneksi,"UPDATE periode SET awal='$awal',akhir='$akhir' WHERE id_periode='$id'");
	header("location:periode.php?pesan=edit");
}
?>