<?php
if (isset($_POST['submit'])) {
	include '../koneksi.php';

	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$jurusan = $_POST['jurusan'];
	$pass = md5($_POST['pass']);
	$jk = $_POST['jk'];
	$alm = $_POST['alm'];

	$data = mysqli_query($koneksi,"SELECT * FROM siswa WHERE nis='$nis'");
	$cek = mysqli_num_rows($data);
	if ($cek < 1) {
		mysqli_query($koneksi,"INSERT INTO siswa VALUES('$nis','$nama','$pass','$jk','$kelas','$jurusan','$alm','')");
		header("location:siswa.php?pesan=berhasil");
	}else{
		echo '
		<script>
		alert("NIS telah ada sebelumnya !");
		window.location.href="siswa.php"
		</script>
		';
	}
}
?>
