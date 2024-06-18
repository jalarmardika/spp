<?php
if (isset($_POST['submit'])) {
	include '../koneksi.php';
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Cetak Tagihan</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/cetak.css">
		<link href="../assets/startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css" rel="stylesheet">
	</head>
	<body>
		<?php
		$tahun = $_POST['tahun'];
		$nis = $_POST['nis'];
		$data = mysqli_query($koneksi,"SELECT * FROM bulanan,periode,siswa,kelas,prodi WHERE bulanan.nis=siswa.nis and bulanan.id_periode=periode.id_periode and bulanan.id_kelas=kelas.id_kelas and siswa.id_prodi=prodi.id_prodi and bulanan.nis='$nis' and bulanan.id_periode='$tahun'");
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
			<h3 class="text-center mb-5">Tagihan Siswa</h3>
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
					Tagihan Kelas
				</div>

				<div class="col-md-7">
					:  <?= $array['kelas']; ?>
				</div>
			</div>
			<div class="row no-gutters mb-3">
				<div class="col-md-2">
					Jurusan
				</div>

				<div class="col-md-7">
					:  <?= $array['prodi']; ?>
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
					if (isset($_POST['id_bulanan'])) {
						$id_bulanan= $_POST['id_bulanan'];	 	    
						$count = count($id_bulanan);
						if ($count>0) {
							$no = 1;
							$total = 0;
							for ($i=0; $i < $count; $i++) {
								$id = $id_bulanan[$i];
								$bulanan = mysqli_query($koneksi,"SELECT * FROM bulanan,bulan WHERE bulanan.id_bulan=bulan.id_bulan and id_bulanan='$id'");
								$row = mysqli_fetch_assoc($bulanan);
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
									<td><b>Total Tagihan</b></td>
									<td></td>
									<td class="text-right"><b>Rp.<?php echo number_format($total); ?></b></td>
								</tr>
						<?php } 
					} ?>
					
				</tbody>
			</table>
			<div style="float:right;">
				<?php $tglsekarang = date('d-m-Y'); ?>
				Kendal, <?php echo $tglsekarang; ?> <br>
				Kepala Sekolah, 
				<br><br>
				<img src="../assets/img/ttd.png" alt="" width="100"><br>
				<b class="mb-5"><u>Muhammad S.PD M.PD</u></b>
			</div>
		</div>

		<script type="text/javascript"> 
			window.print();
		</script> 
	</body>
	</html>
	<?php 
} ?>