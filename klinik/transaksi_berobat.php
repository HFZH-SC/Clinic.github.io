<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Berobat</title>
    <link rel="stylesheet" href="assets/styles/styles.css">
    <link rel="stylesheet" href="assets/styles/table.css">
    <link rel="stylesheet" href="assets/styles/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <?php 
        require("connection.php");
        require("template.php");
        $counter = 1;

        $query = "SELECT b.*, p.nm_pasien, p.tgl_lahir, p.jenkel, pl.nm_poli, d.nm_dokter, 
                  GROUP_CONCAT(CONCAT(o.nama_obat, ' (', db.jumlah, ')') SEPARATOR ', ') AS obat_list,
                  SUM(o.harga * db.jumlah) + b.biaya_adm AS total
                  FROM berobat b
                  INNER JOIN pasien p ON b.pasien_id = p.pasien_id
                  INNER JOIN dokter d ON b.dokter_id = d.dokter_id
                  INNER JOIN poli pl ON d.poli_id = pl.poli_id
                  LEFT JOIN detail_berobat db ON b.no_transaksi = db.no_transaksi
                  LEFT JOIN obat o ON db.obat_id = o.obat_id
                  GROUP BY b.no_transaksi
                  ORDER BY b.tgl_berobat DESC";
        $q_transaksi = mysqli_query($conn, $query);
    ?>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="content">
        <h2>Data Berobat</h2>
        <a class="adddata" href="add.php?label=berobat">Add Data</a>
        <table cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Transaksi</th>
                    <th>Tanggal</th>
                    <th>Nama Pasien</th>
                    <th>Usia</th>
                    <th>Jenis Kelamin</th>
                    <th>Keluhan</th>
                    <th>Nama Poli</th>
                    <th>Dokter</th>
                    <th>Biaya</th>
                    <th>Obat</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($fetch = mysqli_fetch_assoc($q_transaksi)):?>
                    <tr>
                    <?php
                        $tanggal_berobat = $fetch["tgl_berobat"];
                        $tgl_lahir = $fetch["tgl_lahir"];
                        $usia = floor((strtotime($tanggal_berobat) - strtotime($tgl_lahir)) / 31_536_000);
                     ?>
                        <td><?= $counter?></td>
                        <td><?= $fetch["no_transaksi"]?></td>
                        <td><?= $tanggal_berobat?></td>
                        <td><?= $fetch["nm_pasien"]?></td>
                        <td><?= $usia?></td>
                        <td><?= $fetch["jenkel"]?></td>
                        <td><?= $fetch["keluhan"]?></td>
                        <td><?= $fetch["nm_poli"]?></td>
                        <td><?= $fetch["nm_dokter"]?></td> 
                        <td><?= $fetch["biaya_adm"]?></td>
                        <td><?= isset($fetch["obat_list"]) && $fetch["obat_list"] ? $fetch["obat_list"] : "Tidak ada obat" ?></td>
                        <td>Rp <?= isset($fetch["total"]) ? number_format($fetch["total"], 0, ',', '.') : '0' ?></td>
                        <td>
                            <a class="action" href="edit.php?view=berobat&id=<?= $fetch["no_transaksi"]?>">Edit</a>
                            <a class="action" href="delete.php?view=berobat&id=<?= $fetch["no_transaksi"]?>">Delete</a>
                        </td>
                    </tr>
                    <?php $counter++;?>
                    <?php endwhile;?>
                </tbody>
            </table>
        </div>
    </main>    
    <script src="assets/scripts/main.js"></script>
</body>
</html>
