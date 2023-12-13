<?php

require '../koneksi.php';
require '../session.php';







?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-posyandu</title>
    <link rel="icon" type="image/svg+xml" href="/assets/imgs/lgposyandu (1).svg">
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="/assets/css/styleadmin.css">
    <link rel="stylesheet" href="/assets/css/tabeladmin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- icon sidebar -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- icon tabel  -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- icon bostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- chart -->
    <!-- <link rel="stylesheet" href="https://unpkg.com/@adminkit/core@latest/dist/css/app.css"> -->

</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="sidebar close">
        <div class="logo-details mt-3">
            <!-- <i class='bx bxl-c-plus-plus'></i> -->
            <i class=" text-white">
                <img src="/assets/imgs/lgposyandu.svg" width="50px" height="50px" alt="">
            </i>
            <span class="logo_name">E-Posyandu</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="admin.php?page=dashboard">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Dashboard</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="admin.php?page=dashboard">Dashboard</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class='bx bx-collection'></i>
                        <span class="link_name">Data Master</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li>
                        <a class="link_name" href="#">Data Master</a>
                    </li>
                    <li>
                        <div class="bg-down">
                            <a href="admin.php?page=dataanak" class="klik-down" href="#" style="padding-left: 10px;">Data anak</a>
                        </div>
                    </li>
                    <li>
                        <div class="bg-down">
                            <a href="admin.php?page=dataibu" class="klik-down" href="#" style="padding-left: 10px;">Data ibu</a>
                        </div>
                    </li>
                    <li>
                        <div class="bg-down">
                            <a href="admin.php?page=dataimu" class="klik-down" href="#" style="padding-left: 10px;">Data imunisasi</a>
                        </div>
                    </li>

                    <li>
                        <div class="bg-down">
                            <a href="admin.php?page=datatimbang" class="klik-down" href="#" style="padding-left: 10px;" id="buttonDataPenimbangan">Data penimbangan</a>
                        </div>
                    </li>

                    <li>
                        <div class="bg-down">
                            <a href="admin.php?page=dataibulahirkan" class="klik-down" href="#" style="padding-left: 10px;">Data ibu melahirkan</a>
                        </div>
                    </li>

                    <li class="pagedatamaster1">
                        <div class="bg-down">
                            <a href="admin.php?page=datavaksin" class="klik-down" href="#" style="padding-left: 10px;">Data vaksin</a>
                        </div>
                    </li>

                    <li class="pagedatamaster">
                        <div class="bg-down">
                            <a href="admin.php?page=datapos" class="klik-down" href="#" style="padding-left: 10px;">Data posyandu</a>
                        </div>
                    </li>

                    <li class="pagedatamaster">
                        <div class="bg-down">
                            <a href="admin.php?page=databidan" class="klik-down" href="#" style="padding-left: 10px;">Data bidan</a>
                        </div>
                    </li>

                    <li class="pagedatamaster">
                        <div class="bg-down">
                            <a href="admin.php?page=datakader" class="klik-down" href="#" style="padding-left: 10px;">Data kader</a>
                        </div>
                    </li>

                    <li class="pagedatamaster">
                        <div class="bg-down">
                            <a href="admin.php?page=datauser" class="klik-down" href="#" style="padding-left: 10px;">Data user</a>
                        </div>
                    </li>

                </ul>
            </li>
            <li class="sembunyiadmin">
                <a href="admin.php?page=datachat">

                    <i class='bx bx-conversation'></i>
                    <span class="link_name">chat</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="admin.php?page=datachat">Chat</a></li>
                </ul>
            </li>
            <li>
                <a  href="admin.php?page=pengaturan">
                    <i class='bx bx-cog'></i>
                    <span class="link_name">Setting</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name " href="admin.php?page=pengaturan">Setting</a></li>
                </ul>
            </li>
            <li>

                <a class="logoutfilter" href="">
                    <i class='bx bx-log-out'></i>
                    <span class="link_name">Log Out</span>
                </a>

                <ul class="sub-menu blank">
                    <li><a class="link_name logoutfilter" href="#">Log Out</a></li>
                </ul>
            </li>
        </ul>
    </div>




    <!-- ========================= Main ==================== -->
    <section class="home-section">
        <div class="home-content">
            <div class="topbar">
                <div class="topbar2">
                    <div class="toggle">
                        <i class='bx bx-menu'></i>
                    </div>
                    <div class="wrapper">
                        <a class="sembunyiadmin" href="admin.php?page=datachat">
                            <i class="bi bi-envelope fs-1"></i>
                            <?php foreach ($notifp as $row) : ?>
                                <span class="badge bg-danger rounded-pill">+<?= $row["jumlah_data_baru"]; ?></span>
                            <?php endforeach; ?>
                        </a>
                        <!-- <p style="padding-left: 70px;" class="admjd">Admin</p> -->
                        <p class="admjd "></p>
                        <div class="wrapperuser ">
                            <p class="pt-4 nameuser"></p>
                            <div class="user">
                                <!-- <img src="/assets/imgs/userpp.png" alt=""> -->
                                <img class="pp" src="" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="submain">

                <!-- ================tampilan sub main=================== -->
                <?php
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                    switch ($page) {
                        case 'dashboard':
                            include 'form/dashboard.php';
                            break;
                        case 'dataanak':
                            include 'datamaster/dataanak.php';
                            break;
                        case 'dataibu':
                            include 'datamaster/dataibu.php';
                            break;
                        case 'dataimu':
                            include 'datamaster/dataimu.php';
                            break;
                        case 'datatimbang':
                            include 'datamaster/datatimbang.php';
                            break;
                        case 'dataibulahirkan':
                            include 'datamaster/dataibumelahirkan.php';
                            break;
                        case 'datavaksin':
                            include 'datamaster/datavaksin.php';
                            break;
                        case 'datapos':
                            include 'datamaster/datapos.php';
                            break;
                        case 'databidan':
                            include 'datamaster/databidan.php';
                            break;
                        case 'datakader':
                            include 'datamaster/datakader.php';
                            break;
                        case 'datauser':
                            include 'datamaster/datauser.php';
                            break;
                        case 'datachat':
                            include 'form/chat.php';
                            break;
                        case 'datachatbalas':
                            include 'form/balas.php';
                            break;
                        case 'pengaturan':
                            include 'form/pengaturan.php';
                            break;
                        default:
                            include 'form/dashboard.php'; // Halaman default jika parameter tidak sesuai
                            break;
                    }
                } else {
                    include 'form/dashboard.php'; // Halaman default jika parameter tidak ada
                }
                ?>

            </div>

        </div>
    </section>







    <!-- =========== Scripts =========  -->

    <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
                arrowParent.classList.toggle("showMenu");
            });
        }

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });



        // menyembunyikan beberapa fitur
        document.addEventListener('DOMContentLoaded', function() {

            <?php if (isset($_SESSION["role"])) : ?>

                var role = '<?php echo $_SESSION["role"]; ?>';



                var elementsToRemoveStyle = document.querySelectorAll('.admjd');
                elementsToRemoveStyle.forEach(function(element) {
                    element.style.paddingLeft = '70px';
                    element.innerText = 'Admin';
                });



                if (role === "Admin") {
                    var elementsToDisplayName = document.querySelectorAll('.nameuser');
                    elementsToDisplayName.forEach(function(element) {
                        element.innerText = "<?php echo isset($_SESSION['nama_admin']) ? $_SESSION['nama_admin'] : ''; ?>";
                    });



                    var elementsToDisplayName = document.querySelectorAll('.emailuser');
                    elementsToDisplayName.forEach(function(element) {
                        element.innerText = "<?php echo isset($_SESSION['id_admin']) ? $_SESSION['id_admin'] : ''; ?>";
                    });

                    var elementsToDisplayName = document.querySelectorAll('.logoutfilter');
                    elementsToDisplayName.forEach(function(element) {
                        element.href = "/logout.php";
                    });

                    var elementsToDisplayImage = document.querySelectorAll('.pp');
                    elementsToDisplayImage.forEach(function(element) {
                        var fotoUrl = "<?php echo isset($_SESSION['foto_admin']) ? $_SESSION['foto_admin'] : ''; ?>";
                        console.log('URL Foto: ', fotoUrl);

                        if (fotoUrl === '' || fotoUrl === null) {
                            // Jika foto tidak tersedia, tampilkan foto "userpp.png"
                            element.src = '/assets/imgs/userpp.png';
                        } else {
                            // Jika foto tersedia, tampilkan foto sesuai URL
                            element.src = '/assets/imgs/' + fotoUrl;
                        }
                    });



                }

                if (role === "Bidan") {

                    var elementsToShow = document.querySelectorAll('.sembunyiadmin');
                    elementsToShow.forEach(function(element) {
                        element.style.display = 'block';
                    });


                    // var elementsToUpdateStyle = document.querySelectorAll('.status_online');

                    // elementsToUpdateStyle.forEach(function(element) {
                    //     // Check the value of $_SESSION['online']
                    //     if (element.dataset.sessionStatus === 'active') {
                    //         // If it's 'active', add the 'text-success' class
                    //         element.classList.add('text-success');
                    //         // Remove 'text-muted' class if it exists
                    //         element.classList.remove('text-muted');
                    //     } else {
                    //         // If it's 'nonactive', add the 'text-muted' class
                    //         element.classList.add('text-muted');
                    //         // Remove 'text-success' class if it exists
                    //         element.classList.remove('text-success');
                    //     }
                    // });


                    var elementsToRemoveStyle = document.querySelectorAll('.admjd');
                    elementsToRemoveStyle.forEach(function(element) {
                        element.style.paddingLeft = '0';
                        element.innerText = 'Bidan';
                    });


                    var elementsToShow = document.querySelectorAll('.pagedatamaster');
                    elementsToShow.forEach(function(element) {
                        element.style.display = 'none';
                    });

                    var elementsToDisplayName = document.querySelectorAll('.nameuser');
                    elementsToDisplayName.forEach(function(element) {
                        element.innerText = "<?php echo isset($_SESSION['nama_adminb']) ? $_SESSION['nama_adminb'] : ''; ?>";
                    });

                    var elementsToDisplayName = document.querySelectorAll('.emailuser');
                    elementsToDisplayName.forEach(function(element) {
                        element.innerText = "<?php echo isset($_SESSION['id_adminb']) ? $_SESSION['id_adminb'] : ''; ?>";
                    });

                    var elementsToDisplayName = document.querySelectorAll('.logoutfilter');
                    elementsToDisplayName.forEach(function(element) {
                        element.href = "update_status.php?NIP=<?php echo isset($_SESSION['id_adminb']) ? $_SESSION['id_adminb'] : ''; ?>";
                    });


                    var elementsToDisplayImage = document.querySelectorAll('.pp');
                    elementsToDisplayImage.forEach(function(element) {
                        var fotoUrl = "<?php echo isset($_SESSION['foto_adminb']) ? $_SESSION['foto_adminb'] : ''; ?>";
                        console.log('URL Foto: ', fotoUrl);

                        if (fotoUrl === '' || fotoUrl === null) {
                            // Jika foto tidak tersedia, tampilkan foto "userpp.png"
                            element.src = '/assets/imgs/userpp.png';
                        } else {
                            // Jika foto tersedia, tampilkan foto sesuai URL
                            element.src = '/assets/imgs/' + fotoUrl;
                        }
                    });

                    window.addEventListener('beforeunload', function(event) {
                        // Mendapatkan NIP dari sesi atau dari suatu sumber yang sesuai
                        var nip = $_SESSION['id_adminb'];

                        // Kirim permintaan AJAX untuk memanggil update_status.php
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', 'update_status.php', true);
                        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                        xhr.send('nip=' + nip);

                        // Pastikan data terkirim sebelum halaman ditutup
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                // Proses respons jika diperlukan
                            }
                        };
                    });


                }

                if (role === "Kader") {

                    var elementsToRemoveStyle = document.querySelectorAll('.admjd');
                    elementsToRemoveStyle.forEach(function(element) {
                        element.style.paddingLeft = '70px';
                        element.innerText = 'Kader';
                    });


                    var elementsToShow = document.querySelectorAll('.pagedatamaster');
                    elementsToShow.forEach(function(element) {
                        element.style.display = 'none';
                    });

                    var elementsToShow = document.querySelectorAll('.pagedatamaster1');
                    elementsToShow.forEach(function(element) {
                        element.style.display = 'none';
                    });

                    var elementsToDisplayName = document.querySelectorAll('.nameuser');
                    elementsToDisplayName.forEach(function(element) {
                        element.innerText = "<?php echo isset($_SESSION['nama_admink']) ? $_SESSION['nama_admink'] : ''; ?>";
                    });

                    var elementsToDisplayName = document.querySelectorAll('.emailuser');
                    elementsToDisplayName.forEach(function(element) {
                        element.innerText = "<?php echo isset($_SESSION['id_admink']) ? $_SESSION['id_admink'] : ''; ?>";
                    });

                    var elementsToDisplayName = document.querySelectorAll('.logoutfilter');
                    elementsToDisplayName.forEach(function(element) {
                        element.href = "/logout.php";
                    });

                    var elementsToDisplayImage = document.querySelectorAll('.pp');
                    elementsToDisplayImage.forEach(function(element) {
                        var fotoUrl = "<?php echo isset($_SESSION['foto_admink']) ? $_SESSION['foto_admink'] : ''; ?>";
                        console.log('URL Foto: ', fotoUrl);

                        if (fotoUrl === '' || fotoUrl === null) {
                            // Jika foto tidak tersedia, tampilkan foto "userpp.png"
                            element.src = '/assets/imgs/userpp.png';
                        } else {
                            // Jika foto tersedia, tampilkan foto sesuai URL
                            element.src = '/assets/imgs/' + fotoUrl;
                        }
                    });

                    
                }

            <?php endif; ?>


        });




        document.addEventListener("DOMContentLoaded", function() {
            var elementsToUpdateStyle = document.querySelectorAll('.status_online');

            elementsToUpdateStyle.forEach(function(element) {
                // Check the value of status_aktif from the database
                var statusAktif = element.dataset.sessionStatus;

                // If status_aktif is 'active', add the 'text-success' class
                if (statusAktif === 'online') {
                    element.classList.add('text-success');
                } else {
                    // If status_aktif is 'nonactive', add the 'text-muted' class
                    element.classList.add('text-muted');
                }
            });
        });
    </script>
















    <!-- <script src="/assets/js/admin.js"></script> -->

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- ============= chart =============== -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

    <!-- ============== excel ================ -->
    <script src="/assets/js/table2excel.js"></script>



</body>

</html>