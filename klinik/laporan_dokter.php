<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Dokter</title>
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
        <h2>Laporan Dokter</h2>
        <table cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Dokter</th>
                    <th>Nama Dokter</th>
                    <th>Id Poli</th>
                </tr>
            </thead>
            <tbody>
                <?php while($fetch = mysqli_fetch_assoc($q_dokter)):?>
                    <tr>
                        <td><?= $counter?></td>
                        <td><?= $fetch["dokter_id"]?></td>
                        <td><?= $fetch["nm_dokter"]?></td>
                        <td><?= $fetch["poli_id"]?></td>
                    </tr>
                    <?php $counter++;?>
                <?php endwhile;?>
            </tbody>
        </table>
    </div>
    <script src="assets/scripts/main.js"></script>
</body>
</html>
