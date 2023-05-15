<?php include_once "../../templates/header.php"; ?>
<?php
if (isset($_POST["edit"])) {
    $id = $_POST["id"];
    $tipe_motor = $_POST["name"];

    $editTipeMotor = $pdo->prepare("UPDATE tipe_motor SET tipe_motor = '$tipe_motor' WHERE id = $id")->execute();

    if ($editTipeMotor) {
        echo "<script>alert('Tipe Motor Berhasil Diedit');window.location.href='list.php';</script>";
    }
}
$id = $_GET['id'];
$tipe_motor = $pdo->query("SELECT * FROM tipe_motor WHERE id = $id")->fetch(PDO::FETCH_ASSOC);
?>

<div class="row-cols-md-2">
    <div class="container mb-5">
        <div class="card">
            <div class="container-fluid px-5 py-2">
                <h2 class="py-4 text-center">Edit Tipe Motor</h2>
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $tipe_motor['id']; ?>">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Name</label>
                        <input type="text" class="form-control" id="nama" name="name" required value="<?= $tipe_motor['tipe_motor']; ?>">
                    </div>

                    <div class=" modal-footer my-4">
                        <a href="tipe-motor.php" type="button" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-dark ms-2" name="edit">Edit Tipe Motor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once "../../templates/footer.php"; ?>