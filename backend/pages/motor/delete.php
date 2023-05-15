<?php

include_once "../../../database/dbkoneksi.php";

$id = $_GET['id'];
$hapusMotor = $pdo->prepare("DELETE FROM motor WHERE id = $id")->execute();

if ($hapusMotor) {
    echo "<script>alert('Motor Berhasil Dihapus');window.location.href='list.php';</script>";
}
