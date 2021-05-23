<?php

$id = $_GET['id'];
$nama = $_GET['nama'];

$koneksi->query("UPDATE tb_karyailmiah SET status='Ditolak' WHERE id='$id'");
$koneksi->query("INSERT INTO tb_notifikasi (isi, penerima)VALUES('Maaf, Karya Ilmiah Anda Ditolak, Tetap Semangat !', '$nama')");

?>

<script>
    alert('Karya Ilmiah Ditolak !');
    window.location.href = "?page=karyailmiah";
</script>