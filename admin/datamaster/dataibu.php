<?php
if (isset($_POST["simpanperubahanibu"])) {
    if (editibu($_POST) > 0) {
        echo "<script>location='admin.php?page=dataibu';</script>";
    }
}



//   pagination
if (isset($_POST["filter_ibu"])) {
    // Cek apakah ada permintaan filter
    $dataibu_filter = filteribu1($_POST);
    // echo "<script>location='admin.php?page=dataibu';</script>";
} else {
    // Tidak ada permintaan filter, gunakan data awal
    $dataibu_filter = $dataibu;
}
$per_page = 50;
// Hitung total data untuk pagination
$total_rows = count($dataibu_filter);
$total_pages = ceil($total_rows / $per_page);

if (isset($_GET['halaman']) && is_numeric($_GET['halaman'])) {
    $current_page = $_GET['halaman'];
} else {
    $current_page = 1;
}

$start = ($current_page - 1) * $per_page;
$end = $start + $per_page;

// Ambil data yang akan ditampilkan di halaman ini sesuai dengan pagination
$dataibu_chunk = array_slice($dataibu_filter, $start, $per_page);
?>



<div class="framesubmain">

    <div class="tablesubmain">
        <div class="container-xl">
            <div class="table">
                <div class="table-wrapper">
                    <div class="table-title">
                        <h2>Data <b>Ibu</b></h2>
                        <div class="row">
                            <div class="col-sm-8 mt-3">

                                <button type="button" class="btn btn-primary text-white " style="border-radius: 15px;" id="openPopupibu">
                                    <i class="bi bi-plus-circle-fill" aria-hidden="true"></i>
                                    <b> Tambah</b>
                                </button>
                            </div>
                            <div class="col-sm-4 mt3">

                                <div class="search-box ms-6 mx-3">
                                    <i class="material-icons">&#xE8B6;</i>
                                    <input type="text" class="form-control" id="search-input" placeholder="Search&hellip;">
                                </div>
                                <button type="button" class="btn btn-primary text-white h-75" style="border-radius: 15px;" data-bs-toggle="modal" data-bs-target="#filteribu">
                                    <i class="bi bi-funnel-fill" aria-hidden="true"></i>
                                    Filter
                                </button>
                                <button onclick="printTable()" type="button" class="btn btn-danger text-white h-75" style="border-radius: 15px;">
                                    <i class="bi bi-filetype-pdf" aria-hidden="true"></i>
                                </button>
                                <button onclick="exportToExcel()" type="button" class="btn btn btn-success text-white h-75" style="border-radius: 15px;">
                                    <i class="bi bi-file-earmark-excel" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="tableFixHead ">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK <i class="fa fa-sort"></i></th>
                                    <th>Nama ibu</th>
                                    <th>Nama Suami<i class="fa fa-sort"></i></th>
                                    <th>RT/RW</th>
                                    <th>Nomor Tlpon <i class="fa fa-sort"></i></th>
                                    <th>POS</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                ?>
                                <?php foreach ($dataibu_chunk as $row) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row["NIK"]; ?></td>
                                        <td><?= $row["nama_ibu"]; ?></td>
                                        <td><?= $row["suami"]; ?></td>
                                        <td><?= $row["rt_rw"]; ?></td>
                                        <td><?= $row["no_telp"]; ?></td>
                                        <td><?= $row["nama_posyandu"]; ?></td>
                                        <td>
                                            <a class="edit edit_dataibu" title="Edit" data-bs-toggle="modal" data-bs-target="#editdataibu" data-Kod="<?= $row["NIK"]; ?>" data-namibu="<?= $row["nama_ibu"]; ?>" data-namayah="<?= $row["suami"]; ?>" data-rtrw="<?= $row["rt_rw"]; ?>" data-tlpn="<?= $row["no_telp"]; ?>" data-nampos="<?= $row["nama_posyandu"]; ?>" data-kdpoS="<?= $row["kd_pos"]; ?>" style="cursor: pointer;"><i class="material-icons">&#xE254;</i></a>
                                            <a href="hapusibu.php?kd_nik=<?= $row["NIK"]; ?>" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix">
                        <?php echo "<div class='hint-text'>Menampilkan <b>" . ($end - $start) . "</b> dari <b>$total_rows</b> entries</div>"; ?>
                        <ul class="pagination">
                            <?php
                            if ($current_page > 1) {
                                echo "<li class='page-item'><a href='admin.php?page=dataibu&halaman=" . ($current_page - 1) . "' class='page-link'><i class='bi bi-chevron-double-left'></i></a></li>";
                            }

                            for ($page = 1; $page <= $total_pages; $page++) {
                                echo "<li class='page-item";
                                if ($page == $current_page) {
                                    echo " active";
                                }
                                echo "'><a href='admin.php?page=dataibu&halaman=" . $page . "' class='page-link'>" . $page . "</a></li>";
                            }

                            if ($current_page < $total_pages) {
                                echo "<li class='page-item'><a href='admin.php?page=dataibu&halaman=" . ($current_page + 1) . "' class='page-link'><i class='bi bi-chevron-double-right'></i></a></li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup" id="popupibu">
    <div class="popup-content">
        <span class="close" id="closePopupibu" style="float: right;">&times;</span>
        <!-- Isi form tambah data -->
        <?php include 'inputan/tambahibu.php'; ?>
    </div>
</div>




























<!--=================================== Modal edit  ======================================================-->

<div class="modal fade" id="editdataibu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit <b>Data Ibu</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                        <label for="nik">NIK ibu:</label>
                        <input type="text" class="form-control" id="NIK" name="nik" readonly>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nama">Nama Ibu:</label>
                                <input type="text" class="form-control" id="namaibu" name="namaibu">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="nama">Nama Suami:</label>
                                <input type="text" class="form-control" id="namaayah" name="namaayah">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="tanggal_lahir">Nomor Tlpon</label>
                                <input type="text" class="form-control" id="notlpn" name="notlpn">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="tempat_lahir">Rt/Rw</label>
                                <input type="text" class="form-control" id="rtrw" name="rtrw">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="pos">Pos:</label>
                        <select class="form-control" id="pos" name="nama_pos">
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
                    <button type="submit" name="simpanperubahanibu" class="btn btn-primary mt-3 mb-4" style="float: right;">Simpan</button>
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="Submit" name="simpanperubahan" type="button" class="btn btn-primary">Simpan Perubahan</button> -->
            </div>
        </div>
    </div>
</div>

































<!-- filter -->
<div class="modal fade" id="filteribu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Filter <b>Data</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="tanggal">Rt/Rw</label>
                                <input type="text" class="form-control" id="rtrw" name="rtrw">
                            </div>
                        </div>
                        <div class="col">
                            <label for="pos">Pos:</label>
                            <select class="form-control" id="pos" name="pos">
                                <option value="pos0">pilih Posyandu</option>
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
                    <button type="submit" class="btn btn-primary nt-3 mt-3" name="filter_ibu">Filter</button>
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="Submit" name="simpanperubahan" type="button" class="btn btn-primary">Simpan Perubahan</button> -->
            </div>
        </div>
    </div>
</div>
















<!--==================================================================== cetak pdf ============================================================================-->
<div id="printTableDiv" style="display: none;">
<table id="printdataibu" class="table table-striped table-hover table-bordered">
<caption><b>BUKU LAPORAN DATA IBU</b></caption>
    <thead>
        <tr>
            <th>No</th>
            <th>NIK <i class="fa fa-sort"></i></th>
            <th>Nama ibu</th>
            <th>Nama Suami<i class="fa fa-sort"></i></th>
            <th>RT/RW</th>
            <th>Nomor Tlpon <i class="fa fa-sort"></i></th>
            <th>POS</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        ?>
        <?php foreach ($dataibu_filter as $row) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $row["NIK"]; ?></td>
                <td><?= $row["nama_ibu"]; ?></td>
                <td><?= $row["suami"]; ?></td>
                <td><?= $row["rt_rw"]; ?></td>
                <td><?= $row["no_telp"]; ?></td>
                <td><?= $row["nama_posyandu"]; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>




































<script>
    // popuptambah
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('openPopupibu').addEventListener('click', function() {
            document.getElementById('popupibu').style.display = 'block';
        });

        document.getElementById('closePopupibu').addEventListener('click', function() {
            document.getElementById('popupibu').style.display = 'none';
        });
    });

    // filter
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('openPopupfilteribu').addEventListener('click', function() {
            document.getElementById('popupfilteribu').style.display = 'block';
        });

        document.getElementById('closePopupfilteribu').addEventListener('click', function() {
            document.getElementById('popupfilteribu').style.display = 'none';
        });
    });



    // edit
    document.addEventListener('DOMContentLoaded', function() {
        var editPosyanButtons = document.querySelectorAll('.edit_dataibu');
        var idKodeInput = document.getElementById('NIK');
        var namibuInput = document.getElementById('namaibu');
        var namayahInput = document.getElementById('namaayah');
        var rtrwInput = document.getElementById('rtrw');
        var tlpnInput = document.getElementById('notlpn');
        // var kdposInput = document.getElementById('kdpos');
        var posDropdown = document.getElementById('namapos');

        editPosyanButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var kode = button.getAttribute('data-Kod');
                var namibu = button.getAttribute('data-namibu');
                var namayah = button.getAttribute('data-namayah');
                var rtrw = button.getAttribute('data-rtrw');
                var tlpn = button.getAttribute('data-tlpn');
                var nampos = button.getAttribute('data-nampos');
                var KDpos = button.getAttribute('data-kdpoS');
                idKodeInput.value = kode;
                namibuInput.value = namibu;
                namayahInput.value = namayah;
                rtrwInput.value = rtrw;
                tlpnInput.value = tlpn;
                posDropdown.value = KDpos;
                posDropdown.textContent = nampos;

                // alert(kode);
            });
        });
    });


    // cari
    document.addEventListener('DOMContentLoaded', function() {
        var searchInput = document.getElementById('search-input');
        var tableRows = document.querySelectorAll('tbody tr'); // Ganti dengan selektor yang sesuai

        searchInput.addEventListener('input', function() {
            var searchValue = searchInput.value.toLowerCase();

            tableRows.forEach(function(row) {
                var rowText = row.textContent.toLowerCase();

                if (rowText.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });

// pdf
    function printTable() {
        var printContents = document.getElementById("printdataibu").outerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }

// excel
    function exportToExcel() {
        var table2excel = new Table2Excel();
  table2excel.export(document.querySelectorAll("table.table"));
    }
</script>