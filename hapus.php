<?php
require_once "logic/function.php";
$id = $_GET['id'];
if (hapus($id) > 0) {
    echo "<script>alert('Data Berhasil Dihapus');document.location.href='index.php'</script>";
} else {
    echo "<script>Data Gagal Dihapus;document.location.href='index.php'</script>";
}