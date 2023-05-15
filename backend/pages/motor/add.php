<?php include_once "../../templates/header.php"; ?>
<?php

if (isset($_POST['add'])) {
    $nama_motor = $_POST['nama_motor'];
    $cc = $_POST['cc'];
    $tipe_motor_id = $_POST['tipe_motor_id'];
    $harga = $_POST['harga'];
    $merk_id = $_POST['merk_id'];
    $stok = $_POST['stok'];

    $query = "INSERT INTO motor (nama_motor, cc, tipe_motor_id, harga, merk_id, stok) VALUES ('$nama_motor', '$cc', '$tipe_motor_id', '$harga', '$merk_id', '$stok')";

    $tambahMotor = $pdo->prepare("$query")->execute();

    if ($tambahMotor) {
        echo "<script>alert('Motor Berhasil Ditambahkan');window.location.href='list.php';</script>";
    }
}

?>

<div class="row-cols-md-2">
    <div class="container mb-5">
        <div class="card">
            <div class="container-fluid px-5 py-2">
                <h2 class="py-4 text-center fw-bolder">Tambah Motor</h2>
                <form action="" method="POST">

                    <div class="mb-3">
                        <label for="nama_motor" class="form-label">Nama Motor</label>
                        <input type="text" class="form-control" id="nama_motor" name="nama_motor" required>
                    </div>

                    <div class="mb-3">
                        <label for="cc" class="form-label">CC</label>
                        <input type="text" class="form-control" id="cc" name="cc" required>
                    </div>

                    <div class="mb-3">
                        <label for="tipe_motor" class="form-label">Tipe Motor</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="tipe_motor_id" required>
                            <option selected value="">Pilih Tipe Motor</option>
                            <?php foreach ($listTipe as $tm) : ?>
                                <option value="<?= $tm['id']; ?>"><?= $tm['tipe_motor']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" min="0" class="form-control" id="harga" name="harga" required>
                    </div>

                    <div class="mb-3">
                        <label for="merk" class="form-label">Merk</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="merk_id" required>
                            <option selected value="">Pilih Merk</option>
                            <?php foreach ($listMerk as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['nama_merk']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" min="0" class="form-control" id="stok" name="stok" required>
                    </div>

                    <div class=" modal-footer my-4">
                        <a href="list.php" type="button" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-dark ms-2" name="add">Tambah Motor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once "../../templates/footer.php"; ?>