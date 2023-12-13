<?php
require"../koneksi.php";
$id_pos = $_GET["idk"];

if (hapususer($id_pos) > 0) {
  echo "
  <script>
    document.location.href = 'admin.php?page=datauser'; 
  </script>
  ";
} else {
  echo "
  <script>
    alert('Data Gagal Dihapus');
    document.location.href = 'admin.php?page=datauser'; 
  </script>
  ";
}
?>