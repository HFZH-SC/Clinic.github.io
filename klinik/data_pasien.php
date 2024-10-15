<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pasien</title>
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
        <h2>Data Pasien</h2>
        <a class="adddata" href="add.php?label=pasien">Add Data</a>
        <table cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Pasien</th>
                    <th>Nama Pasien</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($fetch = mysqli_fetch_assoc($q_pasien)):?>
                    <tr>
                        <td><?= $counter?></td>
                        <td><?= $fetch["pasien_id"]?></td>
                        <td><?= $fetch["nm_pasien"]?></td>
                        <td><?= $fetch["tgl_lahir"]?></td>
                        <td><?= $fetch["jenkel"]?></td>
                        <td><?= $fetch["alamat"]?></td>
                        <td>
                            <a class="action edit" href="edit.php?view=pasien&id=<?= $fetch["pasien_id"]?>">Edit</a>
                            <a class="action delete" href="delete.php?view=pasien&id=<?= $fetch["pasien_id"]?>">Delete</a>
                        </td>
                    </tr>
                    <?php $counter++;?>
                <?php endwhile;?>
            </tbody>
        </table>
    </div>
    <script src="assets/scripts/main.js"></script>
</body>
</html>
