<?php

$id = $_GET['id'];
$nama = $_GET['nama'];

$koneksi->query("UPDATE tb_karyailmiah SET status='Diterima' WHERE id='$id'");
$koneksi->query("INSERT INTO tb_notifikasi (isi, penerima)VALUES('Selamat, Karya Ilmiah Anda Diterima dan Sudah Ditampilkan Di Website !', '$nama')");

?>

<script>
    alert('Karya Ilmiah Diterima !');
    window.location.href = "?page=karyailmiah";
</script>