<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="assets/styles/crud.css">
    <link rel="stylesheet" href="assets/styles/sidebar.css">
</head>
<body>
    <?php
        require_once "connection.php";
    ?>
    <?php 
    if(isset($_GET["view"])){
        if(isset($_GET["id"])){
            $id = htmlspecialchars($_GET["id"]);
            if($_GET["view"] == "dokter"){
                mysqli_query($conn, "Delete from dokter where dokter_id = '$id'") or die(mysqli_error($conn));
                header("location:data_dokter.php");
            }else if($_GET["view"] == "pasien"){
                mysqli_query($conn, "Delete from pasien where pasien_id = '$id'") or die(mysqli_error($conn));
                header("location:data_pasien.php");
            }else if($_GET["view"] == "poli"){
                mysqli_query($conn, "Delete from poli where poli_id = '$id'") or die(mysqli_error($conn));
                header("location:data_poli.php");
            }else if($_GET["view"] == "berobat"){
                mysqli_query($conn, "Delete from berobat where no_transaksi = '$id'") or die(mysqli_error($conn));
                header("location:transaksi_berobat.php");
            }else if($_GET["view"] == "obat") {
                $obat_id = $_GET["id"];
                $query = "DELETE FROM obat WHERE obat_id = '$obat_id'";
                if (mysqli_query($conn, $query)) {
                    echo "<script>alert('Obat berhasil dihapus'); window.location.href='data_obat.php';</script>";
                } else {
                    echo "Error deleting record: " . mysqli_error($conn);
                }
            }
        }else{
            echo "invalid_operation";
        }
    }
    
    ?>
</body>
</html>
