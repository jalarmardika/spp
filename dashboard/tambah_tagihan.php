<?php
if (isset($_GET['id'])) {
	include 'header.php';
	if ($_SESSION['level'] == 'Admin') {
	$id = $_GET['id'];
	?>

	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="row no-gutters mb-4">
			<div class="col-md-11">
				<h2>Tambah Tagihan</h2>
			</div>
			<div class="col-md-1">
				<a href="tagihan.php?id=<?php echo $id; ?>" class="btn btn-danger text-white btn-sm "><i class="fa fa-arrow-right"></i> Kembali</a>
			</div>
		</div>
		<?php 
		if(isset($_GET['pesan'])){
			if ($_GET['pesan']=="tidakAdaSiswa") { ?>
				<div class='alert alert-warning alert-dismissible mt-3'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<b>Belum Ada Siswa Yang Dipilih !</b>
				</div>
				<?php 
			}
		}
		?>
		<!-- Begin of form -->
		<form action="tambah_tagihan_aksi.php" method="post">
			<!-- Content Row -->
			<div class="row">
				<div class="col-md-4">
					<div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                            role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <h6 class="m-0 font-weight-bold text-success">Informasi</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapseCardExample">
                            <div class="card-body">
                            	<?php
                            	$periode = mysqli_query($koneksi,"SELECT * FROM periode WHERE id_periode='$id'");
                            	$fetch = mysqli_fetch_assoc($periode);
                            	?>
                            	<input type="hidden" name="id" id="id_periode" value="<?php echo $fetch['id_periode']; ?>">
                            	<div class="form-group">
                            		<label>Tahun Ajaran</label>
                            		<input type="text" name="periode" class="form-control" readonly="readonly" value="<?php echo $fetch['awal']; ?>/<?php echo $fetch['akhir']; ?>">
                            	</div>
                            	<div class="form-group">
                            		<label>Jenis Pembayaran</label>
                            		<input type="text" name="jenis" class="form-control" readonly="readonly" value="SPP">
                            	</div>
                            	<div class="form-group">
                            		<label>Tipe</label>
                            		<input type="text" name="tipe" class="form-control" readonly="readonly" value="Bulanan">
                            	</div>
                            	<div class="form-group">
                            		<label>Pilih Kelas</label>
                            		<select name="id_kelas" class="form-control" required="required" id="pilih_kelas">
                            			<option value=""> -- Pilih -- </option>
                            			<?php
                            			$kls = mysqli_query($koneksi,"SELECT * FROM kelas");
                            			while($d = mysqli_fetch_assoc($kls)){
                            				?>
                            				<option value="<?php echo $d['id_kelas']; ?>" kelas="<?php echo $d['id_kelas']; ?>"><?php echo $d['kelas']; ?></option>
                            				<?php
                            			}
                            			?>
                            		</select>
                            	</div>
                            	<div class="form-group kelas">

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
                            <h6 class="m-0 font-weight-bold text-success">Tarif Tagihan</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapseCard">
                            <div class="card-body">
                            	
                            	<div class="form-group">
                            		<label><b>Tarif Bulanan Sama</b></label>
                            		<input type="text" placeholder="Masukkan Nilai lalu Tekan Enter" id="allTarif" name="allTarif" class="form-control" autocomplete="off">
                            	</div>

                            	<div class="form-group">
                            		<div class="row">
                            			<div class="col-md-12">
                            				<label><b>Tarif  Setiap Bulan Berbeda</b></label>
                            			</div>
                            		</div>
                            		<table class="table">
                            			<tbody>
                            				<?php
                            				$bulan = mysqli_query($koneksi,"SELECT * FROM bulan");
                            				foreach ($bulan as $row): ?>
                            					<input type="hidden" name="bulan_id[]" value="<?php echo $row['id_bulan']; ?>">
                            					<tr>
                            						<td><?php echo $row['bulan']; ?></td>
                            						<td>
                            							<input type="text" id="n<?php echo $row['id_bulan'] ?>" name="nominal[]" class="form-control" required="required" autocomplete="off">
                            						</td>
                            					</tr>
                            				<?php endforeach; ?>
                            			</tbody>
                            		</table>
                            	</div>
                            	<div class="d-flex justify-content-end">
                            		<input type="reset" name="reset" class="btn text-dark btn-sm" value="Cancel" style="background-color: #cccccc;">
                            		<input type="submit" name="submit" value="Simpan" class="btn btn-success btn-sm ml-1">
                            	</div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</form><!-- end of form -->
	</div>
	<!-- End of Content -->

	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

</div><!-- End Main Content -->
</div><!-- End Content Wrapper -->

<script type="text/javascript">
	$("#allTarif").keypress(function (event) {
		var allTarif = $("#allTarif").val();
		if(event.keyCode == 13) {
			event.preventDefault();
			<?php foreach ($bulan as $row): ?>
				$("#n<?php echo $row['id_bulan'] ?>").val(allTarif);
			<?php endforeach ?>
		}
	});
	$('#pilih_kelas').on('change', function(){
		$('.kelas').html('');
		let kelas_terpilih = $("option:selected", this).attr("kelas");
		let id_periode = $('#id_periode').val();
		$.ajax({
			type: 'post',
			url: 'cari.php',
			dataType: 'json',
			data: 'kelas='+kelas_terpilih+'&id_periode='+id_periode,
			success: function(response){
				if (response != "") {
					$('.kelas').append(`
						<button type="button" class="btn btn-sm btn-success" id="select" onclick="selectAll()">Pilih Semua</button> <button type="button" id="unselect" onclick="unSelectAll()" class="btn btn-sm btn-danger">Tidak Pilih Semua</button> <br><br>
						`);
					
					$.each(response, function(i, data){
						$('.kelas').append(`
							<label><input type="checkbox" class="siswa" name="nis[]" value="`+ data.nis +`"> `+ data.nama +`</label> <br>
							`);
					})
				}
			}
		})
	})
</script>
<script type="text/javascript">
	var bayar = document.getElementById('allTarif');
	bayar.addEventListener('keyup', function(e){
		bayar.value = formatRupiah(this.value, 'Rp.');
	});
	// var kembali = document.getElementById('n<?php echo $row['id_bulan'] ?>');
	// kembali.addEventListener('keyup', function(event){
	// 	kembali.value = formatRupiah(this.value, 'Rp.');
	// });

	function formatRupiah(angka, prefix){
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
		split = number_string.split(','),
		sisa = split[0].length % 3,
		rupiah = split[0].substr(0, sisa),
		ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp.' + rupiah : '');
	}

	function cleanRupiah(rupiah){
		var clean = rupiah.replace(/\D/g,'');
		return clean;
	}
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
} 
?>