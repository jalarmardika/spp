<?php 
if (isset($_GET['id'])) {
	include 'header.php';
	if ($_SESSION['level'] == 'Admin') {
	?>

	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="row no-gutters mb-4">
			<div class="col-md-11">
				<?php
				$id = $_GET['id'];
				$periode = mysqli_query($koneksi,"SELECT * FROM periode WHERE id_periode='$id'");
				$fetch = mysqli_fetch_assoc($periode);
				?>
				<h2>Tagihan SPP Tahun <?php echo $fetch['awal']; ?>/<?php echo $fetch['akhir']; ?></h2>
			</div>
			<div class="col-md-1">
				<a href="periode.php" class="btn btn-danger btn-sm mt-1"><i class="fa fa-arrow-right"></i> Kembali</a>
			</div>
		</div>

		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan']=="berhasil"){
				echo "<div class='alert alert-success alert-dismissible mt-3'>
				<button type='button' class='close' data-dismiss='alert'>&times;</button>
				<b>Data Berhasil Disimpan !</b>
				</div>";
			}
		}
		?>

		<!-- Content Row -->
		<div class="row">
			<div class="col-md-12">
				<div class="card shadow mb-4">
	                <!-- Card Header - Accordion -->
	                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
	                    role="button" aria-expanded="true" aria-controls="collapseCardExample">
	                    <h6 class="m-0 font-weight-bold text-success">Daftar Siswa</h6>
	                </a>
	                <!-- Card Content - Collapse -->
	                <div class="collapse show" id="collapseCardExample">
	                    <div class="card-body">
	                    	<a href="tambah_tagihan.php?id=<?php echo $fetch['id_periode']; ?>" class="btn btn-primary btn-sm mt-1 mb-3"><i class="fa fa-plus-circle"></i> Tambah Tagihan</a>
	                    	<table id="dataTable" class="table table-striped table-hover table-responsive table-saya">
	                    		<thead>
	                    			<tr>
	                    				<th width="1%">No</th>
	                    				<th>NIS</th>
	                    				<th>Nama Siswa</th>
	                    				<th class="text-center">Tagihan Kelas</th>
	                    				<th>Opsi</th>
	                    			</tr>
	                    		</thead>
	                    		<tbody>
	                    			<?php
	                    			$no = 1;
	                    			// setiap siswa memiliki data tagihan 12 bulan, tampilkan 1 saja. untuk melihat semua data tagihan, user dapat mengklik tombol detail
	                    			$bulanan = mysqli_query($koneksi,"SELECT DISTINCT bulanan.nis,nama,kelas FROM bulanan JOIN siswa ON bulanan.nis=siswa.nis JOIN kelas ON bulanan.id_kelas=kelas.id_kelas WHERE id_periode='$id' ORDER BY bulanan.nis ASC");
	                    			while ($d = mysqli_fetch_assoc($bulanan)) {
	                    				?>
	                    				<tr>
	                    					<td><?php echo $no++; ?></td>
	                    					<td><?php echo $d['nis'];?></td>
	                    					<td><?php echo $d['nama'];?></td>
	                    					<td class="text-center"><?php echo $d['kelas'];?></td>
	                    					<td>
	                    						<a class="btn btn-info btn-sm text-white" title="Detail" href="detail_tagihan.php?nis=<?php echo $d['nis']; ?>&id_periode=<?php echo $id; ?>"><i class="fa fa-eye"></i></a>
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