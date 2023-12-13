<?php
if (isset($_POST["simpanperubahantimbang"])) {
    if (edittimbang($_POST) > 0) {
        echo '<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Buat pesan popup dengan Bootstrap
        var popup = document.createElement("div");
        popup.className = "alert alert-success alert-dismissible fade show";
        popup.innerHTML = "Data tersimpan";
        popup.style.position = "fixed";
        popup.style.top = "0";
        popup.style.left = "0";
        popup.style.right = "0";
        popup.style.zIndex = "9999";
        popup.style.textAlign = "center";
        popup.style.fontSize = "15px";
    
        // Tambahkan tombol close ke pesan popup
        var closeButton = document.createElement("button");
        closeButton.type = "button";
        closeButton.className = "close";
        closeButton.setAttribute("data-dismiss", "alert");
        closeButton.setAttribute("aria-label", "Close");
        closeButton.style.border = "none"; // Menghilangkan border
        closeButton.style.backgroundColor = "transparent"; // Menghilangkan warna latar belakang
        closeButton.style.color = "red"; // Mengubah warna ikon menjadi hitam
        closeButton.style.marginLeft = "10px";

    
        var closeIcon = document.createElement("span");
        closeIcon.setAttribute("aria-hidden", "true");
        closeIcon.innerHTML = "&times;";
    
        closeButton.appendChild(closeIcon);
        popup.appendChild(closeButton);
    
        // Tambahkan pesan popup ke dalam body
        document.body.appendChild(popup);
    
        // Redirect ke halaman datatimbang setelah beberapa detik (misalnya, 3 detik)
        setTimeout(function() {
            location.href = "admin.php?page=datatimbang";
        }, 3000);
    });
    </script>';
    }
}




//   pagination
$dataanak_filter0_12 = $datatimbang0_12;
$dataanak_filter13_36 = $datatimbang13_36;
$dataanak_filter37_60 = $datatimbang37_60;

if (isset($_POST["filter_anak0_12"])) {
    // Cek apakah ada permintaan filter
    $dataanak_filter0_12 = filtertimbang0_12($_POST);
 
}elseif (isset($_POST["filter_anak13_36"])) {
    // Cek apakah ada permintaan filter
    $dataanak_filter13_36 = filtertimbang13_36($_POST);
  
}elseif (isset($_POST["filter_anak37_60"])) {
    // Cek apakah ada permintaan filter
    $dataanak_filter37_60 = filtertimbang37_60($_POST);
  
}else {
    // Tidak ada permintaan filter, gunakan data awal
    $dataanak_filter0_12 = $datatimbang0_12;
    $dataanak_filter13_36 = $datatimbang13_36;
    $dataanak_filter37_60 = $datatimbang37_60;
}

// Hitung total data

$total_rows13_36 = count($dataanak_filter13_36);
$total_rows37_60 = count($dataanak_filter37_60);
$total_rows = count($dataanak_filter0_12);

?>









<div class="framesubmain">

    <div class="tablesubmain">
        <h2>Data <b>Penimbangan</b></h2>
        <div class="row">
            <div class="col-sm-8 mt-3">

                <button type="button" class="btn btn-primary text-white " style="border-radius: 15px;" id="openPopupimubayi1timbang">
                    <i class="bi bi-plus-circle-fill" aria-hidden="true"></i>
                    <b> Tambah</b>
                </button>
            </div>
        </div>
        <nav class="nav nav-tabs mt-3" id="myTabs">
        <button type="button" class="nav-link " data-bs-toggle="tab" data-bs-target="#bayi-1timbang">
    Penimbangan bayi 0-12bln
</button>
<button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#bayi-2timbang">
    Penimbangan bayi 13-36bln
</button>
<button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#bayi-3timbang">
    Penimbangan bayi 37-60bln
</button>

        </nav>
        <div class="tab-content">


            <!--======================================= bayi 0-12 ================================================ -->

            <div class="tab-pane  fade" id="bayi-1timbang">
                <div class="container-xl">
                    <div class="table">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-8 mt-3">

                                        <!-- <button type="button" class="btn btn-primary text-white " style="border-radius: 15px;" id="openPopupimubayi1timbang">
                                            <i class="bi bi-plus-circle-fill" aria-hidden="true"></i>
                                            <b> Tambah</b>
                                        </button> -->
                                    </div>
                                    <div class="col-sm-4 mt3">

                                        <div class="search-box ms-6 mx-3">
                                            <i class="material-icons">&#xE8B6;</i>
                                            <input type="text" class="form-control search-input" placeholder="Search&hellip;">
                                        </div>
                                        <button type="button" class="btn btn-primary text-white h-75" style="border-radius: 15px;" data-bs-toggle="modal" data-bs-target="#filteranak0_12">
                                            <i class="bi bi-funnel-fill" aria-hidden="true"></i>
                                            Filter
                                        </button>
                                        <button onclick="printTabletimbang0_12()" type="button" class="btn btn-danger text-white h-75" style="border-radius: 15px;">
                                            <i class="bi bi-filetype-pdf" aria-hidden="true"></i>
                                        </button>
                                        <button onclick="exportTableToExcel('printtimbang0_12', 'Data_Timbang_0_12')" type="button" class="btn btn btn-success text-white h-75" style="border-radius: 15px;">
                                            <i class="bi bi-file-earmark-excel" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="tableFixHead6 ">
                                <table id="printdataanak" class="table table-striped table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK <i class="fa fa-sort"></i></th>
                                            <th>Nama Bayi</th>
                                            <th>Tanggal lahir<i class="fa fa-sort"></i></th>
                                            <th>BBL(kg)</th>
                                            <th>Nama Ayah</th>
                                            <th>Nama Ibu</th>
                                            <th>Tanggal Timbang<i class="fa fa-sort"></i></th>
                                            <th>Hasil Timbang</th>
                                            <th>pos</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $i = 1;
                                        ?>
                                        <?php foreach ($dataanak_filter0_12 as $row) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $row["NIK"]; ?></td>
                                                <td><?= $row["nama_anak"]; ?></td>
                                                <td><?= $row["tgl_lahir"]; ?></td>
                                                <td><?= $row["BBL"]; ?></td>
                                                <td><?= $row["nama_ibu"]; ?></td>
                                                <td><?= $row["suami"]; ?></td>
                                                <td><?= $row["tgl_timbamg"]; ?></td>
                                                <td><?= $row["hasil_timbang"]; ?></td>
                                                <td><?= $row["nama_posyandu"]; ?></td>

                                                <td>
                                                    <a class="edit editdataanak" title="Edit" data-bs-toggle="modal" data-bs-target="#editdataanak" style="cursor: pointer;" data-nik="<?= $row["NIK"]; ?>" data-namanak="<?= $row["nama_anak"]; ?>" data-tgl="<?= $row["tgl_lahir"]; ?>" data-bbl="<?= $row["BBL"]; ?>" data-nambu="<?= $row["nama_ibu"]; ?>" data-namyah="<?= $row["suami"]; ?>" data-tglt="<?= $row["tgl_timbamg"]; ?>" data-hasil="<?= $row["hasil_timbang"]; ?>" data-nampos="<?= $row["nama_posyandu"]; ?>" data-idt="<?= $row["idtimbang"]; ?>"><i class="material-icons">&#xE254;</i></a>
                                                    <a href="hapustimbang.php?nikanak=<?= $row["idtimbang"]; ?>" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                            <div class="clearfix">
                            <div class="hint-text">menampilkan <b><?= $total_rows ?></b> entries</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <!--======================================= bayi 13-36 ================================================ -->
            <div class="tab-pane " id="bayi-2timbang">
                <div class="container-xl">
                    <div class="table">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-8 mt-3">

                                        <!-- <button type="button" class="btn btn-primary text-white " style="border-radius: 15px;" id="openPopupimubayi2timbang">
                                            <i class="bi bi-plus-circle-fill" aria-hidden="true"></i>
                                            <b> Tambah</b>
                                        </button> -->
                                    </div>
                                    <div class="col-sm-4 mt3">

                                        <div class="search-box ms-6 mx-3">
                                            <i class="material-icons">&#xE8B6;</i>
                                            <input type="text" class="form-control search-input" placeholder="Search&hellip;">
                                        </div>
                                        <button type="button" class="btn btn-primary text-white h-75" style="border-radius: 15px;" data-bs-toggle="modal" data-bs-target="#filteranak13_36">
                                            <i class="bi bi-funnel-fill" aria-hidden="true"></i>
                                            Filter
                                        </button>
                                        <button onclick="printTabletimbang13_36()" type="button" class="btn btn-danger text-white h-75" style="border-radius: 15px;">
                                            <i class="bi bi-filetype-pdf" aria-hidden="true"></i>
                                        </button>
                                        <button onclick="exportTableToExcel('printtimbang13_36', 'Data_Timbang_13_36')" type="button" class="btn btn btn-success text-white h-75" style="border-radius: 15px;">
                                            <i class="bi bi-file-earmark-excel" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="tableFixHead6 ">
                                <table id="printdataanak" class="table table-striped table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK <i class="fa fa-sort"></i></th>
                                            <th>Nama Bayi</th>
                                            <th>Tanggal lahir<i class="fa fa-sort"></i></th>
                                            <th>BBL(kg)</th>
                                            <th>Nama Ayah</th>
                                            <th>Nama Ibu</th>
                                            <th>Tanggal Timbang<i class="fa fa-sort"></i></th>
                                            <th>Hasil Timbang</th>
                                            <th>pos</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $i = 1;
                                        ?>
                                        <?php foreach ($dataanak_filter13_36 as $row) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $row["NIK"]; ?></td>
                                                <td><?= $row["nama_anak"]; ?></td>
                                                <td><?= $row["tgl_lahir"]; ?></td>
                                                <td><?= $row["BBL"]; ?></td>
                                                <td><?= $row["nama_ibu"]; ?></td>
                                                <td><?= $row["suami"]; ?></td>
                                                <td><?= $row["tgl_timbamg"]; ?></td>
                                                <td><?= $row["hasil_timbang"]; ?></td>
                                                <td><?= $row["nama_posyandu"]; ?></td>

                                                <td>
                                                    <a class="edit editdataanak" title="Edit" data-bs-toggle="modal" data-bs-target="#editdataanak" style="cursor: pointer;" data-nik="<?= $row["NIK"]; ?>" data-namanak="<?= $row["nama_anak"]; ?>" data-tgl="<?= $row["tgl_lahir"]; ?>" data-bbl="<?= $row["BBL"]; ?>" data-nambu="<?= $row["nama_ibu"]; ?>" data-namyah="<?= $row["suami"]; ?>" data-tglt="<?= $row["tgl_timbamg"]; ?>" data-hasil="<?= $row["hasil_timbang"]; ?>" data-nampos="<?= $row["nama_posyandu"]; ?>" data-idt="<?= $row["idtimbang"]; ?>"><i class="material-icons">&#xE254;</i></a>
                                                    <a href="hapustimbang.php?nikanak=<?= $row["idtimbang"]; ?>" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                            <div class="clearfix">
                            <div class="hint-text">menampilkan <b><?= $total_rows13_36 ?></b> entries</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <!--======================================= bayi 37-60 ================================================ -->
            <div class="tab-pane fade" id="bayi-3timbang">
                <div class="container-xl">
                    <div class="table">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-8 mt-3">
                                    </div>
                                    <div class="col-sm-4 mt3">

                                        <div class="search-box ms-6 mx-3">
                                            <i class="material-icons">&#xE8B6;</i>
                                            <input type="text" class="form-control search-input" placeholder="Search&hellip;">
                                        </div>
                                        <button type="button" class="btn btn-primary text-white h-75" style="border-radius: 15px;" data-bs-toggle="modal" data-bs-target="#filteranak37_60"
                                            ><i class="bi bi-funnel-fill" aria-hidden="true"></i>
                                            Filter
                                        </button>
                                        <button onclick="printTabletimbang37_60()" type="button" class="btn btn-danger text-white h-75" style="border-radius: 15px;">
                                            <i class="bi bi-filetype-pdf" aria-hidden="true"></i>
                                        </button>
                                        <button onclick="exportTableToExcel('printtimbang37_60', 'Data_Timbang_37_60')" type="button" class="btn btn btn-success text-white h-75" style="border-radius: 15px;">
                                            <i class="bi bi-file-earmark-excel" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="tableFixHead6 ">
                                <table id="printdataanak" class="table table-striped table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK <i class="fa fa-sort"></i></th>
                                            <th>Nama Bayi</th>
                                            <th>Tanggal lahir<i class="fa fa-sort"></i></th>
                                            <th>BBL(kg)</th>
                                            <th>Nama Ayah</th>
                                            <th>Nama Ibu</th>
                                            <th>Tanggal Timbang<i class="fa fa-sort"></i></th>
                                            <th>Hasil Timbang</th>
                                            <th>pos</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $i = 1;
                                        ?>
                                        <?php foreach ($dataanak_filter37_60 as $row) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $row["NIK"]; ?></td>
                                                <td><?= $row["nama_anak"]; ?></td>
                                                <td><?= $row["tgl_lahir"]; ?></td>
                                                <td><?= $row["BBL"]; ?></td>
                                                <td><?= $row["nama_ibu"]; ?></td>
                                                <td><?= $row["suami"]; ?></td>
                                                <td><?= $row["tgl_timbamg"]; ?></td>
                                                <td><?= $row["hasil_timbang"]; ?></td>
                                                <td><?= $row["nama_posyandu"]; ?></td>

                                                <td>
                                                    <a class="edit editdataanak" title="Edit" data-bs-toggle="modal" data-bs-target="#editdataanak" style="cursor: pointer;" data-nik="<?= $row["NIK"]; ?>" data-namanak="<?= $row["nama_anak"]; ?>" data-tgl="<?= $row["tgl_lahir"]; ?>" data-bbl="<?= $row["BBL"]; ?>" data-nambu="<?= $row["nama_ibu"]; ?>" data-namyah="<?= $row["suami"]; ?>" data-tglt="<?= $row["tgl_timbamg"]; ?>" data-hasil="<?= $row["hasil_timbang"]; ?>" data-nampos="<?= $row["nama_posyandu"]; ?>" data-idt="<?= $row["idtimbang"]; ?>"><i class="material-icons">&#xE254;</i></a>
                                                    <a href="hapustimbang.php?nikanak=<?= $row["idtimbang"]; ?>" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                            <div class="clearfix">
                            <div class="hint-text">menampilkan <b><?= $total_rows37_60 ?></b> entries</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>
</div>

<div class="popup" id="popupimubayi1timbang">
    <div class="popup-content">
        <span class="close" id="closePopupimubayi1timbang" style="float: right;">&times;</span>
        <!-- Isi form tambah data -->
        <?php include 'inputan/tambahtimbang.php'; ?>
    </div>
</div>





















































<!--=================================== Modal edit  ======================================================-->

<div class="modal fade" id="editdataanak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit <b>Data Penimbangan</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                        <!-- <label>Input orang tua:</label> -->
                        <p style="font-size: 10px;"> cari nama anak di search. Jika nama anak tidak muncul lakuan register data anak </p>
                    </div>
                    <div class="form-group">
                        <label for="pos">cari data orang tua:</label>
                        <select class="form-control" id="Pos1" name="pos1">
                            <option value="pos0">cari</option>
                            <?php
                            foreach ($dataanak as $row) {
                                $nik = $row["NIK"];
                                $namaanak = $row["nama_anak"];
                                $namaibu = $row["nama_ibu"];
                                $namaayah = $row["suami"];
                                $tgl = $row["tgl_lahir"];
                                $bbl = $row["BBL"];
                                $kdp = $row["kd_pos"];
                                $nmpos = $row["nama_posyandu"];

                                echo "<option>$kdp - $nmpos - $nik - $namaanak - $namaibu - $namaayah - $tgl - $bbl </option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">NIK:</label>
                        <input type="text" class="form-control" id="idt" name="idt" hidden>
                        <input type="text" class="form-control" id="Nik" name="nik" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nik">Nama balita:</label>
                        <input type="text" class="form-control" id="Nama" name="nama" readonly>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nama_ayah">Nama Ayah:</label>
                                <input type="text" class="form-control" id="Nama_ayah" name="nama_ayah" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="nama_ibu">Nama Ibu:</label>
                                <input type="text" class="form-control" id="Nama_ibu" name="nama_ibu" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="tempat_lahir">Tanggal Lahir:</label>
                                <input type="date" class="form-control" id="Tanggal_lahir" name="tempat_lahir" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="tempat_lahir">Tanggal Timbang:</label>
                                <input type="date" class="form-control" id="Tanggal_timbang" name="tanggal_timbang">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nama_ayah">BBL(kg):</label>
                                <input type="text" class="form-control" id="Bbl" name="bbl" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="nama_ibu">Hasil timbang:</label>
                                <input type="text" class="form-control" id="Hasiltimb" name="hasiltimb">
                            </div>
                        </div>
                    </div>
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
                    <button type="submit" name="simpanperubahantimbang" class="btn btn-primary mt-3 mb-4" style="float: right;">Simpan</button>
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="Submit" name="simpanperubahan" type="button" class="btn btn-primary">Simpan Perubahan</button> -->
            </div>
        </div>
    </div>
</div>
































<!-- filter -->
<div class="modal fade" id="filteranak0_12" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Filter <b>Data penimbangan</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="tanggal">Tanggal Penimbangan</label>
                                <input type="date" class="form-control" id="tanggalf" name="tanggalf">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="tanggal">BBL(kg):</label>
                                <input type="text" class="form-control" id="BBLF" name="bbl">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="tanggal">hasil timbang:</label>
                                <input type="text" class="form-control" id="hasilf" name="hasil">
                            </div>
                        </div>
                        <div class="col">
                            <label for="pos">Pos:</label>
                            <select class="form-control" id="pos" name="posfilter">
                                <option value="">pilih Posyandu</option>
                                <?php
                                foreach ($datapos as $row) {
                                    $kdpos = $row['kd_pos'];
                                    $nama = $row['nama_posyandu'];
                                    echo "<option value='$nama'>$nama</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" name="filter_anak0_12" class="btn btn-primary nt-3 mt-3">Filter</button>
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="Submit" name="simpanperubahan" type="button" class="btn btn-primary">Simpan Perubahan</button> -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="filteranak13_36" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Filter <b>Data penimbangan</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="tanggal">Tanggal Penimbangan</label>
                                <input type="date" class="form-control" id="tanggalf" name="tanggalf13_36">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="tanggal">BBL(kg):</label>
                                <input type="text" class="form-control" id="BBLF" name="bbl13_36">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="tanggal">hasil timbang:</label>
                                <input type="text" class="form-control" id="hasilf" name="hasil13_36">
                            </div>
                        </div>
                        <div class="col">
                            <label for="pos">Pos:</label>
                            <select class="form-control" id="pos" name="posfilter13_36">
                                <option value="">pilih Posyandu</option>
                                <?php
                                foreach ($datapos as $row) {
                                    $kdpos = $row['kd_pos'];
                                    $nama = $row['nama_posyandu'];
                                    echo "<option value='$nama'>$nama</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" name="filter_anak13_36" class="btn btn-primary nt-3 mt-3">Filter</button>
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="Submit" name="simpanperubahan" type="button" class="btn btn-primary">Simpan Perubahan</button> -->
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="filteranak37_60" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Filter <b>Data penimbangan</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="tanggal">Tanggal Penimbangan</label>
                                <input type="date" class="form-control" id="tanggalf" name="tanggalf37_60">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="tanggal">BBL(kg):</label>
                                <input type="text" class="form-control" id="BBLF" name="bbl37_60">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="tanggal">hasil timbang:</label>
                                <input type="text" class="form-control" id="hasilf" name="hasil37_60">
                            </div>
                        </div>
                        <div class="col">
                            <label for="pos">Pos:</label>
                            <select class="form-control" id="pos" name="posfilter37_60">
                                <option value="">pilih Posyandu</option>
                                <?php
                                foreach ($datapos as $row) {
                                    $kdpos = $row['kd_pos'];
                                    $nama = $row['nama_posyandu'];
                                    echo "<option value='$nama'>$nama</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" name="filter_anak37_60" class="btn btn-primary nt-3 mt-3">Filter</button>
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
    <table id="printtimbang0_12" class="usia0_12 table table-striped table-hover table-bordered">
        <caption style="text-align: center; margin-left:240px; padding-left:10px;">
            <b>BUKU PENIMBANGAN</b> <br>
            <b>REGISTER PENIMBANGAN BAYI (UMUR 0 - 12 BULAN)</b>
        </caption>
        <thead style="text-align: center;">
            <tr>
                <th>No</th>
                <th>NIK <i class="fa fa-sort"></i></th>
                <th>Nama Bayi</th>
                <th>Tanggal lahir<i class="fa fa-sort"></i></th>
                <th>BBL(kg)</th>
                <th>Nama Ayah</th>
                <th>Nama Ibu</th>
                <th>Tanggal Timbang<i class="fa fa-sort"></i></th>
                <th>Hasil Timbang</th>
                <th>pos</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            ?>
            <?php foreach ($dataanak_filter0_12 as $row) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row["NIK"]; ?></td>
                    <td><?= $row["nama_anak"]; ?></td>
                    <td><?= $row["tgl_lahir"]; ?></td>
                    <td><?= $row["BBL"]; ?></td>
                    <td><?= $row["nama_ibu"]; ?></td>
                    <td><?= $row["suami"]; ?></td>
                    <td><?= $row["tgl_timbamg"]; ?></td>
                    <td><?= $row["hasil_timbang"]; ?></td>
                    <td><?= $row["nama_posyandu"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>





<div id="printTableDiv" style="display: none;">
    <table id="printtimbang13_36" class="usia0_12 table table-striped table-hover table-bordered">
        <caption style="text-align: center; margin-left:240px; padding-left:10px;">
            <b>BUKU PENIMBANGAN</b> <br>
            <b>REGISTER PENIMBANGAN BAYI (UMUR 13 - 36 BULAN)</b>
        </caption>
        <thead style="text-align: center;">
            <tr>
                <th>No</th>
                <th>NIK <i class="fa fa-sort"></i></th>
                <th>Nama Bayi</th>
                <th>Tanggal lahir<i class="fa fa-sort"></i></th>
                <th>BBL(kg)</th>
                <th>Nama Ayah</th>
                <th>Nama Ibu</th>
                <th>Tanggal Timbang<i class="fa fa-sort"></i></th>
                <th>Hasil Timbang</th>
                <th>pos</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            ?>
            <?php foreach ($dataanak_filter13_36 as $row) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row["NIK"]; ?></td>
                    <td><?= $row["nama_anak"]; ?></td>
                    <td><?= $row["tgl_lahir"]; ?></td>
                    <td><?= $row["BBL"]; ?></td>
                    <td><?= $row["nama_ibu"]; ?></td>
                    <td><?= $row["suami"]; ?></td>
                    <td><?= $row["tgl_timbamg"]; ?></td>
                    <td><?= $row["hasil_timbang"]; ?></td>
                    <td><?= $row["nama_posyandu"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>






<div id="printTableDiv" style="display: none;">
    <table id="printtimbang37_60" class="usia0_12 table table-striped table-hover table-bordered">
        <caption style="text-align: center; margin-left:240px; padding-left:10px;">
            <b>BUKU PENIMBANGAN</b> <br>
            <b>REGISTER PENIMBANGAN BAYI (UMUR 37 - 60 BULAN)</b>
        </caption>
        <thead style="text-align: center;">
            <tr>
                <th>No</th>
                <th>NIK <i class="fa fa-sort"></i></th>
                <th>Nama Bayi</th>
                <th>Tanggal lahir<i class="fa fa-sort"></i></th>
                <th>BBL(kg)</th>
                <th>Nama Ayah</th>
                <th>Nama Ibu</th>
                <th>Tanggal Timbang<i class="fa fa-sort"></i></th>
                <th>Hasil Timbang</th>
                <th>pos</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            ?>
            <?php foreach ($dataanak_filter37_60 as $row) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row["NIK"]; ?></td>
                    <td><?= $row["nama_anak"]; ?></td>
                    <td><?= $row["tgl_lahir"]; ?></td>
                    <td><?= $row["BBL"]; ?></td>
                    <td><?= $row["nama_ibu"]; ?></td>
                    <td><?= $row["suami"]; ?></td>
                    <td><?= $row["tgl_timbamg"]; ?></td>
                    <td><?= $row["hasil_timbang"]; ?></td>
                    <td><?= $row["nama_posyandu"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>




















<script>

document.addEventListener("DOMContentLoaded", function() {
    // Cek apakah ada data dalam sessionStorage untuk tab
    var activeTab2 = sessionStorage.getItem('activeTab2Datatimbang'); // Gunakan kunci yang berbeda
    
    if (activeTab2) {
        // Temukan tab pane yang sesuai dan aktifkan
        var tabPane1 = document.getElementById(activeTab2);
        if (tabPane1) {
            tabPane1.classList.add('active', 'show');
        }
    }

    // Cek apakah ada data dalam sessionStorage untuk tombol
    var activeTabButton = sessionStorage.getItem('activeTabButtonDatatimbang'); // Gunakan kunci yang berbeda
    
    if (activeTabButton) {
        // Temukan tombol tab yang sesuai dan aktifkan
        var tabButton = document.querySelector('[data-bs-target="#' + activeTabButton + '"]');
        if (tabButton) {
            tabButton.classList.add('active');
        }
    }

    document.querySelectorAll('.nav-link').forEach(function (button) {
        button.addEventListener('click', function () {
            // Hapus kelas "active" dari semua tombol tab
            document.querySelectorAll('.nav-link').forEach(function (tabButton) {
                tabButton.classList.remove('active');
            });

            // Tambahkan kelas "active" ke tombol yang diklik
            this.classList.add('active');

            // Simpan status tombol tab yang terakhir di-klik ke dalam sessionStorage
            var targetId = this.getAttribute('data-bs-target').substr(1);
            sessionStorage.setItem('activeTabButtonDatatimbang', targetId); // Gunakan kunci yang berbeda

            // Aktifkan tab pane yang sesuai
            document.querySelectorAll('.tab-pane').forEach(function (tabPane1) {
                tabPane1.classList.remove('active', 'show');
            });

            var tabPaneId1 = this.getAttribute('data-bs-target').substr(1);
            var tabPane1 = document.getElementById(tabPaneId1);
            if (tabPane1) {
                tabPane1.classList.add('active', 'show');
            }

            // Simpan status tab pane yang terakhir di-klik ke dalam sessionStorage
            sessionStorage.setItem('activeTab2Datatimbang', tabPaneId1); // Gunakan kunci yang berbeda
        });
    });
});




    // popuptambah
    // form timbang1
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('openPopupimubayi1timbang').addEventListener('click', function() {
            document.getElementById('popupimubayi1timbang').style.display = 'block';
        });

        document.getElementById('closePopupimubayi1timbang').addEventListener('click', function() {
            document.getElementById('popupimubayi1timbang').style.display = 'none';
        });
    });




    // edit
    document.addEventListener('DOMContentLoaded', function() {
        var editPosyanButtons = document.querySelectorAll('.editdataanak');
        var idInput = document.getElementById('idt');
        var nikInput = document.getElementById('Nik');
        var naminput = document.getElementById('Nama');
        var namyahInput = document.getElementById('Nama_ayah');
        var nambuInput = document.getElementById('Nama_ibu');
        var tglInput = document.getElementById('Tanggal_lahir');
        var tgltInput = document.getElementById('Tanggal_timbang');
        var bblInput = document.getElementById('Bbl');
        var hasilInput = document.getElementById('Hasiltimb');
        var posInput = document.getElementById('Namapos');



        editPosyanButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var nikank = button.getAttribute('data-nik');
                var nam = button.getAttribute('data-namanak');
                var tgl = button.getAttribute('data-tgl');
                var bbl = button.getAttribute('data-bbl');
                var nambu = button.getAttribute('data-nambu');
                var namyah = button.getAttribute('data-namyah');
                var tglt = button.getAttribute('data-tglt');
                var hasil = button.getAttribute('data-hasil');
                var nampos = button.getAttribute('data-nampos');
                var idt = button.getAttribute('data-idt');


                idInput.value = idt;
                nikInput.value = nikank;
                naminput.value = nam;
                tglInput.value = tgl;
                bblInput.value = bbl;
                nambuInput.value = nambu;
                namyahInput.value = namyah;
                tgltInput.value = tglt;
                hasilInput.value = hasil;

                posInput.textContent = nampos;



                // posDropdown.value = KDpos;
                // posDropdown.textContent = nampos;

                // alert(kode);
            });
        });
    });

    // select cari
    document.addEventListener("DOMContentLoaded", function() {
        var selectPos = document.getElementById("Pos1");
        var inputNik = document.getElementById("Nik");
        var inputNamaAyah = document.getElementById("Nama_ayah");
        var inputNamaIbu = document.getElementById("Nama_ibu");
        var inputNampos = document.getElementById("Namapos");
        var inputNamanak = document.getElementById("Nama");
        var inputtgl = document.getElementById("Tanggal_lahir");
        var inputbbl = document.getElementById("Bbl");

        selectPos.addEventListener("change", function() {
            var selectedOption = selectPos.options[selectPos.selectedIndex];
            var selectedValue = selectedOption.value;

            if (selectedValue !== "pos0") {
                // Split the selected value into its components
                var parts = selectedValue.split(" - ");
                var kdpos = parts[0];
                var nampos = parts[1];
                var nik = parts[2];
                var namaank = parts[3];
                var namaIbu = parts[4];
                var namaAyah = parts[5];
                var tgl = parts[6];
                var bbl = parts[7];

                // Set the input values
                inputNik.value = nik;
                inputNamanak.value = namaank;
                inputNamaIbu.value = namaIbu;
                inputNamaAyah.value = namaAyah;
                inputtgl.value = tgl;
                inputbbl.value = bbl;
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
        var searchInputs = document.querySelectorAll('.search-input');
        var tableRows = document.querySelectorAll('tbody tr'); // Ganti dengan selektor yang sesuai

        searchInputs.forEach(function(searchInput) {
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
    });


    // pdf
    function printTabletimbang0_12() {
        var printContents = document.getElementById("printtimbang0_12").outerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
    function printTabletimbang13_36() {
        var printContents = document.getElementById("printtimbang13_36").outerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
    function printTabletimbang37_60() {
        var printContents = document.getElementById("printtimbang37_60").outerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }

    // excel
    // Fungsi untuk mengexport tabel ke Excel
function exportTableToExcel(tableId, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableId);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Nama file Excel yang akan diunduh
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Membuat tautan unduh untuk file Excel
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Membuat tautan unduh untuk file Excel
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Menentukan nama file yang akan diunduh
        downloadLink.download = filename;
        
        // Klik tautan unduh untuk mengunduh file
        downloadLink.click();
    }
}

</script>