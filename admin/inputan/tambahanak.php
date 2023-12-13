<?php
if (isset($_POST["simpananak"])) {
    if (insertanak($_POST) > 0) {
        echo "<script>location='admin.php?page=dataanak';</script>";
    }
}
?>










<div style="width: 600px;">
    <h2>Form<b> Data Anak</b></h2>
    <form method="post">
        <div class="form-group">
            <label for="nama">NIK:</label>
            <input type="text" class="form-control" id="nik" name="nik">
        </div>
        <div class="form-group">
            <label for="nik">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama">
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="tanggal_lahir">Tempat Lahir:</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="tempat_lahir">Tanggal Lahir:</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="usia">BBL(kg):</label>
                    <input type="text" class="form-control" id="bbl" name="bbl">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="usia">Usia:</label>
                    <input type="text" class="form-control" id="usia" name="usia">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                        <option value="Pilih">Pilih</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Input orang tua:</label>
            <p style="font-size: 10px;"> cari nama ayah dan ibu di box bawah ini. Jika nama ayah dan ibu tidak muncul lakuan register data ibu </p>
        </div>
        <div class="form-group">
            <label for="pos">cari data orang tua:</label>
            <select class="form-control" id="pos1" name="pos1">
                <option value="pos0">cari</option>
                <?php
                foreach ($dataibu as $row) {
                    $nik = $row["NIK"];
                    $namaibu = $row["nama_ibu"];
                    $namaayah = $row["suami"];
                    $tlpn = $row["no_telp"];
                    $kdp = $row["kd_pos"];
                    $nmpos = $row["nama_posyandu"];

                    echo "<option>$kdp - $nmpos - $nik - $namaibu - $namaayah - $tlpn</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="nikibu" name="nikibu" hidden>
        </div>
        <div class="form-group">
            <label for="nama_ayah">Nama Ayah:</label>
            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah">
        </div>
        <div class="form-group">
            <label for="nama_ibu">Nama Ibu:</label>
            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu">
        </div>
        <div class="form-group">
            <label for="pos">Pos:</label>
            <select class="form-control" id="pos" name="pos">
                <option value="pos0" id="namapos" name="namaposyandu">Pilih Posyandu</option>
                <?php
                foreach ($datapos as $row) {
                    $kdpos = $row['kd_pos'];
                    $nama = $row['nama_posyandu'];
                    echo "<option value='$kdpos'>$nama</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" name="simpananak" class="btn btn-primary mt-3 mb-4" style="float: right;">Simpan</button>
    </form>
</div>




























<script>
    // select cari
    document.addEventListener("DOMContentLoaded", function() {
        var selectPos = document.getElementById("pos1");
        var inputNik = document.getElementById("nikibu");
        var inputNamaAyah = document.getElementById("nama_ayah");
        var inputNamaIbu = document.getElementById("nama_ibu");
        var inputNampos = document.getElementById("namapos");

        selectPos.addEventListener("change", function() {
            var selectedOption = selectPos.options[selectPos.selectedIndex];
            var selectedValue = selectedOption.value;

            if (selectedValue !== "pos0") {
                // Split the selected value into its components
                var parts = selectedValue.split(" - ");
                var kdpos = parts[0];
                var nampos = parts[1];
                var nik = parts[2];
                var namaIbu = parts[3];
                var namaAyah = parts[4];

                // Set the input values
                inputNik.value = nik;
                inputNamaIbu.value = namaIbu;
                inputNamaAyah.value = namaAyah;
                inputNampos.textContent = nampos;
                inputNampos.value = kdpos;
            } else {
                // Clear the input values if "cari" is selected
                inputNik.value = "";
                inputNamaIbu.value = "";
                inputNamaAyah.value = "";
                inputNampos.textContent = "Pilih Posyandu";
            }
        });
    });



// usia
document.addEventListener("DOMContentLoaded", function() {
    var tanggalLahirInput = document.getElementById("tanggal_lahir");

// Mendapatkan elemen input usia
var usiaInput = document.getElementById("usia");

// Menambahkan event listener untuk memantau perubahan pada input tanggal lahir
tanggalLahirInput.addEventListener("change", function () {
    // Mendapatkan tanggal lahir yang dimasukkan pengguna
    var tanggalLahir = new Date(this.value);

    // Mendapatkan tanggal saat ini
    var tanggalSekarang = new Date();

    // Menghitung usia dalam bulan
    var bulan = (tanggalSekarang.getFullYear() - tanggalLahir.getFullYear()) * 12 + tanggalSekarang.getMonth() - tanggalLahir.getMonth();

    // Memperbarui nilai input usia dengan "bln" atau "th" tergantung pada usia
    if (bulan < 12) {
        usiaInput.value = bulan + " bln";
    } else {
        var tahun = Math.floor(bulan / 12);
        usiaInput.value = tahun + " th";
    }
});
});
</script>