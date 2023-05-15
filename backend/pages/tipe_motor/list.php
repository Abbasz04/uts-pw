<?php include_once "../../templates/header.php"; ?>

<div class="d-flex justify-content-end mb-3">
    <a href="add.php" class="btn btn-primary">Tambah Tipe Motor</a>
</div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Table Tipe Motor
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipe Motor</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listTipe as $tp) : ?>
                    <tr>
                        <td><?= $tp["id"]; ?></td>
                        <td><?= $tp["tipe_motor"]; ?></td>
                        <td>
                            <a href="edit.php?id=<?= $tp['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete.php?id=<?= $tp['id']; ?>" class="btn btn-danger"> Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once "../../templates/footer.php"; ?>