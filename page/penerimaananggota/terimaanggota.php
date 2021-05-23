<?php

$id = $_GET['id'];

$sql = $koneksi->query("SELECT * FROM tb_user WHERE id='$id'");

$tampil = $sql->fetch_assoc();

$nama_penerima = $tampil['nama'];

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
                            <li class="breadcrumb-item active" aria-current="page">Konfirmasi Anggota Yang Diterima</li>
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
                    <h3 class="mb-0">Konfirmasi Anggota Yang Diterima</h3>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header border-0">
                                    <h4 class="mb-0">Silahkan Masukkan Username dan Password Mahasiswa Yang Telah Diterima Agar Dapat Login Ke Sistem</h4>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="">Username</label>
                                            <div class="input-group input-group-merge input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                                </div>
                                                <input name="username" class="form-control" placeholder="Masukkan Username Anggota" type="text" required autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <div class="input-group input-group-merge input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-key-25"></i></span>
                                                </div>
                                                <input name="password" class="form-control" placeholder="Masukkan Password Anggota" type="password" required>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <a href="?page=penerimaananggota" class="btn btn-danger mt-4">Batal</a>
                                            <button type="submit" name="simpan" class="btn btn-success mt-4">Daftarkan</button>
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

if (isset($_POST['simpan'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql1 = $koneksi->query("UPDATE tb_user SET username='$username', password='$password' WHERE id='$id'");
    $sql2 = $koneksi->query("INSERT INTO tb_notifikasi (isi, penerima)VALUES('Selamat Datang di Klub Karya Ilmiah ! Kamu Berhasil Diterima di Klub Ini, Silahkan Upload Karya Ilmiah Mu Kapanpun Kamu Mau !', '$nama_penerima')");

    if ($sql1 && $sql2) {
?>
        <script>
            alert('Mahasiswa Telah Resmi Didaftarkan Menjadi Anggota ! Silahkan Berikan Username dan Password Agar Mahasiswa Tersebut Dapat Masuk Ke Sistem !');
            window.location.href = "?page=penerimaananggota";
        </script>
<?php
    }
}

?>