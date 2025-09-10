<?php
include '../koneksi.php';

$nama_pegawai = $_POST['nama_pegawai'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$jabatan = $_POST['jabatan'];
$deskripsi = $_POST['deskripsi'];

$nama_file = $_FILES['foto']['name'];
$ukuran_file = $_FILES['foto']['size'];
$tipe_file = $_FILES['foto']['type'];
$tmp_file = $_FILES['foto']['tmp_name'];

$path = "foto/" . $nama_file;
if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {
    if ($ukuran_file <= 1000000) {
        if (move_uploaded_file($tmp_file, $path)) {
            $koneksi->set_charset("utf8"); // Mengatur karakter set koneksi ke utf8

            // Prepared statement untuk memasukkan data ke dalam database
            $stmt = $koneksi->prepare("INSERT INTO `pegawai` (`nama_pegawai`, `jenis_kelamin`, `jabatan`, `deskripsi`, `foto`) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $nama_pegawai, $jenis_kelamin, $jabatan, $deskripsi, $nama_file);
            $stmt->execute();

            // Cek apakah data berhasil dimasukkan ke dalam database
            if ($stmt) {
                echo "<script> alert('Data Berhasil Ditambahkan');
                window.location.href='?page=pegawai/pegawai';
                </script>";
            } else {
                echo "<font style='color:red;'>Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            }
        } else {
            echo "<font style='color:red;'>Maaf, Gambar gagal untuk diupload.";
        }
    } else {
        echo "<font style='color:red;'>Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
    }
} else {
    echo "<font style='color:red;'>Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
}
?>
