<?php
if (isset($_POST['submit'])) {
	if (isset($_POST['nis'])) {
		include '../koneksi.php';
		$id_kelas = $_POST['kelas'];
		foreach ($_POST['nis'] as $nis) {
			mysqli_query($koneksi,"UPDATE siswa SET id_kelas='$id_kelas' WHERE nis='$nis'");
		}
		header("location:kenaikan_kelas.php?pesan=berhasil");
	}else {
		header("location:kenaikan_kelas.php?pesan=gagal");
	}
}
?>