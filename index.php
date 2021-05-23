<?php error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); ?>

<?php

session_start();

if ($_SESSION['Admin'] || $_SESSION['Mahasiswa']) {

    $koneksi = new mysqli("localhost", "u969920341_karyailmiah", "Karyailmiah123456", "u969920341_karyailmiah");

?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
        <meta name="author" content="Creative Tim">
        <title>Karya Ilmiah</title>
        <!-- Favicon -->
        <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
        <!-- Icons -->
        <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
        <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
        <!-- Page plugins -->
        <!-- Argon CSS -->
        <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
    </head>

    <?php

    if ($_SESSION['Admin']) {
        $user = $_SESSION['Admin'];
    } else if ($_SESSION['Mahasiswa']) {
        $user = $_SESSION['Mahasiswa'];
    }

    $sql = $koneksi->query("SELECT * FROM tb_user WHERE id='$user'");

    $data = $sql->fetch_assoc();

    $id_user = $data['id'];
    $nim_user = $data['nim'];
    $nama_user = $data['nama'];
    $prodi_user = $data['prodi'];
    $jenis_kelamin_user = $data['jenis_kelamin'];
    $tanggal_lahir_user = $data['tanggal_lahir'];
    $alamat_user = $data['alamat'];
    $avatar_user = $data['avatar'];
    $role_user = $data['role'];

    ?>

    <body>
        <!-- Sidenav -->
        <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
            <div class="scrollbar-inner">
                <!-- Brand -->
                <div class="sidenav-header  align-items-center">
                    <a class="navbar-brand" href="index.php">
                        <img src="assets/img/brand/itdel.png" class="navbar-brand-img">
                        Karya Ilmiah
                    </a>
                </div>
                <div class="navbar-inner">
                    <!-- Collapse -->
                    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">
                                    <i class="ni ni-tv-2 text-primary"></i>
                                    <span class="nav-link-text">Dashboard</span>
                                </a>
                            </li>
                        </ul>
                        <!-- Divider -->
                        <hr class="my-3">
                        <!-- Heading -->
                        <h6 class="navbar-heading p-0 text-muted">
                            <span class="docs-normal">Menu</span>
                        </h6>
                        <!-- Nav items -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="?page=karyailmiah">
                                    <i class="ni ni-book-bookmark text-orange"></i>
                                    <span class="nav-link-text">Karya Ilmiah</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?page=pengumuman">
                                    <i class="ni ni-notification-70 text-primary"></i>
                                    <span class="nav-link-text">Pengumuman</span>
                                </a>
                            </li>
                            <?php
                            if ($_SESSION['Mahasiswa']) {
                            ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="?page=notifikasi">
                                        <i class="ni ni-bell-55 text-blue"></i>
                                        <span class="nav-link-text">Notifikasi</span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                        <!-- Divider -->
                        <hr class="my-3">
                        <!-- Heading -->
                        <h6 class="navbar-heading p-0 text-muted">
                            <span class="docs-normal">User Management</span>
                        </h6>
                        <!-- Nav items -->
                        <ul class="navbar-nav">
                            <?php
                            if ($_SESSION['Admin']) {
                            ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="?page=penerimaananggota">
                                        <i class="ni ni-circle-08 text-pink"></i>
                                        <span class="nav-link-text">Anggota</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <li class="nav-item">
                                <a class="nav-link" href="?page=editprofil">
                                    <i class="ni ni-single-02 text-yellow"></i>
                                    <span class="nav-link-text">Edit Profil</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Main content -->
        <div class="main-content" id="panel">
            <!-- Topnav -->
            <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Navbar links -->
                        <ul class="navbar-nav align-items-center  ml-md-auto ">
                            <li class="nav-item d-xl-none">
                                <!-- Sidenav toggler -->
                                <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                                    <div class="sidenav-toggler-inner">
                                        <i class="sidenav-toggler-line"></i>
                                        <i class="sidenav-toggler-line"></i>
                                        <i class="sidenav-toggler-line"></i>
                                    </div>
                                </div>
                            </li>
                            <?php
                            if ($_SESSION['Mahasiswa']) {
                            ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ni ni-bell-55"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                                        <?php

                                        $sql1 = $koneksi->query("SELECT * FROM tb_notifikasi WHERE penerima='$nama_user'");
                                        $jumlah_notifikasi = mysqli_num_rows($sql1);

                                        $sql2 = $koneksi->query("SELECT * FROM tb_notifikasi WHERE penerima='$nama_user' ORDER BY id DESC LIMIT 5");

                                        ?>
                                        <!-- Dropdown header -->
                                        <div class="px-3 py-3">
                                            <h6 class="text-sm text-muted m-0">Kamu Mempunyai <strong class="text-primary"><?= $jumlah_notifikasi; ?></strong> Notifikasi.</h6>
                                        </div>
                                        <!-- List group -->
                                        <div class="list-group list-group-flush">
                                            <?php
                                            while ($data = $sql2->fetch_assoc()) {
                                            ?>
                                                <a href="?page=notifikasi" class="list-group-item list-group-item-action">
                                                    <div class="row align-items-center">
                                                        <div class="col ml--2">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div>
                                                                    <h4 class="mb-0 text-sm">Administrator</h4>
                                                                </div>
                                                                <div class="text-right text-muted">
                                                                    <small><?= $data['waktu_kirim']; ?></small>
                                                                </div>
                                                            </div>
                                                            <p class="text-sm mb-0"><?= $data['isi']; ?></p>
                                                        </div>
                                                    </div>
                                                </a>
                                            <?php } ?>
                                        </div>
                                        <!-- View all -->
                                        <a href="?page=notifikasi" class="dropdown-item text-center text-primary font-weight-bold py-3">Lihat Semua</a>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                        <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                            <li class="nav-item dropdown">
                                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="media align-items-center">
                                        <span class="avatar avatar-sm rounded-circle">
                                            <img alt="Image placeholder" src="profileimages/<?= $avatar_user ?>">
                                        </span>
                                        <div class="media-body  ml-2  d-none d-lg-block">
                                            <span class="mb-0 text-sm  font-weight-bold"><?= $nama_user; ?></span>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu  dropdown-menu-right ">
                                    <div class="dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Hai, <?= $nama_user; ?> !</h6>
                                    </div>
                                    <a href="?page=editprofil" class="dropdown-item">
                                        <i class="ni ni-single-02"></i>
                                        <span>Profil</span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="logout.php" class="dropdown-item" onclick="return confirm('Apakah Anda Yakin Ingin Logout ?');">
                                        <i class="ni ni-user-run"></i>
                                        <span>Logout</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <?php

            $page = $_GET['page'];
            $aksi = $_GET['aksi'];

            if ($page == "karyailmiah") {
                if ($aksi == "") {
                    include "page/karyailmiah/karyailmiah.php";
                } else if ($aksi == "tambah") {
                    include "page/karyailmiah/tambahkaryailmiah.php";
                } else if ($aksi == "edit") {
                    include "page/karyailmiah/editkaryailmiah.php";
                } else if ($aksi == "hapus") {
                    include "page/karyailmiah/hapuskaryailmiah.php";
                } else if ($aksi == "terima") {
                    include "page/karyailmiah/terimakaryailmiah.php";
                } else if ($aksi == "tolak") {
                    include "page/karyailmiah/tolakkaryailmiah.php";
                }
            } else if ($page == "pengumuman") {
                if ($aksi == "") {
                    include "page/pengumuman/pengumuman.php";
                } else if ($aksi == "tambah") {
                    include "page/pengumuman/tambahpengumuman.php";
                } else if ($aksi == "edit") {
                    include "page/pengumuman/editpengumuman.php";
                } else if ($aksi == "hapus") {
                    include "page/pengumuman/hapuspengumuman.php";
                } else if ($aksi == "detail") {
                    include "page/pengumuman/detailpengumuman.php";
                }
            } else if ($page == "penerimaananggota") {
                if ($aksi == "") {
                    include "page/penerimaananggota/penerimaananggota.php";
                } else if ($aksi == "detail") {
                    include "page/penerimaananggota/detailpenerimaananggota.php";
                } else if ($aksi == "terima") {
                    include "page/penerimaananggota/terimaanggota.php";
                } else if ($aksi == "tolak") {
                    include "page/penerimaananggota/tolakanggota.php";
                } else if ($aksi == "hapus") {
                    include "page/penerimaananggota/hapusanggota.php";
                }
            } else if ($page == "notifikasi") {
                if ($aksi == "") {
                    include "page/notifikasi/notifikasi.php";
                } else if ($aksi == "hapus") {
                    include "page/notifikasi/hapusnotifikasi.php";
                }
            } else if ($page == "editprofil") {
                if ($aksi == "") {
                    include "page/editprofil/editprofil.php";
                }
            } else if ($page == "") {
                include "home.php";
            }

            ?>

        </div>
        <!-- Argon Scripts -->
        <!-- Core -->
        <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/js-cookie/js.cookie.js"></script>
        <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
        <!-- Optional JS -->
        <script src="assets/vendor/clipboard/dist/clipboard.min.js"></script>
        <!-- Argon JS -->
        <script src="assets/js/argon.js?v=1.2.0"></script>
    </body>

    </html>

<?php

} else {
    header("location:login.php");
}

?>