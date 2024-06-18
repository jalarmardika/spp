<?php
if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	if (isset($_POST['nis'])) {
		include '../koneksi.php';
		$id_kelas = $_POST['id_kelas']; 	 	    

		foreach ($_POST['nis'] as $nis) {
			$nominal = preg_replace('/\D/', '', $_POST['nominal']);
			$bulan = $_POST['bulan_id'];

			for ($i = 0; $i < 12 ; $i++) { 
				$biaya = $nominal[$i];
				$id_bulan = $bulan[$i];         

				$query = mysqli_query($koneksi,"INSERT INTO bulanan(id_periode,id_kelas,nis,id_bulan,biaya,status) VALUES('$id','$id_kelas','$nis','$id_bulan','$biaya','Belum Bayar') ");
			}
		}
		// jika ada nominal yg nilainya 0, status langsung diubah menjadi lunas
		mysqli_query($koneksi,"UPDATE bulanan SET status='Lunas' WHERE biaya<=0 ");
		header("location:tagihan.php?pesan=berhasil&id=$id");
	}else {
		header("location:tambah_tagihan.php?pesan=tidakAdaSiswa&id=$id");
	}
}
?>