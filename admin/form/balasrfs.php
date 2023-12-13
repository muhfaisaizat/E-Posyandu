<?php
require '../../koneksi.php';
?>
<?php foreach ($chatbidan as $row) : ?>
    <div class="row mt-3">
        <a href="admin.php?page=datachatbalas&idpesan=<?= $row["idpesankirim"]; ?>" style="color: black; text-decoration: none;">
            <div class="col-11 p-3  warna-chat border-bottom" onclick="toggleContent('bidanContent')">
                <div class="media d-flex justify-content-between">
                    <div class="d-flex justify-content" style="width: 400px;">
                        <div class="me-3 ms-3">
                            <img src="/assets/imgs/<?= $row["foto"]; ?>" class="mr-3 rounded-circle" alt="User Avatar" width="50px" height="50px">
                        </div>
                        <div class="media-body">
                            <h6 class="mt-0"><?= $row["nama"]; ?></h6>
                            <div class="tableFixHead5" style="width: 100px; font-size:8px;">
                                <p><?= $row["pesan"]; ?></p>
                            </div>
                            <small class="text-muted"><?= $row["waktu_format"]; ?></small>
                            <i class="bi bi-check-all text-success"></i>
                        </div>
                    </div>

                </div>
            </div>
        </a>
    </div>
<?php endforeach; ?>