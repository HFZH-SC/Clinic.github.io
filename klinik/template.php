<?php require_once("connection.php");?>
<?php 
function aside(){
?>
    <aside>
        <Nav>
            <h1>KLINIK</h1>
            <a href="index.php">Dashboard</a>
            <button class="dropdown-button" >Form <span>></span></button>
            <div class="dropdown">
                <a href="data_dokter.php">Data Dokter</a>
                <a href="data_pasien.php">Data Pasien</a>
                <a href="data_poli.php">Data Poli</a>
                <a href="transaksi_berobat.php">Transaksi Berobat</a>
                <a href="data_obat.php">Data Obat</a>
            </div>
            <button class="dropdown-button">Laporan  <span>></span></button>
            <div class="dropdown">
                <a href="laporan_dokter.php">Laporan Dokter</a>
                <a href="laporan_pasien.php">Laporan Pasien</a>
                <a href="laporan_poli.php">Laporan Poli</a>
                <a href="laporan_transaksi.php">Transaksi Berobat</a>
            </div>
        </Nav>
    </aside>
<?php }?>
<?php
function data_dokter($id = ""){
    global $conn, $q_poli;
    if($id != ""){
        $fetch_dokter = mysqli_fetch_assoc(mysqli_query($conn, "SELECT dokter_id, nm_dokter, dokter.poli_id, poli.nm_poli FROM dokter inner join poli on dokter.poli_id = poli.poli_id where dokter_id = '$id'"));
    }
    $dokter_id = $id != ""? $fetch_dokter["dokter_id"]:"";
    $nm_dokter = $id != ""? $fetch_dokter["nm_dokter"]:"";
    ?>
        <div>
            <a href="data_dokter.php">back</a>
            <form action="" method="post">
                <input type="hidden" name="dokter_id" value=<?= $dokter_id ?>>
                <label for="nm_dokter">Nama Dokter:</label>
                <input type="text" id="nm_dokter" name="nm_dokter" value="<?= $nm_dokter ?>">
                <label for="poli">Pilihan Poli : </label>
                <select name="poli_id" id="poli">
                <?php while($fetch = mysqli_fetch_assoc($q_poli)):?>
                    <?php if($fetch_dokter["poli_id"] == $fetch["poli_id"]):?>
                        <option value=<?= $fetch["poli_id"]?> selected><?= $fetch["nm_poli"]?></option>
                    <?php else:?>
                        <option value=<?= $fetch["poli_id"]?>><?= $fetch["nm_poli"]?></option>
                    <?php endif;?>
                <?php endwhile;?>
                </select>
                <div>
                    <button type="submit" name="submit" value="dokter">Submit</button>
                    <button type="reset">Reset</button>
                </div>
            </form>
        </div>
<?php }?>
<?php
function data_pasien($id = ""){
    global $conn;
    if($id != ""){
        $fetch_pasien = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pasien where pasien_id = '$id'"));
    }
    $pasien_id = $id != ""? $fetch_pasien["pasien_id"]:"";
    $nm_pasien = $id != ""? $fetch_pasien["nm_pasien"]:"";
    $tgl_lahir = $id != ""? explode("-",$fetch_pasien["tgl_lahir"]):["","",""];
    $jenkel = $id != ""? strtolower($fetch_pasien["jenkel"]):"";
    $alamat = $id != ""? $fetch_pasien["alamat"]:"";
    ?>
    <div>
        <a href="data_pasien.php">back</a>
        <form action="" method="post">
            <input type="hidden" name="pasien_id" value="<?= $pasien_id?>">
            <label for="nama_pasien">Nama Pasien:</label>
            <input type="text" id="nama_pasien" name="nm_pasien" value="<?= $nm_pasien?>">
            <label for="tgl_lahir">Tanggal Lahir : </label>
            <div class="tanggal_lahir">
                <select name="tgl_lahir[]" id="tgl_lahir">
                    <?php for($i = 1; $i <= 31;$i++):?>
                        <?php if(intval($tgl_lahir[2]) == $i):?>
                            <option value=<?= $i?> selected><?= $i?></option>
                        <?php else:?>
                            <option value=<?= $i?>><?= $i?></option>
                        <?php endif;?>
                    <?php endfor;?>
                </select>
                <select name="tgl_lahir[]">
                    <?php for($i = 1; $i <= 12;$i++):?>
                        <?php if(intval($tgl_lahir[1]) == $i):?>
                            <option value=<?= $i?> selected><?= date("F", mktime(0,0,0,$i+1,0,0));?></option>
                        <?php else:?>
                            <option value=<?= $i?>><?= date("F", mktime(0,0,0,$i+1,0,0));?></option>
                        <?php endif;?>
                    <?php endfor;?>
                </select>
                <input type="text" name="tgl_lahir[]" value="<?= $tgl_lahir[0]?>">
            </div>
            <label for="jenkel"></label>
            <div>
                <input type="radio" name="jenkel" id="jenkel" value="Laki-Laki" <?= $jenkel == "laki-laki"? "checked":""?>>Laki-laki
                <input type="radio" name="jenkel" value="Perempuan" <?= $jenkel == "perempuan"? "checked":""?>>Perempuan
            </div>
            <label for="alamat">alamat : </label>
            <textarea name="alamat" id="alamat"><?= $alamat?></textarea>
            <div>
                <button type="submit" name="submit" value="pasien">Submit</button>
                <button type="reset">Reset</button>
            </div>
        </form>
    </div>
<?php }?>

<?php function data_poli($id = ""){
    global $conn;
    if($id != ""){
        $fetch_poli = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM poli where poli_id = '$id'"));
    }
    $poli_id = $id != ""? $fetch_poli["poli_id"]:"";
    $nm_poli = $id != ""? $fetch_poli["nm_poli"]:"";
?>
<div>
    <a href="data_poli.php">back</a></form>
    <form action="" method="post">
        <input type="hidden" name="poli_id" value="<?= $poli_id?>">
        <label for="nm_poli">Nama Poli : </label>
        <input type="text" id="nm_poli" name="nm_poli" value="<?= $nm_poli?>">
        </select>
        <div>
            <button type="submit" name="submit" value="poli">Submit</button>
            <button type="reset">Reset</button>
        </div>
    </form>
</div>
<?php }?>
<?php
function data_transaksi($id = ""){
    global $conn,$q_pasien, $q_dokter;
    if($id != ""){
        $fetch_berobat = mysqli_fetch_assoc(mysqli_query($conn, "SELECT no_transaksi,tgl_berobat, pasien_id, keluhan, dokter.poli_id, dokter.dokter_id, biaya_adm from berobat INNER JOIN dokter on berobat.dokter_id = dokter.dokter_id where no_transaksi = '$id'"));
    }
    $no_transaksi = $id != ""? $fetch_berobat["no_transaksi"]:"";
    $tgl_berobat = $id != ""? $fetch_berobat["tgl_berobat"]:date("Y-m-d");
    $pasien_id = $id != ""? $fetch_berobat["pasien_id"]:"";
    $keluhan = $id != ""? $fetch_berobat["keluhan"]:"";
    $dokter_id = $id != ""? $fetch_berobat["dokter_id"]:"";
    $biaya_adm = $id != ""? $fetch_berobat["biaya_adm"]:0;
    $q_dokter = mysqli_query($conn, "select dokter_id, nm_dokter, poli.nm_poli from dokter inner join poli on dokter.poli_id = poli.poli_id")
?>
<div>
    <a href="transaksi_berobat.php">Back</a>
    <form action="" method="post">
        <input type="hidden" name="no_transaksi" value="<?= $no_transaksi?>">
        <input type="hidden" name="tgl_berobat" value="<?= $tgl_berobat?>">
        <label for="nm_pasien">Nama Pasien : </label>
        <select name="pasien_id" id="nm_pasien">
            <?php while($fetch = mysqli_fetch_assoc($q_pasien)):?>
                <?php if($pasien_id == $fetch["pasien_id"]):?>
                    <option value=<?= $fetch["pasien_id"]?> selected><?= $fetch["nm_pasien"]?></option>
                <?php else:?>
                    <option value=<?= $fetch["pasien_id"]?>><?= $fetch["nm_pasien"]?></option>
                <?php endif;?>
            <?php endwhile;?>
        </select>
        <label for="keluhan">Keluhan : </label>
        <textarea name="keluhan" id="keluhan"><?= $keluhan?></textarea>
        <label for="dokter">Pilihan Dokter : </label>
        <select name="dokter_id" id="dokter">
        <?php while($fetch = mysqli_fetch_assoc($q_dokter)):?>
            <?php if($dokter_id == $fetch["dokter_id"]):?>
                <option value=<?= $fetch["dokter_id"]?> selected><?= $fetch["nm_dokter"]?> - <?= $fetch["nm_poli"]?></option>
            <?php else:?>
                <option value=<?= $fetch["dokter_id"]?>><?= $fetch["nm_dokter"]?> - <?= $fetch["nm_poli"]?></option>
            <?php endif;?>
        <?php endwhile;?>
        </select>
        <label for="biaya_adm">Biaya Administrasi : </label>
        <input type="number" name="biaya_adm" id="biaya_adm" value="<?= $biaya_adm?>">
        <h3>Pilih Obat:</h3>
        <div id="obat-container">
            <div class="obat-item">
                <select name="obat_id[]">
                    <?php
                    $obat_query = mysqli_query($conn, "SELECT * FROM obat");
                    while ($obat = mysqli_fetch_assoc($obat_query)) {
                        echo "<option value='" . $obat['obat_id'] . "'>" . $obat['nama_obat'] . " - Rp " . number_format($obat['harga'], 0, ',', '.') . "</option>";
                    }
                    ?>
                </select>
                <input type="number" name="jumlah_obat[]" min="0" value="0">
            </div>
        </div>
        <button type="button" onclick="tambahObat()">Tambah Obat</button>

        <script>
        function tambahObat() {
            var container = document.getElementById('obat-container');
            var newItem = container.firstElementChild.cloneNode(true);
            newItem.querySelector('input[type="number"]').value = "0";
            container.appendChild(newItem);
        }
        </script>
        <div>
            <button type="submit" name="submit" value="berobat">Submit</button>
            <button type="reset">Reset</button>
        </div>
    </form>
</div>
<?php }?>
<?php
function data_obat() {
    return '
    <h2>Tambah Data Obat</h2>
    <form action="" method="post">
        <label for="nama_obat">Nama Obat:</label>
        <input type="text" id="nama_obat" name="nama_obat" required>
        
        <label for="jenis">Jenis:</label>
        <input type="text" id="jenis" name="jenis" required>
        
        <label for="stok">Stok:</label>
        <input type="number" id="stok" name="stok" required>
        
        <label for="harga">Harga:</label>
        <input type="number" id="harga" name="harga" step="0.01" required>
        
        <input type="submit" name="submit" value="obat">
    </form>';
}
?>