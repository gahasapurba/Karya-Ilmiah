<?php error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); ?>

<?php

$koneksi = new mysqli("localhost", "u969920341_karyailmiah", "Karyailmiah123456", "u969920341_karyailmiah");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="assets2/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets2/css/style.css">
</head>

<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Registration</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="nim"><i class="zmdi zmdi-assignment zmdi-hc-2x"></i></label>
                                <input type="text" name="nim" id="nim" placeholder="Masukkan NIM Anda" required />
                            </div>
                            <div class="form-group">
                                <label for="nama"><i class="zmdi zmdi-account zmdi-hc-2x"></i></label>
                                <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Anda" required />
                            </div>
                            <div class="form-group">
                                <label for="prodi"><i class="zmdi zmdi-graduation-cap zmdi-hc-2x"></i></label>
                                <input type="text" name="prodi" id="prodi" placeholder="Prodi, Contoh : D4 TRPL, S1 TE" required />
                                <!-- <select name="prodi" id="prodi" required>
                                    <option value="">Pilih Prodi Anda</option>
                                    <option value="D3 Teknologi Komputer">D3 Teknologi Komputer</option>
                                    <option value="D3 Teknologi Informasi">D3 Teknologi Informasi</option>
                                    <option value="D4 Teknologi Rekayasa Perangkat Lunak">D4 Teknologi Rekayasa Perangkat Lunak</option>
                                    <option value="S1 Informatika">S1 Informatika</option>
                                    <option value="S1 Sistem Informasi">S1 Sistem Informasi</option>
                                    <option value="S1 Teknik Elektro">S1 Teknik Elektro</option>
                                    <option value="S1 Manajemen Rekayasa">S1 Manajemen Rekayasa</option>
                                    <option value="S1 Teknik Bioproses">S1 Teknik Bioproses</option>
                                </select> -->
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin"><i class="zmdi zmdi-male-female zmdi-hc-2x"></i></label>
                                <input type="text" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin,(Laki-laki /Perempuan)" required />
                                <!-- <select name="jenis_kelamin" id="jenis_kelamin" required>
                                    <option value="">Pilih Jenis Kelamin Anda</option>
                                    <option value="Laki - laki">Laki - laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select> -->
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir"><i class="zmdi zmdi-calendar zmdi-hc-2x"></i></label>
                                <input type="text" onfocus="(this.type='date')" name="tanggal_lahir" id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir Anda" required />
                            </div>
                            <div class="form-group">
                                <label for="alamat"><i class="zmdi zmdi-pin zmdi-hc-2x"></i></label>
                                <input type="text" name="alamat" id="alamat" placeholder="Masukkan Alamat Anda" required />
                            </div>
                            <div class="form-group">
                                <label for="motivasi"><i class="zmdi zmdi-mood zmdi-hc-2x"></i></label>
                                <input type="text" name="motivasi" id="motivasi" placeholder="Masukkan Motivasi Anda" required />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="register" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="assets2/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">Sudah Menjadi Anggota ? <br> Silahkan Login</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="assets2/vendor/jquery/jquery.min.js"></script>
    <script src="assets2/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>

<?php

if (isset($_POST['register'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $motivasi = $_POST['motivasi'];

    $sql = $koneksi->query("INSERT INTO tb_user (nim, nama, prodi, jenis_kelamin, tanggal_lahir, alamat, motivasi, role)VALUES('$nim', '$nama', '$prodi', '$jenis_kelamin', '$tanggal_lahir', '$alamat', '$motivasi' , 'Mahasiswa')");

    if ($sql) {
?>
        <script>
            alert('Registrasi Berhasil, Silahkan Menunggu Konfirmasi Untuk Mendapat Username dan Password !');
            window.location.href = "registrasi.php";
        </script>
<?php
    }
}

?>