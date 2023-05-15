<?php include_once "../../templates/header.php"; ?>
<?php

if (isset($_POST['tambah'])) {
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $motor_id = $_POST['motor_id'];
    $quantity = $_POST['quantity'];

    $tambahPesanan = $pdo->prepare("INSERT INTO pesanan (nama_pelanggan, alamat_pelanggan, motor_id, quantity) VALUES ('$nama_pelanggan', '$alamat', '$motor_id', '$quantity')")->execute();

    if ($tambahPesanan) {
        echo "<script>alert('Pesanan Berhasil Ditambahkan');window.location.href='list.php';</script>";
    }
}

?>

<div class="row-cols-md-2">
    <div class="container mb-5">
        <div class="card">
            <div class="container-fluid px-5 py-2">
                <h2 class="py-4 text-center fw-bolder">Tambah Pesanan</h2>
                <form action="" method="POST">

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="nama" name="nama_pelanggan" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="motor" class="form-label">Motor</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="motor_id" required>
                            <option selected value="">Pilih Motor</option>
                            <?php foreach ($listMotor as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['nama_motor']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" required>
                    </div>

                    <div class=" modal-footer my-4">
                        <a href="tipe-motor.php" type="button" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-dark ms-2" name="tambah">Tambah Pesanan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once "../../templates/footer.php"; ?>