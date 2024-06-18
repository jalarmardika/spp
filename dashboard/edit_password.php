<?php
if (isset($_POST['submit'])) {
	include '../koneksi.php';
	session_start();
	$pass_lama = md5($_POST['pass_lama']);
	$pass_baru = md5($_POST['pass_baru']);
	if ($_SESSION['level'] == 'Petugas') {
		$id = $_POST['id'];
		$cari = mysqli_query($koneksi,"SELECT * FROM petugas WHERE password='$pass_lama' and id='$id'");
		if (mysqli_num_rows($cari) > 0) {
			mysqli_query($koneksi,"UPDATE petugas SET password='$pass_baru' WHERE id='$id'");
			header("location:profile.php?pesan=edit");
		} else {
			header("location:profile.php?pesan=gagal");
		}
	}elseif ($_SESSION['level'] == 'Siswa') {
		$nis = $_POST['nis'];
		$cari = mysqli_query($koneksi,"SELECT * FROM siswa WHERE password='$pass_lama' and nis='$nis'");
		if (mysqli_num_rows($cari) > 0) {
			mysqli_query($koneksi,"UPDATE siswa SET password='$pass_baru' WHERE nis='$nis'");
			header("location:profile.php?pesan=edit");
		} else {
			header("location:profile.php?pesan=gagal");
		}
	}
}
?>