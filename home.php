<?php

$sql1 = $koneksi->query("SELECT * FROM tb_karyailmiah WHERE nim='$nim_user' AND status='Diterima'");
$karyailmiahditerima = mysqli_num_rows($sql1);

$sql2 = $koneksi->query("SELECT * FROM tb_karyailmiah WHERE nim='$nim_user' AND status='Ditolak'");
$karyailmiahditolak = mysqli_num_rows($sql2);

$sql3 = $koneksi->query("SELECT * FROM tb_karyailmiah WHERE nim='$nim_user' AND status='Menunggu'");
$karyailmiahmenunggu = mysqli_num_rows($sql3);

$sql4 = $koneksi->query("SELECT * FROM tb_karyailmiah WHERE status='Diterima'");
$karyailmiah1 = mysqli_num_rows($sql4);

$sql5 = $koneksi->query("SELECT * FROM tb_karyailmiah WHERE status='Ditolak'");
$karyailmiah2 = mysqli_num_rows($sql5);

$sql6 = $koneksi->query("SELECT * FROM tb_karyailmiah WHERE status='Menunggu'");
$karyailmiah3 = mysqli_num_rows($sql6);

$sql7 = $koneksi->query("SELECT * FROM tb_user WHERE username != '' AND role='Mahasiswa'");
$jumlahanggota = mysqli_num_rows($sql7);

?>

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Selamat Datang, <?= $nama_user; ?> !</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                        </ol>
                    </nav>
                </div>
            </div>

            <?php
            if ($_SESSION['Admin']) {
            ?>

                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body" style="min-height: 120px">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Karya Ilmiah Diterima</h5>
                                        <span class="h1 font-weight-bold mb-0"><?= $karyailmiah1; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                            <i class="ni ni-ruler-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body" style="min-height: 120px">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Karya Ilmiah Ditolak</h5>
                                        <span class="h1 font-weight-bold mb-0"><?= $karyailmiah2; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                            <i class="ni ni-ruler-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body" style="min-height: 120px">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Karya Ilmiah Yang Menunggu Konfirmasi</h5>
                                        <span class="h1 font-weight-bold mb-0"><?= $karyailmiah3; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                            <i class="ni ni-ruler-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body" style="min-height: 120px">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Anggota</h5>
                                        <span class="h1 font-weight-bold mb-0"><?= $jumlahanggota; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                            <i class="ni ni-single-02"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>

            <?php
            if ($_SESSION['Mahasiswa']) {
            ?>

                <div class="row justify-content-center">
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body" style="min-height: 120px">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Karya Ilmiah Anda Yang Diterima</h5>
                                        <span class="h1 font-weight-bold mb-0"><?= $karyailmiahditerima; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                            <i class="ni ni-ruler-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body" style="min-height: 120px">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Karya Ilmiah Anda Yang Ditolak</h5>
                                        <span class="h1 font-weight-bold mb-0"><?= $karyailmiahditolak; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                            <i class="ni ni-ruler-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body" style="min-height: 120px">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Karya Ilmiah Anda Yang Menunggu Konfirmasi</h5>
                                        <span class="h1 font-weight-bold mb-0"><?= $karyailmiahmenunggu; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                            <i class="ni ni-ruler-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>

        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-12">
            <div class="card bg-default shadow">
                <div class="card-header bg-transparent border-0">
                    <h3 class="text-white mb-0">Berikut Karya Ilmiah Yang Diterima Untuk Ditampilkan Di Website Ini</h3>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-dark table-flush">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Judul</th>
                                <th scope="col" class="text-center">Foto & Nama Pengirim</th>
                                <th scope="col" class="text-center">NIM Pengirim</th>
                                <th scope="col" class="text-center">Prodi Pengirim</th>
                                <th scope="col" class="text-center">File</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            <?php
                            $no = 1;

                            $sql = $koneksi->query("SELECT * FROM tb_karyailmiah WHERE status='Diterima'");

                            while ($data = $sql->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td class="text-center">
                                        <?= $no++; ?>
                                    </td>
                                    <td>
                                        <?= $data['judul']; ?>
                                    </td>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <a href="#" class="avatar rounded-circle mr-3">
                                                <img src="profileimages/<?= $data['avatar']; ?>">
                                            </a>
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm"><?= $data['nama']; ?></span>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="text-center">
                                        <?= $data['nim']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $data['prodi']; ?>
                                    </td>
                                    <td>
                                        <a href="karyailmiah/<?= $data['file']; ?>" target="_blank"><?= $data['file']; ?></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-12">
                <div class="copyright text-center  text-lg-left  text-muted">
                    &copy; 2020 <a href="#" class="font-weight-bold ml-1">Kelompok-00 PA 1 D3 TI</a>
                </div>
            </div>
        </div>
    </footer>
</div>