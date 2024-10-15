<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Obat</title>
    <link rel="stylesheet" href="assets/styles/styles.css">
    <link rel="stylesheet" href="assets/styles/table.css">
    <link rel="stylesheet" href="assets/styles/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <?php 
        require("connection.php");
        $counter = 1;
    ?>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="content">
        <h2>Data Obat</h2>
        <a class="adddata" href="add.php?label=obat">Add Data</a>
        <table cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Obat</th>
                    <th>Nama Obat</th>
                    <th>Jenis</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM obat";
                $result = mysqli_query($conn, $query);
                while($fetch = mysqli_fetch_assoc($result)):
                ?>
                    <tr>
                        <td><?= $counter?></td>
                        <td><?= $fetch["obat_id"]?></td>
                        <td><?= $fetch["nama_obat"]?></td>
                        <td><?= $fetch["jenis"]?></td>
                        <td><?= $fetch["stok"]?></td>
                        <td><?= $fetch["harga"]?></td>
                        <td>
                            <a class="action edit" href="edit.php?view=obat&id=<?= $fetch["obat_id"]?>">Edit</a>
                            <a class="action delete" href="javascript:void(0);" onclick="confirmDelete(<?= $fetch["obat_id"]?>)">Delete</a>
                        </td>
                    </tr>
                    <?php $counter++;?>
                <?php endwhile;?>
            </tbody>
        </table>
    </div>
    <script>
    function confirmDelete(id) {
        if (confirm("Apakah Anda yakin ingin menghapus obat ini?")) {
            window.location.href = "delete.php?view=obat&id=" + id;
        }
    }
    </script>
    <script src="assets/scripts/main.js"></script>
</body>
</html>
