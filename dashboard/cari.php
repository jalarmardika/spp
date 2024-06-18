<?php
include '../koneksi.php';

$kelas = $_POST['kelas'];
$id_periode = $_POST['id_periode'];
$response = array();
$query = mysqli_query($koneksi,"SELECT * FROM siswa WHERE id_kelas='$kelas'");
$jumlah = mysqli_num_rows($query);
if ($jumlah > 0) {
	while ($b = mysqli_fetch_assoc($query)) {
		$nis = $b['nis'];
		$cari = mysqli_query($koneksi,"SELECT * FROM bulanan,siswa WHERE id_periode='$id_periode' and bulanan.nis=siswa.nis and bulanan.nis='$nis'");
		$jml = mysqli_num_rows($cari);
		// cek apakah siswa sudah mendapat tagihan pada periode ini
		if ($jml < 1) {
			// jika belum
			$val['nis'] = $b['nis'];
			$val['nama'] = $b['nama'];
			array_push($response, $val);
		}
	}
}
echo json_encode($response);
?>