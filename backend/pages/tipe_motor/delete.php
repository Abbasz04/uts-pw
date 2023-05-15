<?php

include_once "../../../database/dbkoneksi.php";

$id = $_GET['id'];
$hapusTipeMotor = $pdo->prepare("DELETE FROM tipe_motor WHERE id = $id")->execute();

if ($hapusTipeMotor) {
    echo "<script>alert('TipeMotor Berhasil Dihapus');window.location.href='list.php';</script>";
}
