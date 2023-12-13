<?php
require"../koneksi.php";
$id_pos = $_GET["kd_Vaksin"];

if (hapusvak($id_pos) > 0) {
  echo "
  <script>
    document.location.href = 'admin.php?page=datavaksin'; 
  </script>
  ";
} else {
  echo "
  <script>
    alert('Data Gagal Dihapus');
    document.location.href = 'admin.php?page=datavaksin'; 
  </script>
  ";
}
?>
