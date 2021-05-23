<?php

$id = $_GET['id'];

$koneksi->query("DELETE FROM tb_user WHERE id='$id'");

?>

<script>
    alert('Mahasiswa Ditolak Untuk Menjadi Anggota !');
    window.location.href = "?page=penerimaananggota";
</script>