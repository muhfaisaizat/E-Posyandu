







<div class="framesubmain">

    <div class="tablesubmain">
        <h2><b>Chat</b> Masuk</h2>
        <div class="container mt-5 tableFixHead3 " id="chatContainer1">
            
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
                        <div class="">
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
        </div>
    </div>
</div>




<!-- Meta tag for automatic refresh every 1 second -->
<!-- <meta http-equiv="refresh" content="1;url=admin.php?page=datachat"> -->

<!-- JavaScript to refresh the chatContainer div every 1 second -->
<script>
    function perbaruiKontenChat() {
        // Menggunakan Fetch API untuk memuat ulang konten div dari server
        fetch('form/chatrfs.php')
            .then(response => response.text())
            .then(data => {
                // Memperbarui konten div
                document.getElementById('chatContainer1').innerHTML = data;
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    // Memuat ulang konten div setiap 1 detik
    setInterval(perbaruiKontenChat, 1000);
</script>