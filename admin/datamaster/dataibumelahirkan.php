<?php
if (isset($_POST["simpanperubahanlahir"])) {
    if (editlahir($_POST) > 0) {
        echo "<script>location='admin.php?page=dataibulahirkan';</script>";
    }
}

//   pagination
if (isset($_POST["filter_anak"])) {
    // Cek apakah ada permintaan filter
    $datalahir_filter = filterlahir($_POST);
    // echo "<script>location='admin.php?page=dataibu';</script>";
} else {
    // Tidak ada permintaan filter, gunakan data awal
    $datalahir_filter = $dataibumelahirkan;
}
$per_page = 50;
// Hitung total data untuk pagination
$total_rows = count($datalahir_filter);
$total_pages = ceil($total_rows / $per_page);

if (isset($_GET['halaman']) && is_numeric($_GET['halaman'])) {
    $current_page = $_GET['halaman'];
} else {
    $current_page = 1;
}

$start = ($current_page - 1) * $per_page;
$end = $start + $per_page;

// Ambil data yang akan ditampilkan di halaman ini sesuai dengan pagination
$dataanak_chunk = array_slice($datalahir_filter, $start, $per_page);

?>











<div class="framesubmain">

    <div class="tablesubmain">
        <div class="container-xl">
            <div class="table">
                <div class="table-wrapper">
                    <div class="table-title">
                        <h2>Data <b>Ibu Melahirkan</b></h2>
                        <div class="row">
                            <div class="col-sm-8 mt-3">

                                <button type="button" class="btn btn-primary text-white " style="border-radius: 15px;" id="openPopupibumelahirkan">
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
                                    <th>Nama ibu</th>
                                    <th>Nama ayah<i class="fa fa-sort"></i></th>
                                    <th>Nama bayi</th>
                                    <th>Tanggal lahir</th>
                                    <th>Tgl meninggal bayi <i class="fa fa-sort"></i></th>
                                    <th>Tgl meninggal ibu <i class="fa fa-sort"></i></th>
                                    <th>Keterangan <i class="fa fa-sort"></i></th>
                                    <th>POS</th>
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
                                        <td><?= $row["nama_ibu"]; ?></td>
                                        <td><?= $row["suami"]; ?></td>
                                        <td><?= $row["nama_bayi"]; ?></td>
                                        <td><?= $row["tgl_lahir"]; ?></td>
                                        <td><?= $row["tgl_meninggalbayi"]; ?></td>
                                        <td><?= $row["tgl_meninggalibu"]; ?></td>
                                        <td><?= $row["keterangan"]; ?></td>
                                        <td><?= $row["nama_posyandu"]; ?></td>
                                        <td>
                                            <a href="#" class="edit editdatalahir" title="Edit" data-bs-toggle="modal" data-bs-target="#editdataibu" data-idlahir="<?= $row["idlahir"]; ?>" data-nikbu="<?= $row["NIK"]; ?>" data-nambu="<?= $row["nama_ibu"]; ?>" data-namyah="<?= $row["suami"]; ?>" data-namyi="<?= $row["nama_bayi"]; ?>" data-tgllahir="<?= $row["tgl_lahir"]; ?>" data-tglbymt="<?= $row["tgl_meninggalbayi"]; ?>" data-tglibumt="<?= $row["tgl_meninggalibu"]; ?>" data-ket="<?= $row["keterangan"]; ?>" data-nampos="<?= $row["nama_posyandu"]; ?>" data-kdepos="<?= $row["kd_pos"]; ?>"><i class="material-icons">&#xE254;</i></a>
                                            <a href="hapuslahir.php?id_lahir=<?= $row["idlahir"]; ?>" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
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
                                echo "<li class='page-item'><a href='admin.php?page=dataibulahirkan&halaman=" . ($current_page - 1) . "' class='page-link'><i class='bi bi-chevron-double-left'></i></a></li>";
                            }

                            for ($page = 1; $page <= $total_pages; $page++) {
                                echo "<li class='page-item";
                                if ($page == $current_page) {
                                    echo " active";
                                }
                                echo "'><a href='admin.php?page=dataibulahirkan&halaman=" . $page . "' class='page-link'>" . $page . "</a></li>";
                            }

                            if ($current_page < $total_pages) {
                                echo "<li class='page-item'><a href='admin.php?page=dataibulahirkan&halaman=" . ($current_page + 1) . "' class='page-link'><i class='bi bi-chevron-double-right'></i></a></li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup" id="popupibumelahirkan">
    <div class="popup-content">
        <span class="close" id="closePopupibumelahirkan" style="float: right;">&times;</span>
        <!-- Isi form tambah data -->
        <?php include 'inputan/tambahibumelahirkan.php'; ?>
    </div>
</div>


























<!--=================================== Modal edit  ======================================================-->

<div class="modal fade" id="editdataibu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit <b>Data ibu melahirkan</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                        <label for="pos">cari data ibu:</label>
                        <select class="form-control" id="pos2" name="pos1">
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
                        <input type="text" class="form-control" id="idlahir" name="idlahir" hidden>
                        <input type="text" class="form-control" id="Nikibu" name="nikibu">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nama_ayah">Nama ibu:</label>
                                <input type="text" class="form-control" id="Nama_ibu" name="nama_ayah">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="nama_ibu">Nama ayah:</label>
                                <input type="text" class="form-control" id="Nama_ayah" name="nama_ibu">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="tempat_lahir">Nama bayi:</label>
                                <input type="text" class="form-control" id="Nambayi" name="nambayi">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="tempat_lahir">Tanggal lahir:</label>
                                <input type="date" class="form-control" id="Tanggal_lahir" name="tgllahir">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nama_ayah">Tanggal meninggal bayi:</label>
                                <input type="date" class="form-control" id="matibayi" name="matianak">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="nama_ibu">Tanggal meninggal ibu:</label>
                                <input type="date" class="form-control" id="matiibu" name="matiibu">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Keterangan</label>
                        <textarea name="kete" class="form-control" id="ExampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="pos">Pos:</label>
                        <select class="form-control" id="pos" name="pos">
                            <option id="Namaposss" name="namaposyandu">Pilih Posyandu</option>
                            <?php
                            foreach ($datapos as $row) {
                                $kdpos = $row['kd_pos'];
                                $nama = $row['nama_posyandu'];
                                echo "<option value='$kdpos'>$nama</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" name="simpanperubahanlahir" class="btn btn-primary mt-3 mb-4" style="float: right;">Simpan</button>
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
        <caption style="text-align: center; margin-left:240px; padding-left:10px;">
            <b>BUKU 1</b> <br>
            <b>
                BUKU CATATAN IBU HAMIL , KELAHIRAN, KEMATIAN BAYI DAN KEMATIAN IBU HAMIL,MELAHIRKAN/NIFAS
            </b>
        </caption>
        <thead>
            <tr>
                <th>No</th>
                <th>NIK <i class="fa fa-sort"></i></th>
                <th>Nama ibu</th>
                <th>Nama ayah<i class="fa fa-sort"></i></th>
                <th>Nama bayi</th>
                <th>Tanggal lahir</th>
                <th>Tgl meninggal bayi <i class="fa fa-sort"></i></th>
                <th>Tgl meninggal ibu <i class="fa fa-sort"></i></th>
                <th>Keterangan <i class="fa fa-sort"></i></th>
                <th>POS</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            ?>
            <?php foreach ($datalahir_filter as $row) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row["NIK"]; ?></td>
                    <td><?= $row["nama_ibu"]; ?></td>
                    <td><?= $row["suami"]; ?></td>
                    <td><?= $row["nama_bayi"]; ?></td>
                    <td><?= $row["tgl_lahir"]; ?></td>
                    <td><?= $row["tgl_meninggalbayi"]; ?></td>
                    <td><?= $row["tgl_meninggalibu"]; ?></td>
                    <td><?= $row["keterangan"]; ?></td>
                    <td><?= $row["nama_posyandu"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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




















<script>
    // popuptambah
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('openPopupibumelahirkan').addEventListener('click', function() {
            document.getElementById('popupibumelahirkan').style.display = 'block';
        });

        document.getElementById('closePopupibumelahirkan').addEventListener('click', function() {
            document.getElementById('popupibumelahirkan').style.display = 'none';
        });
    });



    // edit
    document.addEventListener('DOMContentLoaded', function() {
        var editPosyanButtons = document.querySelectorAll('.editdatalahir');
        var idInput = document.getElementById('idlahir');
        var nikibuInput = document.getElementById('Nikibu');
        var namibuInput = document.getElementById('Nama_ibu');
        var namyahnput = document.getElementById('Nama_ayah');
        var namyiInput = document.getElementById('Nambayi');
        var tglInput = document.getElementById('Tanggal_lahir');
        var matianakInput = document.getElementById('matibayi');
        var matibuInput = document.getElementById('matiibu');
        var ketInput = document.getElementById('ExampleFormControlTextarea1');
        var posInput = document.getElementById('Namaposss');



        editPosyanButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var id = button.getAttribute('data-idlahir');
                var nik = button.getAttribute('data-nikbu');
                var namibu = button.getAttribute('data-nambu');
                var namyah = button.getAttribute('data-namyah');
                var namyi = button.getAttribute('data-namyi');
                var tgl = button.getAttribute('data-tgllahir');
                var manak = button.getAttribute('data-tglbymt');
                var mibu = button.getAttribute('data-tglibumt');
                var ket = button.getAttribute('data-ket');
                var namposs = button.getAttribute('data-nampos');
                var kdposs = button.getAttribute('data-kdepos');


                idInput.value = id;
                nikibuInput.value = nik;
                namibuInput.value = namibu;
                namyahnput.value = namyah;
                namyiInput.value = namyi;
                tglInput.value = tgl;
                matianakInput.value = manak;
                matibuInput.value = mibu;
                ketInput.value = ket;
                posInput.value = kdposs;
                posInput.textContent = namposs;


                // posDropdown.value = KDpos;
                // posDropdown.textContent = nampos;

                // alert(id);
            });
        });
    });

    // select cari
    document.addEventListener("DOMContentLoaded", function() {
        var selectPos = document.getElementById("pos2");
        var inputNik = document.getElementById("Nikibu");
        var inputNamaAyah = document.getElementById("Nama_ayah");
        var inputNamaIbu = document.getElementById("Nama_ibu");
        var inputNampos = document.getElementById("Namaposss");

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