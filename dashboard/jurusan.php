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
			alert("Data tidak dapat dihapus, karena ada data siswa terkait");
			</script>
			';
		}
	}
	?>


	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h2>Jurusan</h2>
		</div>
		<!-- Content Row -->
		<div class="row">
			<div class="col-md-6">
				<div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                        role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-success">Data Jurusan</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseCardExample">
                        <div class="card-body">
                        	<a href="#" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#mymodal"><i class="fa fa-plus-circle"></i> Tambah Jurusan</a>

                        	<table id="dataTable" class="table table-responsive table-bordered table-striped table-hover">
                        		<thead >
                        			<tr>
                        				<th width="1%">No</th>
                        				<th>Jurusan</th>
                        				<th width="35%">Opsi</th>
                        			</tr>
                        		</thead>
                        		<tbody>
                        			<?php
                        			$no = 1;
                        			$prodi = mysqli_query($koneksi,"SELECT * FROM prodi ORDER BY id_prodi DESC");
                        			while ($d = mysqli_fetch_assoc($prodi)) {

                        				?>
                        				<tr>
                        					<td><?php echo $no++; ?></td>
                        					<td><?php echo $d['prodi'];?></td>
                        					<td>
                        						<a class="btn btn-warning btn-sm text-white" data-toggle="modal" data-target="#mymodaledit<?php echo $d['id_prodi'];?>"><i class="fa fa-edit"></i> Edit</a>
                        						<a onclick="return confirm('Apakah anda yakin ?')" href="jurusan_hapus.php?id=<?php echo $d['id_prodi']; ?>" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i> Hapus</a>
                        					</td>
                        				</tr>
                        				<div class="modal" tabindex="-1" id="mymodaledit<?php echo $d['id_prodi'];?>">
                        					<div class="modal-dialog">
                        						<div class="modal-content">
                        							<div class="modal-header">
                        								<h5 class="modal-title">Edit Jurusan</h5>
                        							</div>
                        							<div class="modal-body">
                        								<form action="jurusan_edit.php" method="post">
                        									<input type="hidden" name="id" value="<?php echo $d['id_prodi']; ?>">

                        									<div class="form-group">
                        										<label>Jurusan</label>
                        										<input type="text" name="jurusan" class="form-control " autocomplete="off" required="required" value="<?php echo $d['prodi']; ?>">
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
					<h5 class="modal-title">Tambah Jurusan</h5>
				</div>
				<div class="modal-body">
					<form method="post" action="jurusan_tambah.php">
						<div class="form-group">
							<label>Nama Jurusan</label>
							<input  type="text" name="prodi" class="form-control" required="required" autocomplete="off">
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