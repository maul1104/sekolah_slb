<?php 
include('../include/koneksi.php');

if ($_SESSION['id_users'] == NULL) {
  header('Location: '.$base_url.'admin/login.php');
}
include('../template/header.php');
include('../template/sidebar.php');

error_reporting(0);
 
$id_users = $_SESSION['id_users'];
$month  = date('m');
?>


<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Data Dashboard</h1>
        </div>

        <div class="section-body">
            <?php 
                if($_SESSION['hak_akses']  == 'admin'){?>
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Hallo !!</strong> Selamat Datang Admin
                    </div>
            <?php } ?>

            <?php 
                $query_laporan = "SELECT * FROM tbl_laporan_belajar WHERE MONTH(date_penilaian) = '$month' and id_users = $id_users";
                $result_laporan = mysqli_query($conn, $query_laporan);
                $jumlah_laporan = mysqli_num_rows($result_laporan); 
         
                ?>

            <?php if ($jumlah_laporan == 0) { ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Peringatan !!</strong> Segera lakukan penilaian pada bulan ini !!!
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <a href="">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Jumlah Guru</h4>
                        </div>
                        <?php 
                        $query_jumlah = "SELECT * FROM tbl_users where hak_akses = 'guru'";
                        $result_jumlah = mysqli_query($conn, $query_jumlah);
                        $jumlah = mysqli_num_rows($result_jumlah); ?>
                        <div class="card-body">
                            <?= $jumlah?>
                        </div> </a>
                    </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <a href="">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Data Murid</h4>
                        </div>
                        <?php 
                        $query_jumlah = "SELECT * FROM tbl_murid where status_murid = 'diterima'";
                        $result_jumlah = mysqli_query($conn, $query_jumlah);
                        $jumlah = mysqli_num_rows($result_jumlah); ?>
                        <div class="card-body">
                            <?= $jumlah?>
                        </div>
                    </div></a>
                    </div>
                </div>
                <!--<div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <a href="<?= $base_url ?>guru/data_konsultasi.php">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Jumlah Konsultasi</h4>
                        </div>
                        <?php 
                        $query_jumlah = "SELECT * FROM tbl_konsultasi where id_users = $id_users";
                        $result_jumlah = mysqli_query($conn, $query_jumlah);
                        $jumlah = mysqli_num_rows($result_jumlah); ?>
                        <div class="card-body">
                           <?= $jumlah?>
                        </div>
                    </div></a>
                    </div>
                </div>-->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <a href="<?= $base_url ?>guru/data_monitoring.php">
                        <i class="fas fa-bookmark"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Jumlah Monitoring</h4>
                        </div>
                        <?php 
                        $query_jumlah = "SELECT * FROM tbl_monitoring where id_users = $id_users";
                        $result_jumlah = mysqli_query($conn, $query_jumlah);
                        $jumlah = mysqli_num_rows($result_jumlah); ?>
                        <div class="card-body">
                        <?= $jumlah?>
                        </div>
                    </div></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php
include('../template/footer.php');
?>