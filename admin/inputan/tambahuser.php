<?php
if (isset($_POST["simpanuser"])) {
    if (insertuser($_POST) > 0) {
        echo "<script>location='admin.php?page=datauser';</script>";
    }
  }
 ?>



<div style="width: 600px;">
    <h2>Form<b> User</b></h2>
    <form method="post">
        <div class="form-group">
            <label for="nama">Username:</label>
            <input type="text" class="form-control" id="nama" name="namau">
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="tanggal_lahir">Email</label>
                    <input type="text" class="form-control" id="emailu" name="emailu">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="tempat_lahir">Password</label>
                    <input type="password" class="form-control" id="pwu" name="pwu">
                </div>
            </div>
        </div>
        <button type="submit" name="simpanuser" class="btn btn-primary mt-3 mb-4" style="float: right;">Simpan</button>
    </form>
</div>