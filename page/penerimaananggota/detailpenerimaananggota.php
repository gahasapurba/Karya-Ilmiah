<?php

$id = $_GET['id'];

$sql = $koneksi->query("SELECT * FROM tb_user WHERE id='$id'");

$tampil = $sql->fetch_assoc();

?>

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Penerimaan Anggota</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Menu</a></li>
                            <li class="breadcrumb-item"><a href="?page=penerimaananggota">Penerimaan Anggota</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Anggota Yang Mendaftar</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row justify-content-center">
        <div class=" col ">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h3 class="mb-0">Detail Anggota Yang Mendaftar Ilmiah</h3>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header border-0">
                                    <h4 class="mb-0">Silahkan Tentukan Apakah Mahasiswa Ini Diterima atau Ditolak Untuk Menjadi Anggota</h4>
                                </div>
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="">NIM</label>
                                            <div class="input-group input-group-merge input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                                </div>
                                                <input name="nim" class="form-control" value="<?= $tampil['nim']; ?>" type="text" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama</label>
                                            <div class="input-group input-group-merge input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                                </div>
                                                <input name="nama" class="form-control" value="<?= $tampil['nama']; ?>" type="text" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Prodi</label>
                                            <div class="input-group input-group-merge input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                                </div>
                                                <input name="prodi" class="form-control" value="<?= $tampil['prodi']; ?>" type="text" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Jenis Kelamin</label>
                                            <div class="input-group input-group-merge input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                                </div>
                                                <input name="jenis_kelamin" class="form-control" value="<?= $tampil['jenis_kelamin']; ?>" type="text" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tanggal Lahir</label>
                                            <div class="input-group input-group-merge input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input name="tanggal_lahir" class="form-control" value="<?= $tampil['tanggal_lahir']; ?>" type="date" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <div class="input-group input-group-merge input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-square-pin"></i></span>
                                                </div>
                                                <textarea name="alamat" class="form-control" rows="10" readonly><?= $tampil['alamat']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Motivasi</label>
                                            <div class="input-group input-group-merge input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-satisfied"></i></span>
                                                </div>
                                                <textarea name="motivasi" class="form-control" rows="10" readonly><?= $tampil['motivasi']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <a href="?page=penerimaananggota" class="btn btn-warning mt-4">Batal</a>
                                            <a href="?page=penerimaananggota&aksi=terima&id=<?= $id; ?>" class="btn btn-success mt-4">Terima</a>
                                            <a href="?page=penerimaananggota&aksi=tolak&id=<?= $id; ?>" class="btn btn-danger mt-4" onclick="return confirm('Apakah Anda Yakin Ingin Menolaknya Menjadi Anggota ?');">Tolak</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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