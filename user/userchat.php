<?php
require '../koneksi.php';
require '../session.php';
$id_pesan = $_GET["idpesan"];
$_SESSION['id_pesan'] = $id_pesan;

if (isset($_SESSION["role"])) {
    $role = $_SESSION["role"];
    if ($role === "User") {

        $sql3 = "SELECT *, COALESCE(NULLIF(foto, ''), 'userpp.png') AS foto_default  FROM `data_bidan` WHERE data_bidan.NIP='$id_pesan';";
        $balasbidan3 = query($sql3);


        // jumlah data
        // $jumlah_data="SELECT COUNT(*) AS jumlah_data
        // FROM `chat`
        // WHERE (chat.idpesankirim = '$id_pesan' AND chat.idpesanmasuk = '" . $_SESSION['id_adminu'] . "') 
        //    OR (chat.idpesankirim = '" . $_SESSION['id_adminu'] . "' AND chat.idpesanmasuk = '$id_pesan');";
        // $jumlahdata = query($jumlah_data);
    }
}

if (isset($_POST["kirim"])) {
    if (inserpesan($_POST) > 0) {
        echo "<script>location='admin.php?page=datachatbalas&idpesan={$_POST['iduser']}';</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="/assets/imgs/lgposyandu (1).svg">
    <title>e-posyandu</title>
    <!-- <link rel="stylesheet" href="/assets/css/styleuser.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/tabeladmin.css">
     <!-- icon tabel  -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <style>
        @media only screen and (max-width: 600px) {

.sembunyi{
    display: none;

}

        }
     </style>
</head>
<body>



<div class="contsiner m-4 d-flex justify-content-between" style="height: 700px;">
    <div class="col me-3" style="background-color: #0d6dfd2e; border-radius:30px;">
        <!-- header pp -->
        <div class="d-flex justify-content-between col " style="border-radius: 30px; background-color: #ffffff; box-shadow: 0 -7px 25px rgba(0, 0, 0, 0.08);">
            <div class=" p-3 d-flex " style="width: 300px;">
                <?php foreach ($balasbidan3 as $row) : ?>
                    <div class="me-3 ms-3">
                        <img src="/assets/imgs/<?= $row["foto_default"]; ?>" class="mr-3 rounded-circle" alt="User Avatar" width="50px" height="50px">
                    </div>
                    <div class="media-body">

                        <h5 class="mt-0"><?= $row["Nama"]; ?></h5>
                        <i class="bi bi-circle-fill status_online" data-session-status="<?= $row["status_aktif"]; ?>"></i>
                        <small class="text-muted"><?= $row["status_aktif"]; ?></small>

                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-m-12 d-flex flex-column justify-content-center pe-3 efektangan">
                <a href="user.php" style="color: none;">
                    <i class="bi bi-arrow-right fs-1"></i>
                </a>
            </div>
        </div>


        <!-- balas chat -->

        <div class="container p-4 chatbalasContainer" style="height: 570px; overflow: scroll; ">
        <div id="chatMessages" style="padding-bottom: 50px;" >
            <?php
            // $id_pesan = $_SESSION['id_pesan'];

            if (isset($_SESSION["role"])) {
                $role = $_SESSION["role"];
                if ($role === "User") {
                    $output = "";
                    $sql4 = "SELECT
            chat.id_chat,
            chat.idpesanmasuk,
            chat.idpesankirim,
            chat.pesan,
            DATE_FORMAT(chat.waktu, '%h:%i %p | %b %d') AS waktu_format,
            data_bidan.Nama,
      data_bidan.NIP,
      data_bidan.foto,
      data_bidan.status_aktif
        FROM
            `chat`
        LEFT JOIN
        data_bidan ON chat.idpesankirim = data_bidan.NIP
        WHERE chat.idpesankirim= '$id_pesan' AND chat.idpesanmasuk='" . $_SESSION['id_adminu'] . "' 
        OR chat.idpesankirim='" . $_SESSION['id_adminu'] . "' AND chat.idpesanmasuk='$id_pesan';";

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
                    <div style="max-width: 500px;" >
                        <p class="small p-2 me-3 mb-1 rounded-3 " style="background-color: #f5f6f7;">' . $row["pesan"] . '</p>
                        <p class="small me-3 mb-3 rounded-3 text-muted">' . $row["waktu_format"] . '</p>
                    </div>
                    <img src="" class="mr-3 rounded-circle pp ppuser" alt="User Avatar" width="40" height="40">
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
                    <input name="nip" type="text" value="<?= $_SESSION['id_adminu'] ?>" hidden>
                    <input name="iduser" type="text" value="<?= $_SESSION['id_pesan'] ?>" hidden>

                    <input name="pesanbidan" type="text"  class="form-control form-control-lg ms-5" placeholder="Type message" id="pesanbidanInput">

                    <a type="button" class="ms-3 fs-1 linkUserChat" name="kirim" id="submitFormpesan" >
                        <i class="bi bi-telegram"></i>
                    </a>

                </div>
            </div>
        </form>
    </div>
























    <!-- melihat chat masuk -->



    <div class="col-l-3 ps-3 pe-3 sembunyi" style="background-color: #ffffff; box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08); border-radius:30px;">
        <!-- <h2><b>Chat</b> Masuk</h2> -->

        <div class="container mt-5 ps-5  " style="width: 300px; overflow:auto; height:650px;">

            <div class="row">
                <div class="ms-3">
                <h1 class="mb-3 ms-3">E-Posyandu</h1>
                </div>
               
                <div class=" ps-4 ms-2">
                    <div class="search-box mt-3">
                        <i class="material-icons">&#xE8B6;</i>
                        <input id="searchInput" type="text" class="form-control" placeholder="Search&hellip;">
                    </div>
                </div>
            </div>
            <div class="balasContainer">
                <?php foreach ($chatuser as $row) : ?>
                    <div class="row mt-3">
                        <a href="admin.php?page=datachatbalas&idpesan=<?= $row["idpesankirim"]; ?>" style="color: black; text-decoration: none;">
                            <div class="col-11 p-3  warna-chat border-bottom" onclick="toggleContent('bidanContent')">
                                <div class="media d-flex justify-content-between">
                                    <div class="d-flex justify-content" style="width: 400px;">
                                        <div class="me-3 ms-3">
                                            <img src="/assets/imgs/<?= $row["foto"]; ?>" class="mr-3 rounded-circle" alt="User Avatar" width="50px" height="50px">
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0"><?= $row["Nama"]; ?></h6>
                                            <div class="tableFixHead5" style="width: 100px; font-size:8px;">
                                                <p><?= $row["pesan"]; ?></p>
                                            </div>
                                            <small class="text-muted"><?= $row["waktu_format"]; ?></small>
                                            <i class="bi bi-check-all text-success"></i>
                                        </div>
                                    </div>

                                    <div class="me-5 d-flex flex-column justify-content-center" style="width: 100px;">
                                        <div class=" d-flex justify-content-between">
                                            <!-- <span class="badge bg-danger rounded-pill">+999</span> -->

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

document.addEventListener('DOMContentLoaded', function() {

<?php if (isset($_SESSION["role"])) : ?>

    var role = '<?php echo $_SESSION["role"]; ?>';

    if (role === "User") {
        // Update elements with user information
        document.querySelectorAll('.nameuser').forEach(function(element) {
            element.innerText = "<?php echo isset($_SESSION['nama_adminu']) ? $_SESSION['nama_adminu'] : ''; ?>";
        });

        document.querySelectorAll('.emailuser').forEach(function(element) {
            element.innerText = "<?php echo isset($_SESSION['id_adminu']) ? $_SESSION['id_adminu'] : ''; ?>";
        });

        // Display user profile picture
        document.querySelectorAll('.ppuser').forEach(function(element) {
            var fotoUrl = "<?php echo isset($_SESSION['foto_adminu']) ? $_SESSION['foto_adminu'] : ''; ?>";

            if (fotoUrl === '' || fotoUrl === null) {
                element.src = '/assets/imgs/userpp.png';
            } else {
                element.src = '/assets/imgs/' + fotoUrl;
            }
        });
    }

<?php endif; ?>


});



    function perbaruiKontenChat() {
        // Menggunakan Fetch API untuk memuat ulang konten div dari server
        fetch('userrfs.php')
            .then(response => response.text())
            .then(data => {
                // Memperbarui konten div
                document.querySelector('.balasContainer').innerHTML = data;
            })
            .catch(error => console.error('Error fetching data:', error));
    }

//     var container = document.querySelector(".chatbalasContainer");
// var autoScrollEnabled = true;
// var updatingContent = false;

// // Event listener untuk mendeteksi peristiwa scroll
// container.addEventListener('scroll', function() {
//     // Jika pengguna sedang melihat pesan lama (scroll ke atas), nonaktifkan auto-scroll
//     if (container.scrollTop < container.scrollHeight - container.clientHeight) {
//         autoScrollEnabled = false;
//     } else {
//         // Jika pengguna sudah kembali ke pesan terbaru (scroll ke bawah), aktifkan auto-scroll
//         autoScrollEnabled = true;
//     }
// });

function perbaruiKontenChatbalas() {
  

        fetch('userbalas.php')
            .then(response => response.text())
            .then(data => {
                // Memperbarui konten div
                document.querySelector('.chatbalasContainer').innerHTML = data;

             
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                updatingContent = false; // Pastikan untuk menyetel kembali ke false jika ada kesalahan
            });
    // }
}

// Jalankan fungsi perbaruiKontenChatbalas secara teratur
setInterval(perbaruiKontenChatbalas, 800);


    // Memuat ulang konten div setiap 1 detik
    // setInterval(perbaruiKontenChat, 800);
    // setInterval(perbaruiKontenChatbalas, 800);

    



    document.getElementById('submitFormpesan').addEventListener('click', function () {
    var form = document.getElementById('myFormpesan');
    var formData = new FormData(form);
    var inputElementclear = document.getElementById('pesanbidanInput');

    fetch('../admin/kirimpesan.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log('Server response:', data);

        // Memanggil fungsi scrollToBottom langsung
        scrollToBottom();
        inputElementclear.value = '';
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

chatBox = document.querySelector(".chatbalasContainer");

function scrollToBottom() {
    chatBox.scrollTop = chatBox.scrollHeight;
}


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


document.addEventListener("DOMContentLoaded", function() {
    var elementsToUpdateStyle = document.querySelectorAll('.status_online');

    elementsToUpdateStyle.forEach(function(element) {
        // Check the value of status_aktif from the database
        var statusAktif = element.dataset.sessionStatus;

        // If status_aktif is 'active', add the 'text-success' class
        if (statusAktif === 'online') {
            element.classList.add('text-success');
        } else {
            // If status_aktif is 'nonactive', add the 'text-muted' class
            element.classList.add('text-muted');
        }
    });
});
</script>
</body>

</html>