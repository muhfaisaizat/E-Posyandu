<?php

require '../koneksi.php';
require '../session.php';
if (isset($_POST["simpanakunuser"])) {
    if (edituserakun($_POST) > 0) {
        $_SESSION['nama_adminu'] = $_POST["nama"];
        echo "<script>location='profile.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-posyandu</title>
    <link rel="icon" type="image/svg+xml" href="/assets/imgs/lgposyandu (1).svg">
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="/assets/css/styleadmin.css">
    <link rel="stylesheet" href="/assets/css/tabeladmin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- icon sidebar -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- icon tabel  -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- icon bostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        @media only screen and (max-width: 991px) {
p{
    font-size: 8px;
}
.box-pengaturan{
    height: 70px;
}
.boxsubmain{
    height: 870px;
}
}
    </style>
</head>
<body>
<div class="framesubmain">
    <div class="boxsubmain">
        <div class="d-flex justify-content-between">
        <h1 class="judul">My Profile</h1>
        <a href="user.php">
        <i class="bi bi-arrow-right-circle judul fs-1"></i>
        </a>
        </div>
        <div class="box-pengaturan-profil">
            <div>
                <h4 class="text-p">Foto profil</h4>
            </div>
            <div class="bg-profil">
                <div class="profil">
                    <!-- <img src="/assets/imgs/customer01.jpg" alt=""> -->
                    <label for="fileInput3">
                        <img class="pp3 ganti3" src="" alt="" style="cursor: pointer;">
                    </label>
                    <input type="file" name="foto3" id="fileInput3" accept=".jpg, .jpeg, .png"  hidden> 
                </div>
                <h4 class="nameprofil nameuser"></h4>
                <p class="emailuser" style="font-size: 10px;"></p>
            </div>
        </div>
        <p class="mt-3 mb-3 ps-3">Note : jika anda ingin memperbarui akun masuk <b> harap di isi semua form dibawah ini </b></p>
        <form method="post">
            <div class="box-pengaturan">
                <div class="ps-4 pt-2">
                    <h4 class="fs-5">Username<span style="color: red;">*</span></h4>
                    <p class="">masukan username anda</p>
                </div>
                <div class="input-bg">
                    <input class="input-ds" type="text" name="nama" placeholder="username..." />
                </div>
            </div>
            <!-- <div class="box-pengaturan">
                <div class="ps-4 pt-2">
                    <h4 class="fs-5">Email<span style="color: red;">*</span></h4>
                    <p class="">masukan email anda</p>
                </div>
                <div class="input-bg">
                    <input class="input-ds" type="text" name="Emailbaru" placeholder="...@gmail.com" />
                </div>
            </div> -->
            <div class="box-pengaturan">
                <div class="ps-4 pt-2">
                    <h4 class="fs-5">Password<span style="color: red;">*</span></h4>
                    <p class="">masukan password minimal 8 digit , gunakan password yang kuat</p>
                </div>
                <div class="input-bg">
                    <input class="input-ds" type="password" name="password" placeholder="Passowrd..." />
                </div>
            </div>
            <div class="p-kanan mx-5">
                <button type="submit" name="simpanakunuser" class="btn btn-primary mt-3 mb-4" style="float: right;">Simpan</button>
            </div>
        </form>

    </div>
</div> 
<script>
      document.addEventListener('DOMContentLoaded', function() {

<?php if (isset($_SESSION["role"])) : ?>

    var role = '<?php echo $_SESSION["role"]; ?>';

    if (role === "User") {
        var elementsToDisplayName = document.querySelectorAll('.logoutfilter');
        elementsToDisplayName.forEach(function(element) {
            element.href = "updatestatus.php?NIP=<?php echo isset($_SESSION['id_adminu']) ? $_SESSION['id_adminu'] : ''; ?>";
        });
        // Update elements with user information
        document.querySelectorAll('.status_online').forEach(function(element) {
            element.innerText = "<?php echo isset($_SESSION['online']) ? $_SESSION['online'] : ''; ?>";
        });



        document.querySelectorAll('.nameuser').forEach(function(element) {
            element.innerText = "<?php echo isset($_SESSION['nama_adminu']) ? $_SESSION['nama_adminu'] : ''; ?>";
        });

        document.querySelectorAll('.emailuser').forEach(function(element) {
            element.innerText = "<?php echo isset($_SESSION['id_adminu']) ? $_SESSION['id_adminu'] : ''; ?>";
        });

        // Display user profile picture
        document.querySelectorAll('.pp3').forEach(function(element) {
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



document.addEventListener('DOMContentLoaded', function() {
                var fileInput = document.getElementById('fileInput3');
                var imgElement = document.querySelector('.pp3');
                var imgElement2 = document.querySelector('.ganti3');
                // var imgElement3 = document.querySelector('.ganti2');

                // imgElement.addEventListener('click', function () {
                //     fileInput.click();
                // });

                fileInput.addEventListener('change', function() {
                    if (fileInput.files && fileInput.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            imgElement.src = e.target.result;
                            imgElement2.src = e.target.result;
                            // imgElement3.src = e.target.result;
                        };

                        reader.readAsDataURL(fileInput.files[0]);

                        // Trigger file upload when a file is selected
                        sendFileToServer(fileInput.files[0]);
                    }
                });

                // Fungsi untuk mengirim file ke server
                function sendFileToServer(file) {
                    var formData = new FormData();
                    formData.append('foto', file);

                    fetch('../admin/fotofolder.php', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.text())
                        .then(data => {
                            if (data.status === 'error') {
                                alert(data.message); // Menampilkan pesan kesalahan sebagai popup
                            } else {
                                console.log('Server response:', data);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                }
            });
</script>
</body>
</html>