<?php
if (isset($_POST['submit'])) {
  include '../koneksi.php';
?>
  <!DOCTYPE html>
  <html>
  <head>
  	<title>Rekap Pembayaran</title>
    <link href="../assets/startbootstrap-sb-admin-2-gh-pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css" rel="stylesheet">
  </head>
  <body>
    <?php 
    $tahun = $_POST['tahun'];
    $kelas = $_POST['kelas'];
    $fetch_kelas = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas='$kelas' "));
    $fetch_periode = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM periode WHERE id_periode='$tahun' "));
    ?> 
    <h3 class="text-center mb2 mt-5">Rekap Pembayaran</h3> <p class="text-muted text-center">T.A <?php echo $fetch_periode['awal'] ?>/<?php echo $fetch_periode['akhir'] ?> Kelas <?php echo $fetch_kelas['kelas'] ?></p>
    <div class="container-fluid">
      <table class="table table-bordered table-hover ">
        <thead>
          <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <?php 
            $bulan = mysqli_query($koneksi,"SELECT * FROM bulan");
            while ($array_bulan = mysqli_fetch_assoc($bulan)) {
             ?>
              <th><?php echo $array_bulan['bulan']; ?></th>
            <?php } ?>
          </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            $siswa = mysqli_query($koneksi,"SELECT DISTINCT bulanan.nis,nama FROM bulanan,siswa WHERE bulanan.nis=siswa.nis and id_periode='$tahun' and bulanan.id_kelas='$kelas' ");
            while ($array = mysqli_fetch_assoc($siswa)) {
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $array['nis']; ?></td>
              <td><?php echo $array['nama']; ?></td>
              <!-- juli -->
              <?php 
              $data_juli = mysqli_query($koneksi,"SELECT * FROM bulanan,bulan WHERE bulanan.id_bulan=bulan.id_bulan and id_periode='$tahun' and bulanan.id_kelas='$kelas' and bulan.id_bulan='1'");
              while ($juli = mysqli_fetch_assoc($data_juli)) {
                if ($array['nis'] == $juli['nis']) {
              ?>
              <td class="text-center">
                <?php 
                  if ($juli['status']=='Lunas') {
                    echo "<i class='fa fa-check text-success'></i>";
                  }
                ?>
              </td>
              <!-- agustus -->
              <?php 
                $data_agustus = mysqli_query($koneksi,"SELECT * FROM bulanan,bulan WHERE bulanan.id_bulan=bulan.id_bulan and id_periode='$tahun' and bulanan.id_kelas='$kelas' and bulan.id_bulan='2'");
                while ($agustus = mysqli_fetch_assoc($data_agustus)) {
                  if ($array['nis'] == $agustus['nis']) {
              ?>
              <td class="text-center">
                <?php 
                  if ($agustus['status']=='Lunas') {
                     echo "<i class='fa fa-check text-success'></i>";
                  }
                ?>
              </td>
              <!-- september -->
              <?php 
                $data_september = mysqli_query($koneksi,"SELECT * FROM bulanan,bulan WHERE bulanan.id_bulan=bulan.id_bulan and id_periode='$tahun' and bulanan.id_kelas='$kelas' and bulan.id_bulan='3'");
                while ($september = mysqli_fetch_assoc($data_september)) {
                  if ($array['nis'] == $september['nis']) {
              ?>
              <td class="text-center">
                <?php 
                  if ($september['status']=='Lunas') {
                     echo "<i class='fa fa-check text-success'></i>";
                  }
                ?>
              </td>
              <!-- oktober -->
              <?php 
                $data_oktober = mysqli_query($koneksi,"SELECT * FROM bulanan,bulan WHERE bulanan.id_bulan=bulan.id_bulan and id_periode='$tahun' and bulanan.id_kelas='$kelas' and bulan.id_bulan='4'");
                while ($oktober = mysqli_fetch_assoc($data_oktober)) {
                  if ($array['nis'] == $oktober['nis']) {
              ?>
              <td class="text-center">
                <?php 
                  if ($oktober['status']=='Lunas') {
                     echo "<i class='fa fa-check text-success'></i>";
                  }
                ?>
              </td>
              <!-- november -->
              <?php 
                $data_november = mysqli_query($koneksi,"SELECT * FROM bulanan,bulan WHERE bulanan.id_bulan=bulan.id_bulan and id_periode='$tahun' and bulanan.id_kelas='$kelas' and bulan.id_bulan='5'");
                while ($november = mysqli_fetch_assoc($data_november)) {
                  if ($array['nis'] == $november['nis']) {
              ?>
              <td class="text-center">
                <?php 
                  if ($november['status']=='Lunas') {
                     echo "<i class='fa fa-check text-success'></i>";
                  }
                ?>
              </td>
              <!-- desember -->
              <?php 
                $data_desember = mysqli_query($koneksi,"SELECT * FROM bulanan,bulan WHERE bulanan.id_bulan=bulan.id_bulan and id_periode='$tahun' and bulanan.id_kelas='$kelas' and bulan.id_bulan='6'");
                while ($desember = mysqli_fetch_assoc($data_desember)) {
                  if ($array['nis'] == $desember['nis']) {
              ?>
              <td class="text-center">
                <?php 
                  if ($desember['status']=='Lunas') {
                     echo "<i class='fa fa-check text-success'></i>";
                  }
                ?>
              </td>
              <!-- januari -->
              <?php 
                $data_januari = mysqli_query($koneksi,"SELECT * FROM bulanan,bulan WHERE bulanan.id_bulan=bulan.id_bulan and id_periode='$tahun' and bulanan.id_kelas='$kelas' and bulan.id_bulan='7'");
                while ($januari = mysqli_fetch_assoc($data_januari)) {
                  if ($array['nis'] == $januari['nis']) {
              ?>
              <td class="text-center">
                <?php 
                  if ($januari['status']=='Lunas') {
                     echo "<i class='fa fa-check text-success'></i>";
                  }
                ?>
              </td>
              <!-- februari -->
              <?php 
                $data_februari = mysqli_query($koneksi,"SELECT * FROM bulanan,bulan WHERE bulanan.id_bulan=bulan.id_bulan and id_periode='$tahun' and bulanan.id_kelas='$kelas' and bulan.id_bulan='8'");
                while ($februari = mysqli_fetch_assoc($data_februari)) {
                  if ($array['nis'] == $februari['nis']) {
              ?>
              <td class="text-center">
                <?php 
                  if ($februari['status']=='Lunas') {
                     echo "<i class='fa fa-check text-success'></i>";
                  }
                ?>
              </td>
              <!-- maret -->
              <?php 
                $data_maret = mysqli_query($koneksi,"SELECT * FROM bulanan,bulan WHERE bulanan.id_bulan=bulan.id_bulan and id_periode='$tahun' and bulanan.id_kelas='$kelas' and bulan.id_bulan='9'");
                while ($maret = mysqli_fetch_assoc($data_maret)) {
                  if ($array['nis'] == $maret['nis']) {
              ?>
              <td class="text-center">
                <?php 
                  if ($maret['status']=='Lunas') {
                     echo "<i class='fa fa-check text-success'></i>";
                  }
                ?>
              </td>
              <!-- april -->
              <?php 
                $data_april = mysqli_query($koneksi,"SELECT * FROM bulanan,bulan WHERE bulanan.id_bulan=bulan.id_bulan and id_periode='$tahun' and bulanan.id_kelas='$kelas' and bulan.id_bulan='10'");
                while ($april = mysqli_fetch_assoc($data_april)) {
                  if ($array['nis'] == $april['nis']) {
              ?>
              <td class="text-center">
                <?php 
                  if ($april['status']=='Lunas') {
                     echo "<i class='fa fa-check text-success'></i>";
                  }
                ?>
              </td>
              <!-- mei -->
              <?php 
                $data_mei = mysqli_query($koneksi,"SELECT * FROM bulanan,bulan WHERE bulanan.id_bulan=bulan.id_bulan and id_periode='$tahun' and bulanan.id_kelas='$kelas' and bulan.id_bulan='11'");
                while ($mei = mysqli_fetch_assoc($data_mei)) {
                  if ($array['nis'] == $mei['nis']) {
              ?>
              <td class="text-center">
                <?php 
                  if ($mei['status']=='Lunas') {
                     echo "<i class='fa fa-check text-success'></i>";
                  }
                ?>
              </td>
              <!-- juni -->
              <?php 
                $data_juni = mysqli_query($koneksi,"SELECT * FROM bulanan,bulan WHERE bulanan.id_bulan=bulan.id_bulan and id_periode='$tahun' and bulanan.id_kelas='$kelas' and bulan.id_bulan='12'");
                while ($juni = mysqli_fetch_assoc($data_juni)) {
                  if ($array['nis'] == $juni['nis']) {
              ?>
              <td class="text-center">
                <?php 
                  if ($juni['status']=='Lunas') {
                     echo "<i class='fa fa-check text-success'></i>";
                  }
                ?>
              </td>
            </tr>
            <?php } } } } } } } } } } } } } } } } } } } } } } } } 
            } ?>
        </tbody>
      </table>
    </div>
    <script type="text/javascript"> 
    window.print();
    </script> 
  </body>
  </html>
<?php 
} ?>