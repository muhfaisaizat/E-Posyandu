<?php 
require '../../koneksi.php';
?>



<div style="padding-bottom: 150px;">
<?php 
$id_pesan = $_SESSION['id_pesan'];

if (isset($_SESSION["role"])) {
    $role = $_SESSION["role"];
    if ($role === "Bidan") {
        $output = "";
        $sql4 = "SELECT
            chat.id_chat,
            chat.idpesanmasuk,
            chat.idpesankirim,
            chat.pesan,
            DATE_FORMAT(chat.waktu, '%h:%i %p | %b %d') AS waktu_format,
            data_user.nama,
            COALESCE(NULLIF(foto, ''), 'userpp.png') AS foto,
            data_user.status_aktif
        FROM
            `chat`
        LEFT JOIN
            data_user ON chat.idpesankirim = data_user.email
        WHERE chat.idpesankirim= '$id_pesan' AND chat.idpesanmasuk='" . $_SESSION['nip'] . "' 
        OR chat.idpesankirim='" . $_SESSION['nip'] . "' AND chat.idpesanmasuk='$id_pesan';";

        $querychat = mysqli_query($koneksi, $sql4);
        if(mysqli_num_rows($querychat) > 0){
            while($row = mysqli_fetch_assoc($querychat)){
                if($row['idpesankirim'] === $id_pesan){
                    $output .= '<div class="d-flex flex-row justify-content-start">
                    <img src="/assets/imgs/'. $row["foto"] .'" class="mr-3 rounded-circle" alt="User Avatar" width="40" height="40">
                    <div style="max-width: 500px;">
                        <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">'. $row["pesan"] .'</p>
                        <p class="small ms-3 mb-3 rounded-3 text-muted float-end">'. $row["waktu_format"] .'</p>
                    </div>
                </div>';
                } else {
                    $output .= '<div class="d-flex flex-row justify-content-end">
                    <div style="max-width: 500px;">
                        <p class="small p-2 me-3 mb-1 rounded-3 " style="background-color: #f5f6f7;">'. $row["pesan"] .'</p>
                        <p class="small me-3 mb-3 rounded-3 text-muted">'. $row["waktu_format"] .'</p>
                    </div>
                    <img src="/assets/imgs/'.$_SESSION['foto_adminb'].'" class="mr-3 rounded-circle " alt="User Avatar" width="40" height="40">
                </div>';
                }
            }
        }
        echo $output;
    }
}

?>
</div>


