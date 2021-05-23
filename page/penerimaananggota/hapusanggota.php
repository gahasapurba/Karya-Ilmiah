<?php

$id = $_GET['id'];
$nim = $_GET['nim'];
$nama = $_GET['nama'];

$koneksi->query("DELETE FROM tb_user WHERE id='$id'");
$koneksi->query("DELETE FROM tb_karyailmiah WHERE nim='$nim'");
$koneksi->query("DELETE FROM tb_notifikasi WHERE penerima='$nama'");

?>

<script>
    alert('Anggota Berhasil Dikeluarkan !');
    window.location.href = "?page=penerimaananggota";
</script>