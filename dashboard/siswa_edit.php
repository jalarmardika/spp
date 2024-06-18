<?php
if (isset($_POST['submit'])) {
	include '../koneksi.php';

	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$jurusan = $_POST['jurusan'];
	$jk = $_POST['jk'];
	$alm = $_POST['alm'];

	if ($_POST['pass'] != '') {
		$pass = md5($_POST['pass']);
		mysqli_query($koneksi,"UPDATE siswa SET jk='$jk',alamat='$alm',nama='$nama',id_kelas='$kelas',id_prodi='$jurusan',password='$pass' WHERE nis='$nis'");
	} else {
		mysqli_query($koneksi,"UPDATE siswa SET jk='$jk',alamat='$alm',nama='$nama',id_kelas='$kelas',id_prodi='$jurusan' WHERE nis='$nis'");
	}

	header("location:siswa.php?pesan=edit");
}
?>
