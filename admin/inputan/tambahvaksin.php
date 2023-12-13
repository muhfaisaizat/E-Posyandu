<?php
if (isset($_POST["simpan"])) {
    if (insertvaksin($_POST) > 0) {
        echo "<script>location='admin.php?page=datavaksin';</script>";
    }
  }
 ?>

<div style="width: 600px;">
    <h2>Form<b>Vaksin/vitamin</b></h2>
    <form method="post">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="nama">Kode:</label>
                    <input type="text" class="form-control" id="nama" name="kdvaksin">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="nik">Stok:</label>
            <input type="text" class="form-control" id="nik" name="stok">
        </div>
        <button type="submit" name="simpan" class="btn btn-primary mt-3 mb-4" style="float: right;">Simpan</button>
    </form>
</div>