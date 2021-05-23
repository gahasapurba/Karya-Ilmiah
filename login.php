<?php error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); ?>

<?php

ob_start();

session_start();

$koneksi = new mysqli("localhost", "u969920341_karyailmiah", "Karyailmiah123456", "u969920341_karyailmiah");

if ($_SESSION['Admin'] || $_SESSION['Mahasiswa']) {
    header("location:index.php");
} else {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>

        <!-- Font Icon -->
        <link rel="stylesheet" href="assets2/fonts/material-icon/css/material-design-iconic-font.min.css">

        <!-- Main css -->
        <link rel="stylesheet" href="assets2/css/style.css">
    </head>

    <body>

        <div class="main">

            <!-- Sing in  Form -->
            <section class="sign-in">
                <div class="container">
                    <div class="signin-content">
                        <div class="signin-image">
                            <figure><img src="assets2/images/signin-image.jpg" alt="sing up image"></figure>
                            <a href="registrasi.php" class="signup-image-link">Belum Menjadi Anggota ? <br> Silahkan Registrasi</a>
                        </div>

                        <div class="signin-form">
                            <h2 class="form-title">Login</h2>
                            <form method="POST" class="register-form" id="login-form">
                                <div class="form-group">
                                    <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                    <input type="text" name="username" id="your_name" placeholder="Masukkan Username Anda" required />
                                </div>
                                <div class="form-group">
                                    <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                    <input type="password" name="password" id="your_pass" placeholder="Masukkan Password Anda" required />
                                </div>
                                <div class="form-group form-button">
                                    <input type="submit" name="login" id="signin" class="form-submit" value="Login" />
                                </div>
                            </form>
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

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = $koneksi->query("SELECT * FROM tb_user WHERE username='$username' AND password='$password'");

        $data = $sql->fetch_assoc();

        $ketemu = $sql->num_rows;

        if ($ketemu >= 1) {
            session_start();
            if ($data['role'] == "Admin") {
                $_SESSION['Admin'] = $data['id'];
                header("location:index.php");
            } else if ($data['role'] == "Mahasiswa") {
                $_SESSION['Mahasiswa'] = $data['id'];
                header("location:index.php");
            }
        } else {
    ?>
            <script>
                alert("Username / Password Salah, Silahkan Login Kembali !");
            </script>
<?php
        }
    }
}

?>