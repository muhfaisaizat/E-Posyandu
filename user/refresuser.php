<?php
require '../koneksi.php';
?>

<?php foreach ($chatuser as $row) : ?>
    <div class="row">
        <a href="userchat.php?idpesan=<?= $row["idpesankirim"]; ?>" style="color: black; text-decoration: none;" id="linkUserChat">
            <div class="col-12 p-3  warna-chat border-bottom">
                <div class="media d-flex justify-content-between">
                    <div class="d-flex " style="width: 400px;">
                        <div class="me-3 ms-3">
                            <img src="/assets/imgs/<?= $row["foto"]; ?>" class="mr-3 rounded-circle" alt="User Avatar" width="50px" height="50px">
                        </div>
                        <div class="media-body">
                            <h5 class="mt-0">Bidan <?= $row["Nama"]; ?></h5>
                            <p><?= $row["pesan"]; ?></p>
                            <small class="text-muted"><?= $row["waktu_format"]; ?></small>
                            <i class="bi bi-check-all text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
<?php endforeach; ?>