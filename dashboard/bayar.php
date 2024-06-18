<?php
if (isset($_GET['id']) && isset($_GET['nis']) && isset($_GET['tahun'])) {
	include '../koneksi.php';
	session_start();
	$id_petugas = $_SESSION['id_petugas'];
	$id = $_GET['id'];
	$tgl = date('Y-m-d');
	$nis = $_GET['nis'];
	$tahun = $_GET['tahun'];
	mysqli_query($koneksi,"UPDATE bulanan SET status='Lunas',tgl_bayar='$tgl',id_petugas='$id_petugas' WHERE id_bulanan='$id'");
	header("location:pembayaran.php?nis=$nis&tahun=$tahun");
}
?>