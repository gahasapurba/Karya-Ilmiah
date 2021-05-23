<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Karya Ilmiah</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Menu</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Karya Ilmiah</li>
                        </ol>
                    </nav>
                </div>
                <?php
                if ($_SESSION['Mahasiswa']) {
                ?>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="?page=karyailmiah&aksi=tambah" class="btn btn-default">Ajukan Karya Ilmiah</a>
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
                    <h3 class="mb-0">List Karya Ilmiah</h3>
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
                                        <h4 class="mb-0">Silahkan Konfirmasi Karya Ilmiah Yang Diajukan</h4>
                                    <?php } else if ($_SESSION['Mahasiswa']) { ?>
                                        <h4 class="mb-0">Berikut Daftar Karya Ilmiah Yang Anda Ajukan</h4>
                                    <?php } ?>
                                </div>
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="text-center">No</th>
                                                <th scope="col" class="text-center">Judul</th>
                                                <th scope="col" class="text-center">Nama Pengirim</th>
                                                <th scope="col" class="text-center">NIM Pengirim</th>
                                                <th scope="col" class="text-center">Prodi Pengirim</th>
                                                <th scope="col" class="text-center">File</th>
                                                <th scope="col" class="text-center">Waktu Kirim</th>
                                                <th scope="col" class="text-center">Status</th>
                                                <th scope="col" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            <?php
                                            $no = 1;

                                            if ($_SESSION['Admin']) {
                                                $sql = $koneksi->query("SELECT * FROM tb_karyailmiah");
                                            } else if ($_SESSION['Mahasiswa']) {
                                                $sql = $koneksi->query("SELECT * FROM tb_karyailmiah WHERE nim='$nim_user'");
                                            }

                                            while ($data = $sql->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <?= $no++; ?>
                                                    </td>
                                                    <td>
                                                        <?= $data['judul']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $data['nama']; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?= $data['nim']; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?= $data['prodi']; ?>
                                                    </td>
                                                    <td>
                                                        <a href="karyailmiah/<?= $data['file']; ?>" target="_blank"><?= $data['file']; ?></a>
                                                    </td>
                                                    <td class="text-center">
                                                        <?= $data['waktu_kirim']; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?= $data['status']; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php
                                                        if ($_SESSION['Mahasiswa']) {
                                                        ?>

                                                            <?php if ($data['status'] == 'Menunggu' || $data['status'] == 'Diterima') { ?>
                                                                <a href="?page=karyailmiah&aksi=edit&id=<?= $data['id']; ?>" class="btn btn-outline-warning">Edit</a><br><br>
                                                            <?php } ?>

                                                        <?php } ?>

                                                        <?php
                                                        if ($_SESSION['Mahasiswa']) {
                                                        ?>

                                                            <?php if ($data['status'] == 'Menunggu') { ?>
                                                                <a href="?page=karyailmiah&aksi=hapus&id=<?= $data['id']; ?>" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda Yakin Ingin Membatalkan Pengiriman Karya Ilmiah Ini ?');">Batalkan</a>
                                                            <?php } ?>

                                                        <?php } ?>

                                                        <?php
                                                        if ($_SESSION['Admin']) {
                                                        ?>

                                                            <?php if ($data['status'] == 'Diterima' || $data['status'] == 'Ditolak') { ?>
                                                                <a href="?page=karyailmiah&aksi=hapus&id=<?= $data['id']; ?>" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Karya Ilmiah Ini ?');">Hapus</a>
                                                            <?php } ?>

                                                        <?php } ?>

                                                        <?php
                                                        if ($_SESSION['Admin']) {
                                                        ?>

                                                            <?php if ($data['status'] == 'Menunggu') { ?>
                                                                <a href="?page=karyailmiah&aksi=terima&id=<?= $data['id']; ?>&nama=<?= $data['nama']; ?>" class="btn btn-outline-success">Terima</a><br><br>
                                                                <a href="?page=karyailmiah&aksi=tolak&id=<?= $data['id']; ?>&nama=<?= $data['nama']; ?>" class="btn btn-outline-dark">Tolak</a>
                                                            <?php } ?>

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