<?php
if (isset($_POST["simpanperubahanpos"])) {
    if (editpos($_POST) > 0) {
        echo "<script>location='admin.php?page=datapos';</script>";
    }
}


//   pagination
$per_page = 50;
$total_rows = count($datapos);
$total_pages = ceil($total_rows / $per_page);

if (isset($_GET['halaman']) && is_numeric($_GET['halaman'])) {
    $current_page = $_GET['halaman'];
} else {
    $current_page = 1;
}

$start = ($current_page - 1) * $per_page;
$end = $start + $per_page;

$datapos_chunk = array_slice($datapos, $start, $per_page);
?>








<div class="framesubmain">

    <div class="tablesubmain">
        <div class="container-xl">
            <div class="table">
                <div class="table-wrapper">
                    <div class="table-title">
                        <h2>Data <b>Posyandu</b></h2>
                        <div class="row">
                            <div class="col-sm-8 mt-3">

                                <button type="button" class="btn btn-primary text-white " style="border-radius: 15px;" id="openPopuppos">
                                    <i class="bi bi-plus-circle-fill" aria-hidden="true"></i>
                                    <b> Tambah</b>
                                </button>
                            </div>
                            <div class="col-sm-4 mt3">

                                <div class="search-box" style="margin-left: 200px;">
                                    <i class="material-icons">&#xE8B6;</i>
                                    <input type="text" class="form-control" id="search-input" placeholder="Search&hellip;">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tableFixHead ">
                        <table id="printdataanak" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode pos <i class="fa fa-sort"></i></th>
                                    <th>Nama posyandu</th>
                                    <th>rt/rw<i class="fa fa-sort"></i></th>
                                    <th>lokasi<i class="fa fa-sort"></i></th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                ?>
                                <?php foreach ($datapos_chunk as $row) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row["kd_pos"]; ?></td>
                                        <td><?= $row["nama_posyandu"]; ?></td>
                                        <td><?= $row["RT_RW"]; ?></td>
                                        <td><?= $row["lokasi"]; ?></td>
                                        <td>
                                            <a class="edit edit_posyan" title="Edit" data-bs-toggle="modal" data-bs-target="#editdataposyan" data-KodPos="<?= $row["kd_pos"]; ?>" data-namaPos="<?= $row["nama_posyandu"]; ?>" data-rtRw="<?= $row["RT_RW"]; ?>" data-lokasi="<?= $row["lokasi"]; ?>" style="cursor: pointer;"><i class="material-icons">&#xE254;</i></a>
                                            <a href="hapuspos.php?kd_pos=<?= $row["kd_pos"]; ?>" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix">
                        <?php echo "<div class='hint-text'>Menampilkan <b>" . ($end - $start) . "</b> dari <b>$total_rows</b> entries</div>"; ?>
                        <!-- <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div> -->
                        <ul class="pagination">

                            <?php
                            if ($current_page > 1) {
                                echo "<li class='page-item'><a href='admin.php?page=datapos&halaman=" . ($current_page - 1) . "' class='page-link'><i class='bi bi-chevron-double-left'></i></a></li>";
                            }

                            for ($page = 1; $page <= $total_pages; $page++) {
                                echo "<li class='page-item";
                                if ($page == $current_page) {
                                    echo " active";
                                }
                                echo "'><a href='admin.php?page=datapos&halaman=" . $page . "' class='page-link'>" . $page . "</a></li>";
                            }

                            if ($current_page < $total_pages) {
                                echo "<li class='page-item'><a href='admin.php?page=datapos&halaman=" . ($current_page + 1) . "' class='page-link'><i class='bi bi-chevron-double-right'></i></a></li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup" id="popuppos">
    <div class="popup-content">
        <span class="close" id="closePopuppos" style="float: right;">&times;</span>
        <!-- Isi form tambah data -->
        <?php include 'inputan/tambahpos.php'; ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editdataposyan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit <b>Data Posyandu</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="myForm" method="post">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nama">Kode pos:</label>
                                <input type="text" class="form-control" id="idkode" name="kdpos" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="nama">Nama Posyandu:</label>
                                <input type="text" class="form-control" id="namapos" name="nama">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="tanggal_lahir">RT/RW</label>
                                <input type="text" class="form-control" id="RTRWpos" name="rtrw">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="tempat_lahir">Lokasi</label>
                                <input type="text" class="form-control" id="LOkpos" name="lokasi">
                            </div>
                        </div>
                    </div>
                    <button type="Submit" name="simpanperubahanpos" class="btn btn-primary mt-3 mb-4" style="float: right;">Simpan</button>
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
        document.getElementById('openPopuppos').addEventListener('click', function() {
            document.getElementById('popuppos').style.display = 'block';
        });

        document.getElementById('closePopuppos').addEventListener('click', function() {
            document.getElementById('popuppos').style.display = 'none';
        });
    });



    // edit
    document.addEventListener('DOMContentLoaded', function() {
        var editPosyanButtons = document.querySelectorAll('.edit_posyan');
        var idKodeInput = document.getElementById('idkode');
        var namposInput = document.getElementById('namapos');
        var rtrwposInput = document.getElementById('RTRWpos');
        var lokposInput = document.getElementById('LOkpos');

        editPosyanButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var kode = button.getAttribute('data-KodPos');
                var nampos = button.getAttribute('data-namaPos');
                var rtrwpos = button.getAttribute('data-rtRw');
                var lokpos = button.getAttribute('data-lokasi');
                idKodeInput.value = kode;
                namposInput.value = nampos;
                rtrwposInput.value = rtrwpos;
                lokposInput.value = lokpos;
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
</script>