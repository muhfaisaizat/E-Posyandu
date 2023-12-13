<?php
require"../koneksi.php";
$id_pos = $_GET["kd_nik"];

if (hapusibu($id_pos) > 0) {
  echo "
  <script>
    document.location.href = 'admin.php?page=dataibu'; 
  </script>
  ";
} else {
  echo "
  <script>
    alert('Data Gagal Dihapus');
    document.location.href = 'admin.php?page=dataibu'; 
  </script>
  ";
}
?>
