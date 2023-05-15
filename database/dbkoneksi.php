<?php

$host = 'localhost';
$pass = '';
$user = 'root';
$db   = 'db_toko_motor';

$pdo = new PDO('mysql:host=' . $host . ';dbname=' . $db . '', $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$listMotor = $pdo->query("SELECT motor.*,tipe_motor.tipe_motor, merk.nama_merk FROM motor INNER JOIN tipe_motor ON motor.tipe_motor_id = tipe_motor.id INNER JOIN merk ON motor.merk_id = merk.id GROUP BY motor.id ORDER BY motor.id DESC")->fetchAll(PDO::FETCH_ASSOC);
$listTipe = $pdo->query("SELECT * FROM tipe_motor")->fetchAll(PDO::FETCH_ASSOC);
$listMerk = $pdo->query("SELECT * FROM merk")->fetchAll(PDO::FETCH_ASSOC);
$listPesanan = $pdo->query("SELECT pesanan.*,motor.nama_motor FROM pesanan INNER JOIN motor ON pesanan.motor_id = motor.id ORDER BY pesanan.id DESC")->fetchAll(PDO::FETCH_ASSOC);
