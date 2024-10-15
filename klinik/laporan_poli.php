<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Poli</title>
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
        <h2>Laporan Poli</h2>
        <table cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Poli</th>
                    <th>Nama Poli</th>
                </tr>
            </thead>
            <tbody>
                <?php while($fetch = mysqli_fetch_assoc($q_poli)):?>
                    <tr>
                        <td><?= $counter?></td>
                        <td><?= $fetch["poli_id"]?></td>
                        <td><?= $fetch["nm_poli"]?></td>
                    </tr>
                    <?php $counter++;?>
                <?php endwhile;?>
            </tbody>
        </table>
    </div>
    <script src="assets/scripts/main.js"></script>
</body>
</html>
