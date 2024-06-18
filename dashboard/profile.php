<?php
include 'header.php';
if ($_SESSION['level'] == 'Siswa' || $_SESSION['level'] == 'Petugas') {

    if(isset($_GET['pesan'])){
        if($_GET['pesan']=="edit"){
            echo '
            <script>
            alert("Password Berhasil Di Perbarui");
            </script>
            ';
        }else{
            echo '
            <script>
            alert("Password Lama Salah");
            </script>
            ';
        }
    }
    ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2>Profile</h2>
        </div>
        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-lg mb-5">
                    <div class="card-body">
                        <table class="table table-striped">
                            <?php
                            if ($_SESSION['level'] == 'Siswa') {
                                $nis = $_SESSION['nis'];
                                $sql = mysqli_query($koneksi,"SELECT * FROM siswa,kelas,prodi WHERE siswa.id_kelas=kelas.id_kelas and siswa.id_prodi=prodi.id_prodi and nis='$nis'");
                                $data = mysqli_fetch_assoc($sql);
                            ?>
                            <tr>
                                <td>NIS</td>
                                <td>:</td>
                                <td><?php echo $data['nis']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><?php echo $data['nama']; ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td><?php echo $data['jk']; ?></td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td>:</td>
                                <td><?php echo $data['kelas']; ?></td>
                            </tr>
                            <tr>
                                <td>Jurusan</td>
                                <td>:</td>
                                <td><?php echo $data['prodi']; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><?php echo $data['alamat']; ?></td>
                            </tr>
                            <?php }elseif ($_SESSION['level'] == 'Petugas') { 
                            $id_petugas = $_SESSION['id_petugas'];
                            $sql = mysqli_query($koneksi,"SELECT * FROM petugas WHERE id='$id_petugas'");
                            $data = mysqli_fetch_assoc($sql);
                            ?>
                            <tr>
                                <td>Username</td>
                                <td>:</td>
                                <td><?php echo $data['username']; ?></td>
                            </tr>
                            
                            <tr>
                                <td>Level</td>
                                <td>:</td>
                                <td><?php echo $data['level']; ?></td>
                            </tr>
                            <tr>
                                <td>No Handphone</td>
                                <td>:</td>
                                <td><?php echo $data['telp']; ?></td>
                            </tr>
                            <?php } ?>
                        </table>
                        <button type="button" class="btn btn-danger btn-sm mb-2 float-right" data-toggle="modal" data-target="#mymodal"><i class="fa fa-lock"></i> Ganti Password</button> 
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
                    <h5 class="modal-title">Ganti Password</h5>
                </div>
                <div class="modal-body">
                    <form method="post" action="edit_password.php">
                        <?php if ($_SESSION['level'] == 'Siswa') { ?>
                        <input type="hidden" name="nis" value="<?php echo $nis; ?>">
                        <?php }elseif ($_SESSION['level'] == 'Petugas') { ?>
                        <input type="hidden" name="id" value="<?php echo $id_petugas; ?>">
                        <?php } ?>
                        <div class="form-group">
                            <label >Password Lama</label>
                            <input type="password" name="pass_lama" class="form-control" required="required" autofocus placeholder="Masukkan Pasword Lama">
                        </div>                                            
                        <div class="form-group">
                            <label >Password Baru</label>
                            <input type="password" name="pass_baru" class="form-control" required="required" placeholder="Masukkan Pasword Baru">
                        </div> 
                        <input type="submit" name="submit" class="btn btn-primary btn-sm float-right" value="Ganti Password">                           
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php 
include 'footer.php';
} ?>