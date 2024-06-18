<?php include 'header.php' ?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h2>Dashboard</h2>
  </div>
  <!-- Content Row -->
  <div class="row">
    <div class="col-xl-12 col-md-12 mb-3">
      <?php 
      if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "sudahLogin") { ?>
          <div class='alert alert-warning alert-dismissible mt-3'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <b>Anda Sudah Login !</b>
          </div>
        <?php
        }
      }
      ?>
      <div class="card border-left-secondary shadow">
        <div class="card-body">
          <img src="../assets/img/smk.jpg" style="width: 2rem;" alt="logo"><p class="d-inline ml-3">Selamat Datang 
            <b>
              <?php
              if ($_SESSION['level'] == 'Siswa') {
                echo $_SESSION['nama'];
              }else{
                echo $_SESSION['username_petugas']; 
              }
              ?>
            </b> Di Sistem Pembayaran SPP <b>SMK NU 05 KALIWUNGU SELATAN</b></p>
        </div>  
      </div>     
    </div>
    <?php if ($_SESSION['level'] != 'Siswa') { ?>
    <div class="col-xl-3 col-md-6 mb-3">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="card-body-icon mr-3">
            <i class="fas fa-users fa-3x text-gray-300"></i>
          </div>
          <h5 class="card-title text-xs font-weight-bold text-success text-uppercase mb-1">Data Siswa</h5>
          <div class="font-weight-bold text-gray-800 text-success">
            <?php
            $siswa = mysqli_query($koneksi,"SELECT * FROM siswa WHERE lulus=0 ");
            $jumlah_siswa = mysqli_num_rows($siswa);
            ?>
            <p><?php echo $jumlah_siswa;?></p>
          </div>
        </div>  
      </div>     
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="card-body-icon mr-3">
            <i class="fas fa-briefcase fa-3x text-gray-300"></i>
          </div>
          <h5 class="card-title text-xs font-weight-bold text-primary text-uppercase mb-1">Data Jurusan</h5>
          <div class="font-weight-bold text-gray-800 text-success">
            <?php
            $prodi = mysqli_query($koneksi,"SELECT * FROM prodi");
            $jumlah_prodi = mysqli_num_rows($prodi);
            ?>
            <p><?php echo $jumlah_prodi;?></p>
          </div>
        </div>  
      </div>     
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="card-body-icon mr-3">
            <i class="fas fa-user fa-3x text-gray-300"></i>
          </div>
          <h5 class="card-title text-xs font-weight-bold text-warning text-uppercase mb-1">Data Petugas</h5>
          <div class="font-weight-bold text-gray-800 text-success">
            <?php
            $ptg = mysqli_query($koneksi,"SELECT * FROM petugas");
            $jumlah_ptg = mysqli_num_rows($ptg);
            ?>
            <p><?php echo $jumlah_ptg;?></p>
          </div>
        </div>  
      </div>     
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="card-body-icon mr-3">
            <i class="fas fa-money-bill fa-3x text-gray-300"></i>
          </div>
          <h5 class="card-title text-xs font-weight-bold text-danger text-uppercase mb-1">Pendapatan Hari Ini</h5>
          <div class="font-weight-bold text-gray-800 text-success">
            <?php
            $hariini = date('Y-m-d');

            $pendapatan = mysqli_query($koneksi,"select sum(biaya) as biaya from bulanan where tgl_bayar='$hariini'");
            $row = $pendapatan->fetch_array();
            $totalhariini = $row['biaya'];
            ?>
            <p>Rp. <?php echo number_format($totalhariini);?></p>
          </div>
        </div>  
      </div>     
    </div>
    <?php } ?>
  </div>
<?php if($_SESSION['level'] != 'Siswa'){ ?>
  <div class="row mt-3">
    <div class="col-md-8">
      <div class="card shadow mb-4">
          <!-- Card Header - Accordion -->
          <a href="#collapseCardKelas" class="d-block card-header py-3" data-toggle="collapse"
              role="button" aria-expanded="true" aria-controls="collapseCardKelas">
              <h6 class="m-0 font-weight-bold text-success">Grafik Siswa Berdasarkan Kelas</h6>
          </a>
          <!-- Card Content - Collapse -->
          <div class="collapse show" id="collapseCardKelas">
              <div class="card-body">
                <div style="width: 100%;height: 100%;">
                  <canvas id="grafik-kelas" class="mb-2"></canvas>
                </div>
              </div>
          </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow mb-4">
          <!-- Card Header - Accordion -->
          <a href="#collapseCardJk" class="d-block card-header py-3" data-toggle="collapse"
              role="button" aria-expanded="true" aria-controls="collapseCardJk">
              <h6 class="m-0 font-weight-bold text-success">Data Siswa Berdasarkan Jenis Kelamin</h6>
          </a>
          <!-- Card Content - Collapse -->
          <div class="collapse show" id="collapseCardJk">
              <div class="card-body">
                <div style="width: 100%;height: 200px">
                  <canvas id="grafik-jk"></canvas>
                </div>
              </div>
          </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="card shadow mb-4">
          <!-- Card Header - Accordion -->
          <a href="#collapseCardPendapatan" class="d-block card-header py-3" data-toggle="collapse"
              role="button" aria-expanded="true" aria-controls="collapseCardPendapatan">
              <h6 class="m-0 font-weight-bold text-success">Grafik Pendapatan Bulanan Tahun <?php echo date('Y'); ?></h6>
          </a>
          <!-- Card Content - Collapse -->
          <div class="collapse show" id="collapseCardPendapatan">
              <div class="card-body">
                </br>
                <div style="width: 100%;height: 100%">
                  <canvas id="grafik-pendapatan"></canvas>
                </div>
              </div>
          </div>
      </div>
    </div>
  </div>
  <?php } ?>
</div>
<!-- End of Content -->

<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

</div><!-- End Main Content -->
</div><!-- End Content Wrapper -->

<script src="../assets/startbootstrap-sb-admin-2-gh-pages/vendor/chart.js/Chart.min.js"></script>
<script type="text/javascript">
  var ctx = document.getElementById("grafik-kelas").getContext('2d');
  var grafikKelas = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [

      <?php
      $kelas = mysqli_query($koneksi, "SELECT * FROM kelas");
      while($d = mysqli_fetch_assoc($kelas)){
        ?>
        "<?php echo $d['kelas']; ?>", 
        <?php
      }
      ?>

      ],
      datasets: [{
        label: 'Jumlah Siswa',
        data: [

        <?php
        $kelas = mysqli_query($koneksi, "SELECT * FROM kelas");
        while($data = mysqli_fetch_assoc($kelas)){
          $id_kelas = $data['id_kelas'];
          $siswa = mysqli_query($koneksi,"SELECT * FROM siswa WHERE id_kelas='$id_kelas'");
          $jumlah_siswa = mysqli_num_rows($siswa);
          ?>
          "<?php echo $jumlah_siswa; ?>", 
          <?php
        }
        ?>

        ],
        backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });

  var ctx2 = document.getElementById("grafik-jk");
  var grafikJk = new Chart(ctx2, {
    type: 'doughnut',
    data: {
      labels: ["Laki-laki", "Perempuan"],
      datasets: [{
        data: [
        <?php
        $pria = mysqli_query($koneksi,"SELECT * FROM siswa WHERE lulus='0' and jk='Laki-laki'");
        $jumlah_pria = mysqli_num_rows($pria);
        $wanita = mysqli_query($koneksi,"SELECT * FROM siswa WHERE lulus='0' and jk='Perempuan'");
        $jumlah_wanita = mysqli_num_rows($wanita);
        ?>
        "<?php echo $jumlah_pria; ?>","<?php echo $jumlah_wanita; ?>", 

        ],
        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false
      },
      cutoutPercentage: 80,
    },
  });

  var ctx3 = document.getElementById("grafik-pendapatan").getContext('2d');
  var grafikPendapatan = new Chart(ctx3, {
    type: 'line',
    data: {
      labels:

      <?php
      $label = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
      echo json_encode($label);
      ?>,
      
      datasets: [{
        label: 'Total ',
        data:

        <?php
        $tahunini = date('Y');
        for ($bulan=1; $bulan < 13; $bulan++) { 
          $query = mysqli_query($koneksi,"select sum(biaya) as biaya from bulanan where MONTH(tgl_bayar)='$bulan' and YEAR(tgl_bayar)='$tahunini'");
          $row = $query->fetch_array();
          $biaya[] = $row['biaya'];
        }
        echo json_encode($biaya);
        ?>,

        lineTension: 0.3,
        backgroundColor: "rgba(78, 115, 223, 0.05)",
        borderColor: "rgba(78, 115, 223, 1)",
        pointRadius: 3,
        pointBackgroundColor: "rgba(78, 115, 223, 1)",
        pointBorderColor: "rgba(78, 115, 223, 1)",
        pointHoverRadius: 3,
        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
        pointHitRadius: 10,
        pointBorderWidth: 2,
        borderWidth: 3
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    },

  });

</script>
<?php include 'footer.php' ?>