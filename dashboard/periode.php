<?php
include 'header.php';	
if ($_SESSION['level'] == 'Admin') {					 						    
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="berhasil"){
			echo '
			<script>
			alert("Data Berhasil Di Simpan");
			</script>
			';
		}else if($_GET['pesan']=="edit"){
			echo '
			<script>
			alert("Data Berhasil Di Edit");
			</script>
			';
		}else if($_GET['pesan']=="hapus"){
			echo '
			<script>
			alert("Data Berhasil Di Hapus");
			</script>
			';
		}else if($_GET['pesan']=="dilarangHapus"){
			echo '
			<script>
			alert("Data tidak dapat dihapus, karena ada data tagihan/pembayaran terkait");
			</script>
			';
		}
	}
	?>

	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h2>Tahun Ajaran</h2>
		</div>
		<!-- Content Row -->
		<div class="row">
			<div class="col-md-12">
				<div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardTagihan" class="d-block card-header py-3" data-toggle="collapse"
                        role="button" aria-expanded="true" aria-controls="collapseCardTagihan">
                        <h6 class="m-0 font-weight-bold text-success">Data Tahun Ajaran</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseCardTagihan">
                        <div class="card-body">
                        	<a href="#" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#mymodal"><i class="fa fa-plus-circle"></i> Tambah</a>
                        	<table id="dataTable" class="table table-bordered table-striped table-responsive table-hover table-saya">
                        		<thead >
                        			<tr>
                        				<th width="1%">No</th>
                        				<th>Tahun Ajaran</th>
                        				<th width="40%">Opsi</th>
                        			</tr>
                        		</thead>
                        		<tbody>
                        			<?php
                        			$no = 1;
                        			$periode = mysqli_query($koneksi,"SELECT * FROM periode ORDER BY id_periode DESC");
                        			while ($d = mysqli_fetch_assoc($periode)) {
                        				?>
                        				<tr>
                        					<td><?php echo $no++; ?></td>
                        					<td><?php echo $d['awal'];?>/<?php echo $d['akhir'];?></td>
                        					<td>
                        						<a class="btn btn-success btn-sm text-white" href="tagihan.php?id=<?php echo $d['id_periode']; ?>"><i class="fa fa-eye"></i> Lihat Tagihan</a>
                        						<a class="btn btn-warning btn-sm text-white" data-toggle="modal" data-target="#mymodaledit<?php echo $d['id_periode'];?>"><i class="fa fa-edit"></i> Edit</a>
                        						<a onclick="return confirm('Apakah anda yakin ?')" href="periode_hapus.php?id=<?php echo $d['id_periode']; ?>" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i> Hapus</a>
                        					</td>
                        				</tr>
                        				<div class="modal" tabindex="-1" id="mymodaledit<?php echo $d['id_periode'];?>">
                        					<div class="modal-dialog">
                        						<div class="modal-content">
                        							<div class="modal-header">
                        								<h5 class="modal-title">Edit Tahun Ajaran</h5>
                        							</div>
                        							<div class="modal-body">
                        								<form action="periode_edit.php" method="post">
                        									<input type="hidden" name="id" value="<?php echo $d['id_periode']; ?>">
                        									<div class="row">
                        										<div class="col-sm-6 col-md-6">
                        											<div class="form-group">
                        												<label>Tahun Awal</label>
                        												<input type="number" name="awal" class="form-control " autocomplete="off" required="required" placeholder="Tahun Awal" value="<?php echo $d['awal']; ?>">
                        											</div>
                        										</div>
                        										<div class="col-sm-6 col-md-6">
                        											<div class="form-group">
                        												<label>Tahun Akhir</label>
                        												<input type="number" class="form-control " required="required" name="akhir"  placeholder="Tahun Akhir" value="<?php echo $d['akhir']; ?>">
                        											</div>
                        										</div>
                        									</div>
                        									<input type="submit" name="submit"
                        									value="Perbarui" class="btn btn-primary btn-sm float-right">
                        								</form>
                        							</div>
                        						</div>
                        					</div>
                        				</div>
                        				<?php	
                        			}
                        			?>
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

	<div class="modal" tabindex="-1" id="mymodal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Tahun Ajaran</h5>
				</div>
				<div class="modal-body">
					<form method="post" action="periode_tambah.php">
						<div class="row">
							<div class="col-sm-6 col-md-6">
								<div class="form-group">
									<label>Tahun Awal</label>
									<input type="number" name="awal" class="form-control " required="required" autofocus placeholder="Tahun Awal" autocomplete="off">
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="form-group">
									<label>Tahun Akhir</label>
									<input type="number" class="form-control " required="required" name="akhir" placeholder="Tahun Akhir">
								</div>
							</div>
						</div>
						<input type="submit" name="submit" class="btn btn-primary btn-sm float-right" value="Simpan">							
					</form>
				</div>
			</div>
		</div>
	</div>
<?php include 'footer.php';
}
?>