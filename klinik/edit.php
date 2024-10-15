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
        require("template.php");
        require("kelola_data.php");
    ?>
    <?php 
    if(isset($_GET["view"])){
        if(isset($_GET["id"]) && $_GET["view"] == "dokter"){
            echo data_dokter($_GET["id"]);
        }else if(isset($_GET["id"]) && $_GET["view"] == "pasien"){
            echo data_pasien($_GET["id"]);
        }else if(isset($_GET["id"]) && $_GET["view"] == "poli"){
            echo data_poli($_GET["id"]);
        }else if(isset($_GET["id"]) && $_GET["view"] == "berobat"){
            echo data_transaksi($_GET["id"]);
        }else if($_GET["view"] == "obat") {
            $obat_id = $_GET["id"];
            // Ambil data obat berdasarkan ID
            $query = "SELECT * FROM obat WHERE obat_id = '$obat_id'";
            $result = mysqli_query($conn, $query);
            $obat = mysqli_fetch_assoc($result);
            
            // Tampilkan form edit dengan data obat yang sudah ada
            echo data_obat($obat["nama_obat"], $obat["jenis"], $obat["stok"], $obat["harga"], $obat_id);
        }
    }
    if(isset($_POST["submit"])){
        if($_POST["submit"] == "dokter"){
            echo handle_dokter($_POST["nm_dokter"], $_POST["poli_id"], $_POST["dokter_id"]);
        }else if($_POST["submit"] == "pasien"){
            echo handle_pasien($_POST["nm_pasien"], implode("-",$_POST["tgl_lahir"]), $_POST["jenkel"], $_POST["alamat"],$_POST["pasien_id"]);
        }else if($_POST["submit"] == "poli"){
            echo handle_poli($_POST["nm_poli"], $_POST["poli_id"]);
        }else if($_POST["submit"] == "berobat"){
            echo handle_berobat($_POST["pasien_id"],$_POST["keluhan"], $_POST["dokter_id"], $_POST["biaya_adm"], $_POST["tgl_berobat"], $_POST["no_transaksi"]);
        }
    }
    ?>
</body>
</html>
