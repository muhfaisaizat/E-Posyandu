<?php
if (isset($_POST["simpanimu"])) {
    if (insertimu($_POST) > 0) {
//         echo '<script>
//     document.addEventListener("DOMContentLoaded", function() {
//         // Buat pesan popup dengan Bootstrap
//         var popup = document.createElement("div");
//         popup.className = "alert alert-success alert-dismissible fade show";
//         popup.innerHTML = "Data tersimpan";
//         popup.style.position = "fixed";
//         popup.style.top = "0";
//         popup.style.left = "0";
//         popup.style.right = "0";
//         popup.style.zIndex = "9999";
//         popup.style.textAlign = "center";
//         popup.style.fontSize = "15px";
    
//         // Tambahkan tombol close ke pesan popup
//         var closeButton = document.createElement("button");
//         closeButton.type = "button";
//         closeButton.className = "close";
//         closeButton.setAttribute("data-dismiss", "alert");
//         closeButton.setAttribute("aria-label", "Close");
//         closeButton.style.border = "none"; // Menghilangkan border
//         closeButton.style.backgroundColor = "transparent"; // Menghilangkan warna latar belakang
//         closeButton.style.color = "red"; // Mengubah warna ikon menjadi hitam
//         closeButton.style.marginLeft = "10px";
    
//         var closeIcon = document.createElement("span");
//         closeIcon.setAttribute("aria-hidden", "true");
//         closeIcon.innerHTML = "&times;";
    
//         closeButton.appendChild(closeIcon);
//         popup.appendChild(closeButton);
    
//         // Tambahkan pesan popup ke dalam body
//         document.body.appendChild(popup);
    
//         // Redirect ke halaman datatimbang setelah beberapa detik (misalnya, 3 detik)
//         setTimeout(function() {
//             location.href = "admin.php?page=dataimu";
//         }, 3000);
//     });
// </script>';
echo "<script>location='admin.php?page=dataimu';</script>";
    }
}
?>













<div style="width: 600px;">

    <h2>Form<b> Data Imunisasi</b></h2>
    <form method="post">
    <div class="form-group">
        <!-- <label>Input orang tua:</label> -->
                    <p style="font-size: 10px;"> cari nama anak di search.  Jika nama anak tidak muncul lakuan register data anak </p>
        </div>
        <div class="form-group">
            <label for="pos">cari data orang tua:</label>
            <select class="form-control" id="pos1" name="pos1">
                <option value="pos0">cari</option>
                <?php
                foreach ($dataanak as $row) {
                    $nik = $row["NIK"];
                    $namaanak = $row["nama_anak"];
                    $namaibu = $row["nama_ibu"];
                    $namaayah = $row["suami"];
                    $tgl = $row["tgl_lahir"];
                    $bbl = $row["BBL"];
                    $kdp = $row["kd_pos"];
                    $nmpos = $row["nama_posyandu"];

                    echo "<option>$kdp - $nmpos - $nik - $namaanak - $namaibu - $namaayah - $tgl</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="nama">NIK:</label>
            <input type="text" class="form-control" id="nik" name="nik">
        </div>
        <div class="form-group">
            <label for="nik">Nama balita:</label>
            <input type="text" class="form-control" id="nama" name="nama">
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                <label for="nama_ayah">Nama Ayah:</label>
            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                <label for="nama_ibu">Nama Ibu:</label>
            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu">
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col">
                <div class="form-group">
                    <label for="tempat_lahir">Tanggal Lahir:</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tempat_lahir">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="tempat_lahir">Tanggal imunisasi:</label>
                    <input type="date" class="form-control" id="tanggal_timbang" name="tanggal_imu">
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col">
                <div class="form-group">
                <label for="nama_ayah">Pos:</label>
            <input type="text" class="form-control" id="namapos" name="bbl">
            
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                <label for="nama_ibu">Pelayanan diberikan:</label>
            <input type="text" class="form-control" id="hasiltimb" name="pelayanan">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="pos">Vaksin:</label>
            <select class="form-control" id="pos" name="vaksin">
                <option value="pos0" id="namapos" name="namaposyandu">Pilih vaksin</option>
                <?php
                foreach ($datavaksin as $row) {
                    $kdpos = $row['kd_vaksin'];
                    $nama = $row['nama_vaksin'];
                    echo "<option value='$kdpos'>$nama</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" name="simpanimu" class="btn btn-primary mt-3 mb-4" style="float: right;">Simpan</button>
    </form>
</div>





















<script>
    // select cari
    document.addEventListener("DOMContentLoaded", function() {
        var selectPos = document.getElementById("pos1");
        var inputNik = document.getElementById("nik");
        var inputNamaAyah = document.getElementById("nama_ayah");
        var inputNamaIbu = document.getElementById("nama_ibu");
        var inputNampos = document.getElementById("namapos");
        var inputNamanak = document.getElementById("nama");
        var inputtgl = document.getElementById("tanggal_lahir");
        var inputbbl = document.getElementById("bbl");

        selectPos.addEventListener("change", function() {
            var selectedOption = selectPos.options[selectPos.selectedIndex];
            var selectedValue = selectedOption.value;

            if (selectedValue !== "pos0") {
                // Split the selected value into its components
                var parts = selectedValue.split(" - ");
                var kdpos = parts[0];
                var nampos = parts[1];
                var nik = parts[2];
                var namaank = parts[3];
                var namaIbu = parts[4];
                var namaAyah = parts[5];
                var tgl = parts[6];
                var bbl = parts[7];

                // Set the input values
                inputNik.value = nik;
                inputNamanak.value=namaank;
                inputNamaIbu.value = namaIbu;
                inputNamaAyah.value = namaAyah;
                inputtgl.value = tgl;
            
                inputNampos.value = nampos;
            } else {
                // Clear the input values if "cari" is selected
                inputNik.value = "";
                inputNamaIbu.value = "";
                inputNamaAyah.value = "";
                inputNampos.textContent = "";
            }
        });
    });

</script>