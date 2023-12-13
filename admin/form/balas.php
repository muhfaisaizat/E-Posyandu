<?php
$id_pesan = $_GET["idpesan"];
$_SESSION['id_pesan'] = $id_pesan;

if (isset($_SESSION["role"])) {
    $role = $_SESSION["role"];
    if ($role === "Bidan") {

        $sql3 = "SELECT *,COALESCE(NULLIF(foto, ''), 'userpp.png') AS foto FROM `data_user` WHERE data_user.email='$id_pesan';";
        $balasbidan3 = query($sql3);

       
    }
}

if (isset($_POST["kirim"])) {
    if (inserpesan($_POST) > 0) {
        echo "<script>location='admin.php?page=datachatbalas&idpesan={$_POST['iduser']}';</script>";
    }
}
?>







<div class="contsiner m-4 d-flex " style="height: 630px;">
    <div class="col me-3" style="background-color: #0d6dfd2e; border-radius:30px;">
        <!-- header pp -->
        <div class="d-flex justify-content-between col " style="border-radius: 30px; background-color: #ffffff; box-shadow: 0 -7px 25px rgba(0, 0, 0, 0.08);">
            <div class=" p-3 d-flex " style="width: 300px;">
                <?php foreach ($balasbidan3 as $row) : ?>
                    <div class="me-3 ms-3">
                        <img src="/assets/imgs/<?= $row["foto"]; ?>" class="mr-3 rounded-circle" alt="User Avatar" width="50px" height="50px">
                    </div>
                    <div class="media-body">

                        <h5 class="mt-0"><?= $row["nama"]; ?></h5>
                        <i class="bi bi-circle-fill status_online" data-session-status="<?= $row["status_aktif"]; ?>"></i>
                        <small class="text-muted"><?= $row["status_aktif"]; ?></small>

                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-m-12 d-flex flex-column justify-content-center pe-3 efektangan">
                <a href="admin.php?page=datachat" style="color: none;">
                    <i class="bi bi-arrow-right fs-1"></i>
                </a>
            </div>
        </div>


        <!-- balas chat -->

        <div class="contsiner p-4 chatbalasContainer" style="height: 500px;  overflow: auto; ">
        <div  style="padding-bottom: 150px;">
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
                    if (mysqli_num_rows($querychat) > 0) {
                        while ($row = mysqli_fetch_assoc($querychat)) {
                            if ($row['idpesankirim'] === $id_pesan) {
                                $output .= '<div class="d-flex flex-row justify-content-start">
                    <img src="/assets/imgs/' . $row["foto"] . '" class="mr-3 rounded-circle" alt="User Avatar" width="40" height="40">
                    <div style="max-width: 500px;">
                        <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">' . $row["pesan"] . '</p>
                        <p class="small ms-3 mb-3 rounded-3 text-muted float-end">' . $row["waktu_format"] . '</p>
                    </div>
                </div>';
                            } else {
                                $output .= '<div class="d-flex flex-row justify-content-end">
                    <div style="max-width: 500px;">
                        <p class="small p-2 me-3 mb-1 rounded-3 " style="background-color: #f5f6f7;">' . $row["pesan"] . '</p>
                        <p class="small me-3 mb-3 rounded-3 text-muted">' . $row["waktu_format"] . '</p>
                    </div>
                    <img src="" class="mr-3 rounded-circle pp" alt="User Avatar" width="40" height="40">
                </div>';
                            }
                        }
                    }
                    echo $output;
                }
            }

            ?>
        </div>
        </div>
























        <!-- kirimn -->
        <form method="post" id="myFormpesan" style="height: 65px;">
            <div class=" bg-white" style=" border-radius:30px; box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);">
                <div class="text-muted d-flex justify-content-start align-items-center pe-3  pt-2 pb-2">
                    <input name="nip" type="text" value="<?= $_SESSION['nip'] ?>" hidden>
                    <input name="iduser" type="text" value="<?= $_SESSION['id_pesan'] ?>" hidden>

                    <input name="pesanbidan" type="text"  class="form-control form-control-lg ms-5" placeholder="Type message" id="pesanbidanInput">

                    <a type="button" class="ms-3 fs-1" name="kirim" id="submitFormpesan" >
                        <i class="bi bi-telegram"></i>
                    </a>

                </div>
            </div>
        </form>
    </div>
























    <!-- melihat chat masuk -->



    <div class="col-lg-3 " style="background-color: #ffffff; box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08); border-radius:30px;">
        <!-- <h2><b>Chat</b> Masuk</h2> -->

        <div class="container mt-5 ps-5 tableFixHead4 " style="width: 300px;">

            <div class="row">
                <div class="col-12 ps-4 ms-2">
                    <div class="search-box mt-3">
                        <i class="material-icons">&#xE8B6;</i>
                        <input type="text" id="searchInput" class="form-control" placeholder="Search&hellip;">
                    </div>
                </div>
            </div>
            <div class="balasContainer">
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
            </div>
        </div>
    </div>
</div>



<script>
    function perbaruiKontenChat() {
        // Menggunakan Fetch API untuk memuat ulang konten div dari server
        fetch('form/balasrfs.php')
            .then(response => response.text())
            .then(data => {
                // Memperbarui konten div
                document.querySelector('.balasContainer').innerHTML = data;
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    function perbaruiKontenChatbalas() {
        // Menggunakan Fetch API untuk memuat ulang konten div dari server
        fetch('form/balaspesan.php')
            .then(response => response.text())
            .then(data => {
                // Memperbarui konten div
                document.querySelector('.chatbalasContainer').innerHTML = data;
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    // Memuat ulang konten div setiap 1 detik
    // setInterval(perbaruiKontenChat, 800);
    setInterval(perbaruiKontenChatbalas, 800);




    document.getElementById('submitFormpesan').addEventListener('click', function () {
    var form = document.getElementById('myFormpesan');
    var formData = new FormData(form);
    var container = document.querySelector(".chatbalasContainer");
    var inputElementclear = document.getElementById('pesanbidanInput');



    fetch('kirimpesan.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        if (data.status === 'error') {
            alert(data.message);
        } else {
            console.log('Server response:', data);

         
            var newMessageHeight = 70;

            setTimeout(function() {
                container.style.scrollBehavior = 'smooth';
                container.scrollTop = container.scrollHeight;
            }, 50);

            // Mengosongkan nilai input
inputElementclear.value = '';
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});



    document.addEventListener("DOMContentLoaded", function () {
    var container = document.querySelector(".chatbalasContainer");
    container.scrollTop = container.scrollHeight;
});





document.addEventListener("DOMContentLoaded", function() {
    // Inisialisasi interval
    let intervalId;

    // Ambil elemen input dan tambahkan event listener
    const searchInput = document.getElementById("searchInput");
    searchInput.addEventListener("input", function() {
        const searchTerm = searchInput.value.toLowerCase();
        
        // Ambil semua elemen dengan class "balasContainer"
        const balasContainer = document.querySelectorAll('.balasContainer .row');

        // Loop melalui setiap elemen dan sembunyikan/munculkan sesuai dengan pencarian
        balasContainer.forEach(function(row) {
            const nama = row.querySelector('.media-body h6').innerText.toLowerCase();
            if (nama.includes(searchTerm)) {
                // Jika nama cocok dengan pencarian, munculkan
                row.style.display = 'block';
            } else {
                // Jika nama tidak cocok, sembunyikan
                row.style.display = 'none';
            }
        });

        // Hentikan interval jika sedang mencari
        clearInterval(intervalId);

        // Cek apakah input kosong atau telah dihapus
        if (!searchTerm) {
            // Jika input kosong, inisialisasi ulang interval
            intervalId = setInterval(perbaruiKontenChat, 800);
        }
    });

    // Inisialisasi ulang interval pada awalnya
    intervalId = setInterval(perbaruiKontenChat, 800);
});



</script>