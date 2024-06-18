<?php 
include 'header.php';
if ($_SESSION['level'] == 'Admin') {
?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h2>Laporan Per Periode</h2>
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="col-md-12">
      <div class="card shadow mb-3">
        <div class="card-body">
          <form action="laporan_cetak.php" method="post" class="form-horizontal" target="_blank">
            <div class="row no-gutters">
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row">
                    <label class="col-sm-3 control-label"><b>Dari</b></label>
                    <div class="col-sm-8">
                      <input type="date" required="required" class="form-control" name="dari" max="<?php echo date('Y-m-d'); ?>">                         
                    </div>
                  </div>  
                </div>  
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row">
                    <label class="col-sm-3 control-label"><b>Sampai</b></label>
                    <div class="col-sm-8">
                      <input type="date" required="required" max="<?php echo date('Y-m-d'); ?>" class="form-control" name="sampai">                   
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