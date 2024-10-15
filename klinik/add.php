<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <link rel="stylesheet" href="assets/styles/crud.css">
</head>
<body>
    <?php 
        require("template.php");
        require("kelola_data.php");

    if(isset($_GET["label"])){
        if ($_GET["label"] == "dokter") {
            echo data_dokter();
        }else if ($_GET["label"] == "pasien") {
            echo data_pasien();
        }else if ($_GET["label"] == "poli") {
            echo data_poli();
        }else if ($_GET["label"] == "berobat") {
            echo data_transaksi();
        }else if ($_GET["label"] == "obat") {
            echo data_obat();
        }else{
            echo "invalid_operation";
        }
    }
    if(isset($_POST["submit"])){
        if($_POST["submit"] == "dokter"){
            echo handle_dokter($_POST["nm_dokter"], $_POST["poli_id"]);
        }else if($_POST["submit"] == "pasien"){
            echo handle_pasien($_POST["nm_pasien"], implode("-",$_POST["tgl_lahir"]), $_POST["jenkel"], $_POST["alamat"]);
        }else if($_POST["submit"] == "poli"){
            echo handle_poli($_POST["nm_poli"]);
        }else if($_POST["submit"] == "berobat"){
            echo handle_berobat($_POST["pasien_id"],$_POST["keluhan"], $_POST["dokter_id"], $_POST["biaya_adm"], $_POST["tgl_berobat"]);
        }else if($_POST["submit"] == "obat"){
            echo handle_obat($_POST["nama_obat"], $_POST["jenis"], $_POST["stok"], $_POST["harga"]);
        }
    }
    ?>
    <script src="assets/scripts/main.js"></script>
</body>
</html>
