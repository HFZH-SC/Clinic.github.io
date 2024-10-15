<?php 
require_once("connection.php");

function handle_dokter($nama_dokter, $poli_id, $id = ""){
    global $conn;
    $nama_dokter = htmlspecialchars($nama_dokter);
    $poli_id = htmlspecialchars($poli_id);
    $id = htmlspecialchars($id);
    if($id == ""){
        $index = mysqli_fetch_row(mysqli_query($conn, "Select dokter_id from dokter order by dokter_id desc limit 1"))[0];
        $num = intval(substr($index,3)) + 1;
        $padded = "DR-".str_pad((string)$num, 3, "0", STR_PAD_LEFT);
        mysqli_query($conn, "INSERT INTO dokter(dokter_id, nm_dokter, poli_id) values ('$padded', '$nama_dokter', '$poli_id')");
        $result = "Insert Berhasil";
    }else{
        mysqli_query($conn, "update dokter set nm_dokter = '$nama_dokter', poli_id = '$poli_id' where dokter_id = '$id'");
        $result = "Update Berhasil";
    }
    
    if(mysqli_error($conn) == ""){
        mysqli_close($conn);
        return $result;
    }else{
        return mysqli_error($conn);
    }
}
function handle_pasien($nama_pasien, $tgl_lahir, $jenkel, $alamat, $id = ""){
    global $conn;
    $nama_pasien = htmlspecialchars($nama_pasien);
    $tgl_lahir = htmlspecialchars($tgl_lahir);
    $jenkel = htmlspecialchars($jenkel);
    $alamat = htmlspecialchars($alamat);
    $id = htmlspecialchars($id);
    $tgl_lahir = date("Y-m-d",strtotime($tgl_lahir));
    if($id == ""){
        $index = mysqli_fetch_row(mysqli_query($conn, "Select pasien_id from pasien order by pasien_id desc limit 1"))[0];
        $num = intval(substr($index,3)) + 1;
        $padded = "PS-".str_pad((string)$num, 3, "0", STR_PAD_LEFT);
        mysqli_query($conn, "INSERT INTO pasien(pasien_id, nm_pasien, tgl_lahir, jenkel, alamat) values ('$padded', '$nama_pasien', '$tgl_lahir', '$jenkel', '$alamat')");
        $result = "Insert Berhasil";
    }else{
        mysqli_query($conn, "update pasien set nm_pasien = '$nama_pasien', tgl_lahir = '$tgl_lahir', jenkel = '$jenkel', alamat = '$alamat' where pasien_id = '$id'");
        $result = "Update Berhasil";
    }
    
    if(mysqli_error($conn) == ""){
        mysqli_close($conn);
        return $result;
    }else{
        return mysqli_error($conn);
    }
}
function handle_poli($nama_poli, $id = ""){
    global $conn;
    $nama_poli = htmlspecialchars($nama_poli);
    $id = htmlspecialchars($id);
    if($id == ""){
        $index = mysqli_fetch_row(mysqli_query($conn, "Select poli_id from poli order by poli_id desc limit 1"))[0];
        $num = intval(substr($index,3)) + 1;
        $padded = "P-".str_pad((string)$num, 3, "0", STR_PAD_LEFT);
        mysqli_query($conn, "INSERT INTO poli(poli_id, nm_poli) values ('$padded', '$nama_poli')");
        $result = "Insert Berhasil";
    }else{
        mysqli_query($conn, "update poli set nm_poli = '$nama_poli' where poli_id = '$id'");
        $result = "Update Berhasil";
    }
    
    if(mysqli_error($conn) == ""){
        mysqli_close($conn);
        return $result;
    }else{
        return mysqli_error($conn);
    }
}
function handle_berobat($pasien_id, $keluhan, $dokter_id, $biaya_adm, $tgl_berobat, $no_transaksi = ""){
    global $conn;
    $nama_pasien = htmlspecialchars($pasien_id);
    $keluhan = htmlspecialchars($keluhan);
    $dokter_id = htmlspecialchars($dokter_id);
    $biaya_adm = intval(htmlspecialchars($biaya_adm));
    $tgl_berobat = htmlspecialchars($tgl_berobat);
    $id = htmlspecialchars($no_transaksi);
    if($id == ""){
        $index = mysqli_fetch_row(mysqli_query($conn, "Select no_transaksi from berobat order by no_transaksi desc limit 1"))[0];
        $num = intval(substr($index,3)) + 1;
        $padded = "TR-".str_pad((string)$num, 3, "0", STR_PAD_LEFT);
        mysqli_query($conn, "INSERT INTO berobat(no_transaksi, pasien_id, tgl_berobat, dokter_id, keluhan, biaya_adm) values ('$padded', '$nama_pasien', '$tgl_berobat', '$dokter_id', '$keluhan', $biaya_adm)");
        $result = "Insert Berhasil";
    }else{
        mysqli_query($conn, "update berobat set pasien_id = '$pasien_id', tgl_berobat = '$tgl_berobat', dokter_id = '$dokter_id', keluhan = '$keluhan', biaya_adm = $biaya_adm where no_transaksi = '$id'");
        $result = "Update Berhasil";
    }
    
    if(mysqli_error($conn) == ""){
        mysqli_close($conn);
        return $result;
    }else{
        return mysqli_error($conn);
    }
}

function handle_obat($nama_obat, $jenis, $stok, $harga) {
    global $conn;
    $query = "INSERT INTO obat (nama_obat, jenis, stok, harga) VALUES ('$nama_obat', '$jenis', $stok, $harga)";
    if(mysqli_query($conn, $query)) {
        return "Data obat berhasil ditambahkan";
    } else {
        return "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

if (isset($_POST['obat_id']) && isset($_POST['jumlah_obat'])) {
    $obat_ids = $_POST['obat_id'];
    $jumlah_obats = $_POST['jumlah_obat'];
    for ($i = 0; $i < count($obat_ids); $i++) {
        $obat_id = $obat_ids[$i];
        $jumlah = $jumlah_obats[$i];
        if ($jumlah > 0) {
            mysqli_query($conn, "INSERT INTO detail_berobat (no_transaksi, obat_id, jumlah) VALUES ('$padded', '$obat_id', $jumlah)");
        }
    }
}
