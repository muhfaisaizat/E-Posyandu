<?php
// $host="mifa.myhost.id";
// $user="mifamyho_e-posyandu";
// $pass="WSImif2023";
// $database="mifamyho_e-posyandu";


$host="localhost";
$user="root";
$pass="";
$database="e-posyandu";

$koneksi=mysqli_connect($host,$user,$pass,$database);


function query($query)
{
  global $koneksi;
  $result = mysqli_query($koneksi, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

if(!$koneksi){
die("koneksi gagal : ".mysqli_connect_error());
}




session_start();




// Lakukan sesuatu dengan waktu sekarang, seperti menyimpannya dalam sesi

$_SESSION['waktu_sekarang'] = '2023-11-16 07:24:27';


















// ================================    query tampil tabel =============================
$dataanak=query(
  "SELECT
  data_anak.NIK,
  data_anak.nama_anak,
  data_anak.tgl_lahir,
  data_anak.tempat_lahir,
  data_anak.usia,
  data_anak.jenis_kelamin,
  data_anak.BBL,
  data_ibu.NIK AS NIKibu,
  data_ibu.nama_ibu,
  data_ibu.suami,
  data_posposyandu.nama_posyandu,
  data_posposyandu.kd_pos
FROM
  data_anak
JOIN data_ibu ON data_anak.id_ibu = data_ibu.NIK
JOIN data_posposyandu ON data_anak.kd_pos = data_posposyandu.kd_pos;"
);


$dataibu = query(
  "SELECT
    data_ibu.NIK,
    data_ibu.nama_ibu,
    data_ibu.suami,
    data_ibu.rt_rw,
    data_ibu.no_telp,
    data_posposyandu.nama_posyandu,
    data_posposyandu.kd_pos
  FROM
    data_ibu
  JOIN data_posposyandu ON data_ibu.kd_pos = data_posposyandu.kd_pos;"
);



$datapos=query(
  "SELECT * FROM `data_posposyandu`"
);

$databidan=query("SELECT * FROM `data_bidan`");


$datakader=query(
"SELECT 
data_kader.id_kader,
data_kader.nama_kader,
data_kader.jabatan,
data_kader.no_telp,
data_posposyandu.nama_posyandu,
data_kader.email,
data_kader.password,
data_posposyandu.kd_pos
FROM `data_kader` 
JOIN data_posposyandu ON data_kader.bertugas_dipos=data_posposyandu.kd_pos;
");

$datauser=query("SELECT * FROM `data_user`");


$datavaksin=query("SELECT * FROM `data_vaksin`");



$dataibumelahirkan=query(
  "SELECT 
  data_ibumelahirkan.idlahir,
  data_ibu.NIK,
  data_ibu.nama_ibu,
  data_ibu.suami,
  data_ibumelahirkan.nama_bayi,
  data_ibumelahirkan.tgl_lahir,
  data_ibumelahirkan.tgl_meninggalbayi,
  data_ibumelahirkan.tgl_meninggalibu,
  data_ibumelahirkan.keterangan,
  data_posposyandu.nama_posyandu,
  data_posposyandu.kd_pos
  FROM `data_ibumelahirkan`
  JOIN data_posposyandu ON data_ibumelahirkan.kd_pos=data_posposyandu.kd_pos
  JOIN data_ibu ON data_ibumelahirkan.nik_ibu=data_ibu.NIK;"
  );





$datatimbang0_12=query(
  "SELECT
  data_penimbangan.idtimbang,
  data_anak.NIK,
  data_anak.nama_anak,
  data_anak.tgl_lahir,
  data_anak.BBL,
  data_ibu.nama_ibu,
  data_ibu.suami,
  data_penimbangan.tgl_timbamg,
  data_penimbangan.hasil_timbang,
  data_posposyandu.nama_posyandu
FROM data_penimbangan
JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 0
AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 12;"
);  

$datatimbang13_36=query(
  "SELECT
  data_penimbangan.idtimbang,
  data_anak.NIK,
  data_anak.nama_anak,
  data_anak.tgl_lahir,
  data_anak.BBL,
  data_ibu.nama_ibu,
  data_ibu.suami,
  data_penimbangan.tgl_timbamg,
  data_penimbangan.hasil_timbang,
  data_posposyandu.nama_posyandu
FROM data_penimbangan
JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 13
AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 36;"
);  

$datatimbang37_60=query(
  "SELECT
  data_penimbangan.idtimbang,
  data_anak.NIK,
  data_anak.nama_anak,
  data_anak.tgl_lahir,
  data_anak.BBL,
  data_ibu.nama_ibu,
  data_ibu.suami,
  data_penimbangan.tgl_timbamg,
  data_penimbangan.hasil_timbang,
  data_posposyandu.nama_posyandu
FROM data_penimbangan
JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 37
AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 60;"
);  

$dataimu0_12=query(
  "SELECT
  data_imunisasi.idimunisasi,
  data_anak.NIK,
  data_anak.nama_anak,
  data_anak.tgl_lahir,
  data_anak.BBL,
  data_ibu.nama_ibu,
  data_ibu.suami,
  data_imunisasi.tgl_imunisasi,
  data_imunisasi.imuni_dbr,
  data_vaksin.nama_vaksin,
  data_imunisasi.plyan_dbr,
  data_posposyandu.nama_posyandu
FROM data_imunisasi
JOIN data_anak ON data_imunisasi.nik_anak=data_anak.NIK
JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
JOIN data_vaksin ON data_imunisasi.imuni_dbr=data_vaksin.kd_vaksin
WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 0
AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 12;");

$dataimu13_36=query(
  "SELECT
  data_imunisasi.idimunisasi,
  data_anak.NIK,
  data_anak.nama_anak,
  data_anak.tgl_lahir,
  data_anak.BBL,
  data_ibu.nama_ibu,
  data_ibu.suami,
  data_imunisasi.tgl_imunisasi,
  data_imunisasi.imuni_dbr,
  data_vaksin.nama_vaksin,
  data_imunisasi.plyan_dbr,
  data_posposyandu.nama_posyandu
FROM data_imunisasi
JOIN data_anak ON data_imunisasi.nik_anak=data_anak.NIK
JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
JOIN data_vaksin ON data_imunisasi.imuni_dbr=data_vaksin.kd_vaksin
WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 13
AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 36;");

$dataimu37_60=query(
  "SELECT
  data_imunisasi.idimunisasi,
  data_anak.NIK,
  data_anak.nama_anak,
  data_anak.tgl_lahir,
  data_anak.BBL,
  data_ibu.nama_ibu,
  data_ibu.suami,
  data_imunisasi.tgl_imunisasi,
  data_imunisasi.imuni_dbr,
  data_vaksin.nama_vaksin,
  data_imunisasi.plyan_dbr,
  data_posposyandu.nama_posyandu
FROM data_imunisasi
JOIN data_anak ON data_imunisasi.nik_anak=data_anak.NIK
JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
JOIN data_vaksin ON data_imunisasi.imuni_dbr=data_vaksin.kd_vaksin
WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 37
AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 60;");



$jumlahanak=query("SELECT COUNT(*) as jumlah_anak FROM data_anak;");


$jumlahibumelahirkan=query("SELECT COUNT(*) as jumlah_ibumelahirkan FROM data_ibumelahirkan;");


$jumlahimunisasi=query("SELECT COUNT(*) as jumlah_imunisasi FROM data_imunisasi;");


$jumlahuser=query("SELECT COUNT(*) as jumlah_user FROM data_user;");

$berat2_6=query("SELECT COUNT(*) AS jumlah_data FROM data_penimbangan
WHERE 
    REPLACE(hasil_timbang, ',', '.') BETWEEN 2.5 AND 6.5;
");
$berat7_9=query("SELECT COUNT(*) AS jumlah_data FROM data_penimbangan
WHERE 
    REPLACE(hasil_timbang, ',', '.') BETWEEN 7 AND 9;
");
$berat10_13=query("SELECT COUNT(*) AS jumlah_data FROM data_penimbangan
WHERE 
    REPLACE(hasil_timbang, ',', '.') BETWEEN 10 AND 13;
");
$berat14_17=query("SELECT COUNT(*) AS jumlah_data FROM data_penimbangan
WHERE 
    REPLACE(hasil_timbang, ',', '.') BETWEEN 14 AND 17;
");
$berat18_20=query("SELECT COUNT(*) AS jumlah_data FROM data_penimbangan
WHERE 
    REPLACE(hasil_timbang, ',', '.') BETWEEN 18 AND 20;
");
$berat21_23=query("SELECT COUNT(*) AS jumlah_data FROM data_penimbangan
WHERE 
    REPLACE(hasil_timbang, ',', '.') BETWEEN 21 AND 23;
");


$lihatkeaktifan=query("SELECT
admin.email AS email,
admin.nama AS nama,
COALESCE(admin.foto, 'userpp.png') AS foto,
admin.status_aktif AS status_active,
'Admin' AS posisi
FROM
admin
WHERE
admin.status_aktif = 'Online'

UNION ALL

SELECT
data_bidan.Email AS email,
data_bidan.Nama AS nama,
COALESCE(data_bidan.foto, 'userpp.png') AS foto,
data_bidan.status_aktif AS status_active,
'Bidan' AS posisi
FROM
data_bidan
WHERE
data_bidan.status_aktif = 'Online'

UNION ALL

SELECT
data_kader.email AS email,
data_kader.nama_kader AS nama,
COALESCE(data_kader.foto, 'userpp.png') AS foto,
data_kader.status_aktif AS status_active,
'Kader' AS posisi
FROM
data_kader
WHERE
data_kader.status_aktif = 'Online'

UNION ALL

SELECT
data_user.email AS email,
data_user.nama AS nama,
COALESCE(data_user.foto, 'userpp.png') AS foto,
data_user.status_aktif AS status_active,
'User' AS posisi
FROM
data_user
WHERE
data_user.status_aktif = 'Online';

");




// =========================================== chat ==================================================



$pilihbidan = query("SELECT *, COALESCE(NULLIF(foto, ''), 'userpp.png') AS foto_default FROM `data_bidan`");

if (isset($_SESSION["role"])) {
  $role = $_SESSION["role"];
  if ($role === "Bidan") {
      // Construct your SQL query
      $sql = "SELECT
      chat.id_chat,
      chat.idpesanmasuk,
      chat.idpesankirim,
      CONCAT(LEFT(chat.pesan, 50), IF(LENGTH(chat.pesan) > 50, '......', '')) AS pesan,
      DATE_FORMAT(chat.waktu, '%h:%i %p') AS waktu_format,
      data_user.nama,
      COALESCE(NULLIF(foto, ''), 'userpp.png') AS foto,
      data_user.status_aktif
  FROM
      `chat`
  JOIN
      data_user ON chat.idpesankirim = data_user.email
  WHERE
      chat.idpesanmasuk = '" . $_SESSION['nip'] . "'
      AND (chat.idpesankirim, chat.waktu) IN (
          SELECT
              idpesankirim,
              MAX(waktu) AS waktu_terbaru
          FROM
              chat
          WHERE
              idpesanmasuk = '" . $_SESSION['nip'] . "'
          GROUP BY
              idpesankirim
      )
  ORDER BY
      chat.waktu DESC;
  
  ";

  

      
      $chatbidan = query($sql);
      $_SESSION['online'] = $chatbidan[0]['status_aktif'];
    
$jumlahpesan="SELECT
COUNT(DISTINCT idpesankirim) AS jumlah_data_baru
FROM
`chat`
WHERE
idpesanmasuk = '" . $_SESSION['nip'] . "';";
$notifp=query($jumlahpesan);
     







  }elseif ($role === "User") {
      // Construct your SQL query
      $sql = "SELECT
      chat.id_chat,
      chat.idpesanmasuk,
      chat.idpesankirim,
      CONCAT(LEFT(chat.pesan, 50), IF(LENGTH(chat.pesan) > 50, '......', '')) AS pesan,
      DATE_FORMAT(chat.waktu, '%h:%i %p') AS waktu_format,
      data_bidan.Nama,
      data_bidan.NIP,
      data_bidan.foto,
      data_bidan.status_aktif
  FROM
      `chat`
  JOIN
      data_bidan ON chat.idpesankirim = data_bidan.NIP
  WHERE
      chat.idpesanmasuk = '" . $_SESSION['id_adminu'] . "'
      AND (chat.idpesankirim, chat.waktu) IN (
          SELECT
              idpesankirim,
              MAX(waktu) AS waktu_terbaru
          FROM
              chat
          WHERE
              idpesanmasuk = '" . $_SESSION['id_adminu'] . "'
          GROUP BY
              idpesankirim
      )
  ORDER BY
      chat.waktu DESC;
  
  ";

      
      $chatuser = query($sql);
     
  }
}





















function cariadmin($id){
  $sqladmin=query("SELECT * FROM `admin` WHERE admin.email='$id';");
}










//================================================  insert =============================================

function insertposyan($data)
{
  global $koneksi;

  // Ambil nilai dari formulir
  $kdpos = $_POST["kdpos"];
  $nama = $_POST["nama"];
  $rtrw = $_POST["rtrw"];
  $lokasi = $_POST["lokasi"];

  $result = mysqli_query($koneksi, "SELECT kd_pos FROM data_posposyandu WHERE kd_pos = '$kdpos'");


  if (mysqli_fetch_assoc($result)) {
    // echo "<script>
    //         alert('Data sudah ada!');
    //     </script>";
    return false;
  }
  mysqli_query($koneksi, "INSERT INTO data_posposyandu (kd_pos, nama_posyandu, RT_RW, lokasi) VALUES ('$kdpos', '$nama', '$rtrw', '$lokasi')");
  return mysqli_affected_rows($koneksi);
}




function insertvaksin($data)
{
  global $koneksi;

  $kdv = $_POST["kdvaksin"];
  $nama = $_POST["nama"];
  $stok = $_POST["stok"];

 

  $query = "INSERT INTO `data_vaksin` (`kd_vaksin`, `nama_vaksin`, `stok`) VALUES ('$kdv', '$nama', '$stok');";

  mysqli_query($koneksi, $query);
  return mysqli_affected_rows($koneksi);
}


function insertibu($data)
{
  global $koneksi;

  $nik = $_POST["nik"];
  $namaibu = $_POST["namaibu"];
  $namaayah = $_POST["namaayah"];
  $tlpn = $_POST["notlpn"];
  $rtrw = $_POST["rtrw"];
  $kdpos = $_POST["kdpos"];

 

  $query = "INSERT INTO `data_ibu` (`NIK`, `nama_ibu`, `suami`, `rt_rw`, `no_telp`, `kd_pos`) VALUES ('$nik', '$namaibu', '$namaayah', '$rtrw', '$tlpn', '$kdpos');";

  mysqli_query($koneksi, $query);
  return mysqli_affected_rows($koneksi);
}

function insertanak($data)
{
  global $koneksi;

  $nik = $_POST["nik"];
  $nama = $_POST["nama"];
  $tgl = $_POST["tanggal_lahir"];
  $tmpt = $_POST["tempat_lahir"];
  $usia = $_POST["usia"];
  $jenis = $_POST["jenis_kelamin"];
  $bbl = $_POST["bbl"];
  $nikibu = $_POST["nikibu"];
  $kdpos = $_POST["pos"];

 

  $query = "INSERT INTO `data_anak` (`NIK`, `nama_anak`, `tgl_lahir`, `tempat_lahir`, `usia`, `jenis_kelamin`, `BBL`, `id_ibu`, `kd_pos`) VALUES ('$nik', '$nama', '$tgl', '$tmpt', '$usia', '$jenis', '$bbl', '$nikibu', '$kdpos');";

  mysqli_query($koneksi, $query);


  return mysqli_affected_rows($koneksi);
}




function insertibulahir($data)
{
  global $koneksi;

  $nik = $_POST["nikibu"];
  $nama = $_POST["nambayi"];
  $tgllahir = $_POST["tgllahir"];
  $tglmtanak = $_POST["matianak"];
  $tglmtibu = $_POST["matiibu"];
  $ket = $_POST["kete"];
  $kdpos = $_POST["pos"];

  // Inisialisasi variabel
  $tglmtanak_sql = "NULL";
  $tglmtibu_sql = "NULL";
  $ket_sql = "NULL";

  // Periksa dan atur nilai variabel sesuai input
  if (!empty($tglmtanak)) {
    $tglmtanak_sql = "'$tglmtanak'";
  }

  if (!empty($tglmtibu)) {
    $tglmtibu_sql = "'$tglmtibu'";
  }

  if (!empty($ket)) {
    $ket_sql = "'$ket'";
  }

  $query = "INSERT INTO `data_ibumelahirkan` (`idlahir`,`nik_ibu`, `nama_bayi`, `tgl_lahir`, `tgl_meninggalbayi`, `tgl_meninggalibu`, `keterangan`, `kd_pos`) VALUES (NULL,'$nik', '$nama', '$tgllahir', $tglmtanak_sql, $tglmtibu_sql, $ket_sql, '$kdpos')";

  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}







function insertbidan($data)
{
  global $koneksi;

  $nip = $_POST["nip"];
  $nama = $_POST["nama"];
  $alamat = $_POST["alamat"];
  $tlpn = $_POST["tlpn"];
  $email = $_POST["email"];
  $pw = $_POST["password"];
  $foto = $_FILES["foto"];  // Menggunakan $_FILES untuk mengakses file yang diunggah

  // Inisialisasi variabel
  $foto_sql = "NULL";

  // Periksa apakah ada file yang diunggah
  if (!empty($foto["tmp_name"])) {
    // Baca isi file gambar
    $foto_data = file_get_contents($foto["tmp_name"]);

    // Lakukan escape untuk data gambar (gunakan prepared statement untuk keamanan yang lebih baik)
    $foto_sql = mysqli_real_escape_string($koneksi, $foto_data);
  }

  // Buat query untuk menyimpan data bidan, termasuk foto dalam format long blob
  $query = "INSERT INTO `data_bidan` (`NIP`, `Nama`, `Alamat`, `No_telp`, `Email`, `Password`, `foto`, `status_aktif`) VALUES ('$nip', '$nama', '$alamat', '$tlpn', '$email', '$pw', NULL,'offline')";

  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}


function insertkader($data)
{
  global $koneksi;

  $id = $_POST["idkder"];
  $nama = $_POST["nama"];
  $jb = $_POST["jb"];
  $tlpn = $_POST["tlpn"];
  $emil = $_POST["emil"];
  $pw = $_POST["pw"];
  $pos = $_POST["pos"];
  
 



  // Buat query untuk menyimpan data bidan, termasuk foto dalam format long blob
  $query = "INSERT INTO `data_kader` (`id_kader`, `nama_kader`, `jabatan`, `no_telp`, `bertugas_dipos`, `email`, `password`, `foto`) VALUES ('$id', '$nama', '$jb', '$tlpn', '$pos', '$emil', '$pw', NULL)";

  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}



function insertuser($data) {
  global $koneksi;

  $nama = $_POST["namau"];
  $email = $_POST["emailu"];
  $pw = $_POST["pwu"];

  // Buat query untuk menyimpan data user
  $query = "INSERT INTO `data_user` (`email`, `password`, `nama`, `foto`, `status_aktif`) VALUES ('$email', '$pw', '$nama', NULL,'offline');";

  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}




function inserttimbang($data) {
  global $koneksi;

  $nik = $_POST["nik"];
  $tgl = $_POST["tanggal_timbang"];
  $hasil = $_POST["hasiltimb"];

  // Buat query untuk menyimpan data user
  $query = "INSERT INTO `data_penimbangan` (`idtimbang`, `nik_anak`, `tgl_timbamg`, `hasil_timbang`) VALUES (NULL, '$nik', '$tgl', '$hasil');";

  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}


function insertimu($data) {
  global $koneksi;

  $nik = $_POST["nik"];
  $tgl = $_POST["tanggal_imu"];
  $vsn = $_POST["vaksin"];
  $plyn = $_POST["pelayanan"];
 
  if(!empty($plyn)){
    $query = "INSERT INTO `data_imunisasi` (`idimunisasi`, `nik_anak`, `tgl_imunisasi`, `imuni_dbr`, `plyan_dbr`) VALUES (NULL, '$nik', '$tgl', '$vsn', '$plyn');";
  }else{
    $query = "INSERT INTO `data_imunisasi` (`idimunisasi`, `nik_anak`, `tgl_imunisasi`, `imuni_dbr`, `plyan_dbr`) VALUES (NULL, '$nik', '$tgl', '$vsn', NULL);";
  }
  
  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}


function inserpesan($data) {
  global $koneksi;

  $nip = $_POST["nip"];
  $iduser = $_POST["iduser"];
  $ps = $_POST["pesan"];
 
 
    $query = "INSERT INTO `chat` (`id_chat`, `idpesanmasuk`, `idpesankirim`, `pesan`, `waktu`) VALUES (NULL, '$iduser', '$nip', '$ps', NOW());";
  
  
  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}


























// ======================================   edit Data    ===============================================================

function editpos($data)
{
  global $koneksi;

  $kdpos = $_POST["kdpos"];
  $nama = $_POST["nama"];
  $rtrw = $_POST["rtrw"];
  $lokasi = $_POST["lokasi"];

  $query = "UPDATE `data_posposyandu` SET
   `nama_posyandu` = '$nama', 
   `RT_RW` = '$rtrw', 
   `lokasi` = '$lokasi' 
   WHERE `data_posposyandu`.`kd_pos` = '$kdpos';";

  mysqli_query($koneksi, $query);
  return mysqli_affected_rows($koneksi);
}


function editvak($data)
{
  global $koneksi;

  $kd = $_POST["kdvaksin"];
  $nama = $_POST["nama"];
  $stok = $_POST["stok"];


  $query = "UPDATE `data_vaksin` SET `nama_vaksin` = '$nama', `stok` = '$stok' WHERE `data_vaksin`.`kd_vaksin` = '$kd';";

  mysqli_query($koneksi, $query);
  return mysqli_affected_rows($koneksi);
}


function editibu($data)
{
  global $koneksi;

    $nik = $_POST["nik"];
    $namaibu = $_POST["namaibu"];
    $namaayah = $_POST["namaayah"];
    $tlpn = $_POST["notlpn"];
    $rtrw = $_POST["rtrw"];
    $namapos = $_POST["nama_pos"];
  
  

  $query = "UPDATE `data_ibu` SET `nama_ibu` = '$namaibu', `suami` = '$namaayah', `rt_rw` = '$rtrw', `no_telp` = '$tlpn', `kd_pos` = '$namapos' WHERE `data_ibu`.`NIK` = '$nik';";

  mysqli_query($koneksi, $query);
  return mysqli_affected_rows($koneksi);
}

function editanak($data)
{
  global $koneksi;

  $nik = $_POST["nik"];
  $nama = $_POST["nama"];
  $tgl = $_POST["tanggal_lahir"];
  $tmpt = $_POST["tempat_lahir"];
  $usia = $_POST["usia"];
  $jenis = $_POST["jenis_kelamin"];
  $bbl = $_POST["bbl"];
  $nikibu = $_POST["nikibu"];
  $kdpos = $_POST["pos"];
  
  

  $query = "UPDATE `data_anak` SET `nama_anak` = '$nama', `tgl_lahir` = '$tgl', `tempat_lahir` = '$tmpt', `usia` = '$usia', `jenis_kelamin` = '$jenis', `BBL` = '$bbl', `id_ibu` = '$nikibu', `kd_pos` = '$kdpos' WHERE `data_anak`.`NIK` = '$nik';";

  mysqli_query($koneksi, $query);
  return mysqli_affected_rows($koneksi);
}




function editlahir($data)
{
  global $koneksi;

  $id = $_POST["idlahir"];
  $nik = $_POST["nikibu"];
  $nama = $_POST["nambayi"];
  $tgllahir = $_POST["tgllahir"];
  $tglmtanak = $_POST["matianak"];
  $tglmtibu = $_POST["matiibu"];
  $ket = $_POST["kete"];
  $kdpos = $_POST["pos"];

  // Format tanggal ke 'YYYY-MM-DD'
  $tgllahir = date('Y-m-d', strtotime($tgllahir));
  $tglmtanak = empty($tglmtanak) ? "NULL" : "'" . date('Y-m-d', strtotime($tglmtanak)) . "'";
  $tglmtibu = empty($tglmtibu) ? "NULL" : "'" . date('Y-m-d', strtotime($tglmtibu)) . "'";
  $ket = empty($ket) ? "NULL" : "'" . $ket . "'";

  $query = "UPDATE `data_ibumelahirkan` SET `nik_ibu` = '$nik', `nama_bayi` = '$nama', `tgl_lahir` = '$tgllahir', `tgl_meninggalbayi` = $tglmtanak, `tgl_meninggalibu` = $tglmtibu, `keterangan` = $ket, `kd_pos` = '$kdpos' WHERE `idlahir` = $id";

  mysqli_query($koneksi, $query);
  return mysqli_affected_rows($koneksi);
}



function edittimbang($data)
{
  global $koneksi;

  $id = $_POST["idt"];
  $nik = $_POST["nik"];
  $tgl = $_POST["tanggal_timbang"];
  $hasil = $_POST["hasiltimb"];

  $query = "UPDATE `data_penimbangan` SET `nik_anak` = '$nik', `tgl_timbamg` = '$tgl', `hasil_timbang` = '$hasil' WHERE `data_penimbangan`.`idtimbang` = $id;";

  mysqli_query($koneksi, $query);
  return mysqli_affected_rows($koneksi);
}



function editimu($data)
{
  global $koneksi;

  $id = $_POST["idv"];
  $nik = $_POST["nik"];
  $tgl = $_POST["tanggal_imu"];
  $vsn = $_POST["vaksin"];
  $plyn = $_POST["pelayanan"];
 
  if(!empty($plyn)){
    $query = "UPDATE `data_imunisasi` SET `nik_anak` = '$nik', `tgl_imunisasi` = '$tgl', `imuni_dbr` = '$vsn', `plyan_dbr` = '$plyn' WHERE `data_imunisasi`.`idimunisasi` = $id;";
  }else{
    $query = "UPDATE `data_imunisasi` SET `nik_anak` = '$nik', `tgl_imunisasi` = '$tgl', `imuni_dbr` = '$vsn', `plyan_dbr` = NULL WHERE `data_imunisasi`.`idimunisasi` = $id;";
  }

  mysqli_query($koneksi, $query);
  return mysqli_affected_rows($koneksi);
}



function editbidan($data)
{
  global $koneksi;

  $nip = $_POST["nip"];
  $nama = $_POST["nama"];
  $alamat = $_POST["alamat"];
  $tlpn = $_POST["tlpn"];
  $email = $_POST["email"];
  $pw = $_POST["password"];
  
 

  // Buat query SQL untuk menyimpan data bidan, termasuk foto jika ada
  $query = "UPDATE `data_bidan` SET `Nama` = '$nama', `Alamat` = '$alamat', `No_telp` = '$tlpn', `Email` = '$email', `Password` = '$pw' WHERE `data_bidan`.`NIP` = '$nip';";

  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}


function editkader($data)
{
  global $koneksi;

  $id = $_POST["idkder"];
  $nama = $_POST["nama"];
  $jb = $_POST["jb"];
  $tlpn = $_POST["tlpn"];
  $emil = $_POST["emil"];
  $pw = $_POST["pw"];
  $pos = $_POST["pos"];
  
 

  // Buat query SQL untuk menyimpan data bidan, termasuk foto jika ada
  $query = "UPDATE `data_kader` SET `nama_kader` = '$nama', `jabatan` = '$jb', `no_telp` = '$tlpn', `bertugas_dipos` = '$pos', `email` = '$emil', `password` = '$pw' WHERE `data_kader`.`id_kader` = '$id';";

  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}

function edituser($data)
{
  global $koneksi;

  $nama = $_POST["namau"];
  $email = $_POST["emailu"];
  $pw = $_POST["pwu"];
  
 

  // Buat query SQL untuk menyimpan data bidan, termasuk foto jika ada
  $query = "UPDATE `data_user` SET `password` = '$pw', `nama` = '$nama' WHERE `data_user`.`email` = '$email';";

  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}

// =========================================================foto================================================
function editfotoadmin($namaFileBaru, $id_admin)
{
    global $koneksi;
   
    // Menyusun query untuk mengupdate nama file foto
    $query = "UPDATE `admin` SET `foto` = '$namaFileBaru' WHERE `admin`.`email` = '$id_admin';";

    // Menjalankan query
    mysqli_query($koneksi, $query);

    // Mengembalikan jumlah baris yang terpengaruh
    return mysqli_affected_rows($koneksi);
}

function editfotobidan($namaFileBaru, $nip)
{
    global $koneksi;
   
    // Menyusun query untuk mengupdate nama file foto
    $query = "UPDATE `data_bidan` SET `foto` = '$namaFileBaru' WHERE `data_bidan`.`NIP` = '$nip';";

    // Menjalankan query
    mysqli_query($koneksi, $query);

    // Mengembalikan jumlah baris yang terpengaruh
    return mysqli_affected_rows($koneksi);
}

function editfotokader($namaFileBaru, $idk)
{
    global $koneksi;
   
    // Menyusun query untuk mengupdate nama file foto
    $query = "UPDATE `data_kader` SET `foto` = '$namaFileBaru' WHERE `data_kader`.`id_kader` = '$idk';";

    // Menjalankan query
    mysqli_query($koneksi, $query);

    // Mengembalikan jumlah baris yang terpengaruh
    return mysqli_affected_rows($koneksi);
}
function editfotouser($namaFileBaru, $idk)
{
    global $koneksi;
   
    // Menyusun query untuk mengupdate nama file foto
    $query = "UPDATE `data_user` SET `foto` = '$namaFileBaru' WHERE `data_user`.`email` = '$idk';";

    // Menjalankan query
    mysqli_query($koneksi, $query);

    // Mengembalikan jumlah baris yang terpengaruh
    return mysqli_affected_rows($koneksi);
}


function editadmin($data)
{
  global $koneksi;

  $nam = $_POST["username"];
  $emaildb = $_POST["Emaildb"];
  $emailbaru = $_POST["Emailbaru"];
  $pw = $_POST["password"];
  
  $_SESSION['nama_admin'] = $nam;
  $_SESSION['id_admin'] = $emailbaru != '' ? $emailbaru : $emaildb;

  if($emaildb == $emailbaru){
    $query = "UPDATE `admin` SET `password` = '$pw', `nama` = '$nam' WHERE `admin`.`email` = '$emaildb';";
  }else{
    $query = "INSERT INTO `admin` (`email`, `password`, `nama`, `foto`) VALUES ('$emailbaru', '$pw', '$nam', NULL);";
  }

  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}

function editbidanakun($data)
{
  global $koneksi;

  $nam = $_POST["username"];
  $emaildb = $_POST["Emaildb"];
  $emailbaru = $_POST["Emailbaru"];
  $pw = $_POST["password"];
  $nip = $_POST["nip"];
  
  $_SESSION['nama_adminb'] = $nam;
  $_SESSION['id_adminb'] = $emailbaru != '' ? $emailbaru : $emaildb;

  $query = "UPDATE `data_bidan` SET `Nama` = '$nam', `Email` = '$emailbaru', `Password` = '$pw' WHERE `data_bidan`.`NIP` = '$nip';";


  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}

function editkaderakun($data)
{
  global $koneksi;

  $nam = $_POST["username"];
  $emaildb = $_POST["Emaildb"];
  $emailbaru = $_POST["Emailbaru"];
  $pw = $_POST["password"];
  $id = $_POST["id"];
  
  $_SESSION['nama_admink'] = $nam;
  $_SESSION['id_admink'] = $emailbaru != '' ? $emailbaru : $emaildb;

  $query = "UPDATE `data_kader` SET `nama_kader` = '$nam', `email` = '$emailbaru', `password` = '$pw' WHERE `data_kader`.`id_kader` = '$id';";


  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}







if (isset($_SESSION["role"])) {
  $role = $_SESSION["role"];
  if ($role === "User") {
function edituserakun($data)
{
  global $koneksi;

  $id = $_SESSION['id_adminu'];
  $nama = $_POST["nama"];
  $pw = $_POST["password"];
  
  if(!empty($pw) && !empty($nama)){
  $query = "UPDATE `data_user` SET `password` = '$pw', `nama` = '$nama' WHERE `data_user`.`email` = '$id';";
  }elseif(!empty($pw)){
    $query = "UPDATE `data_user` SET `password` = '$pw' WHERE `data_user`.`email` = '$id';";
  }else{
    $query = "UPDATE `data_user` SET `nama` = '$nama' WHERE `data_user`.`email` = '$id';";
  }

  mysqli_query($koneksi, $query);
  return mysqli_affected_rows($koneksi);
}
  }
}



function editstatususer($id)
{
  global $koneksi;
  mysqli_query($koneksi, "UPDATE `data_user` SET `status_aktif` = 'offline' WHERE `data_user`.`email` = '$id';");

  return mysqli_affected_rows($koneksi);
}

function editstatususermasuk($id)
{
  global $koneksi;
  mysqli_query($koneksi, "UPDATE `data_user` SET `status_aktif` = 'online' WHERE `data_user`.`email` = '$id';");

  return mysqli_affected_rows($koneksi);
}

function editstatusbidan($id)
{
  global $koneksi;
  mysqli_query($koneksi, "UPDATE `data_bidan` SET `status_aktif` = 'offline' WHERE `data_bidan`.`Email` = '$id';");

  return mysqli_affected_rows($koneksi);
}

function editstatusbidanmasuk($id)
{
  global $koneksi;
  mysqli_query($koneksi, "UPDATE `data_bidan` SET `status_aktif` = 'online' WHERE `data_bidan`.`Email` = '$id';");

  return mysqli_affected_rows($koneksi);
}

function editstatuskadermasuk1($id)
{
  global $koneksi;
  mysqli_query($koneksi, "UPDATE `data_kader` SET `status_aktif` = 'online' WHERE `data_kader`.`id_kader` = '$id';");

  return mysqli_affected_rows($koneksi);
}

function editstatuskader($id)
{
  global $koneksi;
  mysqli_query($koneksi, "UPDATE `data_kader` SET `status_aktif` = 'offline' WHERE `data_kader`.`id_kader` = '$id';");

  return mysqli_affected_rows($koneksi);
}


function editlupapwuser($data){
  global $koneksi;
  $email = $_POST["txt_email"];
  $pw = $_POST["txt_pass"];
  
 

  // Buat query SQL untuk menyimpan data bidan, termasuk foto jika ada
  $query = "UPDATE `data_user` SET `password` = '$pw' WHERE `data_user`.`email` = '$email';";

  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}





























// =========================================== hapus data  ====================================================
function hapusPos($id)
{
  global $koneksi;
  mysqli_query($koneksi, "DELETE FROM data_posposyandu WHERE kd_pos = '$id'");

  return mysqli_affected_rows($koneksi);
}


function hapusvak($id)
{
  global $koneksi;
  mysqli_query($koneksi, "DELETE FROM data_vaksin WHERE kd_vaksin = '$id'");

  return mysqli_affected_rows($koneksi);
}


function hapusibu($id)
{
  global $koneksi;
  mysqli_query($koneksi, "DELETE FROM data_ibu WHERE NIK = '$id'");

  return mysqli_affected_rows($koneksi);
}

function hapusanak($id)
{
  global $koneksi;
  mysqli_query($koneksi, "DELETE FROM data_anak WHERE NIK = '$id'");

  return mysqli_affected_rows($koneksi);
}

function hapuslahir($id)
{
  global $koneksi;
  mysqli_query($koneksi, "DELETE FROM `data_ibumelahirkan` WHERE idlahir = '$id'");

  return mysqli_affected_rows($koneksi);
}


function hapusbidan($id)
{
  global $koneksi;
  mysqli_query($koneksi, "DELETE FROM `data_bidan` WHERE NIP = '$id'");

  return mysqli_affected_rows($koneksi);
}


function hapuskader($id)
{
  global $koneksi;
  mysqli_query($koneksi, "DELETE FROM `data_kader` WHERE id_kader = '$id'");

  return mysqli_affected_rows($koneksi);
}
function hapususer($id)
{
  global $koneksi;
  mysqli_query($koneksi, "DELETE FROM `data_user` WHERE `data_user`.`email` = '$id'");

  return mysqli_affected_rows($koneksi);
}

function hapustimbang($id)
{
  global $koneksi;
  mysqli_query($koneksi, "DELETE FROM `data_penimbangan` WHERE `data_penimbangan`.`idtimbang` = '$id'");

  return mysqli_affected_rows($koneksi);
}


function hapusimu($id)
{
  global $koneksi;
  mysqli_query($koneksi, "DELETE FROM data_imunisasi WHERE data_imunisasi.idimunisasi = '$id'");

  return mysqli_affected_rows($koneksi);
}









































// ===================================================     filter     ==============================================================


function filteribu1($id){
 
  $rtrw = $_POST["rtrw"];
  $namapos = $_POST["pos"];
  $filter_query = "";

  
  if (!empty($rtrw) && !empty($namapos)) {
   $filter_query=query("SELECT
   data_ibu.NIK,
   data_ibu.nama_ibu,
   data_ibu.suami,
   data_ibu.rt_rw,
   data_ibu.no_telp,
   data_posposyandu.nama_posyandu,
   data_posposyandu.kd_pos
   FROM
   data_ibu
   JOIN data_posposyandu ON data_ibu.kd_pos = data_posposyandu.kd_pos
   WHERE data_ibu.kd_pos='$namapos' AND data_ibu.rt_rw='$rtrw';");
  
}
elseif(!empty($namapos)){
  $filter_query=query("SELECT
  data_ibu.NIK,
  data_ibu.nama_ibu,
  data_ibu.suami,
  data_ibu.rt_rw,
  data_ibu.no_telp,
  data_posposyandu.nama_posyandu,
  data_posposyandu.kd_pos
  FROM
  data_ibu
  JOIN data_posposyandu ON data_ibu.kd_pos = data_posposyandu.kd_pos
  WHERE data_ibu.kd_pos='$namapos';");

}
elseif(!empty($rtrw)){
  $filter_query=query("SELECT
  data_ibu.NIK,
  data_ibu.nama_ibu,
  data_ibu.suami,
  data_ibu.rt_rw,
  data_ibu.no_telp,
  data_posposyandu.nama_posyandu,
  data_posposyandu.kd_pos
  FROM
  data_ibu
  JOIN data_posposyandu ON data_ibu.kd_pos = data_posposyandu.kd_pos
  WHERE data_ibu.rt_rw='$rtrw';");

}
return $filter_query;

}











function filteranak($id){
  $tgl = $_POST["tanggal"];
  $namapos = $_POST["posfilter"];
  $jnis = $_POST["jenis_kelamin"];
  $filter_query = "";


  if (!empty($tgl) && !empty($namapos) && !empty($jnis)) {
    $filter_query=query("SELECT
  data_anak.NIK,
  data_anak.nama_anak,
  data_anak.tgl_lahir,
  data_anak.tempat_lahir,
  data_anak.usia,
  data_anak.jenis_kelamin,
  data_anak.BBL,
  data_ibu.NIK AS NIKibu,
  data_ibu.nama_ibu,
  data_ibu.suami,
  data_posposyandu.nama_posyandu,
  data_posposyandu.kd_pos
FROM
  data_anak
JOIN data_ibu ON data_anak.id_ibu = data_ibu.NIK
JOIN data_posposyandu ON data_anak.kd_pos = data_posposyandu.kd_pos
WHERE data_anak.tgl_lahir='$tgl' AND data_anak.jenis_kelamin='$jnis' AND data_anak.kd_pos='$namapos';");
   
 }
 if(!empty($tgl) && !empty($namapos)) {
    $filter_query=query("SELECT
    data_anak.NIK,
    data_anak.nama_anak,
    data_anak.tgl_lahir,
    data_anak.tempat_lahir,
    data_anak.usia,
    data_anak.jenis_kelamin,
    data_anak.BBL,
    data_ibu.NIK AS NIKibu,
    data_ibu.nama_ibu,
    data_ibu.suami,
    data_posposyandu.nama_posyandu,
    data_posposyandu.kd_pos
  FROM
    data_anak
  JOIN data_ibu ON data_anak.id_ibu = data_ibu.NIK
  JOIN data_posposyandu ON data_anak.kd_pos = data_posposyandu.kd_pos
  WHERE data_anak.tgl_lahir='$tgl' AND data_anak.kd_pos='$namapos';");
   
 }
 if(!empty($jnis) && !empty($namapos)) {
    $filter_query=query("SELECT
    data_anak.NIK,
    data_anak.nama_anak,
    data_anak.tgl_lahir,
    data_anak.tempat_lahir,
    data_anak.usia,
    data_anak.jenis_kelamin,
    data_anak.BBL,
    data_ibu.NIK AS NIKibu,
    data_ibu.nama_ibu,
    data_ibu.suami,
    data_posposyandu.nama_posyandu,
    data_posposyandu.kd_pos
  FROM
    data_anak
  JOIN data_ibu ON data_anak.id_ibu = data_ibu.NIK
  JOIN data_posposyandu ON data_anak.kd_pos = data_posposyandu.kd_pos
  WHERE data_anak.jenis_kelamin='$jnis' AND data_anak.kd_pos='$namapos';");
   
 }

 if(!empty($namapos)){
   $filter_query=query("SELECT
   data_anak.NIK,
   data_anak.nama_anak,
   data_anak.tgl_lahir,
   data_anak.tempat_lahir,
   data_anak.usia,
   data_anak.jenis_kelamin,
   data_anak.BBL,
   data_ibu.NIK AS NIKibu,
   data_ibu.nama_ibu,
   data_ibu.suami,
   data_posposyandu.nama_posyandu,
   data_posposyandu.kd_pos
 FROM
   data_anak
 JOIN data_ibu ON data_anak.id_ibu = data_ibu.NIK
 JOIN data_posposyandu ON data_anak.kd_pos = data_posposyandu.kd_pos
 WHERE data_anak.kd_pos='$namapos';");
 
 }

 if(!empty($tgl)){
   $filter_query=query("SELECT
   data_anak.NIK,
   data_anak.nama_anak,
   data_anak.tgl_lahir,
   data_anak.tempat_lahir,
   data_anak.usia,
   data_anak.jenis_kelamin,
   data_anak.BBL,
   data_ibu.NIK AS NIKibu,
   data_ibu.nama_ibu,
   data_ibu.suami,
   data_posposyandu.nama_posyandu,
   data_posposyandu.kd_pos
 FROM
   data_anak
 JOIN data_ibu ON data_anak.id_ibu = data_ibu.NIK
 JOIN data_posposyandu ON data_anak.kd_pos = data_posposyandu.kd_pos
 WHERE data_anak.tgl_lahir='$tgl';");
 }
 if(!empty($jnis)){
   $filter_query=query("SELECT
   data_anak.NIK,
   data_anak.nama_anak,
   data_anak.tgl_lahir,
   data_anak.tempat_lahir,
   data_anak.usia,
   data_anak.jenis_kelamin,
   data_anak.BBL,
   data_ibu.NIK AS NIKibu,
   data_ibu.nama_ibu,
   data_ibu.suami,
   data_posposyandu.nama_posyandu,
   data_posposyandu.kd_pos
 FROM
   data_anak
 JOIN data_ibu ON data_anak.id_ibu = data_ibu.NIK
 JOIN data_posposyandu ON data_anak.kd_pos = data_posposyandu.kd_pos
 WHERE data_anak.jenis_kelamin='$jnis';");
 }

 return $filter_query;
}










function filterlahir($id){
  $tgl = $_POST["tanggal"];
  $namapos = $_POST["posfilter"];
 
  $filter_query = "";

if(!empty($tgl)){
  $filter_query=query("SELECT 
  data_ibumelahirkan.idlahir,
  data_ibu.NIK,
  data_ibu.nama_ibu,
  data_ibu.suami,
  data_ibumelahirkan.nama_bayi,
  data_ibumelahirkan.tgl_lahir,
  data_ibumelahirkan.tgl_meninggalbayi,
  data_ibumelahirkan.tgl_meninggalibu,
  data_ibumelahirkan.keterangan,
  data_posposyandu.nama_posyandu,
  data_posposyandu.kd_pos
  FROM `data_ibumelahirkan`
  JOIN data_posposyandu ON data_ibumelahirkan.kd_pos=data_posposyandu.kd_pos
  JOIN data_ibu ON data_ibumelahirkan.nik_ibu=data_ibu.NIK
WHERE data_ibumelahirkan.tgl_lahir='$tgl';");
}elseif(!empty($namapos)){
  $filter_query=query("SELECT 
  data_ibumelahirkan.idlahir,
  data_ibu.NIK,
  data_ibu.nama_ibu,
  data_ibu.suami,
  data_ibumelahirkan.nama_bayi,
  data_ibumelahirkan.tgl_lahir,
  data_ibumelahirkan.tgl_meninggalbayi,
  data_ibumelahirkan.tgl_meninggalibu,
  data_ibumelahirkan.keterangan,
  data_posposyandu.nama_posyandu,
  data_posposyandu.kd_pos
  FROM `data_ibumelahirkan`
  JOIN data_posposyandu ON data_ibumelahirkan.kd_pos=data_posposyandu.kd_pos
  JOIN data_ibu ON data_ibumelahirkan.nik_ibu=data_ibu.NIK
WHERE data_posposyandu.kd_pos='$namapos';");
}elseif(!empty($tgl) && !empty($namapos)) {
  $filter_query=query("SELECT 
  data_ibumelahirkan.idlahir,
  data_ibu.NIK,
  data_ibu.nama_ibu,
  data_ibu.suami,
  data_ibumelahirkan.nama_bayi,
  data_ibumelahirkan.tgl_lahir,
  data_ibumelahirkan.tgl_meninggalbayi,
  data_ibumelahirkan.tgl_meninggalibu,
  data_ibumelahirkan.keterangan,
  data_posposyandu.nama_posyandu,
  data_posposyandu.kd_pos
  FROM `data_ibumelahirkan`
  JOIN data_posposyandu ON data_ibumelahirkan.kd_pos=data_posposyandu.kd_pos
  JOIN data_ibu ON data_ibumelahirkan.nik_ibu=data_ibu.NIK
WHERE data_ibumelahirkan.tgl_lahir='$tgl' AND data_posposyandu.kd_pos='$namapos';");
 
}
return $filter_query;
}





function filtertimbang0_12($id) {
  $tanggalf = $_POST["tanggalf"];
  $bbl = $_POST["bbl"];
  $hasil = $_POST["hasil"];
  $namapos = $_POST["posfilter"];

  $filter_query = "";

  switch (true) {
      case !empty($tanggalf) && !empty($bbl) && !empty($hasil) && !empty($namapos):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 0
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 12
              AND data_penimbangan.tgl_timbamg='$tanggalf'
              AND data_anak.BBL='$bbl'
              AND data_penimbangan.hasil_timbang='$hasil'
              AND data_posposyandu.nama_posyandu='$namapos';");
          break;

      case !empty($tanggalf) && !empty($bbl) && !empty($hasil):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 0
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 12
              AND data_penimbangan.tgl_timbamg='$tanggalf'
              AND data_anak.BBL='$bbl'
              AND data_penimbangan.hasil_timbang='$hasil';");
          break;

      case !empty($bbl) && !empty($hasil) && !empty($namapos):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 0
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 12
              AND data_anak.BBL='$bbl'
              AND data_penimbangan.hasil_timbang='$hasil'
              AND data_posposyandu.nama_posyandu='$namapos';");
          break;
      case !empty($tanggalf) && !empty($hasil) && !empty($namapos):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 0
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 12
              AND data_penimbangan.tgl_timbamg='$tanggalf'
              AND data_penimbangan.hasil_timbang='$hasil'
              AND data_posposyandu.nama_posyandu='$namapos';");
          break;
      case !empty($tanggalf) && !empty($bbl) && !empty($namapos):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 0
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 12
              AND data_penimbangan.tgl_timbamg='$tanggalf'
              AND data_anak.BBL='$bbl'
              AND data_posposyandu.nama_posyandu='$namapos';");
          break;
      case !empty($tanggalf) && !empty($bbl):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 0
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 12
              AND data_penimbangan.tgl_timbamg='$tanggalf'
              AND data_anak.BBL='$bbl';");
          break;
      case !empty($tanggalf) && !empty($hasil):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 0
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 12
              AND data_penimbangan.tgl_timbamg='$tanggalf'
              AND data_penimbangan.hasil_timbang='$hasil';");
          break;
      case !empty($tanggalf) && !empty($namapos):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 0
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 12
              AND data_penimbangan.tgl_timbamg='$tanggalf'
              AND data_posposyandu.nama_posyandu='$namapos';");
          break;
      case !empty($bbl) && !empty($hasil):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 0
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 12
              AND data_anak.BBL='$bbl'
              AND data_penimbangan.hasil_timbang='$hasil';");
          break;
      case !empty($bbl) && !empty($namapos):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 0
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 12
              AND data_anak.BBL='$bbl'
              AND data_posposyandu.nama_posyandu='$namapos';");
          break;
      case !empty($hasil) && !empty($namapos):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 0
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 12
              AND data_penimbangan.hasil_timbang='$hasil'
              AND data_posposyandu.nama_posyandu='$namapos';");
          break;
      case !empty($tanggalf):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 0
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 12
              AND data_penimbangan.tgl_timbamg='$tanggalf';");
          break;
      case !empty($bbl):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 0
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 12
              AND data_anak.BBL='$bbl';");
          break;
      case !empty($hasil):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 0
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 12
              AND data_penimbangan.hasil_timbang='$hasil';");
          break;
      case !empty($namapos):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 0
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 12
              AND data_posposyandu.nama_posyandu='$namapos';");
          break;
  }

  return $filter_query;
}












function filtertimbang13_36($id) {
  $tanggalf = $_POST["tanggalf13_36"];
  $bbl = $_POST["bbl13_36"];
  $hasil = $_POST["hasil13_36"];
  $namapos = $_POST["posfilter13_36"];

  $filter_query = "";

  switch (true) {
      case !empty($tanggalf) && !empty($bbl) && !empty($hasil) && !empty($namapos):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 13
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 36
              AND data_penimbangan.tgl_timbamg='$tanggalf'
              AND data_anak.BBL='$bbl'
              AND data_penimbangan.hasil_timbang='$hasil'
              AND data_posposyandu.nama_posyandu='$namapos';");
          break;

      case !empty($tanggalf) && !empty($bbl) && !empty($hasil):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 13
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 36
              AND data_penimbangan.tgl_timbamg='$tanggalf'
              AND data_anak.BBL='$bbl'
              AND data_penimbangan.hasil_timbang='$hasil';");
          break;

      case !empty($bbl) && !empty($hasil) && !empty($namapos):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 13
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 36
              AND data_anak.BBL='$bbl'
              AND data_penimbangan.hasil_timbang='$hasil'
              AND data_posposyandu.nama_posyandu='$namapos';");
          break;
      case !empty($tanggalf) && !empty($hasil) && !empty($namapos):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 13
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 36
              AND data_penimbangan.tgl_timbamg='$tanggalf'
              AND data_penimbangan.hasil_timbang='$hasil'
              AND data_posposyandu.nama_posyandu='$namapos';");
          break;
      case !empty($tanggalf) && !empty($bbl) && !empty($namapos):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 13
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 36
              AND data_penimbangan.tgl_timbamg='$tanggalf'
              AND data_anak.BBL='$bbl'
              AND data_posposyandu.nama_posyandu='$namapos';");
          break;
      case !empty($tanggalf) && !empty($bbl):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 13
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 36
              AND data_penimbangan.tgl_timbamg='$tanggalf'
              AND data_anak.BBL='$bbl';");
          break;
      case !empty($tanggalf) && !empty($hasil):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 13
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 36
              AND data_penimbangan.tgl_timbamg='$tanggalf'
              AND data_penimbangan.hasil_timbang='$hasil';");
          break;
      case !empty($tanggalf) && !empty($namapos):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 13
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 36
              AND data_penimbangan.tgl_timbamg='$tanggalf'
              AND data_posposyandu.nama_posyandu='$namapos';");
          break;
      case !empty($bbl) && !empty($hasil):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 13
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 36
              AND data_anak.BBL='$bbl'
              AND data_penimbangan.hasil_timbang='$hasil';");
          break;
      case !empty($bbl) && !empty($namapos):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 13
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 36
              AND data_anak.BBL='$bbl'
              AND data_posposyandu.nama_posyandu='$namapos';");
          break;
      case !empty($hasil) && !empty($namapos):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 13
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 36
              AND data_penimbangan.hasil_timbang='$hasil'
              AND data_posposyandu.nama_posyandu='$namapos';");
          break;
      case !empty($tanggalf):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 13
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 36
              AND data_penimbangan.tgl_timbamg='$tanggalf';");
          break;
      case !empty($bbl):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 13
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 36
              AND data_anak.BBL='$bbl';");
          break;
      case !empty($hasil):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 13
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 36
              AND data_penimbangan.hasil_timbang='$hasil';");
          break;
      case !empty($namapos):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 13
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 36
              AND data_posposyandu.nama_posyandu='$namapos';");
          break;
  }

  return $filter_query;
}














function filtertimbang37_60($id) {
  $tanggalf = $_POST["tanggalf37_60"];
  $bbl = $_POST["bbl37_60"];
  $hasil = $_POST["hasil37_60"];
  $namapos = $_POST["posfilter37_60"];

  $filter_query = "";

  switch (true) {
      case !empty($tanggalf) && !empty($bbl) && !empty($hasil) && !empty($namapos):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 37
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 60
              AND data_penimbangan.tgl_timbamg='$tanggalf'
              AND data_anak.BBL='$bbl'
              AND data_penimbangan.hasil_timbang='$hasil'
              AND data_posposyandu.nama_posyandu='$namapos';");
          break;

      case !empty($tanggalf) && !empty($bbl) && !empty($hasil):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 37
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 60
              AND data_penimbangan.tgl_timbamg='$tanggalf'
              AND data_anak.BBL='$bbl'
              AND data_penimbangan.hasil_timbang='$hasil';");
          break;

      case !empty($bbl) && !empty($hasil) && !empty($namapos):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 37
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 60
              AND data_anak.BBL='$bbl'
              AND data_penimbangan.hasil_timbang='$hasil'
              AND data_posposyandu.nama_posyandu='$namapos';");
          break;
      case !empty($tanggalf) && !empty($hasil) && !empty($namapos):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 37
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 60
              AND data_penimbangan.tgl_timbamg='$tanggalf'
              AND data_penimbangan.hasil_timbang='$hasil'
              AND data_posposyandu.nama_posyandu='$namapos';");
          break;
      case !empty($tanggalf) && !empty($bbl) && !empty($namapos):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 37
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 60
              AND data_penimbangan.tgl_timbamg='$tanggalf'
              AND data_anak.BBL='$bbl'
              AND data_posposyandu.nama_posyandu='$namapos';");
          break;
      case !empty($tanggalf) && !empty($bbl):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 37
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 60
              AND data_penimbangan.tgl_timbamg='$tanggalf'
              AND data_anak.BBL='$bbl';");
          break;
      case !empty($tanggalf) && !empty($hasil):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 37
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 60
              AND data_penimbangan.tgl_timbamg='$tanggalf'
              AND data_penimbangan.hasil_timbang='$hasil';");
          break;
      case !empty($tanggalf) && !empty($namapos):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 37
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 60
              AND data_penimbangan.tgl_timbamg='$tanggalf'
              AND data_posposyandu.nama_posyandu='$namapos';");
          break;
      case !empty($bbl) && !empty($hasil):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 37
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 60
              AND data_anak.BBL='$bbl'
              AND data_penimbangan.hasil_timbang='$hasil';");
          break;
      case !empty($bbl) && !empty($namapos):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 37
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 60
              AND data_anak.BBL='$bbl'
              AND data_posposyandu.nama_posyandu='$namapos';");
          break;
      case !empty($hasil) && !empty($namapos):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 37
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 60
              AND data_penimbangan.hasil_timbang='$hasil'
              AND data_posposyandu.nama_posyandu='$namapos';");
          break;
      case !empty($tanggalf):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 37
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 60
              AND data_penimbangan.tgl_timbamg='$tanggalf';");
          break;
      case !empty($bbl):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 37
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 60
              AND data_anak.BBL='$bbl';");
          break;
      case !empty($hasil):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 37
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 60
              AND data_penimbangan.hasil_timbang='$hasil';");
          break;
      case !empty($namapos):
          $filter_query = query("SELECT
              data_penimbangan.idtimbang,
              data_anak.NIK,
              data_anak.nama_anak,
              data_anak.tgl_lahir,
              data_anak.BBL,
              data_ibu.nama_ibu,
              data_ibu.suami,
              data_penimbangan.tgl_timbamg,
              data_penimbangan.hasil_timbang,
              data_posposyandu.nama_posyandu
              FROM data_penimbangan
              JOIN data_anak ON data_penimbangan.nik_anak=data_anak.NIK
              JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
              JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
              WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 37
              AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 60
              AND data_posposyandu.nama_posyandu='$namapos';");
          break;
  }

  return $filter_query;
}


function filterimu0_12($id){
  $tanggalf = $_POST["tanggalf"];
  $imuni = $_POST["imunisasi"];
  $plyn = $_POST["hasil"];
  $namapos = $_POST["posfilter"];

  $filter_query = "SELECT
  data_imunisasi.idimunisasi,
  data_anak.NIK,
  data_anak.nama_anak,
  data_anak.tgl_lahir,
  data_anak.BBL,
  data_ibu.nama_ibu,
  data_ibu.suami,
  data_imunisasi.tgl_imunisasi,
  data_imunisasi.imuni_dbr,
  data_vaksin.nama_vaksin,
  data_imunisasi.plyan_dbr,
  data_posposyandu.nama_posyandu
FROM data_imunisasi
JOIN data_anak ON data_imunisasi.nik_anak=data_anak.NIK
JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
JOIN data_vaksin ON data_imunisasi.imuni_dbr=data_vaksin.kd_vaksin
WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 0
AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 12";

  if (!empty($tanggalf)) {
    $filter_query .= " AND data_imunisasi.tgl_imunisasi='$tanggalf'";
  }

  if (!empty($imuni)) {
    $filter_query .= " AND data_vaksin.nama_vaksin='$imuni'";
  }

  if (!empty($plyn)) {
    $filter_query .= " AND data_imunisasi.plyan_dbr='$plyn'";
  }

  if (!empty($namapos)) {
    $filter_query .= " AND data_posposyandu.nama_posyandu='$namapos'";
  }

  $filter_query = query($filter_query);

  return $filter_query;
}
function filterimu13_36($id){
  $tanggalf = $_POST["tanggalf"];
  $imuni = $_POST["imunisasi"];
  $plyn = $_POST["hasil"];
  $namapos = $_POST["posfilter"];

  $filter_query = "SELECT
  data_imunisasi.idimunisasi,
  data_anak.NIK,
  data_anak.nama_anak,
  data_anak.tgl_lahir,
  data_anak.BBL,
  data_ibu.nama_ibu,
  data_ibu.suami,
  data_imunisasi.tgl_imunisasi,
  data_imunisasi.imuni_dbr,
  data_vaksin.nama_vaksin,
  data_imunisasi.plyan_dbr,
  data_posposyandu.nama_posyandu
FROM data_imunisasi
JOIN data_anak ON data_imunisasi.nik_anak=data_anak.NIK
JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
JOIN data_vaksin ON data_imunisasi.imuni_dbr=data_vaksin.kd_vaksin
WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 13
AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 36";

  if (!empty($tanggalf)) {
    $filter_query .= " AND data_imunisasi.tgl_imunisasi='$tanggalf'";
  }

  if (!empty($imuni)) {
    $filter_query .= " AND data_vaksin.nama_vaksin='$imuni'";
  }

  if (!empty($plyn)) {
    $filter_query .= " AND data_imunisasi.plyan_dbr='$plyn'";
  }

  if (!empty($namapos)) {
    $filter_query .= " AND data_posposyandu.nama_posyandu='$namapos'";
  }

  $filter_query = query($filter_query);

  return $filter_query;
}
function filterimu37_60($id){
  $tanggalf = $_POST["tanggalf"];
  $imuni = $_POST["imunisasi"];
  $plyn = $_POST["hasil"];
  $namapos = $_POST["posfilter"];

  $filter_query = "SELECT
  data_imunisasi.idimunisasi,
  data_anak.NIK,
  data_anak.nama_anak,
  data_anak.tgl_lahir,
  data_anak.BBL,
  data_ibu.nama_ibu,
  data_ibu.suami,
  data_imunisasi.tgl_imunisasi,
  data_imunisasi.imuni_dbr,
  data_vaksin.nama_vaksin,
  data_imunisasi.plyan_dbr,
  data_posposyandu.nama_posyandu
FROM data_imunisasi
JOIN data_anak ON data_imunisasi.nik_anak=data_anak.NIK
JOIN data_posposyandu ON data_anak.kd_pos=data_posposyandu.kd_pos
JOIN data_ibu ON data_anak.id_ibu=data_ibu.NIK
JOIN data_vaksin ON data_imunisasi.imuni_dbr=data_vaksin.kd_vaksin
WHERE TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) >= 37
AND TIMESTAMPDIFF(MONTH, data_anak.tgl_lahir, CURRENT_DATE) <= 60";

  if (!empty($tanggalf)) {
    $filter_query .= " AND data_imunisasi.tgl_imunisasi='$tanggalf'";
  }

  if (!empty($imuni)) {
    $filter_query .= " AND data_vaksin.nama_vaksin='$imuni'";
  }

  if (!empty($plyn)) {
    $filter_query .= " AND data_imunisasi.plyan_dbr='$plyn'";
  }

  if (!empty($namapos)) {
    $filter_query .= " AND data_posposyandu.nama_posyandu='$namapos'";
  }

  $filter_query = query($filter_query);

  return $filter_query;
}


























// ===================================================    chat     =============================================================





?>