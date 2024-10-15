<!DOCTYPE html>
<html lang="en">
<?php
require("connection.php");

$total_pasien = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM pasien"))['total'];
$total_obat = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM obat"))['total'];
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik </title>
    <link rel="stylesheet" href="assets/styles/styles.css">
    <link rel="stylesheet" href="assets/styles/navbar.css">
    <link rel="stylesheet" href="assets/styles/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="content home-content">
        <div class="home-overlay">
            <h1>Aplikasi Pengelolaan Klinik</h1>
            <h2>Selamat datang di Klinik</h2>
            <p>Sistem informasi ini membantu dalam pengelolaan data pasien, dokter, dan transaksi berobat di Klinik.</p>
            <div class="dashboard-stats">
                <div class="stat-box pasien">
                    <h3>Total Pasien</h3>
                    <p class="stat-number"><?php echo $total_pasien; ?></p>
                    <p>Orang</p>
                </div>
                <div class="stat-box obat">
                    <h3>Total Obat</h3>
                    <p class="stat-number"><?php echo $total_obat; ?></p>
                    <p>Pcs</p>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/scripts/main.js"></script>
</body>
</html>
