<?php
if (isset($_POST["simpanperubahanvak"])) {
    if (editvak($_POST) > 0) {
        echo "<script>location='admin.php?page=datavaksin';</script>";
    }
}


//   pagination
$per_page = 50;
$total_rows = count($datavaksin);
$total_pages = ceil($total_rows / $per_page);

if (isset($_GET['halaman']) && is_numeric($_GET['halaman'])) {
    $current_page = $_GET['halaman'];
} else {
    $current_page = 1;
}

$start = ($current_page - 1) * $per_page;
$end = $start + $per_page;

$datapos_chunk = array_slice($datavaksin, $start, $per_page);
?>



<div class="framesubmain">

    <div class="tablesubmain">
        <div class="container-xl">
            <div class="table">
                <div class="table-wrapper">
                    <div class="table-title">
                    <h2>Data <b>Vaksin/vitamin</b></h2>
                        <div class="row">
                            <div class="col-sm-8 mt-3">
                               
                                <button type="button" class="btn btn-primary text-white " style="border-radius: 15px;" id="openPopupvaksin">
                                    <i class="bi bi-plus-circle-fill" aria-hidden="true"></i>
                                   <b>  Tambah</b>
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
                                <th>Kode <i class="fa fa-sort"></i></th>
                                <th>Nama</th>
                                <th>stok<i class="fa fa-sort"></i></th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i=1;
                            ?>
                            <?php foreach($datapos_chunk as $row) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $row["kd_vaksin"]; ?></td>
                                <td><?= $row["nama_vaksin"]; ?></td>
                                <td><?= $row["stok"]; ?></td>
                                <td>
                                         <a href="#" class="edit edit_vaksin" title="Edit" data-bs-toggle="modal" data-bs-target="#editdatavaksin" 
                                         data-Kodvaksin="<?= $row["kd_vaksin"]; ?>"
                                         data-namavak="<?= $row["nama_vaksin"]; ?>"
                                         data-stokvak="<?= $row["stok"]; ?>"
                                         ><i class="material-icons">&#xE254;</i></a>
                                    <a href="hapusvaksin.php?kd_Vaksin=<?= $row["kd_vaksin"]; ?>" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
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
                                echo "<li class='page-item'><a href='admin.php?page=datavaksin&halaman=" . ($current_page - 1) . "' class='page-link'><i class='bi bi-chevron-double-left'></i></a></li>";
                            }

                            for ($page = 1; $page <= $total_pages; $page++) {
                                echo "<li class='page-item";
                                if ($page == $current_page) {
                                    echo " active";
                                }
                                echo "'><a href='admin.php?page=datavaksin&halaman=" . $page . "' class='page-link'>" . $page . "</a></li>";
                            }

                            if ($current_page < $total_pages) {
                                echo "<li class='page-item'><a href='admin.php?page=datavaksin&halaman=" . ($current_page + 1) . "' class='page-link'><i class='bi bi-chevron-double-right'></i></a></li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup" id="popupvaksin">
    <div class="popup-content">
        <span class="close" id="closePopupvaksin" style="float: right;">&times;</span>
        <!-- Isi form tambah data -->
        <?php include 'inputan/tambahvaksin.php'; ?>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="editdatavaksin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit <b>Data Vaksin</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form method="post">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="nama">Kode:</label>
                    <input type="text" class="form-control" id="idvaksin" name="kdvaksin">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="namavak" name="nama">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="nik">Stok:</label>
            <input type="text" class="form-control" id="stok" name="stok">
        </div>
        <button type="submit" name="simpanperubahanvak" class="btn btn-primary mt-3 mb-4" style="float: right;">Simpan</button>
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
        document.getElementById('openPopupvaksin').addEventListener('click', function() {
  document.getElementById('popupvaksin').style.display = 'block';
});

document.getElementById('closePopupvaksin').addEventListener('click', function() {
  document.getElementById('popupvaksin').style.display = 'none';
});
    });



    // edit
    document.addEventListener('DOMContentLoaded', function() {
        var editPosyanButtons = document.querySelectorAll('.edit_vaksin');
        var idKodeInput = document.getElementById('idvaksin');
        var namvakInput = document.getElementById('namavak');
        var stokInput = document.getElementById('stok');

        editPosyanButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var kode = button.getAttribute('data-Kodvaksin');
                var nam = button.getAttribute('data-namavak');
                var stok = button.getAttribute('data-stokvak');
              
                idKodeInput.value = kode;
                namvakInput.value = nam;
                stokInput.value = stok;
               
                // alert(kode);
            });
        });
    });


    // cari
    document.addEventListener('DOMContentLoaded', function() {
        var searchInput = document.getElementById('search-input');
        var tableRows = document.querySelectorAll('tbody tr'); 

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


