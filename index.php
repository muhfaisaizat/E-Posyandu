<?php
require('koneksi.php');
// include('koneksi.php');

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);



// Initialize $sembunyiClass if not set
$sembunyiClass = "";

if (isset($_SESSION["role"])) {
  $role = $_SESSION["role"];
  if ($role == "Admin") {
    header("Location: admin/admin.php");
  } elseif ($role == "Kader") {
    header("Location: admin/admin.php");
  } elseif ($role == "Bidan") {
    header("Location: admin/admin.php");
  } elseif ($role == "User") {
    header("Location: user/user.php");
  } else {
    header("Location: index.php");
  }
}

if (isset($_POST["submit"])) {
  $emailid = $_POST["txt_email"];
  $password = $_POST["txt_pass"];

  $cariadmin = query("SELECT * FROM admin WHERE email = '$emailid' AND password = '$password'");
  $carikader = query("SELECT * FROM data_kader WHERE email = '$emailid' AND password = '$password'");
  $caribidan = query("SELECT *,COALESCE(NULLIF(foto, ''), 'userpp.png') AS foto FROM data_bidan WHERE Email = '$emailid' AND Password = '$password'");
  $cariuser = query("SELECT *,COALESCE(NULLIF(foto, ''), 'userpp.png') AS foto FROM data_user WHERE email = '$emailid' AND password = '$password'");

  if ($cariadmin) {
    // set session
    $_SESSION['nama_admin'] = $cariadmin[0]['nama'];
    $_SESSION['id_admin'] = $cariadmin[0]['email'];
    $_SESSION['foto_admin'] = $cariadmin[0]['foto'];
    $_SESSION['role'] = "Admin";
    header("Location: admin/admin.php");
  } else if ($carikader) {
    // if (editstatuskadermasuk1($carikader[0]['email']) > 0) {
    $_SESSION['nama_admink'] = $carikader[0]['nama_kader'];
    $_SESSION['id_admink'] = $carikader[0]['email'];
    $_SESSION['foto_admink'] = $carikader[0]['foto'];
    $_SESSION['idk'] = $carikader[0]['id_kader'];
    $_SESSION['role'] = "Kader";
    header("Location: admin/admin.php");
  // }
  } else if ($caribidan) {
    if (editstatusbidanmasuk($caribidan[0]['Email']) > 0) {
      $_SESSION['nama_adminb'] = $caribidan[0]['Nama'];
      $_SESSION['id_adminb'] = $caribidan[0]['Email'];
      $_SESSION['foto_adminb'] = $caribidan[0]['foto'];
      $_SESSION['nip'] = $caribidan[0]['NIP'];  
      $_SESSION['role'] = "Bidan";
      header("Location: admin/admin.php");
    }
  } else if ($cariuser) {
    if (editstatususermasuk($cariuser[0]['email']) > 0) {
      $_SESSION['nama_adminu'] = $cariuser[0]['nama'];
      $_SESSION['id_adminu'] = $cariuser[0]['email'];
      $_SESSION['foto_adminu'] = $cariuser[0]['foto'];
      $_SESSION['online'] = $cariuser[0]['status_aktif'];
      // $_SESSION['nip'] = $caribidan[0]['NIP'];
      $_SESSION['role'] = "User";
      header("Location: user/user.php");
    }
  } else {
    echo "<div class='alert alert-warning'>Username atau Password salah</div>
    <meta http-equiv='refresh' content='2'>";
  }
}

//tesmanual
// if (isset($_POST['submit'])) {
//   $email = $_POST['txt_email'];
//   $password = $_POST['txt_pass'];

//   Lakukan validasi dan verifikasi kredensial pengguna
//   if ($email == 'admin@gmail.com' && $password == 'admin') {
//       Kredensial benar, set sesi untuk menandai bahwa pengguna sudah login
//       $_SESSION['logged_in'] = true;
//       header('Location: admin/admin.php');
//       exit();
//   } else {
//       $error_message = 'Login gagal. Periksa kembali email dan kata sandi Anda.';
//   }
// }

if (isset($_POST["lppw"])) {
  if (editlupapwuser($_POST) > 0) {

    echo '<script type="text/javascript">
          document.addEventListener("DOMContentLoaded", function() {
              var myModal = new bootstrap.Modal(document.getElementById("login"));
              myModal.show();
          });
      </script>';
  }
}
?>











<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>e-posyandu</title>
  <link rel="icon" type="image/svg+xml" href="/assets/imgs/lgposyandu (1).svg">
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="/assets/imgs/" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/landingpage.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
  <!-- icon sidebar -->

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><img src="/assets/imgs/lgposyandu.svg" width="50px" height="45px" alt="">  <a href="index.php" ><b>E-Posyandu</b></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#stunting">Stunting</a></li>
          <li><a class="nav-link scrollto" href="#gizi">Gizi Anak</a></li>
          <li><a class="nav-link scrollto" href="#ibu">Ibu Hamil</a></li>
          <li><a class="nav-link scrollto" href="#konsultasi">Konsultasi</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="getstarted scrollto" href="#" data-bs-toggle="modal" data-bs-target="#login">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="container d-flex align-items-center">
      <div class="row p-5" style="background: linear-gradient(to right,#0052D4,#65C7F7, #9CECFB); border-radius:20px;">
        <div class="col-lg-6 d-flex flex-column justify-content-center  order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Elektronische Pos Pelayanan Terpadu</h1>
          <p>Hadir untuk memudahkan masyarakat
            dalam memperoleh idukasi kesehatan ibu dan anak
            juga menghadirkan konsultasi dengan bidan desa</p>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <!-- <button type="button" class="btn btn-primary btn-lg"  data-bs-toggle="button" id="openPopuplogin">konsultasi yuk ...</button> -->
            <p href="#" class="btn-get-started scrollto" data-bs-toggle="modal" data-bs-target="#login" style="cursor: pointer;">Konsultasi Yuk .....</p>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/imgs/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section>
  <!-- End Hero -->

  <!-- ======= Services Section ======= -->




  <section id="stunting" class="services section1-bg">
    <div class="container" data-aos="fade-up">

      <div class="section1-title">
        <h1><b>stunting</b></h1>
        <p style="color: #063986;">adalah kondisi yang ditandai dengan kurangnya tinggi anak dibandingkan dengan anak - anak seusianya dalam
          kata lain,
          stunting merupakan sebutan bagi gagguan pertumbuhan pada anak. penyebab utamanya yaitu kurangnya asupan
          nutrisi selama masa pertumbuan pada anak.
        </p>
      </div>

      <div class="row">
        <div class="col-xl-6 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box" style="border-radius:20px;">
            <div class="icon"></div>
            <h4><a href="">cara mencegah stunting :</a></h4>
            <p>1. Memberikan ASI eksklusif pada bayi hingga berusia 6 bulan </p>
            <p>2. Memantau perkembangan anak dan membawa ke posyandu secara berkala</p>
            <p>3. Mengkonsumsi secara rutin Tablet tambah Darah (TTD)</p>
            <p>4. Memberikan MPASI yang begizi dan kaya protein hewani untuk bayi yang berusia diatas 6 bulan</p>
            <p>5. Memenuhi asupan gizi yang cukup sebelum merencanakan kehamilan dan selama kehamilan.</p>
            <p>6. Melakukan pemeriksaan rutin ke posyandu untuk memantau tahapan tumbuh kembang anak</p>
          </div>
        </div>

        <div class="col-xl-6 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box" style="border-radius: 20px;">
            <div class="icon"></div>
            <h4><a href="">Gejala dan tanda-tanda yang bisa menunjukkan anak mengalami stunting adalah:</a></h4>
            <p>1. Tinggi badan anak lebih pendek daripada tinggi badan anak seusianya</p>
            <p>2. Berat badan tidak meningkat secara konsisten</p>
            <p>3. Tahap perkembangan yang terlambat dibandingkan anak seusianya</p>
            <p>4. Tidak aktif bermain</p>
            <p>5. Sering lemas</p>
            <p>6. Mudah terserang penyakit, terutama infeksi</p>
            <div class="Gejala" style="padding-top: 15px;">
              <p>jika terdapat tanda - tanda diatas maka segera periksakan anak ke dokter.</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>






  <!-- ======= Cta Section ======= -->
  <section id="cta" class="cta">
    <div class="container" data-aos="zoom-in">

      <div class="row">
        <div class="col-lg-9 text-center text-lg-start">
          <h3>WELCOME CHILDREN AND MOM</h3>
        </div>
      </div>

    </div>
  </section><!-- End Cta Section -->









  <section id="gizi" class="services section-bg">
    <div class="container p-5" data-aos="fade-up" style="background: linear-gradient(#0052D4); border-radius:20px;">

      <div class="section-title">
        <div style="font-size: 100px;">
          <h>Gizi <b>Anak</b></h1>
        </div>
        <p>Merupakan Kebutuhan gizi yang sangat diperlukan untuk mendukung tumbuh kembang anak. Gizi yang baik sangat
          penting bagi anak, karena berperan dalam:
          Pertumbuhan fisik, Perkembangan kognitif, Perkembangan emosional, Perkembangan sosial.
        </p>
      </div>

      <div class="row">
        <div class="col-xl-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box" style="border-radius:20px;">
            <div class="icon"><img src="/assets/imgs/gizi/fruit (7).png" style="width: 50px;"></div>
            <h4><a href=""> Karbohidrat</a></h4>
            <p>Karbohidrat merupakan sumber energi yang sangat penting bagi tubuh. Anak-anak sangat membutuhkan
              karbohidrat untuk memaksimalkan fungsi otak.
              Moms bisa memberikan sumber karbohidrat seperti nasi, umbi-umbian, gandum, jagung, oatmeal, quinoa, dan
              bahan-bahan makanan lainnya.</p>
          </div>
        </div>

        <div class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box" style="border-radius:20px;">
            <div class="icon"><img src="/assets/imgs/gizi/fruit (8).png" style="width: 50px;"></div>
            <h4><a href=""> Protein</a></h4>
            <p>Protein sangat dibutuhkan tubuh untuk menghasilkan energi setiap harinya. Tidak hanya itu saja, asupan
              protein yang cukup juga mendukung regenerasi sel-sel tubuh dan memaksimalkan pertumbuhan otot.
              Sumber protein hewani seperti aneka jenis daging, hidangan laut, susu, dan unggas. Sedangkan protein
              nabati bisa diperoleh dari kacang-kacangan.</p>
          </div>
        </div>

        <div class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box" style="border-radius:20px;">
            <div class="icon"><img src="/assets/imgs/gizi/fruit (6).png" style="width: 50px"></div>
            <h4><a href=""> Lemak</a></h4>
            <p>Ternyata lemak juga sangat baik untuk memenuhi kebutuhan gizi pada anak lho, Moms. Dengan mengonsumsi
              lemak dalam jumlah yang seimbang mampu membantu melarutkan vitamin A, D, E, K dan melindungi fungsi
              organ-organ tubuh.
              Moms bisa memberikan asupan lemak yang didapat dari ikan, susu, alpukat, dan minyak zaitun.</p>
          </div>
        </div>

        <div class="col-xl-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100" style="padding-top: 15px;">
          <div class="icon-box" style="border-radius:20px;">
            <div class="icon"><img src="/assets/imgs/gizi/fruit (3).png" style="width: 50px;"></div>
            <h4><a href=""> Asam folat</a></h4>
            <p>Asam folat sangat dibutuhkan anak untuk memaksimalkan tumbuh kembang sang anak. Zat ini dibutuhkan anak
              mulai dari bayi hingga balita.
              Zat ini bisa didapatkan dari kacang-kacangan, sayuran berwarna hijau, dan buah-buahan.</p>
          </div>
        </div>

        <div class="col-xl-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100" style="padding-top: 15px;">
          <div class="icon-box" style="border-radius:20px;">
            <div class="icon"><img src="/assets/imgs/gizi/fruit (1).png" style="width: 50px;"></div>
            <h4><a href=""> Berbagai jenis vitamin</a></h4>
            <p>Moms harus ketahui bahwa anak-anak sangat membutuhkan berbagai vitamin mulai dari vitamin A, B, C, D, E,
              K.
              Berbagai vitamin ini bisa diperoleh dengan mengonsumsi buah-buahan, sayur-sayuran, dan kacang-kacangan
              dalam takaran yang seimbang.</p>
          </div>
        </div>

        <div class="col-xl-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100" style="padding-top: 15px;">
          <div class="icon-box" style="border-radius:20px;">
            <div class="icon"><img src="/assets/imgs/gizi/fruit (2).png" style="width: 50px;"></div>
            <h4><a href=""> Kalsium</a></h4>
            <p>Kalsium sangat penting bagi pertumbuhan anak-anak. Kombinasi vitamin D dan kalsium dapat mendukung
              pertumbuhan tinggi badan serta pertumbuhan tulang dan gigi anak secara seimbang.
              Moms bisa memperolehnya dari berbagai jenis makanan seperti sayur brokoli, susu, dan aneka ikan laut</p>
          </div>
        </div>

        <div class="col-xl-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100" style="padding-top: 15px;">
          <div class="icon-box" style="border-radius:20px;">
            <div class="icon"><img src="/assets/imgs/gizi/fruit (4).png" style="width: 50px;"></div>
            <h4><a href=""> Omega 3</a></h4>
            <p> Anak-anak memerlukan omega 3 untuk memaksimalkan fungsi otak dan daya ingat yang kuat. Omega 3 terdapat
              pada telur, minyak zaitun, dan alpukat.</p>
          </div>
        </div>

        <div class="col-xl-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100" style="padding-top: 15px;">
          <div class="icon-box" style="border-radius:20px;">
            <div class="icon"><img src="/assets/imgs/gizi/fruit (5).png" style="width: 50px;"></div>
            <h4><a href=""> Zat besi</a></h4>
            <p> Zat ini berfungsi agar anak tidak mudah lelah. Moms bisa memberikan asupan zat ini dari bayam, ikan,
              daging merah, dan kacang-kacangan.</p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Services Section -->





  <!-- ======= Team Section ======= -->
  <section id="ibu" class="team section-bg">
    <div class="container p-5" data-aos="fade-up" style="background: linear-gradient(to bottom right,#2980B9,#6DD5FA,#0052D4); border-radius:20px;">

      <div class="section-title text-white fs-3">
        <h1><b>Ibu Hamil</b></h1>
        <p>Masa kehamilan merupakan tahapan paling menantang bagi ibu yang sedang mengandung. perubahan fisik,
          emosional, dan prikolog yang dialami ibu dapat mempengaruhi proses menuju persalinan.
          Lantas apa saja tips perawatan ibu hamil?</p>
      </div>

      <div class="row">

        <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
          <div class="member d-flex align-items-start" style="border-radius:20px;">
            <div class="pic"><img src="/assets/imgs/ibu/image 14.png" alt="" style="width: 50px" ;></div>
            <div class="member-info">
              <h4> Pemeriksaan rutin dan tes laboratorium</h4>
              <span></span>
              <p> Ibu hamil perlu menjalani pemeriksaan rutin dengan dokter kandungan untuk memantau kesehatan ibu dan
                perkembangan janin. Pada pemeriksaan rutin,
                ibu hamil akan diperiksa mulai dari tekanan darah, berat badan, ukuran perut, detak jantung janin, serta
                kondisi fisik dan kesehatan ibu.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="member d-flex align-items-start" style="border-radius:20px;">
            <div class="pic"><img src="/assets/imgs/ibu/image 11.png" class="img-fluid" alt="" style="width: 70px" ;></div>
            <div class="member-info">
              <h4> Sumplemen dan nutrisi</h4>
              <span></span>
              <p>Mengonsumsi suplemen vitamin dan mineral tambahan, seperti asam folat, zat besi, kalsium, dan vitamin
                D.
                Rekomendasi tersebut harus dengan saran dokter spesialis kandungan.
              </p>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="300">
          <div class="member d-flex align-items-start" style="border-radius:20px;">
            <div class="pic"><img src="/assets/imgs/ibu/image 21.png" class="img-fluid" alt="" style="width: 70px" ;></div>
            <div class="member-info">
              <h4> Dukungan emosional dan prikologi</h4>
              <span></span>
              <p>Dukungan emosional dan prikologi berupa mendampingi selama kunjungan medis, membantu ibu hamil
                menjalankan tugas sehari - hari,
                memberi perhatian lebih pada ibu hamil, serta memberikan rasa aman dna nyaman pada ibu hamil.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="400">
          <div class="member d-flex align-items-start" style="border-radius:20px;">
            <div class="pic"><img src="/assets/imgs/ibu/image 12.png" class="img-fluid" alt="" style="width: 70px" ;></div>
            <div class="member-info">
              <h4> Konseling dan edukasi</h4>
              <span></span>
              <p>Konseling dan edukasi diberikan kepada ibu hamil untuk memberikan informasi yang dibutuhkan tentang
                kehamilan, persalinan, dan pasca melahirkan.
                Edukasi dan informasi yang memadai akan sangat membantu ibu hamil dalam melalui perjalanan kehamilannya
                serta untuk membuat keputusan yang tepat.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="300">
          <div class="member d-flex align-items-start" style="border-radius:20px;">
            <div class="pic"><img src="/assets/imgs/ibu/image 13.png" class="img-fluid" alt="" style="width: 70px" ;></div>
            <div class="member-info">
              <h4> Makanan yang bergizi</h4>
              <span></span>
              <p>Makanan yang bergizi meliputi makanan protein, makanan yang mengandung vitamin C, makanan yang
                mengandung kalsium,
                makanan yang mengandung zat besi, maknaan yang mengandung lemak sehat, makanan yang mengandung asam
                folat seperti kuning telur dan bayam.
              </p>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="400">
          <div class="member d-flex align-items-start" style="border-radius:20px;">
            <div class="pic"><img src="/assets/imgs/ibu/image 17.png" class="img-fluid" alt="" style="width: 70px" ;></div>
            <div class="member-info">
              <h4> Olahraga rutin untuk membantu jalanannya proses melahirkan</h4>
              <span></span>
              <p>Olahraga berfungsi untuk membantu melancarkan sirkulasi darah serta oksigen dalam tubuh, memperkuat
                otot,
                dan mengurangi stress pada ibu hamil. </p>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="300">
          <div class="member d-flex align-items-start" style="border-radius:20px;">
            <div class="pic"><img src="/assets/imgs/ibu/image 18.png" class="img-fluid" alt="" style="width: 70px" ;></div>
            <div class="member-info">
              <h4> Tidur cukup & hindari stress berlebih</h4>
              <span></span>
              <p>Hal ini dianjurkan agar proses persalinan lebih lancar dan membuat kesehatan ibu hamil terjaga dengan
                baik.
                karena jika ibu hamil megalamai stres maka akan berpengaruh terhadap janin yang dikandungnya. </p>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Team Section -->

  <!-- ======= konsultasi ======= -->
  <section id="konsultasi">

    <div class="container d-flex align-items-center">
      <div class="row p-5" style="background: linear-gradient(to right,#0052D4,#65C7F7, #9CECFB); border-radius:20px;">
        <div class="col-lg-6 d-flex flex-column justify-content-center  order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200" style="color: #fff;">
          <h1><b>Hallo sobat E-posyandu</b> <br>
            <p>Ada layanan konsultasi online nihh ...</p>
          </h1>
          <p>Layanan konsultasi online diberikan kepada pasien posyandu yang ingin bertanya tentang stunting, gizi anak,
            dan ibu hamil.</p>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <!-- <button type="button" class="btn btn-primary btn-lg"  data-bs-toggle="button">konsultasi yuk ...</button> -->
            <a href="#" class="btn-get-started scrollto" data-bs-toggle="modal" data-bs-target="#login">Konsultasi Yuk .....</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="/assets/imgs/image 16.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section>
  <!-- End Contact Section -->

  <!-- ======= About Us Section ======= -->
  <section id="about" class="about">
    <!-- <div class="container" data-aos="fade-up" style="background: linear-gradient(#E7E2EF, #B8B9D7, #E5E7F0, #CFD4EA);"> -->
    <div class="p-5">
      <div class="section-title">
        <h2>About Us</h2>
      </div>

      <div class="row content">
        <div class="col-lg-6">
          <h2>E-Posyandu</h2>
          <p>
            Selamat datang di Aplikasi E-Posyandu! Kami adalah tim yang berdedikasi untuk menciptakan solusi teknologi
            yang bermanfaat dalam meningkatkan kualitas layanan kesehatan ibu dan anak di Indonesia.
            Aplikasi E-Posyandu merupakan langkah nyata kami dalam mendukung dan memodernisasi program Posyandu (Pos
            Pelayanan Terpadu) yang telah berjalan di seluruh negeri.
            Aplikasi ini memberikan sejumlah fitur penting, termasuk:
          </p>
          <ul>
            <li><i class="ri-check-double-line"></i> Konsultasi Kesehatan Ibu dan Anak</li>
            <li><i class="ri-check-double-line"></i> Edukasi Kesehatan</li>
            <li><i class="ri-check-double-line"></i> Manajemen Data Posyand </li>
            <li><i class="ri-check-double-line"></i> Kemudahan Pelaporan</li>
          </ul>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0">
          <h3>Bergabung Dalam Perubahan Positif</h3>
          <p>
            Kami mengajak Anda untuk bergabung dalam upaya bersama kami untuk meningkatkan pelayanan kesehatan ibu dan
            anak di Indonesia.
            Aplikasi E-Posyandu adalah wujud kolaborasi antara berbagai pihak, dari ibu yang peduli terhadap kesehatan
            anaknya, hingga kader Posyandu dan petugas kesehatan yang berdedikasi.
            Bersama-sama, kita dapat menciptakan perubahan positif yang signifikan.
            Kami sangat menghargai dukungan dan kontribusi Anda. Jika Anda memiliki pertanyaan, saran, atau ingin
            terlibat lebih jauh, jangan ragu untuk menghubungi kami.
            Terima kasih atas perhatian dan dukungan Anda terhadap Aplikasi E-Posyandu! Bersama, kita dapat mencapai
            masa depan yang lebih sehat untuk generasi penerus.
          </p>
        </div>
      </div>

    </div>
  </section><!-- End About Us Section -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright develop by <strong><span>Team KA1</span></strong> 2023
      </div>
    </div>
  </footer><!-- End Footer -->

  <!-- Modal -->
  <div class="modal fade text-info" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="    --bs-modal-width: 350px !important;">
    <div class="modal-dialog">
      <div class="modal-content p-3" style="background-color: #edeef0 !important;">
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
        <div class="heading">Sign In</div>
        <form action="" method="post" class="form">
          <input required="" class="input" type="email" name="txt_email" id="email" placeholder="E-mail">
          <input required="" class="input" type="password" name="txt_pass" id="password" placeholder="Password">
          <span class="forgot-password"><a href="#" data-bs-toggle="modal" data-bs-target="#lupapaswword">Forgot Password ?</a></span>
          <input class="login-button" type="submit" name="submit" value="Sign In">
        </form>
        <div class="social-account-container1">
          <span class="title">Or Register with</span>
          <div class="social-accounts">
            <button class="social-button google" aria-label="Close" data-bs-toggle="modal" data-bs-target="#editverifikasi" onclick="generateOTP()">
              <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 488 512">
                <path d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"></path>
              </svg></button>
          </div>
        </div>
        <span class="agreement"><a href="#">develop by KA1</a></span>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editverifikasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="    --bs-modal-width: 350px !important;">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color: #edeef0 !important;">
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
        <form class="form otpform" method="post" onsubmit="kirimemail(); reset(); return false;">
          <p class="title-register">get OTP code </p>
          <p class="message">Enter your email to get a registration verification OTP code</p>
          <input name="otp" type="text" id="otpInput" hidden>


          <label>
            <input id="Email" class="input" type="email" name="emailu" placeholder="" required="">
            <span>Email</span>
          </label>


          <button class="submit" name="kirimotp" type="submit" onclick="kirimEmailAndOpenModal()">Send</button>
          <p class="signin">Already have an acount ? <a href="#" data-bs-toggle="modal" data-bs-target="#login">Signin</a> </p>
        </form>
      </div>
    </div>
  </div>



  <div class="modal fade" id="editregister" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="    --bs-modal-width: 350px !important;">
    <div class="modal-dialog">
      <div class="modal-content p-3" style="background-color: #edeef0 !important;">
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
        <form class="form" method="post">
          <p class="title-register">Register </p>
          <p class="message">Signup now and get full access to our app. </p>

          <div class="flex">
            <label>
              <input class="input" type="text" name="namau" placeholder="" required="">
              <span>Username</span>
            </label>

            <label>
              <input id="otp_inp" class="input" type="text" placeholder="" required="">

              <span>verification OTP code</span>
            </label>
          </div>

          <label>
            <input class="input" type="email" name="emailur" placeholder="" required="" >
            <span>Email</span>
          </label>


          <label>
            <input class="input" type="password" name="pwu" placeholder="" required="">
            <span>Password</span>
          </label>
          <label>
            <input class="input" type="password" placeholder="" required="">
            <span>Confirm password</span>
          </label>
          <button id="otp-btn" class="submit" type="button" name="simpanuser" data-bs-toggle="modal" data-bs-target="#login">Submit</button>
          <p class="signin">Already have an acount ? <a href="#" data-bs-toggle="modal" data-bs-target="#login">Signin</a> </p>
        </form>
      </div>
    </div>
  </div>


  <div class="modal fade" id="lupapaswword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="    --bs-modal-width: 350px !important;">
  <div class="modal-dialog">
    <div class="modal-content p-3" style="background-color: #edeef0 !important;">
    <div class="heading">change password</div>
        <form action="" method="post" class="form">
          <input required="" class="input" type="email" name="txt_email" placeholder="E-mail">
          <input required="" class="input" type="password" name=""  placeholder="Password">
          <input required="" class="input" type="password" name="txt_pass"  placeholder="Confirm password">
          
          <input class="login-button" type="submit" name="lppw" value="save password">
          <p class="signin">Already have an acount ? <a href="#" data-bs-toggle="modal" data-bs-target="#login">Signin</a> </p>
        </form>
        <div class="social-account-container1">
          <span class="title">Or Register with</span>
          <div class="social-accounts">
            <button class="social-button google" aria-label="Close" data-bs-toggle="modal" data-bs-target="#editverifikasi" onclick="generateOTP()">
              <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 488 512">
                <path d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"></path>
              </svg></button>
          </div>
        </div>
        <span class="agreement"><a href="#">develop by KA1</a></span>
    </div>
  </div>
</div>


  </div>


  <!-- Tambahkan skrip ini setelah menyertakan API Google Sign-In -->
  <script>
    function generateOTP() {
      // Generate a random 6-digit OTP
      const otp = Math.floor(100000 + Math.random() * 900000);

      // Tampilkan OTP di dalam input field
      document.getElementById("otpInput").value = otp;
    }
  </script>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/aos/aos.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <!-- <script src="/assets/vendor/php-email-form/validate.js"></script> -->

  <!-- Template Main JS File -->
  <script src="/assets/js/landingpage.js"></script>



  <!-- google api -->
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <script src="https://smtpjs.com/v3/smtp.js"></script>
  <script>
    function kirimemail() {
      
      var emailValue = document.getElementById('Email').value;
      let otp_val = Math.floor(Math.random() * 10000);

      let emailbody = `
    <h1>Please Subscribe to Ash_is_Coding</h1> <br>
    <h2>Your OTP is </h2>${otp_val}`;
      Email.send({
        SecureToken: "19481042-cfa7-4473-89ef-80c356c3cef3",
        To: emailValue,
        From: 'eposyanduka1@gmail.com',
        Subject: "Kode OTP Verifikasi",
        Body: emailbody
      }).then(
        message => {
          if (message === "OK") {
            // alert("Email berhasil dikirim");
            const otp_inp = document.getElementById('otp_inp');
            const otp_btn = document.getElementById('otp-btn');
            var myModal = new bootstrap.Modal(document.getElementById("login"));

            otp_btn.addEventListener('click', () => {
              // now check whether sent email is valid
              if (otp_inp.value == otp_val) {
                // alert("Email address verified...");
                fetch('save_data.php', {
                    method: 'POST',
                    headers: {
                      'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                      emailu: document.getElementsByName('emailur')[0].value,
                      pwu: document.getElementsByName('pwu')[0].value,
                      namau: document.getElementsByName('namau')[0].value,
                    }),
                  })
                  // .then(response => response.text())
                  // .then(data => {
                  //   if (data.status === 'success') {
                  //     alert("Data berhasil disimpan ke database");
                  //     // myModal.show();
                  //   } else {
                  //     alert("Gagal menyimpan data ke database. Pesan kesalahan: " + data.message);
                  //     myModal.show();
                  //   }
                  // })
                  .catch(error => {
                    console.error('Error:', error);
                  });
              } else {
                alert("Invalid OTP");
              }
            })
          } else {
            alert("Gagal mengirim email. Pesan kesalahan: " + message);
          }
        }
      );
    }



    function kirimEmailAndOpenModal() {
    var emailInput = document.getElementById('Email');
    var emailValue = emailInput.value;

    // Periksa apakah input email tidak kosong
    if (emailValue.trim() !== '') {
        // Kirim email atau lakukan tindakan lain
        // ...

        // Buka modal jika validasi berhasil
        var myModal = new bootstrap.Modal(document.getElementById("editregister"));
        myModal.show();
    } else {
        // Tampilkan pesan kesalahan atau lakukan tindakan lain jika input kosong
        alert("Email harus diisi");
    }
}
  </script>


</body>

</html>