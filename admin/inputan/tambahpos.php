<?php
if (isset($_POST["simpanpos"])) {
    if (insertposyan($_POST) > 0) {
        echo "<script>location='admin.php?page=datapos';</script>";
    }
  }
 ?>







<div style="width: 600px;">
    <h2>Form<b> Posyandu</b></h2>
    <form id="myForm" method="post">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="nama">Kode pos:</label>
                    <input type="text" class="form-control" id="is-kd" name="kdpos" >
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="nama">Nama Posyandu:</label>
                    <input type="text" class="form-control"name="nama">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="tanggal_lahir">RT/RW</label>
                    <input type="text" class="form-control" name="rtrw">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="tempat_lahir">Lokasi</label>
                    <input type="text" class="form-control" name="lokasi">
                </div>
            </div>
        </div>
        <button type="Submit" name="simpanpos" class="btn btn-primary mt-3 mb-4" style="float: right;">Simpan</button>
    </form>
</div>