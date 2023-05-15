<?php include_once "../../templates/header.php"; ?>
<?php

if (isset($_POST["tambah"])) {
    $nama_merk = $_POST["nama_merk"];

    $tambahMerk = $pdo->prepare("INSERT INTO merk (nama_merk) VALUES ('$nama_merk')")->execute();

    if ($tambahMerk) {
        echo "<script>alert('Merk Berhasil Ditambahkan');window.location.href='list.php';</script>";
    }
}
?>

<div class="row-cols-md-2">
    <div class="container mb-5">
        <div class="card">
            <div class="container-fluid px-5 py-2">
                <h2 class="py-4 text-center fw-bolder">Tambah Merk</h2>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Merk</label>
                        <input type="text" class="form-control" id="nama" name="nama_merk" required>
                    </div>

                    <div class=" modal-footer my-4">
                        <a href="list.php" type="button" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-dark ms-2" name="tambah">Tambah Merk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once "../../templates/footer.php"; ?>