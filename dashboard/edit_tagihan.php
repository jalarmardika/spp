<?php
if (isset($_POST['submit'])) {
	include '../koneksi.php';

	$id = $_POST['id'];
	$id_periode = $_POST['id_periode'];
	$nis = $_POST['nis'];
	$nominal = $_POST['nominal'];
	mysqli_query($koneksi,"UPDATE bulanan SET biaya='$nominal' WHERE id_bulanan='$id'");
	mysqli_query($koneksi,"UPDATE bulanan SET status='Lunas' WHERE biaya=0 ");
	header("location:detail_tagihan.php?nis=$nis&id_periode=$id_periode");
}
?>