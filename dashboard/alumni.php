<?php 
include 'header.php';
if ($_SESSION['level'] == 'Admin') {
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h2>Alumni</h2>
    </div>
    <!-- Content Row -->
	<div class="row">
		<div class="col-md-12">
			<div class="card shadow mb-4">
	            <!-- Card Header - Accordion -->
	            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
	                role="button" aria-expanded="true" aria-controls="collapseCardExample">
	                <h6 class="m-0 font-weight-bold text-success">Data Alumni</h6>
	            </a>
	            <!-- Card Content - Collapse -->
	            <div class="collapse show" id="collapseCardExample">
	                <div class="card-body">
	                	<table id="dataTable" class="table table-bordered table-striped table-hover table-responsive-md">
	                		<thead>
	                			<tr>
	                				<th>No</th>
	                				<th>NIS</th>
	                				<th>Nama Siswa</th>
	                				<th>Jenis Kelamin</th>
	                				<th>Jurusan</th>
	                				<th>Alamat</th>
	                			</tr>
	                		</thead>
	                		<tbody>
	                			<?php
	                			$no = 1;
	                			$alumni = mysqli_query($koneksi,"SELECT * FROM siswa,prodi WHERE siswa.id_prodi=prodi.id_prodi and id_kelas IS NULL and lulus='1' ORDER BY nis ASC");
	                			while ($d = mysqli_fetch_assoc($alumni)) { ?>
	                			<tr>
	                				<td><?php echo $no++; ?></td>
	                				<td><?php echo $d['nis'];?></td>
	                				<td><?php echo $d['nama'];?></td>
	                				<td><?php echo $d['jk'];?></td>
	                				<td><?php echo $d['prodi'];?></td>
	                				<td><?php echo $d['alamat'];?></td>
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
?>