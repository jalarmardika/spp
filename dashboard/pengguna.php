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
			alert("Data tidak dapat dihapus, karena ada data pembayaran terkait");
			</script>
			';
		}
	}
	?>

	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h2>Petugas</h2>
		</div>
		<!-- Content Row -->
		<div class="row">
			<div class="col-md-12">
				<div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardTagihan" class="d-block card-header py-3" data-toggle="collapse"
                        role="button" aria-expanded="true" aria-controls="collapseCardTagihan">
                        <h6 class="m-0 font-weight-bold text-success">Data Petugas</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseCardTagihan">
                        <div class="card-body">
                        	<a href="#" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#mymodal"><i class="fa fa-plus-circle"></i> Tambah Petugas</a>
                        	<table id="dataTable" class="table table-bordered table-responsive table-striped table-hover table-saya">
                        		<thead >
                        			<tr>
                        				<th width="1%">No</th>
                        				<th>Username</th>
                        				<th>No Telepon</th>
                        				<th>Level</th>
                        				<th width="20%">Opsi</th>
                        			</tr>
                        		</thead>
                        		<tbody>
                        			<?php
                        			$no = 1;
                        			$petugas = mysqli_query($koneksi,"SELECT * FROM petugas ORDER BY id DESC");
                        			while ($d = mysqli_fetch_assoc($petugas)) {
                        				?>
                        				<tr>
                        					<td><?php echo $no++; ?></td>
                        					<td><?php echo $d['username']; ?></td>
                        					<td><?php echo $d['telp']; ?></td>
                        					<td><?php echo $d['level']; ?></td>
                        					<td>
                        						<a class="btn btn-warning btn-sm text-white" data-toggle="modal" data-target="#mymodaledit<?php echo $d['id'];?>"><i class="fa fa-edit"></i> Edit</a>
                        						<a onclick="return confirm('Apakah anda yakin ?')" href="pengguna_hapus.php?id=<?php echo $d['id']; ?>" class="btn btn-danger btn-sm alert_notif"><i class="fa fa-trash"></i> Hapus</a>
                        					</td>
                        				</tr>
                        				<div class="modal" tabindex="-1" id="mymodaledit<?php echo $d['id'];?>">
                        					<div class="modal-dialog">
                        						<div class="modal-content">
                        							<div class="modal-header">
                        								<h5 class="modal-title">Edit Petugas</h5>
                        							</div>
                        							<div class="modal-body">
                        								<form method="post" action="pengguna_edit.php">
                        									<input type="hidden" name="id"
                        									value="<?php echo $d['id']; ?>">
                        									<div class="form-group">
                        										<label>Username</label>
                        										<input type="text" name="username" class="form-control" required="required" value="<?php echo $d['username'];?>" placeholder="Masukkan Username" autocomplete="off">
                        									</div>
                        									<div class="form-group">
                        										<label>Password (optional)</label>
                        										<input type="password" name="pass" class="form-control" placeholder="Isi jika ingin ganti password">	
                        									</div>
                        									<div class="form-group">
                        										<label>No Telepon</label>
                        										<input type="text" name="telp" class="form-control" required="required" value="<?php echo $d['telp'];?>" placeholder="Masukkan No Hp/Telepon" autocomplete="off">								
                        									</div>
                        									<div class="form-group">
                        										<label>Level</label>
                        										<select name="level" class="form-control" required="required"> 
                        											<option value=""> - Pilih - </option> 
                        											<option <?php if($d['level']=="Admin"){echo "Selected='selected'";} ?> value="Admin">Admin</option> 

                        											<option <?php if($d['level']=="Petugas"){echo "Selected='selected'";} ?> value="Petugas">Petugas</option> 
                        										</select> 		
                        									</div>
                        									<input type="submit" name="submit" class="btn btn-primary btn-sm float-right" value="Perbarui">
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
					<h5 class="modal-title">Tambah Petugas</h5>
				</div>
				<div class="modal-body">
					<form method="post" action="pengguna_tambah.php">
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" class="form-control" required="required" autocomplete="off" placeholder="Masukkan Username">								
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="pass" class="form-control" required="required" >
						</div>
						<div class="form-group">
							<label>No Telepon</label>
							<input type="text" name="telp" class="form-control" required="required" placeholder="Masukkan No Hp/Telepon" autocomplete="off">	
						</div>
						<div class="form-group">
							<label>Level</label>
							<select name="level" class="form-control" required="required"> 
								<option value=""> - Pilih - </option> 
								<option value="Admin">Admin</option> 
								<option value="Petugas">Petugas</option> 
							</select> 
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