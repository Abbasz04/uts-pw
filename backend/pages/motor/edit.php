<?php include_once "../../templates/header.php"; ?>
<?php
if (isset($_POST["edit"])) {
    $id = $_POST["id"];
    $nama_motor = $_POST["nama_motor"];
    $cc = $_POST["cc"];
    $tipe_motor_id = $_POST["tipe_motor_id"];
    $harga = $_POST["harga"];
    $merk_id = $_POST["merk_id"];
    $stok = $_POST["stok"];

    $editMotor = $pdo->prepare("UPDATE motor SET
                nama_motor = '$nama_motor',
                cc = '$cc',
                tipe_motor_id = '$tipe_motor_id',
                harga = '$harga',
                merk_id = '$merk_id',
                stok = '$stok'
                WHERE id = $id
                ")->execute();

    if ($editMotor) {
        echo "<script>alert('Motor Berhasil Diedit');window.location.href='list.php';</script>";
    }
}
$id = $_GET['id'];
$motor = $pdo->query("SELECT * FROM motor WHERE id = $id")->fetch(PDO::FETCH_ASSOC);

$merk_id = $motor['merk_id'];
$merk_selected = $pdo->query("SELECT * FROM merk WHERE id = $merk_id")->fetch(PDO::FETCH_ASSOC);

$tipe_motor_id = $motor['tipe_motor_id'];
$tipe_motor_selected = $pdo->query("SELECT * FROM tipe_motor WHERE id = $tipe_motor_id")->fetch(PDO::FETCH_ASSOC);
?>

<div class="row-cols-md-2">
    <div class="container mb-5">
        <div class="card">
            <div class="container-fluid px-5 py-2">
                <h2 class="py-4 text-center fw-bolder">Edit Motor</h2>
                <form action="" method="POST">

                    <input type="hidden" name="id" value="<?= $motor['id']; ?>">

                    <div class="mb-3">
                        <label for="nama_motor" class="form-label">Nama Motor</label>
                        <input type="text" class="form-control" id="nama_motor" name="nama_motor" required value="<?= $motor["nama_motor"]; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="cc" class="form-label">CC</label>
                        <input type="text" class="form-control" id="cc" name="cc" required value="<?= $motor["cc"]; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="tipe_motor" class="form-label">Tipe Motor</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="tipe_motor_id" required>
                            <option selected value="<?= $motor["tipe_motor_id"]; ?>"><?= $tipe_motor_selected["tipe_motor"]; ?> </option>
                            <?php foreach ($listTipe as $tm) : ?>
                                <option value="<?= $tm['id']; ?>"><?= $tm['tipe_motor']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" min="0" class="form-control" id="harga" name="harga" required value="<?= $motor["harga"]; ?>">
                    </div>

                    <div class=" mb-3">
                        <label for="merk" class="form-label">Merk</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="merk_id" required>
                            <option selected value="<?= $motor["merk_id"] ?>"><?= $merk_selected["nama_merk"]; ?></option>
                            <?php foreach ($listMerk as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['nama_merk']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" min="0" class="form-control" id="stok" name="stok" required value="<?= $motor["stok"]; ?>">
                    </div>

                    <div class=" modal-footer my-4">
                        <a href="motor.php" type="button" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-dark ms-2" name="edit">Edit Motor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once "../../templates/footer.php"; ?>