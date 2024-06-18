<?php 
include 'header.php';
if ($_SESSION['level'] == 'Admin') {
?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h2>Rekapitulasi</h2>
  </div>
  <!-- Content Row -->
  <div class="row">
    <div class="col-md-12">
      <div class="card shadow mb-5">
        <div class="card-body">
          <form action="rekapitulasi_cetak.php" method="post" class="form-horizontal" target="_blank">
            <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row">
                    <label class="col-sm-4 control-label"><b>Tahun Ajaran</b></label>
                    <div class="col-sm-8">
                      <select name="tahun" class="form-control" required="required"> 
                        <option value=""> - Pilih - </option> 
                        <?php 
                        $tahun = mysqli_query($koneksi,"SELECT * FROM periode ORDER BY id_periode DESC"); 
                        while($thn = mysqli_fetch_assoc($tahun)){ 
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
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row">
                    <label class="col-sm-4 control-label"><b>Kelas</b></label>
                    <div class="col-sm-8">
                      <select name="kelas" class="form-control" required="required"> 
                        <option value=""> - Pilih - </option> 
                        <?php 
                        $kelas = mysqli_query($koneksi,"SELECT * FROM kelas ORDER BY id_kelas ASC"); 
                        while($kls = mysqli_fetch_assoc($kelas)){ 
                         ?> 
                          <option value="<?php echo $kls['id_kelas']; ?>"><?php echo $kls['kelas']; ?></option> 
                          <?php 
                        } 
                        ?> 
                      </select>                  
                    </div>
                  </div> 
                </div> 
              </div>
              <div class="col-md-2">
                <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-search"></i> Filter</button>
              </div>
            </div>
          </form>
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