<link rel="stylesheet" href="assets/styles/navbar.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<nav class="navbar">
  <div class="navbar-brand">
    <button class="navbar-toggler" onclick="toggleSidebar()">
      <i class="fas fa-bars"></i>
    </button>
    <a href="index.php" class="logo">Klinik </a>
  </div>
</nav>

<div class="sidebar" id="sidebar">
  <div class="sidebar-header">
    <h3>Menu</h3>
  </div>
  <ul class="sidebar-menu">
    <li><a href="index.php"><i class="fas fa-home"></i> Dashboard</a></li>
    <li class="sidebar-dropdown">
      <a href="#"><i class="fas fa-database"></i> Data <i class="fas fa-chevron-down"></i></a>
      <ul class="sidebar-submenu">
        <li><a href="data_dokter.php">Data Dokter</a></li>
        <li><a href="data_pasien.php">Data Pasien</a></li>
        <li><a href="data_poli.php">Data Poli</a></li>
        <li><a href="transaksi_berobat.php">Transaksi Berobat</a></li>
        <li><a href="data_obat.php">Data Obat</a></li>
      </ul>
    </li>
    <li class="sidebar-dropdown">
      <a href="#"><i class="fas fa-chart-bar"></i> Laporan <i class="fas fa-chevron-down"></i></a>
      <ul class="sidebar-submenu">
        <li><a href="laporan_dokter.php">Laporan Dokter</a></li>
        <li><a href="laporan_pasien.php">Laporan Pasien</a></li>
        <li><a href="laporan_poli.php">Laporan Poli</a></li>
        <li><a href="laporan_transaksi.php">Laporan Transaksi</a></li>
      </ul>
    </li>
  </ul>
</div>

<script>
function toggleSidebar() {
  const sidebar = document.getElementById('sidebar');
  const content = document.querySelector('.content');
  sidebar.classList.toggle('active');
  content.classList.toggle('active');
}

document.addEventListener('DOMContentLoaded', function() {
  const dropdowns = document.querySelectorAll('.sidebar-dropdown > a');
  dropdowns.forEach(dropdown => {
    dropdown.addEventListener('click', function(e) {
      e.preventDefault();
      this.parentElement.classList.toggle('active');
    });
  });
});
</script>
