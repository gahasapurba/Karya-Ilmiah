<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Notifikasi</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Menu</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Notifikasi</li>
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
                    <h3 class="mb-0">List Notifikasi</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header border-0">
                                    <h4 class="mb-0">Berikut Notifikasi Diurutkan Mulai Dari Yang Terbaru</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="text-center">No</th>
                                                <th scope="col" class="text-center">Isi</th>
                                                <th scope="col" class="text-center">Waktu Pengiriman</th>
                                                <th scope="col" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            <?php
                                            $no = 1;

                                            $sql = $koneksi->query("SELECT * FROM tb_notifikasi WHERE penerima='$nama_user' ORDER BY id DESC");

                                            while ($data = $sql->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <?= $no++; ?>
                                                    </td>
                                                    <td>
                                                        <?= $data['isi']; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?= $data['waktu_kirim']; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="?page=notifikasi&aksi=hapus&id=<?= $data['id']; ?>" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Notifikasi Ini ?');">Hapus</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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