<?php 
include 'header.php'; 
if ($_SESSION['level'] == 'Admin') {
	if (isset($_GET['nis']) && isset($_GET['id_periode'])) {
		$nis = $_GET['nis'];
		$id = $_GET['id_periode'];

		$data = mysqli_query($koneksi,"SELECT * FROM bulanan,kelas,periode WHERE bulanan.id_kelas=kelas.id_kelas and bulanan.id_periode=periode.id_periode and nis='$nis' and bulanan.id_periode='$id' ");
		$fetch = mysqli_fetch_assoc($data);

        $siswa = mysqli_query($koneksi,"SELECT * FROM siswa,kelas,prodi WHERE siswa.id_kelas=kelas.id_kelas and siswa.id_prodi=prodi.id_prodi and nis='$nis' ");
        $fetch_siswa = mysqli_fetch_assoc($siswa);
		?>

		<!-- Begin Page Content -->
		<div class="container-fluid">
			<!-- Page Heading -->
			<div class="row no-gutters mb-4">
				<div class="col-md-11">
					<h2>Detail Tagihan</h2>
				</div>
				<div class="col-md-1">
					<a href="tagihan.php?id=<?php echo $id; ?>" class="btn btn-danger text-white btn-sm "><i class="fa fa-arrow-right"></i> Kembali</a>
				</div>
			</div>

			<!-- Content Row -->
			<div class="row">
				<div class="col-md-4">
					<div class="card shadow mb-4">
	                    <!-- Card Header - Accordion -->
	                    <a href="#collapseCardTagihan" class="d-block card-header py-3" data-toggle="collapse"
	                        role="button" aria-expanded="true" aria-controls="collapseCardTagihan">
	                        <h6 class="m-0 font-weight-bold text-success">Informasi</h6>
	                    </a>
	                    <!-- Card Content - Collapse -->
	                    <div class="collapse show" id="collapseCardTagihan">
	                        <div class="card-body">
                        		<div class="form-group">
                        			<label>Tahun Ajaran</label>
                        			<input type="text" class="form-control" readonly="readonly" value="<?php echo $fetch['awal']; ?>/<?php echo $fetch['akhir']; ?>">
                        		</div>
                                <div class="form-group">
                                    <label>Tagihan Kelas</label>
                                    <input type="text" class="form-control" readonly="readonly" value="<?php echo $fetch['kelas']; ?>">
                                </div>
                        		<div class="form-group">
                        			<label>NIS</label>
                        			<input type="text" class="form-control" readonly="readonly" value="<?php echo $fetch_siswa['nis']; ?>">
                        		</div>
                        		<div class="form-group">
                        			<label>Nama Siswa</label>
                        			<input type="text" class="form-control" readonly="readonly" value="<?php echo $fetch_siswa['nama']; ?>">
                        		</div>
                        		<div class="form-group">
                        			<label>Kelas Saat Ini</label>
                        			<input type="text" class="form-control" readonly="readonly" value="<?php echo $fetch_siswa['kelas']; ?>">
                        		</div>
                                <div class="form-group">
                                    <label>Jurusan</label>
                                    <input type="text" class="form-control" readonly="readonly" value="<?php echo $fetch_siswa['prodi']; ?>">
                                </div>
	                        </div>
	                    </div>
	                </div>
				</div>
				<div class="col-md-8">
					<div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCard" class="d-block card-header py-3" data-toggle="collapse"
                            role="button" aria-expanded="true" aria-controls="collapseCard">
                            <h6 class="m-0 font-weight-bold text-success">Data Tagihan SPP</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapseCard">
                            <div class="card-body">
                            	<table class="table table-striped table-responsive">
                            		<thead>
                            			<th width="1%">No</th>
                            			<th>Bulan</th>
                            			<th>Nominal</th>
                            			<th class="text-center">Tgl. Bayar</th>
                            			<th>Status</th>
                            			<th>Opsi</th>
                            		</thead>
                            		<tbody>
                            			<?php
                            			$no = 1;
                            			$tagihan = mysqli_query($koneksi,"SELECT * FROM bulanan,bulan WHERE bulanan.id_bulan=bulan.id_bulan and nis='$nis' and id_periode='$id' ");
                            			while ($b = mysqli_fetch_assoc($tagihan)) {
                            				?>
                            				<tr>
                            					<td><?php echo $no++; ?></td>
                            					<td><?php echo $b['bulan'];?></td>
                            					<td>Rp.<?php echo number_format($b['biaya']);?></td>
                            					<td class="text-center">
                            						<?php
                            						if ($b['tgl_bayar'] != '0000-00-00') {
                            							echo date('d-m-Y', strtotime($b['tgl_bayar']));
                            						}else{
                            							echo "-";
                            						}
                            						?>
                            					</td>
                            					<td><?php echo $b['status']; ?></td>
                            					<td>
                            						<?php
                            						if (isset($b['status'])){
                            							if ($b['status']=="Belum Bayar") {
                            								?>
                            								<a class="btn btn-warning btn-sm text-white" title="Edit" data-toggle="modal" data-target="#mymodaledit<?php echo $b['id_bulanan'];?>"><i class="fa fa-edit"></i></a>
                            							<?php }
                            						} ?>
                            					</td>
                            				</tr>
                            				<div class="modal" tabindex="-1" id="mymodaledit<?php echo $b['id_bulanan'];?>">
                            					<div class="modal-dialog">
                            						<div class="modal-content">
                            							<div class="modal-header">
                            								<h5 class="modal-title">Edit Tagihan</h5>
                            								<button type="button" class="close" data-dismiss="modal">&times;</button>
                            							</div>
                            							<div class="modal-body">
                            								<form action="edit_tagihan.php" method="post">
                            									<input type="hidden" name="id" value="<?php echo $b['id_bulanan']; ?>">
                            									<input type="hidden" name="id_periode"  value="<?php echo $id; ?>">
                            									<input type="hidden" name="nis"  value="<?php echo $nis; ?>">
                            									<div class="form-group">
                            										<label >Nominal</label>
                            										<input type="number" class="form-control" min="0" required="required" name="nominal" value="<?php echo $b['biaya']; ?>">
                            									</div>
                            									<input type="submit" name="submit" value="Perbarui" class="btn btn-primary btn-sm float-right">
                            								</form>
                            							</div>
                            						</div>
                            					</div>
                            				</div>
                            			<?php } ?>
                            		</tbody>
                            	</table>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
		<!-- End of Content -->

		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
		</a>

	</div><!-- End Main Content -->
	</div><!-- End Content Wrapper -->

<?php include 'footer.php';
	}
}
?>