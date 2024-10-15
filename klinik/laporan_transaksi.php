<?php
// laporan_transaksi.php

require("connection.php");

$query = "SELECT b.no_transaksi, p.nm_pasien, b.keluhan, d.nm_dokter, b.biaya_adm, b.tgl_berobat 
          FROM berobat b
          JOIN pasien p ON b.pasien_id = p.pasien_id
          JOIN dokter d ON b.dokter_id = d.dokter_id
          ORDER BY b.tgl_berobat DESC";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi</title>
    <link rel="stylesheet" href="assets/styles/styles.css">
    <link rel="stylesheet" href="assets/styles/table.css">
    <link rel="stylesheet" href="assets/styles/navbar.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="content">
        <h2>Laporan Transaksi</h2>
        <table cellspacing="0">
            <thead>
                <tr>
                    <th>No Transaksi</th>
                    <th>Nama Pasien</th>
                    <th>Keluhan</th>
                    <th>Nama Dokter</th>
                    <th>Biaya Administrasi</th>
                    <th>Tanggal Berobat</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['no_transaksi']) ?></td>
                        <td><?= htmlspecialchars($row['nm_pasien']) ?></td>
                        <td><?= htmlspecialchars($row['keluhan']) ?></td>
                        <td><?= htmlspecialchars($row['nm_dokter']) ?></td>
                        <td><?= htmlspecialchars($row['biaya_adm']) ?></td>
                        <td><?= htmlspecialchars($row['tgl_berobat']) ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="assets/scripts/main.js"></script>
</body>
</html>
