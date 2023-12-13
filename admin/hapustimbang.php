<?php
require"../koneksi.php";
$id_pos = $_GET["nikanak"];

if (hapustimbang($id_pos) > 0) {
  echo "
  <script>
    document.location.href = 'admin.php?page=datatimbang'; 
  </script>
  ";
} else {
  echo "
  <script>
    alert('Data Gagal Dihapus');
    document.location.href = 'admin.php?page=datatimbang'; 
  </script>
  ";
}
?>