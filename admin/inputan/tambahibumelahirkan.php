<?php
if (isset($_POST["simpanlahir"])) {
    if (insertibulahir($_POST) > 0) {
        echo "<script>location='admin.php?page=dataibulahirkan';</script>";
    }
}
?>






<div style="width: 600px;">
    <h2>Form<b> Ibu Melahirkan</b></h2>
    <form method="post">
        <div class="form-group">
            <label for="pos">cari data ibu:</label>
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
            <label for="nik">NIK:</label>
            <input type="text" class="form-control" id="nikibu" name="nikibu">
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="nama_ayah">Nama ibu:</label>
                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="nama_ibu">Nama ayah:</label>
                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="tempat_lahir">Nama bayi:</label>
                    <input type="text" class="form-control" id="tanggal_lahir" name="nambayi">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="tempat_lahir">Tanggal lahir:</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tgllahir">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="nama_ayah">Tanggal meninggal bayi:</label>
                    <input type="date" class="form-control"  name="matianak">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="nama_ibu">Tanggal meninggal ibu:</label>
                    <input type="date" class="form-control" name="matiibu">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Keterangan</label>
            <textarea name="kete" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
        <button type="submit" name="simpanlahir" class="btn btn-primary mt-3 mb-4" style="float: right;">Simpan</button>
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
</script>