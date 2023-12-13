<?php
require '../koneksi.php';
header('Content-Type: application/json');
session_start(); 
function upload()
{

    if (isset($_SESSION["role"])) {

        $role = $_SESSION["role"];
        if ($role === "Admin") {
            $id_admin = $_SESSION['id_admin'];
        }
        if ($role === "Bidan") {
            $nip=$_SESSION['nip'];
        }
        if ($role === "Kader") {
            $idk=$_SESSION['idk'];
        }
        if ($role === "User") {
            $idk=$_SESSION['id_adminu'];
        }
    }
   

    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $tmpName = $_FILES['foto']['tmp_name'];

   
    // Cek apakah gambar
    $extensiValid = ['jpg', 'png', 'jpeg'];
    $extensiGambar = explode('.', $namaFile);
    $extensiGambar = strtolower(end($extensiGambar));

    if (!in_array($extensiGambar, $extensiValid)) {
        return json_encode(['status' => 'error', 'message' => 'Yang anda upload bukan gambar!']);
    }

    // if ($ukuranFile > 1000000) {
    //     return json_encode(['status' => 'error', 'message' => 'Ukuran Gambar Terlalu Besar!']);
    // }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensiGambar;
    // Move File
    move_uploaded_file($tmpName, '../assets/imgs/' . $namaFileBaru);
    
    if (isset($_SESSION["role"])) {
        $role = $_SESSION["role"];
    
        if ($role === "Admin") {
            // Get the old photo filename from the session
            $oldPhoto = $_SESSION['foto_admin'];
    
            // Delete the old photo if it exists
            if ($oldPhoto != 'userpp.png') {
                $oldPhotoPath = '../assets/imgs/' . $oldPhoto;
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }
    
            // Update the new photo
            $result = editfotoadmin($namaFileBaru, $id_admin);
            $_SESSION['foto_admin'] = $namaFileBaru;
        } elseif ($role === "Bidan") {
            $oldPhoto = $_SESSION['foto_adminb'];
    
            if ($oldPhoto != 'userpp.png') {
                $oldPhotoPath = '../assets/imgs/' . $oldPhoto;
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }
    
            $result = editfotobidan($namaFileBaru, $nip);
            $_SESSION['foto_adminb'] = $namaFileBaru;
        } elseif ($role === "Kader") {
            $oldPhoto = $_SESSION['foto_admink'];
    
            if ($oldPhoto != 'userpp.png') {
                $oldPhotoPath = '../assets/imgs/' . $oldPhoto;
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }
    
            $result = editfotokader($namaFileBaru, $idk);
            $_SESSION['foto_admink'] = $namaFileBaru;
        } elseif ($role === "User") {
            $oldPhoto = $_SESSION['foto_adminu'];
    
            if ($oldPhoto != 'userpp.png') {
                $oldPhotoPath = '../assets/imgs/' . $oldPhoto;
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }
    
            $result = editfotouser($namaFileBaru, $idk);
            $_SESSION['foto_adminu'] = $namaFileBaru;
        }
    }
    

    if ($result) {
        return json_encode(['status' => 'success', 'message' => 'File uploaded and database updated successfully', 'fileName' => $namaFileBaru]);
    } else {
        return json_encode(['status' => 'error', 'message' => 'Failed to update database']);
    }
}

// Call the upload function and echo the result
echo upload();
?>

