<?php 
require '../../koneksi.php';
?>
<?php foreach ($chatbidan as $row) : ?>
            <div class="row">
                <a href="admin.php?page=datachatbalas&idpesan=<?= $row["idpesankirim"]; ?>" style="color: black; text-decoration: none;">
                <div class="col-12 p-3  warna-chat border-bottom">
                    <div class="media d-flex justify-content-between">
                        <div class="d-flex " style="width: 400px;">
                            <div class="me-3 ms-3">
                                <img src="/assets/imgs/<?= $row["foto"]; ?>" class="mr-3 rounded-circle" alt="User Avatar" width="50px" height="50px">
                            </div>
                            <div class="media-body">
                                <h5 class="mt-0"><?= $row["nama"]; ?></h5>
                                <p><?= $row["pesan"]; ?></p>
                                <small class="text-muted"><?= $row["waktu_format"]; ?></small>
                                <i class="bi bi-check-all text-success"></i>
                            </div>
                        </div>
                      
                        <div class="d-flex flex-column justify-content-center" style="width: 100px;">
                        <div class=" ">
                        <!-- <span class="badge bg-danger rounded-pill">+1</span> -->
                        <div class="text-info">
                            <i class="bi bi-circle-fill"></i>
                            <?= $row["status_aktif"]; ?>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
<?php endforeach; ?>