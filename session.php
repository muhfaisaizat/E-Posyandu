<!-- cek apakah sudah login -->
<?php

if (!isset($_SESSION['role'])) {
  header("location:../index.php");
} else {
  $role = $_SESSION['role'];
}
?>