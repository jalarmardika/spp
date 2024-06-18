<?php
if (isset($_POST['submit'])) {
	include'koneksi.php';
	session_start();

	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$petugas = mysqli_query($koneksi,"SELECT * FROM petugas WHERE username='$username' and password='$password' ");
	$jml = mysqli_num_rows($petugas);

	$siswa = mysqli_query($koneksi,"SELECT * FROM siswa WHERE nama='$username' and password='$password'");
	$jumlah = mysqli_num_rows($siswa);
	
	if ($jumlah > 0){
		$data_siswa = mysqli_fetch_assoc($siswa);
		$_SESSION['nis'] = $data_siswa['nis'];
		$_SESSION['nama'] = $data_siswa['nama'];
		$_SESSION['level'] = "Siswa";
		header("location:dashboard/index.php");	
	}elseif ($jml > 0) {
		$data = mysqli_fetch_assoc($petugas);
		if ($data['level'] == 'Admin') {
			$_SESSION['id_petugas'] = $data['id'];
			$_SESSION['username_petugas'] = $data['username'];
			$_SESSION['level'] = $data['level'];
		}elseif ($data['level'] == 'Petugas') {
			$_SESSION['id_petugas'] = $data['id'];
			$_SESSION['username_petugas'] = $data['username'];
			$_SESSION['level'] = $data['level'];
		}
		header("location:dashboard/index.php");	
	}else{
		header("location:index.php?pesan=gagal");
	}
}
?>