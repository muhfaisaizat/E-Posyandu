<?php
if (isset($_POST["simpanbidan"])) {
    if (insertbidan($_POST) > 0) {
        echo "<script>location='admin.php?page=databidan';</script>";
    }
  }
 ?>







<div style="width: 600px;">
    <h2>Form<b> Bidan</b></h2>
    <form method="post">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="nama">NIP:</label>
                    <input type="text" class="form-control" id="nama" name="nip">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="nama">Nama Bidan:</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="tanggal_lahir">No tlpon</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tlpn">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="tempat_lahir">Alamat</label>
                    <input type="text" class="form-control" id="tanggal_lahir" name="alamat">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="tanggal_lahir">Email</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="email">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="tempat_lahir">Password</label>
                    <input type="password" class="form-control" id="tanggal_lahir" name="password">
                </div>
            </div>
        </div>
        <!-- <div class="form-group">
            <label for="formFile" class="form-label">upload foto</label>
            <input class="form-control" type="file" id="formFile" name="foto">
        </div> -->
        <button type="submit" name="simpanbidan" class="btn btn-primary mt-3 mb-4" style="float: right;">Simpan</button>
    </form>
</div>