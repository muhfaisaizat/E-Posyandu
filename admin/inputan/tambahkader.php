<?php
if (isset($_POST["simpankader"])) {
    if (insertkader($_POST) > 0) {
        echo "<script>location='admin.php?page=datakader';</script>";
    }
  }
 ?>

<div style="width: 600px;">
    <h2>Form<b> kader</b></h2>
    <form method="post">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="nama">Id Kader:</label>
                    <input type="text" class="form-control" id="nama" name="idkder">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="nama">Jabatan:</label>
                    <input type="text" class="form-control" id="nama" name="jb">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="nama">No Telepon:</label>
                    <input type="text" class="form-control" id="nama" name="tlpn">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="tanggal_lahir">Email</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="emil">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="tempat_lahir">Password</label>
                    <input type="password" class="form-control" id="tanggal_lahir" name="pw">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
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
            </div>
            <!-- <div class="col">
                <div class="form-group">
                    <label for="formFile" class="form-label">upload foto</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
            </div> -->
        </div>

        <button type="submit" name="simpankader" class="btn btn-primary mt-3 mb-4" style="float: right;">Simpan</button>
    </form>
</div>