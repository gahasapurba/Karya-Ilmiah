<?php

$id = $_GET['id'];

$koneksi->query("DELETE FROM tb_notifikasi WHERE id='$id'");

?>

<script>
    alert('Notifikasi Berhasil Dihapus !');
    window.location.href = "?page=notifikasi";
</script>