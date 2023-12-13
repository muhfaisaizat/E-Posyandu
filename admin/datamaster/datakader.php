<?php
if (isset($_POST["simpanperubahankader"])) {
    if (editkader($_POST) > 0) {
        echo "<script>location='admin.php?page=datakader';</script>";
    }
}


//   pagination
$per_page = 50;
$total_rows = count($datakader);
$total_pages = ceil($total_rows / $per_page);

if (isset($_GET['halaman']) && is_numeric($_GET['halaman'])) {
    $current_page = $_GET['halaman'];
} else {
    $current_page = 1;
}

$start = ($current_page - 1) * $per_page;
$end = $start + $per_page;

$datapos_chunk = array_slice($datakader, $start, $per_page);
?>










<div class="framesubmain">

    <div class="tablesubmain">
        <div class="container-xl">
            <div class="table">
                <div class="table-wrapper">
                    <div class="table-title">
                        <h2>Data <b>Kader</b></h2>
                        <div class="row">
                            <div class="col-sm-8 mt-3">

                                <button type="button" class="btn btn-primary text-white " style="border-radius: 15px;" id="openPopupkader">
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
                                    <th>ID kader <i class="fa fa-sort"></i></th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>No tlpon<i class="fa fa-sort"></i></th>
                                    <th>Bertugas di pos</th>
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
                                        <td><?= $row["id_kader"]; ?></td>
                                        <td><?= $row["nama_kader"]; ?></td>
                                        <td><?= $row["jabatan"]; ?></td>
                                        <td><?= $row["no_telp"]; ?></td>
                                        <td><?= $row["nama_posyandu"]; ?></td>
                                        <td><?= $row["email"]; ?></td>
                                        <td><?= str_repeat('*', strlen($row["password"])); ?></td>

                                        
                                        <td>
                                            <a class="edit edit_posyan" title="Edit" data-bs-toggle="modal" data-bs-target="#editdataposyan" style="cursor: pointer;" 
                                            data-id="<?= $row["id_kader"]; ?>"
                                            data-nam="<?= $row["nama_kader"]; ?>"
                                            data-jb="<?= $row["jabatan"]; ?>"
                                            data-tlpn="<?= $row["no_telp"]; ?>"
                                            data-pos="<?= $row["nama_posyandu"]; ?>"
                                            data-emil="<?= $row["email"]; ?>"
                                            data-pw="<?= $row["password"]; ?>"
                                            data-kdpos="<?= $row["kd_pos"]; ?>"
                                            ><i class="material-icons">&#xE254;</i></a>
                                            <a href="hapuskader.php?idk=<?= $row["id_kader"]; ?>" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
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
                                echo "<li class='page-item'><a href='admin.php?page=datakader&halaman=" . ($current_page - 1) . "' class='page-link'><i class='bi bi-chevron-double-left'></i></a></li>";
                            }

                            for ($page = 1; $page <= $total_pages; $page++) {
                                echo "<li class='page-item";
                                if ($page == $current_page) {
                                    echo " active";
                                }
                                echo "'><a href='admin.php?page=datakader&halaman=" . $page . "' class='page-link'>" . $page . "</a></li>";
                            }

                            if ($current_page < $total_pages) {
                                echo "<li class='page-item'><a href='admin.php?page=datakader&halaman=" . ($current_page + 1) . "' class='page-link'><i class='bi bi-chevron-double-right'></i></a></li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup" id="popupkader">
    <div class="popup-content">
        <span class="close" id="closePopupkader" style="float: right;">&times;</span>
        <!-- Isi form tambah data -->
        <?php include 'inputan/tambahkader.php'; ?>
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
                                <label for="nama">Id Kader:</label>
                                <input type="text" class="form-control" id="idkader" name="idkder">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="text" class="form-control" id="namak" name="nama">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nama">Jabatan:</label>
                                <input type="text" class="form-control" id="jb" name="jb">
                             </div>
                        </div>
                        <div class=" col">
                                <div class="form-group">
                                    <label for="nama">No Telepon:</label>
                                    <input type="text" class="form-control" id="tlpn" name="tlpn">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="tanggal_lahir">Email</label>
                                    <input type="text" class="form-control" id="emil" name="emil">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="tempat_lahir">Password</label>
                                    <input type="password" class="form-control" id="pw" name="pw">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="pos">Pos:</label>
                                    <select class="form-control" id="pos" name="pos">
                                        <option value="pos0" id="Namapos" name="namaposyandu">Pilih Posyandu</option>
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

                        <button type="submit" name="simpanperubahankader" class="btn btn-primary mt-3 mb-4" style="float: right;">Simpan</button>
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
        document.getElementById('openPopupkader').addEventListener('click', function() {
            document.getElementById('popupkader').style.display = 'block';
        });

        document.getElementById('closePopupkader').addEventListener('click', function() {
            document.getElementById('popupkader').style.display = 'none';
        });
    });



    // edit
    document.addEventListener('DOMContentLoaded', function() {
        var editPosyanButtons = document.querySelectorAll('.edit_posyan');
        var idKodeInput = document.getElementById('idkader');
        var namInput = document.getElementById('namak');
        var jbKodeInput = document.getElementById('jb');
        var tlpnKodeInput = document.getElementById('tlpn');
        var emilKodeInput = document.getElementById('emil');
        var pwKodeInput = document.getElementById('pw');
        var namaposKodeInput = document.getElementById('Namapos');
       

        editPosyanButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var id = button.getAttribute('data-id');
                var nam = button.getAttribute('data-nam');
                var jb = button.getAttribute('data-jb');
                var tlpn = button.getAttribute('data-tlpn');
                var pos = button.getAttribute('data-pos');
                var emil = button.getAttribute('data-emil');
                var pw = button.getAttribute('data-pw');
                var kode = button.getAttribute('data-kdpos');
                
                idKodeInput.value = id;
                namInput.value = nam;
                jbKodeInput.value = jb;
                tlpnKodeInput.value = tlpn;
                namaposKodeInput.textContent = pos;
                emilKodeInput.value = emil;
                pwKodeInput.value = pw;
                namaposKodeInput.value = kode;
                
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