<?php
require"../koneksi.php";
$id_pos = $_GET["kd_pos"];

if (hapusPos($id_pos) > 0) {
  echo "
  <script>
    document.location.href = 'admin.php?page=datapos'; 
  </script>
  ";
} else {
  echo "
  <script>
    alert('Data Gagal Dihapus');
    document.location.href = 'admin.php?page=datapos'; 
  </script>
  ";
}
?>
