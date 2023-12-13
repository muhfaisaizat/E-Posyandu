<?php
require"../koneksi.php";
$id_pos = $_GET["NIP"];

if (editstatusbidan($id_pos) > 0) {
  echo "
  <script>
    document.location.href = '/logout.php'; 
  </script>
  ";
} else {
  echo "
  <script>
   
    document.location.href = 'admin.php?page=dashboard'; 
  </script>
  ";
}
?>