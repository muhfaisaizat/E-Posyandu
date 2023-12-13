
<?php
if (isset($_POST["simpanperubahanbidan"])) {
    if (editbidan($_POST) > 0) {
        echo "<script>location='admin.php?page=databidan';</script>";
    }
}


//   pagination
$per_page = 50;
$total_rows = count($databidan);
$total_pages = ceil($total_rows / $per_page);

if (isset($_GET['halaman']) && is_numeric($_GET['halaman'])) {
    $current_page = $_GET['halaman'];
} else {
    $current_page = 1;
}

$start = ($current_page - 1) * $per_page;
$end = $start + $per_page;

$datapos_chunk = array_slice($databidan, $start, $per_page);
?>













<div class="framesubmain">

    <div class="tablesubmain">
        <div class="container-xl">
            <div class="table">
                <div class="table-wrapper">
                    <div class="table-title">
                        <h2>Data <b>Bidan</b></h2>
                        <div class="row">
                            <div class="col-sm-8 mt-3">

                                <button type="button" class="btn btn-primary text-white " style="border-radius: 15px;" id="openPopupbidan">
                                    <i class="bi bi-plus-circle-fill" aria-hidden="true"></i>
                                    <b> Tambah</b>
                                </button>
                            </div>
                            <div class="col-sm-4 mt3">

                                <div class="search-box" style="margin-left: 200px;">
                                    <i class="material-icons">&#xE8B6;</i>
                                    <input id="search-input" type="text" class="form-control" placeholder="Search&hellip;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tableFixHead ">
                        <table id="printdataanak" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIP <i class="fa fa-sort"></i></th>
                                    <th>Nama</th>
                                    <th>No tlpon<i class="fa fa-sort"></i></th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>Password</th>
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
                                        <td data-searchable="true"><?= $row["NIP"]; ?></td>
                                        <td data-searchable="true"><?= $row["Nama"]; ?></td>
                                        <td data-searchable="true"><?= $row["No_telp"]; ?></td>
                                        <td data-searchable="true"><?= $row["Alamat"]; ?></td>
                                        <td data-searchable="true"><?= $row["Email"]; ?></td>
                                        <td><?= str_repeat('*', strlen($row["Password"])); ?></td>
                                        <td>
                                            <a class="edit edit_posyan" title="Edit" data-bs-toggle="modal" data-bs-target="#editdataposyan" style="cursor: pointer;" 
                                            data-nip="<?= $row["NIP"]; ?>"
                                            data-nam="<?= $row["Nama"]; ?>"
                                            data-ntlpn="<?= $row["No_telp"]; ?>"
                                            data-alm="<?= $row["Alamat"]; ?>"
                                            data-emil="<?= $row["Email"]; ?>"
                                            data-pww="<?= $row["Password"]; ?>"
                                            ><i class="material-icons">&#xE254;</i></a>
                                            <a  href="hapusbidan.php?kd_nip=<?= $row["NIP"]; ?>" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
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
                                echo "<li class='page-item'><a href='admin.php?page=databidan&halaman=" . ($current_page - 1) . "' class='page-link'><i class='bi bi-chevron-double-left'></i></a></li>";
                            }

                            for ($page = 1; $page <= $total_pages; $page++) {
                                echo "<li class='page-item";
                                if ($page == $current_page) {
                                    echo " active";
                                }
                                echo "'><a href='admin.php?page=databidan&halaman=" . $page . "' class='page-link'>" . $page . "</a></li>";
                            }

                            if ($current_page < $total_pages) {
                                echo "<li class='page-item'><a href='admin.php?page=databidan&halaman=" . ($current_page + 1) . "' class='page-link'><i class='bi bi-chevron-double-right'></i></a></li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup" id="popupbidan">
    <div class="popup-content">
        <span class="close" id="closePopupbidan" style="float: right;">&times;</span>
        <!-- Isi form tambah data -->
        <?php include 'inputan/tambahbidan.php'; ?>
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
                <form method="post">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nama">NIP:</label>
                                <input type="text" class="form-control" id="nip" name="nip">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="nama">Nama Bidan:</label>
                                <input type="text" class="form-control" id="namab" name="nama">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="tanggal_lahir">No tlpon</label>
                                <input type="text" class="form-control" id="tlpn" name="tlpn">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="tempat_lahir">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="tanggal_lahir">Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="tempat_lahir">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- <label for="formFile" class="form-label">upload foto</label> -->
                        <input class="form-control" type="file" id="formFile" name="foto" hidden>
                    </div>
                    <button type="submit" name="simpanperubahanbidan" class="btn btn-primary mt-3 mb-4" style="float: right;">Simpan</button>
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
        document.getElementById('openPopupbidan').addEventListener('click', function() {
            document.getElementById('popupbidan').style.display = 'block';
        });

        document.getElementById('closePopupbidan').addEventListener('click', function() {
            document.getElementById('popupbidan').style.display = 'none';
        });
    });



    // edit
    document.addEventListener('DOMContentLoaded', function() {
        var editPosyanButtons = document.querySelectorAll('.edit_posyan');
        var idKodeInput = document.getElementById('nip');
        var namInput = document.getElementById('namab');
        var tlpnInput = document.getElementById('tlpn');
        var almtInput = document.getElementById('alamat');
        var emilInput = document.getElementById('email');
        var pwInput = document.getElementById('password');
     

        editPosyanButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                
                var nip = button.getAttribute('data-nip');
                var namb = button.getAttribute('data-nam');
                var tlpnb = button.getAttribute('data-ntlpn');
                var almtb = button.getAttribute('data-alm');
                var emailb = button.getAttribute('data-emil');
                var pwb = button.getAttribute('data-pww');
                
                idKodeInput.value=nip;
                namInput.value=namb;
                tlpnInput.value=tlpnb;
                almtInput.value=almtb;
                emilInput.value=emailb;
                pwInput.value=pwb;
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