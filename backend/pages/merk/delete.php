<?php

include_once "../../../database/dbkoneksi.php";

$id = $_GET['id'];
$hapusMerk = $pdo->prepare("DELETE FROM merk WHERE id = $id")->execute();

if ($hapusMerk) {
    echo "<script>alert('Merk Berhasil Dihapus');window.location.href='list.php';</script>";
}
