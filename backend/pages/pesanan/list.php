<?php include_once "../../templates/header.php"; ?>

<div class="d-flex justify-content-end mb-3">
    <a href="add.php" class="btn btn-primary">Tambah Pesanan</a>
</div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Table Pesanan
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat Pelanggan</th>
                    <th>Motor</th>
                    <th>Qty</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listPesanan as $p) : ?>
                    <tr>
                        <td><?= $p["id"]; ?></td>
                        <td><?= $p["nama_pelanggan"]; ?></td>
                        <td><?= $p["alamat_pelanggan"]; ?></td>
                        <td><?= $p["nama_motor"]; ?></td>
                        <td><?= $p["quantity"]; ?></td>
                        <td>
                            <a href="edit.php?id=<?= $p['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete.php?id=<?= $p['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once "../../templates/footer.php"; ?>