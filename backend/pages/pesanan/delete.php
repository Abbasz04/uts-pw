<?php

include_once "../../../database/dbkoneksi.php";

$id = $_GET['id'];
$hapusPesanan = $pdo->prepare("DELETE FROM pesanan WHERE id = $id")->execute();

if ($hapusPesanan) {
    echo "<script>alert('Pesanan Berhasil Dihapus');window.location.href='list.php';</script>";
}
