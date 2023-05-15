<?php include_once "../../templates/header.php"; ?>
<div class="mb-3">
    <a href="add.php" class="btn btn-primary">Tambahkan Motor</a>
</div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Table Motor
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Motor</th>
                    <th>CC</th>
                    <th>Tipe Motor</th>
                    <th>Harga</th>
                    <th>Merk</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listMotor as $m) : ?>
                    <tr>
                        <td><?= $m["id"]; ?></td>
                        <td><?= $m["nama_motor"]; ?></td>
                        <td><?= $m["cc"]; ?></td>
                        <td><?= $m["tipe_motor"]; ?></td>
                        <td>Rp. <?= number_format($m["harga"]); ?></td>
                        <td><?= $m["nama_merk"]; ?></td>
                        <td><?= $m["stok"]; ?></td>
                        <td>
                            <a href="edit.php?id=<?= $m['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete.php?id=<?= $m['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once "../../templates/footer.php"; ?>