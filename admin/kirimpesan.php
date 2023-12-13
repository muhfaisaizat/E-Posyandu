<?php
require '../koneksi.php';
header('Content-Type: application/json');



// Lakukan sesuatu dengan waktu sekarang, seperti menyimpannya dalam sesi

$_SESSION['waktu_sekarang'] = time();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nip = $_POST["nip"];
    $iduser = $_POST["iduser"];
    $ps = $_POST["pesanbidan"];

    // Perform the database insertion
    $query = "INSERT INTO `chat` (`id_chat`, `idpesanmasuk`, `idpesankirim`, `pesan`, `waktu`) VALUES (NULL, '$iduser', '$nip', '$ps', NOW());";
    
    // Execute the query
    mysqli_query($koneksi, $query);

    $response = array('status' => 'success', 'message' => 'Message sent successfully', 'iduser' => $iduser);
    echo json_encode($response);
} else {
    $response = array('status' => 'error', 'message' => 'Invalid request method');
    echo json_encode($response);
}

?>
