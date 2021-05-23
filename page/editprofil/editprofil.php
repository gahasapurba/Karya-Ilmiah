<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Edit Profil</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Menu</a></li>
                            <li class="breadcrumb-item"><a href="?page=editprofil">Edit Profil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pengeditan Profil Diri</li>
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
                    <h3 class="mb-0">Pengeditan Profil Diri</h3>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header border-0">
                                    <h4 class="mb-0">Silahkan Edit Data Profil Anda</h4>
                                </div>
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="">Nama</label>
                                            <div class="input-group input-group-merge input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                                </div>
                                                <input name="nama" class="form-control" value="<?= $nama_user; ?>" type="text" required autofocus>
                                            </div>
                                        </div>

                                        <?php
                                        if ($_SESSION['Mahasiswa']) {
                                        ?>
                                            <div class="form-group">
                                                <label for="">Prodi</label>
                                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                                    </div>
                                                    <select class="form-control" name="prodi" required>
                                                        <option value="">Pilih Prodi Anda</option>
                                                        <option value="D3 TK" <?php if ($prodi_user == "D3 TK") {
                                                                                    echo "selected";
                                                                                } ?>>D3 Teknologi Komputer</option>
                                                        <option value="D3 TI" <?php if ($prodi_user == "D3 TI") {
                                                                                    echo "selected";
                                                                                } ?>>D3 Teknologi Informasi</option>
                                                        <option value="D4 TRPL" <?php if ($prodi_user == "D4 TRPL") {
                                                                                    echo "selected";
                                                                                } ?>>D4 Teknologi Rekayasa Perangkat Lunak</option>
                                                        <option value="S1 IF" <?php if ($prodi_user == "S1 IF") {
                                                                                    echo "selected";
                                                                                } ?>>S1 Informatika</option>
                                                        <option value="S1 SI" <?php if ($prodi_user == "S1 SI") {
                                                                                    echo "selected";
                                                                                } ?>>S1 Sistem Informasi</option>
                                                        <option value="S1 TE" <?php if ($prodi_user == "S1 TE") {
                                                                                    echo "selected";
                                                                                } ?>>S1 Teknik Elektro</option>
                                                        <option value="S1 MR" <?php if ($prodi_user == "S1 MR") {
                                                                                    echo "selected";
                                                                                } ?>>S1 Manajemen Rekayasa</option>
                                                        <option value="S1 TB" <?php if ($prodi_user == "S1 TB") {
                                                                                    echo "selected";
                                                                                } ?>>S1 Teknik Bioproses</option>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <div class="form-group">
                                            <label for="">Jenis Kelamin</label>
                                            <div class="input-group input-group-merge input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                                </div>
                                                <select class="form-control" name="jenis_kelamin" required>
                                                    <option value="">Pilih Jenis Kelamin Anda</option>
                                                    <option value="Laki-laki" <?php if ($jenis_kelamin_user == "Laki-laki") {
                                                                                    echo "selected";
                                                                                } ?>>Laki - laki</option>
                                                    <option value="Perempuan" <?php if ($jenis_kelamin_user == "Perempuan") {
                                                                                    echo "selected";
                                                                                } ?>>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tanggal Lahir</label>
                                            <div class="input-group input-group-merge input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input name="tanggal_lahir" class="form-control" value="<?= $tanggal_lahir_user; ?>" type="date" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <div class="input-group input-group-merge input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-square-pin"></i></span>
                                                </div>
                                                <textarea name="alamat" class="form-control" rows="10" required><?= $alamat_user; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Foto Profil</label><br>
                                            <img id="output" src="profileimages/<?= $avatar_user; ?>" class="elevation-5 img-fluid rounded" style="width: 200px"><br><br>
                                            <div class="input-group input-group-merge input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-image"></i></span>
                                                </div>
                                                <input type="text" onfocus="(this.type='file')" accept="image/*" onchange="loadFile(event)" class="form-control" placeholder="Edit Foto Profil" name="avatar">
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <a href="index.php" class="btn btn-danger mt-4">Batal</a>
                                            <button type="submit" name="edit" class="btn btn-success mt-4">Edit Profil</button>
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

<?php

if (isset($_POST['edit'])) {
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];

    $avatar = $_FILES['avatar']['name'];
    $lokasi = $_FILES['avatar']['tmp_name'];

    if (!empty($lokasi)) {
        $upload = move_uploaded_file($lokasi, "profileimages/" . $avatar);

        $sql = $koneksi->query("UPDATE tb_user SET nama='$nama', prodi='$prodi', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', alamat='$alamat', avatar='$avatar' WHERE id='$id_user'");

        if ($sql) {
?>
            <script>
                alert('Edit Profil Berhasil !');
                window.location.href = "index.php";
            </script>
        <?php
        }
    } else {
        $sql = $koneksi->query("UPDATE tb_user SET nama='$nama', prodi='$prodi', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', alamat='$alamat' WHERE id='$id_user'");

        if ($sql) {
        ?>
            <script>
                alert('Edit Profil Berhasil !');
                window.location.href = "index.php";
            </script>
<?php
        }
    }
}

?>

<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>