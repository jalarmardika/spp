<?php
if (isset($_POST['submit'])) {
	if (isset($_POST['nis'])) {
		include '../koneksi.php';
		foreach ($_POST['nis'] as $nis) {
			mysqli_query($koneksi,"UPDATE siswa SET id_kelas=NULL,lulus='1' WHERE nis='$nis'");
		}
		header("location:kelulusan.php?pesan=berhasil");
	}else {
		header("location:kelulusan.php?pesan=gagal");
	}
}
?>