<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Pengumuman</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Menu</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pengumuman</li>
                        </ol>
                    </nav>
                </div>
                <?php
                if ($_SESSION['Admin']) {
                ?>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="?page=pengumuman&aksi=tambah" class="btn btn-default">Buat Pengumuman</a>
                    </div>
                <?php } ?>
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
                    <h3 class="mb-0">List Pengumuman</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header border-0">
                                    <?php
                                    if ($_SESSION['Admin']) {
                                    ?>
                                        <h4 class="mb-0">Berikut Daftar Pengumuman Yang Anda Buat</h4>
                                    <?php } else if ($_SESSION['Mahasiswa']) { ?>
                                        <h4 class="mb-0">Berikut Daftar Pengumuman Yang Ada</h4>
                                    <?php } ?>
                                </div>
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="text-center">No</th>
                                                <th scope="col" class="text-center">Judul</th>
                                                <th scope="col" class="text-center">Waktu Pengiriman</th>
                                                <th scope="col" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            <?php
                                            $no = 1;
                                            $sql = $koneksi->query("SELECT * FROM tb_pengumuman");
                                            while ($data = $sql->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <?= $no++; ?>
                                                    </td>
                                                    <td>
                                                        <?= $data['judul']; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?= $data['waktu_pengiriman']; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php
                                                        if ($_SESSION['Admin']) {
                                                        ?>
                                                            <a href="?page=pengumuman&aksi=edit&id=<?= $data['id']; ?>" class="btn btn-outline-warning">Edit</a>
                                                            <a href="?page=pengumuman&aksi=hapus&id=<?= $data['id']; ?>" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Pengumuman Ini ?');">Hapus</a>
                                                        <?php } else if ($_SESSION['Mahasiswa']) { ?>
                                                            <a href="?page=pengumuman&aksi=detail&id=<?= $data['id']; ?>" class="btn btn-outline-info">Lihat Detail</a>
                                                        <?php } ?>
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