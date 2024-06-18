<?php 
include 'header.php';
if ($_SESSION['level'] == 'Admin') {
?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h2>Kelulusan</h2>
	</div>
	<!-- Content Row -->
	<div class="row">
		<div class="col-md-12">
			<div class='alert alert-warning alert-dismissible mt-3 mb-3'>
				<b>Perhatian !</b> Pastikan yang diproses adalah siswa kelas akhir dan Jika ada siswa yang telah dibuatkan tagihan lalu diproses Lulus melalui halaman ini, maka tagihan tetap ada di kelas sebelumnya !
			</div>
		</div>
		<div class="col-md-9">
			<div class="card shadow-lg mb-5">
				<div class="card-body">
					<?php 
					if(isset($_GET['pesan'])){
						if($_GET['pesan']=="berhasil"){
							echo "<div class='alert alert-success alert-dismissible mt-3'>
							<button type='button' class='close' data-dismiss='alert'>&times;</button>
							<b>Proses Kelulusan Berhasil !</b>
							</div>";
						}else{
							echo "<div class='alert alert-danger alert-dismissible mt-3'>
							<button type='button' class='close' data-dismiss='alert'>&times;</button>
							<b>Belum Ada Siswa Yang Dipilih !</b>
							</div>";
						}
					}
					?>
					<form action="" method="post">
						<div class="form-group">
							<select name="id_kelas" class="form-control" onchange="this.form.submit()"> 
								<option value="">--Pilih Kelas--</option>
								<?php 
								$kelas = mysqli_query($koneksi,"SELECT * FROM kelas"); 
								while($kls = mysqli_fetch_assoc($kelas)){ 
									?> 
									<option value="<?php echo $kls['id_kelas']; ?>"><?php echo $kls['kelas']; ?></option> 
								<?php } ?> 
							</select> 		
						</div>
					</form>
					<button type="button" class="btn btn-sm btn-success" id="select" onclick="selectAll()">Pilih Semua</button> <button type="button" id="unselect" onclick="unSelectAll()" class="btn btn-sm btn-danger">Tidak Pilih Semua</button> <br><br>
					<!-- begin of form -->
					<form action="kelulusan_aksi.php" method="post">
						<table class="table table-striped table-hover table-responsive-md">
							<thead>
								<tr>
									<th width="1%"></th>
									<th width="1%">No</th>
									<th>NIS</th>
									<th>Nama Siswa</th>
									<th>Kelas</th>
									<th>Jurusan</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (isset($_POST['id_kelas'])) {
									$id_kelas = $_POST['id_kelas'];
									$no = 1;
									$siswa = mysqli_query($koneksi,"SELECT * FROM siswa,kelas,prodi WHERE siswa.id_kelas=kelas.id_kelas and siswa.id_prodi=prodi.id_prodi and siswa.id_kelas='$id_kelas' ORDER BY nis ASC");
									while ($d = mysqli_fetch_assoc($siswa)) {
										?>
										<tr>
											<td><label><input type="checkbox" class="siswa" name="nis[]" value="<?php echo $d['nis'];?>"></label></td>
											<td><?php echo $no++; ?></td>
											<td><?php echo $d['nis'];?></td>
											<td><?php echo $d['nama'];?></td>
											<td><?php echo $d['kelas'];?></td>
											<td><?php echo $d['prodi'];?></td>
										</tr>
									<?php } 
								} ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card shadow-lg mb-5">
					<div class="card-body">
						<button type="submit" name="submit" class="btn btn-block btn-primary btn-sm mb-2">Proses Kelulusan</button>	
					</div>
				</div>
			</div>
		</form><!-- end form -->
	</div>
</div>
<!-- End of Content -->

<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

</div><!-- End Main Content -->
</div><!-- End Content Wrapper -->
<script type="text/javascript">
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
<?php include 'footer.php';
}
?>