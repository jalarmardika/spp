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
			alert("Data tidak dapat dihapus, karena ada data tagihan/pembayaran yg terkait");
			</script>
			';
		}
	}
	?>

	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h2>Siswa</h2>
		</div>
		<!-- Content Row -->
		<div class="row">
			<div class="col-md-12">
				<div class="card shadow mb-4">
		            <!-- Card Header - Accordion -->
		            <a href="#collapseCardInfo" class="d-block card-header py-3" data-toggle="collapse"
		                role="button" aria-expanded="true" aria-controls="collapseCardInfo">
		                <h6 class="m-0 font-weight-bold text-success">Data Siswa</h6>
		            </a>
		            <!-- Card Content - Collapse -->
		            <div class="collapse show" id="collapseCardInfo">
		            	<div class="card-body">
		            		<a href="#" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#mymodal"><i class="fa fa-plus-circle"></i> Tambah Siswa</a>
		            		<table id="dataTable" class="table table-bordered table-striped table-hover table-responsive-md table-saya">
		            			<thead>
		            				<tr>
		            					<th>No</th>
		            					<th>NIS</th>
		            					<th>Nama Siswa</th>
		            					<th>Jenis Kelamin</th>
		            					<th>Kelas</th>
		            					<th>Jurusan</th>
		            					<th>Alamat</th>
		            					<th>Opsi</th>
		            				</tr>
		            			</thead>
		            			<tbody>
		            				<?php
		            				$no = 1;
		            				$siswa = mysqli_query($koneksi,"SELECT * FROM siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN prodi ON siswa.id_prodi=prodi.id_prodi ORDER BY nis ASC");
		            				while ($d = mysqli_fetch_assoc($siswa)) {
		            					?>
		            					<tr>
		            						<td><?php echo $no++; ?></td>
		            						<td><?php echo $d['nis'];?></td>
		            						<td><?php echo $d['nama'];?></td>
		            						<td><?php echo $d['jk'];?></td>
		            						<td class="text-center"><?php echo $d['kelas'];?></td>
		            						<td><?php echo $d['prodi'];?></td>
		            						<td><?php echo $d['alamat'];?></td>
		            						<td>
		            							<a class="btn btn-warning btn-sm text-white" data-toggle="modal" data-target="#mymodaledit<?php echo $d['nis'];?>"><i class="fa fa-edit"></i> Edit</a>
		            							<a onclick="return confirm('Apakah anda yakin ?')" href="siswa_hapus.php?nis=<?php echo $d['nis']; ?>" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i> Hapus</a>
		            						</td>
		            					</tr>
		            					<div class="modal" tabindex="-1" id="mymodaledit<?php echo $d['nis'];?>">
		            						<div class="modal-dialog">
		            							<div class="modal-content">
		            								<div class="modal-header">
		            									<h5 class="modal-title">Edit Siswa</h5>
		            								</div>
		            								<div class="modal-body">
		            									<form action="siswa_edit.php" method="post">
		            										<input type="hidden" name="nis" value="<?php echo $d['nis']; ?>">

		            										<div class="form-group">
		            											<label >Nama Siswa</label>
		            											<input type="text"  class="form-control" required="required" name="nama" value="<?php echo $d['nama']; ?>">
		            										</div>
		            										<div class="row">
		            											<div class="col-md-6">
		            												<div class="form-group"> 
		            													<label>Jenis Kelamin</label> 
		            													<select name="jk" class="form-control" required="required"> 
		            														<option value="">-- Pilih --</option> 
		            														<option <?php if($d['jk']=="Laki-laki"){echo "Selected='selected'";} ?> value="Laki-laki">Laki-laki</option> 
		            														<option <?php if($d['jk']=="Perempuan"){echo "Selected='selected'";} ?> value="Perempuan">Perempuan</option> 
		            													</select> 
		            												</div> 
		            											</div>
		            											<div class="col-md-6">
		            												<div class="form-group">
		            													<label >Password (optional)</label>
		            													<input type="password" class="form-control" name="pass" placeholder="Isi jika ingin ganti password">
		            												</div>
		            											</div>
		            										</div>

		            										<div class="row">
		            											<div class="col-md-6">
		            												<div class="form-group">
		            													<label>Kelas</label>
		            													<select name="kelas" class="form-control" required="required"> 
		            														<option value=""> - Pilih - </option> 
		            														<?php 
		            														$kelas = mysqli_query($koneksi,"SELECT * FROM kelas"); 
		            														while($k = mysqli_fetch_assoc($kelas)){ 
		            															?> 
		            															<option <?php if($d['id_kelas']==$k['id_kelas']){echo "selected='selected'";} ?> value="<?php echo $k['id_kelas']; ?>"><?php echo $k['kelas']; ?></option> 
		            															<?php 
		            														} 
		            														?> 
		            													</select> 	
		            												</div>
		            											</div>

		            											<div class="col-md-6">
		            												<div class="form-group">
		            													<label>Jurusan</label>
		            													<select name="jurusan" class="form-control" required="required"> 
		            														<option value=""> - Pilih - </option> 
		            														<?php 
		            														$prodi = mysqli_query($koneksi,"SELECT * FROM prodi ORDER BY id_prodi DESC"); 
		            														while($p = mysqli_fetch_assoc($prodi)){ 
		            															?> 
		            															<option <?php if($d['id_prodi']==$p['id_prodi']){echo "selected='selected'";} ?> value="<?php echo $p['id_prodi']; ?>"><?php echo $p['prodi']; ?></option> 
		            															<?php 
		            														} 
		            														?> 
		            													</select> 	
		            												</div>
		            											</div>
		            										</div>
		            										<div class="form-group">
		            											<label >Alamat</label>
		            											<textarea name="alm" class="form-control" required="required"><?php echo $d['alamat']; ?></textarea>
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
					<h5 class="modal-title">Tambah Siswa</h5>
				</div>
				<div class="modal-body">
					<form method="post" action="siswa_tambah.php">
						<div class="form-group">
							<label>NIS</label>
							<input type="number" class="form-control" required="required" name="nis" autocomplete="off">
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label >Nama Siswa</label>
									<input type="text"  class="form-control" required="required" name="nama" >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label >Password</label>
									<input type="password"  class="form-control" required="required" name="pass">
								</div>
							</div>
						</div>

						<div class="form-group"> 
							<label>Jenis Kelamin</label> 
							<select name="jk" class="form-control" required="required"> 
								<option value="">-- Pilih --</option> 
								<option value="Laki-laki">Laki-laki</option> 
								<option value="Perempuan">Perempuan</option> 
							</select> 
						</div> 
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Kelas</label>
									<select name="kelas" class="form-control" required="required"> 
										<option value=""> - Pilih - </option> 
										<?php 
										$kelas = mysqli_query($koneksi,"SELECT * FROM kelas"); 
										while($kls = mysqli_fetch_assoc($kelas)){ 
											?> 
											<option value="<?php echo $kls['id_kelas']; ?>"><?php echo $kls['kelas']; ?></option> 
											<?php 
										} 
										?> 
									</select> 				
								</div>			
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label>Jurusan</label>
									<select name="jurusan" class="form-control" required="required"> 
										<option value=""> - Pilih - </option> 
										<?php 
										$jurusan = mysqli_query($koneksi,"SELECT * FROM prodi ORDER BY id_prodi DESC"); 
										while($array_prodi = mysqli_fetch_assoc($jurusan)){ 
											?> 
											<option value="<?php echo $array_prodi['id_prodi']; ?>"><?php echo $array_prodi['prodi']; ?></option> 
											<?php 
										} 
										?> 
									</select> 				
								</div>	
							</div>
						</div>

						<div class="form-group">
							<label >Alamat</label>
							<textarea name="alm" class="form-control" required="required"></textarea>
						</div>
						<input type="submit" name="submit" class="btn btn-primary btn-sm float-right" value="Simpan">							
					</form>
				</div>
			</div>
		</div>
	</div>
<?php 
include 'footer.php';
} ?>