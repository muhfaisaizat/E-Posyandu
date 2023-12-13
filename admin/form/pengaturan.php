<?php
if (isset($_POST["simpanpengaturan"])) {
    if (isset($_SESSION["role"])) {

        $role = $_SESSION["role"];

        if ($role === "Admin") {
            if (editadmin($_POST) > 0) {
                echo "<script>location='admin.php?page=pengaturan';</script>";
            }
        }
        if ($role === "Bidan") {
         
            if (editbidanakun($_POST) > 0) {
                echo "<script>location='admin.php?page=pengaturan';</script>";
            }
        
        }
        if ($role === "Kader") {
            if (editkaderakun($_POST) > 0) {
                echo "<script>location='admin.php?page=pengaturan';</script>";
            }
        }
    }
}
?>










<div class="framesubmain">
    <div class="boxsubmain">
        <h1 class="judul">Pengaturan</h1>
        <div class="box-pengaturan-profil">
            <div>
                <h4 class="text-p">Foto profil</h4>
            </div>
            <div class="bg-profil">
                <div class="profil">
                    <!-- <img src="/assets/imgs/customer01.jpg" alt=""> -->
                    <label for="fileInput">
                        <img class="pp ganti" src="" alt="" style="cursor: pointer;">
                    </label>
                    <input type="file" name="foto" id="fileInput" accept=".jpg, .jpeg, .png"  hidden> 
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
                    <input class="input-ds" type="text" name="username" placeholder="username..." />
                </div>
            </div>
            <div class="box-pengaturan">
                <div class="ps-4 pt-2">
                    <h4 class="fs-5">Email<span style="color: red;">*</span></h4>
                    <p class="">masukan email anda</p>
                </div>
                <div class="input-bg">
                    <input class="input-ds" type="text" name="id" placeholder="...@gmail.com" value="<?php echo isset($_SESSION['idk']) ? $_SESSION['idk'] : ''; ?>"  hidden/>
                    <input class="input-ds" type="text" name="nip" placeholder="...@gmail.com" value="<?php echo isset($_SESSION['nip']) ? $_SESSION['nip'] : ''; ?>"  hidden/>
                    <input class="input-ds" type="text" name="Emaildb" placeholder="...@gmail.com" value="<?php echo isset($_SESSION['id_admin']) ? $_SESSION['id_admin'] : ''; ?>" hidden />
                    <input class="input-ds" type="text" name="Emailbaru" placeholder="...@gmail.com" />
                </div>
            </div>
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
                <button type="submit" name="simpanpengaturan" class="btn btn-primary mt-3 mb-4" style="float: right;">Simpan</button>
            </div>
        </form>

    </div>
</div>










<script>
    
    document.addEventListener('DOMContentLoaded', function () {
    var fileInput = document.getElementById('fileInput');
    var imgElement = document.querySelector('.pp');
    var imgElement2 = document.querySelector('.ganti');

    imgElement.addEventListener('click', function () {
        fileInput.click();
    });

    fileInput.addEventListener('change', function () {
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                imgElement.src = e.target.result;
                imgElement2.src = e.target.result;
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
     
        fetch('fotofolder.php', {
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