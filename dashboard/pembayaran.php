<?php include 'header.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h2>Pembayaran</h2>
	</div>
	<!-- Content Row -->
	<div class="row">
		<div class="col-md-12">
			<div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Pencarian</h6>
                </div>
                <div class="card-body">
                    <form action="" method="get" class="form-horizontal">
                    	<div class="row">
                    		<div class="col-md-5">
                    			<div class="form-group">
                    				<div class="row">
                    					<label class="col-sm-4 control-label"><b>Tahun Ajaran :</b></label>
                    					<div class="col-sm-8">
                    						<select name="tahun" class="form-control" required="required" style="border-radius: 0%;"> 
                    							<option value=""> - Pilih - </option> 
                    							<?php 
                    							$priode = mysqli_query($koneksi,"SELECT * FROM periode ORDER BY id_periode DESC"); 
                    							while($thn = mysqli_fetch_assoc($priode)){ 
                    								?> 
                    								<option value="<?php echo $thn['id_periode']; ?>"><?php echo $thn['awal']; ?>/<?php echo $thn['akhir']; ?></option> 
                    								<?php 
                    							} 
                    							?> 
                    						</select> 	
                    					</div>
                    				</div>  
                    			</div>
                    		</div>
                    		<?php 
                    		if ($_SESSION['level'] != 'Siswa') {
                    		?>
                    		<div class="col-md-5">
                    			<div class="form-group">
                    				<div class="row">
                    					<label class="col-sm-4 control-label"><b>NIS :</b></label>
                    					<div class="col-sm-8">
                    						<div class="d-flex">
	                							<button type="button" class="btn text-dark" data-toggle="modal" data-target="#modalSiswa" style="background-color: #cccccc; border-radius: 0%;">Pilih</button>
	                							<input type="number" name="nis" class="form-control" required="required" autocomplete="off" style="border-radius: 0%;">
                    						</div>
                    					</div>
                    				</div> 
                    			</div> 
                    		</div>
                    		<?php }else{ ?>
                    		<input type="hidden" name="nis" value="<?php echo $_SESSION['nis']; ?>">
                    		<?php } ?>
                    		<div class="col-md-2">
                    			<button type="submit" name="submit" value="submit" class="btn btn-success btn-md"><i class="fa fa-search"></i> Tampilkan</button>
                    		</div>
                    	</div>
                    </form>
                </div>
            </div>
		</div>

		<?php
		if (isset($_GET['tahun']) && isset($_GET['nis'])) {
			$tahun = $_GET['tahun'];
			$nis = $_GET['nis'];	

			$data_siswa = mysqli_query($koneksi,"SELECT * FROM siswa WHERE nis='$nis' ");
			$array_siswa = mysqli_fetch_assoc($data_siswa);
			if ($array_siswa['lulus'] == '0') {
				$id_kelas = $array_siswa['id_kelas'];
				$data_kelas = mysqli_query($koneksi,"SELECT * FROM kelas WHERE id_kelas='$id_kelas' ");
				$array_kelas = mysqli_fetch_assoc($data_kelas);

				$kelas = $array_kelas['kelas'];
			}else{
				$kelas = 'Sudah Lulus';
			}

			$data = mysqli_query($koneksi,"SELECT * FROM bulanan,kelas,periode WHERE bulanan.id_kelas=kelas.id_kelas and bulanan.id_periode=periode.id_periode and bulanan.nis='$nis' and bulanan.id_periode='$tahun' ");
			$array = mysqli_fetch_assoc($data);

			if (mysqli_num_rows($data) > 0) {
				
				?>
				<div class="col-md-12">
					<div class="card shadow mb-4">
			            <!-- Card Header - Accordion -->
			            <a href="#collapseCardInfo" class="d-block card-header py-3" data-toggle="collapse"
			                role="button" aria-expanded="true" aria-controls="collapseCardInfo">
			                <h6 class="m-0 font-weight-bold text-success">Informasi</h6>
			            </a>
			            <!-- Card Content - Collapse -->
			            <div class="collapse show" id="collapseCardInfo">
			                <div class="card-body">
			                    <div class="d-flex justify-content-end">
    								<a  href="#" data-toggle="modal" data-target="#modal-bukti" class="btn btn-primary btn-sm mb-3 mr-2"><i class="fa fa-print"></i> Cetak Bukti Pembayaran</a>
    								<a data-toggle="modal" data-target="#modal-tagihan" class="btn btn-danger text-white btn-sm mb-3"><i class="fa fa-print"></i> Cetak Tagihan</a>
    							</div>
    							<table class="table table-striped table-responsive-md table-hover">
    								<tbody>
    									<tr>
    										<td>Tahun Ajaran</td>
    										<td>:</td>
    										<td><b><?php echo $array['awal']; ?>/<?php echo $array['akhir']; ?></b></td>
    										<td>Total Tagihan</td>
    										<td>:</td>
    										<td>
    											<?php 
    											$total_tagihan = 0;
    											$tagihan = mysqli_query($koneksi,"SELECT * FROM bulanan,bulan WHERE bulan.id_bulan=bulanan.id_bulan and id_periode='$tahun' and nis='$nis'");
    											while ($array_tagihan = mysqli_fetch_assoc($tagihan)) {
    												$total_tagihan += $array_tagihan['biaya'];
    											}
    											?>
    											<b>Rp.<?php echo number_format($total_tagihan); ?></b>
    										</td>
    									</tr>
    									<tr>
    										<td>Tagihan Kelas</td>
    										<td>:</td>
    										<td><?php echo $array['kelas']; ?></td>
    										<td>Dibayar</td>
    										<td>:</td>
    										<td>
    											<?php 
    											$total_dibayar = 0;
    											$dibayar = mysqli_query($koneksi,"SELECT * FROM bulanan,bulan WHERE bulan.id_bulan=bulanan.id_bulan and id_periode='$tahun' and nis='$nis' and status='Lunas'");
    											while ($array_dibayar = mysqli_fetch_assoc($dibayar)) {
    												$total_dibayar += $array_dibayar['biaya'];
    											}
    											?>
    											<b>Rp.<?php echo number_format($total_dibayar); ?></b>
    										</td>
    									</tr>
    									<tr>
    										<td>NIS</td>
    										<td>:</td>
    										<td><?php echo $array_siswa['nis']; ?></td>
    										<td>Sisa Tagihan</td>
    										<td>:</td>
    										<td>
    											<?php 
    											$total_sisa = 0;
    											$sisa = mysqli_query($koneksi,"SELECT * FROM bulanan,bulan WHERE bulan.id_bulan=bulanan.id_bulan and id_periode='$tahun' and nis='$nis' and status='Belum Bayar'");
    											while ($array_sisa = mysqli_fetch_assoc($sisa)) {
    												$total_sisa += $array_sisa['biaya'];
    											}
    											?>
    											<b>Rp.<?php echo number_format($total_sisa); ?></b>
    										</td>
    									</tr>
    									<tr>
    										<td>Nama Siswa</td>
    										<td>:</td>
    										<td><?php echo $array_siswa['nama']; ?></td>
    										<td></td>
    										<td></td>
    										<td></td>
    									</tr>
    									<tr>
    										<td>Kelas Saat Ini</td>
    										<td>:</td>
    										<td><?php echo $kelas; ?></td>
    										<td></td>
    										<td></td>
    										<td></td>
    									</tr>
    								</tbody>
    							</table>
			                </div>
			            </div>
			        </div>
				</div>
				
				<div class="col-md-12">
					<div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardTagihan" class="d-block card-header py-3" data-toggle="collapse"
                            role="button" aria-expanded="true" aria-controls="collapseCardTagihan">
                            <h6 class="m-0 font-weight-bold text-success">Tagihan</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapseCardTagihan">
                            <div class="card-body">
                                <table class="table table-striped table-responsive table-hover">
								<thead>
									<th width="1%">No</th>
									<th>Jenis Pembayaran</th>
									<th>Biaya</th>
									<th class="text-center">Tanggal Bayar</th>
									<th>Status</th>
									<th>Opsi</th>
								</thead>
								<tbody>
									<?php
									$bulanan = mysqli_query($koneksi,"SELECT * FROM bulanan,bulan WHERE bulan.id_bulan=bulanan.id_bulan and id_periode='$tahun' and nis='$nis'");
									$no = 1;
									while ($d = mysqli_fetch_assoc($bulanan)) {
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td>SPP Bulan <?php echo $d['bulan'];?></td>
											<td>Rp.<?php echo number_format($d['biaya']);?></td>
											<td class="text-center">
												<?php
												if ($d['tgl_bayar'] != '0000-00-00') {
													echo date('d-m-Y', strtotime($d['tgl_bayar']));
												}else{
													echo "-";
												}
												?>
											</td>
											<td><?php echo $d['status']; ?></td>
											<td>
												<?php
												if ($_SESSION['level'] != 'Siswa'){
													if ($d['status']=="Belum Bayar") {
														?>
														<a onclick="return confirm('Apakah Anda ingin Membayar Tagihan Ini ?')" class="btn btn-warning btn-sm text-white" href="bayar.php?id=<?php echo $d['id_bulanan']; ?>&nis=<?php echo $nis; ?>&tahun=<?php echo $tahun; ?>"><i class="fa fa-money-bill"></i> Bayar</a>
													<?php 
													}
												} 
												?>
												</td>
											</tr>
										<?php } ?>	
									</tbody>
								</table>
                            </div>
                        </div>
                    </div>
				</div>

				<?php } else { ?>
					<div class="col-md-12">
						<div class="card shadow mb-4">
	                        <!-- Card Header - Accordion -->
	                        <a href="#collapseCardTagihan" class="d-block card-header py-3" data-toggle="collapse"
	                            role="button" aria-expanded="true" aria-controls="collapseCardTagihan">
	                            <h6 class="m-0 font-weight-bold text-success">Informasi</h6>
	                        </a>
	                        <!-- Card Content - Collapse -->
	                        <div class="collapse show" id="collapseCardTagihan">
	                            <div class="card-body">
	                            	<b>Data Tidak Ditemukan</b>
	                            </div>
	                        </div>
	                    </div>
					</div>
				<?php } ?>

				<div class="modal" tabindex="-1" id="modal-bukti">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Cetak Bukti Pembayaran</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
								<form method="post" action="bukti_cetak.php" target="_blank">
									<input type="hidden" name="nis" value="<?php echo $nis; ?>">
									<input type="hidden" name="tahun" value="<?php echo $tahun; ?>">
									<div class="form-group">
										<label>Tanggal Bayar</label>
										<input type="date" name="tgl" class="form-control" required="required" max="<?php echo date('Y-m-d'); ?>">
									</div>							
									<input type="submit" name="submit" class="btn btn-primary btn-sm float-right" value="Cetak">							
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="modal" tabindex="-1" id="modal-tagihan">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Cetak Tagihan</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
								<form method="post" action="cetak_tagihan_siswa.php" target="_blank">
									<input type="hidden" name="nis" value="<?php echo $nis; ?>">
									<input type="hidden" name="tahun" value="<?php echo $tahun; ?>">
									<?php 
									$bulanan = mysqli_query($koneksi,"SELECT * FROM bulanan,bulan WHERE bulan.id_bulan=bulanan.id_bulan and nis='$nis' and id_periode='$tahun' and status='Belum Bayar'");
									if (mysqli_num_rows($bulanan) > 0) {	
									?>
									<div class="form-group">
										<button type="button" class="btn btn-sm btn-success" id="select" onclick="selectAll()">Pilih Semua</button> <button type="button" id="unselect" onclick="unSelectAll()" class="btn btn-sm btn-danger">Tidak Pilih Semua</button> <br><br>
										<label><b>Tagihan SPP</b></label><br>
										<?php
										$total = 0;
										while ($array_bulanan = mysqli_fetch_assoc($bulanan)) {
											$total += $array_bulanan['biaya'];
											?>
											<label><input type="checkbox" class="siswa" name="id_bulanan[]" value="<?php echo $array_bulanan['id_bulanan']; ?>" > Bulan <?php echo $array_bulanan['bulan'] ?></label><br>
											<?php 
										} 
										?>
									</div>
									<button type="submit" name="submit" class="btn btn-primary btn-sm float-right"><i class="fa fa-print"></i> Cetak</button>
									<?php
									} else{ ?>
										<label>Tidak Ada Tagihan</label>
									<?php } ?>
								</form>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
	<!-- End of Content -->

	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

</div><!-- End Main Content -->
</div><!-- End Content Wrapper -->

<div class="modal" tabindex="-1" id="modalSiswa">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Pilih Siswa</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<table id="dataTable" class="table table-bordered table-striped table-hover table-responsive-md">
					<thead>
						<tr>
							<th width="1%">No</th>
							<th>NIS</th>
							<th>Nama Siswa</th>
							<th>Jenis Kelamin</th>
							<th>Jurusan</th>
							<th>Alamat</th>
							<th>Lulus</th>
							<th>#</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						$data_siswa = mysqli_query($koneksi,"SELECT * FROM siswa JOIN prodi ON siswa.id_prodi=prodi.id_prodi ORDER BY nis ASC");
						while ($fetch = mysqli_fetch_assoc($data_siswa)) {
							?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $fetch['nis'];?></td>
								<td><?php echo $fetch['nama'];?></td>
								<td><?php echo $fetch['jk'];?></td>
								<td><?php echo $fetch['prodi'];?></td>
								<td><?php echo $fetch['alamat'];?></td>
								<td class="text-center">
									<?php 
									if ($fetch['lulus'] == '1') {
										echo "<i class='fa fa-check text-success'></i>";
									}
									?>
								</td>
								<td>
									<a class="btn btn-primary btn-sm text-white btn-pilih" data-siswa="<?php echo $fetch['nis']; ?>" data-dismiss="modal"><i class="fa fa-pencil-alt"></i></a>
								</td>
							</tr>
							<?php	
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	const btnPilih = document.querySelectorAll('.btn-pilih');
	btnPilih.forEach(function(item){
		item.addEventListener('click', function (e) {
			const inputNis = document.querySelector('input[name=nis]');
			inputNis.value = item.dataset.siswa;
		})
	})
	function selectAll(){
		let checkboxes = document.querySelectorAll('.siswa');
		let length = checkboxes.length;
		checkboxes.forEach(function (checkbox) {
			checkbox.checked = true;
		})
	}
	function unSelectAll(){
		let checkboxes = document.querySelectorAll('.siswa');
		let length = checkboxes.length
		checkboxes.forEach(function (checkbox) {
			checkbox.checked = false;
		})
	}
</script>

<?php include 'footer.php' ?>