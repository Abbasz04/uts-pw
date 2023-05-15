<?php include_once "../../templates/header.php"; ?>
<?php
if (isset($_POST['edit'])) {
    $nama_merk = $_POST['name'];
    $id = $_POST['id'];

    $updateMerk = $pdo->prepare("UPDATE merk SET nama_merk = '$nama_merk' WHERE id = $id")->execute();

    if ($updateMerk) {
        echo "<script>alert('Merk Berhasil Diedit');window.location.href='list.php';</script>";
    }
}
$id = $_GET['id'];
$merk = $pdo->query("SELECT * FROM merk WHERE id = $id")->fetch(PDO::FETCH_ASSOC);
?>

<div class="row-cols-md-2">
    <div class="container mb-5">
        <div class="card">
            <div class="container-fluid px-5 py-2">
                <h2 class="py-4 text-center">Edit Merk</h2>
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $merk['id']; ?>">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Name</label>
                        <input type="text" class="form-control" id="nama" name="name" required value="<?= $merk['nama_merk']; ?>">
                    </div>

                    <div class=" modal-footer my-4">
                        <a href="tipe-motor.php" type="button" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-dark ms-2" name="edit">Edit Merk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once "../../templates/footer.php"; ?>