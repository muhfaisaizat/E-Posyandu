<?php
if (isset($_POST["simpanibu"])) {
    if (insertibu($_POST) > 0) {
        echo "<script>location='admin.php?page=dataibu';</script>";
    }
}
?>




<div style="width: 600px;">
    <h2>Form<b> Data Ibu</b></h2>
    <form method="post">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="nama">Nama Ibu:</label>
                    <input type="text" class="form-control" id="nama" name="namaibu">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="nama">Nama Suami:</label>
                    <input type="text" class="form-control" id="nama" name="namaayah">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="nik">NIK ibu:</label>
            <input type="text" class="form-control" id="nik" name="nik">
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="tanggal_lahir">Nomor Tlpon</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="notlpn">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="tempat_lahir">Rt/Rw</label>
                    <input type="text" class="form-control" id="tanggal_lahir" name="rtrw">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="pos">Pos:</label>
            <select class="form-control" id="pos" name="kdpos">
                <option value="pos0">Pilih Posyandu</option>
                <?php
                // Proses hasil query untuk mengisi pilihan dalam elemen select
                foreach ($datapos as $row) {
                    $kdpos = $row['kd_pos'];
                    $nama = $row['nama_posyandu'];
                    echo "<option value='$kdpos'>$nama</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" name="simpanibu" class="btn btn-primary mt-3 mb-4" style="float: right;">Simpan</button>
    </form>
</div>