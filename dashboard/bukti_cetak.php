<?php
if (isset($_POST['submit'])) {
	include '../koneksi.php';
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Cetak Bukti Pembayaran</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/cetak.css">
		<link href="../assets/startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css" rel="stylesheet">
	</head>
	<body>
		<?php
		$tahun = $_POST['tahun'];
		$nis = $_POST['nis'];
		$tgl = $_POST['tgl'];
		$data = mysqli_query($koneksi, "SELECT * FROM bulanan,periode,siswa,kelas,prodi WHERE bulanan.nis=siswa.nis and bulanan.id_periode=periode.id_periode and bulanan.id_kelas=kelas.id_kelas and siswa.id_prodi=prodi.id_prodi and bulanan.nis='$nis' and bulanan.id_periode='$tahun'");
		$array = mysqli_fetch_assoc($data);
		?>
		<div class="container">	
			<table border="0" width="100%">
				<tr>
					<td align="left">
						<img width="110" src="../assets/img/smk.jpg">
					</td>
					<td align="left">
						<b style="font-size:25px;">SMK NU 05 KALIWUNGU SELATAN</b> <br>
						<b align="left" style="font-size:15px;">
							Alamat : Jl. Soponyono No.99 Ds. Kedungsuren Kec. Kaliwungu Selatan Kab. Kendal
							<br>
							Website : www.nu5ela.sch.id - E-mail : nusela@gmail.com - Telp : 089326826245715
						</b>
					</td>
				</tr>
				<tr>
					<td colspan="3" align="center">
						<hr size="0" color="black" style="margin:0px;margin-bottom:1px;">
						<hr size="2" color="black" style="margin:0px;">
					</td>
				</tr>
			</table>
			<br>
			<h3 class="text-center mb-5">Bukti Pembayaran</h3>
			<div class="row no-gutters">
				<div class="col-md-2">
					Tahun Ajaran
				</div>
				<div class="col-md-7">
					:  <b><?= $array['awal']; ?>/<?= $array['akhir']; ?></b>
				</div>
			</div>
			<div class="row no-gutters">
				<div class="col-md-2">
					NIS
				</div>
				<div class="col-md-7">
					:  <?= $array['nis']; ?>
				</div>
			</div>
			<div class="row no-gutters">
				<div class="col-md-2">
					Nama Siswa
				</div>
				<div class="col-md-7">
					:  <?= $array['nama']; ?>
				</div>
			</div>
			<div class="row no-gutters">
				<div class="col-md-2">
					Kelas
				</div>
				<div class="col-md-7">
					:  <?= $array['kelas']; ?>
				</div>
			</div>
			<div class="row no-gutters">
				<div class="col-md-2">
					Jurusan
				</div>
				<div class="col-md-7">
					:  <?= $array['prodi']; ?>
				</div>
			</div>
			<div class="row no-gutters mb-3">
				<div class="col-md-2">
					Tgl Bayar
				</div>
				<div class="col-md-7">
					:  <?= date('d-m-Y', strtotime($tgl)); ?>
				</div>
			</div>

			<table class="table table-bordered table-hover mb-5" width="700" border="0" cellpadding="3" cellspacing="0">
				<thead>
					<tr>
						<th width="1%">No</th>
						<th>Jenis Pembayaran</th>
						<th>Tipe</th>
						<th class="text-right">Jumlah</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					$total = 0;
					$detail = mysqli_query($koneksi,"SELECT * FROM bulanan,bulan WHERE bulan.id_bulan=bulanan.id_bulan and nis='$nis' and status='Lunas' and tgl_bayar='$tgl'");
					while ($row = mysqli_fetch_assoc($detail)) {
						$total += $row['biaya'];	
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td >SPP Bulan <?=$row['bulan']?></td>
							<td >Bulanan</td>
							<td class="text-right">Rp.<?=number_format($row['biaya'])?></td>   
						</tr>
					<?php } ?>
					<tr>
						<td></td>
						<td><b>Total</b></td>
						<td></td>
						<td class="text-right"><b>Rp.<?php echo number_format($total); ?></b></td>
					</tr>
				</tbody>
			</table>
			<div style="float:left;">
				<br>
				Petugas,
				<br><br><br>
				<b class="mb-5">
					<u>
						<?php
						$petugas = mysqli_query($koneksi,"SELECT * FROM bulanan,petugas WHERE petugas.id=bulanan.id_petugas and nis='$nis' and status='Lunas' and tgl_bayar='$tgl'");
						$fetch = mysqli_fetch_assoc($petugas);
						if (mysqli_num_rows($petugas) > 0) {
							echo $fetch['username'];
						} 
						?>
					</u>
				</b>
			</div>
			<div style="float:right;">
				<?php $tglsekarang = date('d-m-Y'); ?>
				Kendal, <?php echo $tglsekarang; ?> <br>
				Siswa, 
				<br><br><br>
				<b class="mb-5"><u><?= $array['nama']; ?></u></b>
			</div>
		</div>

		<script type="text/javascript"> 
			window.print();
		</script> 
	</body>
	</html>
	<?php 
} ?>