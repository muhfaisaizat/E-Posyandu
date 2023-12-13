<?php
if (isset($_POST["simpanperubahananak"])) {
    if (editanak($_POST) > 0) {
        echo "<script>location='admin.php?page=dataanak';</script>";
    }
}





//   pagination
if (isset($_POST["filter_anak"])) {
    // Cek apakah ada permintaan filter
    $dataanak_filter = filteranak($_POST);
    // echo "<script>location='admin.php?page=dataibu';</script>";
} else {
    // Tidak ada permintaan filter, gunakan data awal
    $dataanak_filter = $dataanak;
}
$per_page = 50;
// Hitung total data untuk pagination
$total_rows = count($dataanak_filter);
$total_pages = ceil($total_rows / $per_page);

if (isset($_GET['halaman']) && is_numeric($_GET['halaman'])) {
    $current_page = $_GET['halaman'];
} else {
    $current_page = 1;
}

$start = ($current_page - 1) * $per_page;
$end = $start + $per_page;

// Ambil data yang akan ditampilkan di halaman ini sesuai dengan pagination
$dataanak_chunk = array_slice($dataanak_filter, $start, $per_page);







?>



<div class="framesubmain">

    <div class="tablesubmain">
        <div class="container-xl">
            <div class="table">
                <div class="table-wrapper">
                    <div class="table-title">
                        <h2>Data <b>Anak</b></h2>
                        <div class="row">
                            <div class="col-sm-8 mt-3">

                                <button type="button" class="btn btn-primary text-white " style="border-radius: 15px;" id="openPopup">
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
                        <table id="printdataanak" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK <i class="fa fa-sort"></i></th>
                                    <th>Nama</th>
                                    <th>Tanggal lahir<i class="fa fa-sort"></i></th>
                                    <th>Tempat lahir</th>
                                    <th>Usia <i class="fa fa-sort"></i></th>
                                    <th>Jenis Kelamin</th>
                                    <th>BBL(kg)</th>
                                    <th>Nama ayah</th>
                                    <th>Nama ibu</th>
                                    <th>pos</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                ?>
                                <?php foreach ($dataanak_chunk as $row) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row["NIK"]; ?></td>
                                        <td><?= $row["nama_anak"]; ?></td>
                                        <td><?= $row["tgl_lahir"]; ?></td>
                                        <td><?= $row["tempat_lahir"]; ?></td>
                                        <td><?= $row["usia"]; ?></td>
                                        <td><?= $row["jenis_kelamin"]; ?></td>
                                        <td><?= $row["BBL"]; ?></td>
                                        <td><?= $row["nama_ibu"]; ?></td>
                                        <td><?= $row["suami"]; ?></td>
                                        <td><?= $row["nama_posyandu"]; ?></td>
                                        <td>
                                            <a href="#" class="edit editdataanak" title="Edit" data-bs-toggle="modal" data-bs-target="#editdataanak" data-nik="<?= $row["NIK"]; ?>" data-namanak="<?= $row["nama_anak"]; ?>" data-tgl="<?= $row["tgl_lahir"]; ?>" data-tmp="<?= $row["tempat_lahir"]; ?>" data-usia="<?= $row["usia"]; ?>" data-jsklm="<?= $row["jenis_kelamin"]; ?>" data-bbl="<?= $row["BBL"]; ?>" data-namibu="<?= $row["nama_ibu"]; ?>" data-nikibu="<?= $row["NIKibu"]; ?>" data-namayah="<?= $row["suami"]; ?>" data-namposya="<?= $row["nama_posyandu"]; ?>" data-kdpos="<?= $row["kd_pos"]; ?>"><i class="material-icons">&#xE254;</i></a>

                                            <a href="hapusanak.php?nikanak=<?= $row["NIK"]; ?>" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
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
                                echo "<li class='page-item'><a href='admin.php?page=dataanak&halaman=" . ($current_page - 1) . "' class='page-link'><i class='bi bi-chevron-double-left'></i></a></li>";
                            }

                            for ($page = 1; $page <= $total_pages; $page++) {
                                echo "<li class='page-item";
                                if ($page == $current_page) {
                                    echo " active";
                                }
                                echo "'><a href='admin.php?page=dataanak&halaman=" . $page . "' class='page-link'>" . $page . "</a></li>";
                            }

                            if ($current_page < $total_pages) {
                                echo "<li class='page-item'><a href='admin.php?page=dataanak&halaman=" . ($current_page + 1) . "' class='page-link'><i class='bi bi-chevron-double-right'></i></a></li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup" id="popup">
    <div class="popup-content">
        <span class="close" id="closePopup" style="float: right;">&times;</span>
        <!-- Isi form tambah data -->
        <?php include 'inputan/tambahanak.php'; ?>
    </div>
</div>




















<!--=================================== Modal edit  ======================================================-->

<div class="modal fade" id="editdataanak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit <b>Data Anak</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                        <label for="nama">NIK:</label>
                        <input type="text" class="form-control" id="Nik" name="nik" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nik">Nama:</label>
                        <input type="text" class="form-control" id="Nama" name="nama">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="tanggal_lahir">Tempat Lahir:</label>
                                <input type="text" class="form-control" id="Tempat_lahir" name="tempat_lahir">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="tempat_lahir">Tanggal Lahir:</label>
                                <input type="date" class="form-control" id="Tanggal_lahir" name="tanggal_lahir">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="usia">BBL(kg):</label>
                                <input type="text" class="form-control" id="Bbl" name="bbl">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="usia">Usia:</label>
                                <input type="text" class="form-control" id="Usia" name="usia">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin:</label>
                                <select class="form-control" id="Jenis_kelamin" name="jenis_kelamin">
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
                        <select class="form-control" id="Pos1" name="pos1">
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
                        <input type="text" class="form-control" id="Nikibu" name="nikibu">
                    </div>
                    <div class="form-group">
                        <label for="nama_ayah">Nama Ayah:</label>
                        <input type="text" class="form-control" id="Nama_ayah" name="nama_ayah">
                    </div>
                    <div class="form-group">
                        <label for="nama_ibu">Nama Ibu:</label>
                        <input type="text" class="form-control" id="Nama_ibu" name="nama_ibu">
                    </div>
                    <div class="form-group">
                        <label for="pos">Pos:</label>
                        <select class="form-control" id="pos" name="pos">
                            <option value="pos0" id="Namaposs" name="namaposyandu">Pilih Posyandu</option>
                            <?php
                            foreach ($datapos as $row) {
                                $kdpos = $row['kd_pos'];
                                $nama = $row['nama_posyandu'];
                                echo "<option value='$kdpos'>$nama</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" name="simpanperubahananak" class="btn btn-primary mt-3 mb-4" style="float: right;">Simpan</button>
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
                                <label for="tanggal">Tanggal lahir:</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <label for="pos">Pos:</label>
                                <select class="form-control" id="pos" name="posfilter">
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
                        <div class="col">
                            <div class="form-check">
                                <label>Jenis Kelamin:</label>
                                <select class="form-control" id="Jenis_kelamin" name="jenis_kelamin">
                                    <option value="">Pilih</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="filter_anak" class="btn btn-primary nt-3 mt-3">Filter</button>
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
        <caption><b>BUKU LAPORAN DATA ANAK</b></caption>
        <thead>
            <tr>
                <th>No</th>
                <th>NIK <i class="fa fa-sort"></i></th>
                <th>Nama</th>
                <th>Tanggal lahir<i class="fa fa-sort"></i></th>
                <th>Tempat lahir</th>
                <th>Usia <i class="fa fa-sort"></i></th>
                <th>Jenis Kelamin</th>
                <th>BBL(kg)</th>
                <th>Nama ayah</th>
                <th>Nama ibu</th>
                <th>pos</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            ?>
            <?php foreach ($dataanak_filter as $row) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row["NIK"]; ?></td>
                    <td><?= $row["nama_anak"]; ?></td>
                    <td><?= $row["tgl_lahir"]; ?></td>
                    <td><?= $row["tempat_lahir"]; ?></td>
                    <td><?= $row["usia"]; ?></td>
                    <td><?= $row["jenis_kelamin"]; ?></td>
                    <td><?= $row["BBL"]; ?></td>
                    <td><?= $row["nama_ibu"]; ?></td>
                    <td><?= $row["suami"]; ?></td>
                    <td><?= $row["nama_posyandu"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>















<script>
    // popuptambah
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('openPopup').addEventListener('click', function() {
            document.getElementById('popup').style.display = 'block';
        });

        document.getElementById('closePopup').addEventListener('click', function() {
            document.getElementById('popup').style.display = 'none';
        });
    });



    // edit
    document.addEventListener('DOMContentLoaded', function() {
        var editPosyanButtons = document.querySelectorAll('.editdataanak');
        var nikInput = document.getElementById('Nik');
        var namaankInput = document.getElementById('Nama');
        var tmptnput = document.getElementById('Tempat_lahir');
        var tglInput = document.getElementById('Tanggal_lahir');
        var bblInput = document.getElementById('Bbl');
        var usiaInput = document.getElementById('Usia');
        var jnisInput = document.getElementById('Jenis_kelamin');
        var ayahInput = document.getElementById('Nama_ayah');
        var ibuInput = document.getElementById('Nama_ibu');
        var posInput = document.getElementById('Namaposs');
        var nikibuInput = document.getElementById('Nikibu');


        editPosyanButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var nikank = button.getAttribute('data-nik');
                var namank = button.getAttribute('data-namanak');
                var tgl = button.getAttribute('data-tgl');
                var tmp = button.getAttribute('data-tmp');
                var usia = button.getAttribute('data-usia');
                var jnis = button.getAttribute('data-jsklm');
                var bbl = button.getAttribute('data-bbl');
                var namibu = button.getAttribute('data-namibu');
                var namyah = button.getAttribute('data-namayah');
                var nampos = button.getAttribute('data-namposya');
                var nikibu = button.getAttribute('data-nikibu');
                var kdpos = button.getAttribute('data-kdpos');

                nikInput.value = nikank;
                namaankInput.value = namank;
                tglInput.value = tgl;
                tmptnput.value = tmp;
                usiaInput.value = usia;
                jnisInput.value = jnis;
                bblInput.value = bbl;
                ibuInput.value = namibu;
                ayahInput.value = namyah;
                posInput.textContent = nampos;
                posInput.value = kdpos;
                nikibuInput.value = nikibu;


                // posDropdown.value = KDpos;
                // posDropdown.textContent = nampos;

                // alert(kode);
            });
        });
    });

    // select cari
    document.addEventListener("DOMContentLoaded", function() {
        var selectPos = document.getElementById("Pos1");
        var inputNik = document.getElementById("Nikibu");
        var inputNamaAyah = document.getElementById("Nama_ayah");
        var inputNamaIbu = document.getElementById("Nama_ibu");
        var inputNampos = document.getElementById("Namaposs");

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