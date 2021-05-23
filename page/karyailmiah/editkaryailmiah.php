<?php

$id = $_GET['id'];

$sql = $koneksi->query("SELECT * FROM tb_karyailmiah WHERE id='$id'");

$tampil = $sql->fetch_assoc();

?>

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
                            <li class="breadcrumb-item"><a href="?page=karyailmiah">Karya Ilmiah</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pengeditan Karya Ilmiah</li>
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
                    <h3 class="mb-0">Pengeditan Karya Ilmiah</h3>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header border-0">
                                    <h4 class="mb-0">Silahkan Edit Data Karya Ilmiah Yang Telah Anda Ajukan</h4>
                                </div>
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="">Judul</label>
                                            <div class="input-group input-group-merge input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-align-center"></i></span>
                                                </div>
                                                <input name="judul" class="form-control" value="<?= $tampil['judul']; ?>" type="text" required autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">File</label>
                                            <div class="input-group input-group-merge input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-folder-17"></i></span>
                                                </div>
                                                <input name="file" class="form-control" placeholder="Upload File Baru Jika Ingin Mengganti File Yang Telah Diupload" type="text" onfocus="(this.type='file')">
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <a href="?page=karyailmiah" class="btn btn-danger mt-4">Batal</a>
                                            <button type="submit" name="edit" class="btn btn-success mt-4">Edit Karya Ilmiah</button>
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

    $judul = $_POST['judul'];
    $file = $_FILES['file'];

    $namafile = $file["name"];
    $namatmpfile = $file["tmp_name"];

    if (!empty($namatmpfile)) {
        move_uploaded_file($file["tmp_name"], "karyailmiah/" . $file["name"]);

        $sql = $koneksi->query("UPDATE tb_karyailmiah SET judul='$judul', file='$namafile' WHERE id='$id'");

        if ($sql) {
?>
            <script>
                alert('Karya Ilmiah Berhasil Diedit, Silahkan Menunggu Persetujuan Dari Pembina !');
                window.location.href = "?page=karyailmiah";
            </script>
        <?php
        }
    } else {
        $sql = $koneksi->query("UPDATE tb_karyailmiah SET judul='$judul' WHERE id='$id'");

        if ($sql) {
        ?>
            <script>
                alert('Karya Ilmiah Berhasil Diedit, Silahkan Menunggu Persetujuan Dari Pembina !');
                window.location.href = "?page=karyailmiah";
            </script>
<?php
        }
    }
}

?>