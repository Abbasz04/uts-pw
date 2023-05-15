<?php include_once "../../templates/header.php"; ?>
<?php
if (isset($_POST["tambah"])) {
    $name = $_POST["name"];

    $tambahTipeMotor = $pdo->prepare("INSERT INTO tipe_motor (tipe_motor) VALUES ('$name')")->execute();

    if ($tambahTipeMotor) {
        echo "<script>alert('Tipe Motor Berhasil Ditambahkan');window.location.href='list.php';</script>";
    }
}
?>

<div class="row-cols-md-2">
    <div class="container mb-5">
        <div class="card">
            <div class="container-fluid px-5 py-2">
                <h2 class="py-4 text-center fw-bolder">Tambah Tipe Motor</h2>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Tipe Motor</label>
                        <input type="text" class="form-control" id="nama" name="name" required>
                    </div>
                    <div class=" modal-footer my-4">
                        <a href="tipe-motor.php" type="button" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-dark ms-2" name="tambah">Tambah Tipe Motor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once "../../templates/footer.php"; ?>