<?php 
if (isset($_POST['submit'])){
 include '../koneksi.php'; 
 ?>
  <!DOCTYPE html>
  <html>
  <head>
    <title>Cetak Laporan</title>
    <link href="../assets/startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css" rel="stylesheet">
  </head>
  <body>
    <h3 class="text-center mb2 mt-5">Laporan Pembayaran</h3> <p class="text-muted text-center">Dari <?php echo date('d-m-Y', strtotime($_POST['dari'])) ?> Sampai <?php echo date('d-m-Y', strtotime($_POST['sampai'])) ?></p>
    <div class="container-fluid">
      <table class="table table-bordered table-hover ">
        <thead>
          <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th class="text-center">Kelas</th>
            <th>Jenis Pembayaran</th>
            <th class="text-center">Tgl. Bayar</th>
            <th class="text-center">Biaya</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $total_pembayaran = 0;
          $data = mysqli_query($koneksi,"SELECT * FROM bulanan,kelas,siswa,bulan WHERE bulanan.nis=siswa.nis and bulanan.id_kelas=kelas.id_kelas and bulanan.id_bulan=bulan.id_bulan and status='Lunas' and tgl_bayar BETWEEN '".$_POST['dari']."' and '".$_POST['sampai']."'");
          while ($d = mysqli_fetch_assoc($data)) {
            $total_pembayaran += $d['biaya'];
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $d['nis']; ?></td>
              <td><?php echo $d['nama']; ?></td>
              <td class="text-center"><?php echo $d['kelas']; ?></td>
              <td>SPP Bulan <?php echo $d['bulan']; ?></td>
              <td class="text-center"><?php echo date('d-m-Y', strtotime($d['tgl_bayar']))?></td>
              <td class="text-right">Rp.<?php echo number_format( $d['biaya'])?></td>
            </tr>
          <?php } ?>
          <tr>
            <td></td>
            <td><b>Total Pendapatan</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-right"><b>Rp.<?php echo number_format($total_pembayaran); ?></b></td>
          </tr>
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