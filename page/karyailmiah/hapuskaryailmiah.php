<?php

$id = $_GET['id'];

$koneksi->query("DELETE FROM tb_karyailmiah WHERE id='$id'");

?>

<script>
    alert('Karya Ilmiah Berhasil Dihapus !');
    window.location.href = "?page=karyailmiah";
</script>