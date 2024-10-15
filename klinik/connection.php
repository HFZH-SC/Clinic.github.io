<?php
$conn = mysqli_connect("localhost","root", "","klinik");
$q_dokter = mysqli_query($conn, "Select * from dokter");
$q_pasien = mysqli_query($conn, "Select * from pasien");
$q_poli = mysqli_query($conn, "Select * from poli");
$q_transaksi = mysqli_query($conn, "SELECT no_transaksi,tgl_berobat,pasien.nm_pasien, pasien.tgl_lahir,pasien.jenkel, keluhan, poli.nm_poli, dokter.nm_dokter, biaya_adm from berobat inner join pasien on berobat.pasien_id = pasien.pasien_id INNER JOIN dokter on berobat.dokter_id = dokter.dokter_id INNER JOIN poli on dokter.poli_id = poli.poli_id; ");
$q_obat = mysqli_query($conn, "SELECT * FROM obat");
function pop_up_dokter(){
    return "
    
    ";
}
function pop_up_pasien(){

}
function pop_up_poli(){

}
