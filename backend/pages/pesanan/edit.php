<?php include_once "../../templates/header.php"; ?>
<?php
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $motor_id = $_POST['motor_id'];
    $quantity = $_POST['quantity'];

    $editPesanan = $pdo->prepare("UPDATE pesanan SET nama_pelanggan = '$nama_pelanggan', alamat_pelanggan = '$alamat', motor_id = '$motor_id', quantity = '$quantity' WHERE id = $id")->execute();

    if ($editPesanan) {
        echo "<script>alert('Pesanan Berhasil Diedit');window.location.href='list.php';</script>";
    }
}

$id = $_GET['id'];

$pesanan = $pdo->query("SELECT * FROM pesanan WHERE id = $id")->fetch(PDO::FETCH_ASSOC);

$motor_id = $pesanan['motor_id'];
$motor_selected = $pdo->query("SELECT * FROM motor WHERE id = $motor_id")->fetch(PDO::FETCH_ASSOC);
?>

<div class="row-cols-md-2">
    <div class="container mb-5">
        <div class="card">
            <div class="container-fluid px-5 py-2">
                <h2 class="py-4 text-center">Edit Pesanan</h2>
                <form action="" method="POST">

                    <input type="hidden" name="id" value="<?= $pesanan['id']; ?>">

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="nama" name="nama_pelanggan" required value="<?= $pesanan['nama_pelanggan']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?= $pesanan['alamat_pelanggan']; ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="motor" class="form-label">Motor</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="motor_id" required>
                            <option selected value="<?= $motor_selected['id']; ?>"><?= $motor_selected['nama_motor']; ?></option>
                            <?php foreach ($listMotor as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['nama_motor']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" required value="<?= $pesanan['quantity']; ?>">
                    </div>

                    <div class=" modal-footer my-4">
                        <a href="pesanan.php" type="button" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-dark ms-2" name="edit">Edit Pesanan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once "../../templates/footer.php"; ?>