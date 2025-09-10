<?php
include '../koneksi.php';

$admin = $_POST['admin'];
$judul = $_POST['judul'];
$content = $_POST['content'];
$tgl = $_POST['tgl'];
$comment = $_POST['comment'];

$nama_file = $_FILES['foto']['name'];
$ukuran_file = $_FILES['foto']['size'];
$tipe_file = $_FILES['foto']['type'];
$tmp_file = $_FILES['foto']['tmp_name'];

$path = "foto/" . $nama_file;

if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {
    if ($ukuran_file <= 1000000) {
        if (move_uploaded_file($tmp_file, $path)) {
            $sql = $koneksi->prepare("INSERT INTO `berita` (`admin`, `judul`, `content`, `tgl`, `comment`, `foto`) VALUES (?, ?, ?, ?, ?, ?)");
            $sql->bind_param("ssssss", $admin, $judul, $content, $tgl, $comment, $nama_file);

            if ($sql->execute()) {
                echo "<script>alert('Data Berhasil Ditambahkan'); window.location.href='?page=berita/berita';</script>";
            } else {
                echo "<font style='color:red';>Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            }
        } else {
            echo "<font style='color:red';>Maaf, Gambar gagal untuk diupload.";
        }
    } else {
        echo "<font style='color:red';>Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
    }
} else {
    echo "<font style='color:red';>Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
}
?>
