<?php
include './koneksi.php';

$nama_nagari = $_POST['nama_nagari'];
$kode_nagari = $_POST['kode_nagari'];
$kode_kemendagri = $_POST['kode_kemendagri'];
$luas_wilayah = $_POST['luas_wilayah'];
$jumlah_penduduk = $_POST['jumlah_penduduk'];
$website = $_POST['website'];

// Hapus bagian upload foto
// $nama_file = $_FILES['foto']['name'];
// $ukuran_file = $_FILES['foto']['size'];
// $tipe_file = $_FILES['foto']['type'];
// $tmp_file = $_FILES['foto']['tmp_name'];
// $path = "foto/" . $nama_file;

// Hapus bagian yang berhubungan dengan foto

// Proses simpan ke Database
$sql = mysqli_query($koneksi, "INSERT INTO `penduduk` (`nama_nagari`,`kode_nagari`,`kode_kemendagri`,`luas_wilayah`,`jumlah_penduduk`, `website`) VALUES('$nama_nagari','$kode_nagari','$kode_kemendagri','$luas_wilayah', '$jumlah_penduduk','$website')");

if ($sql) { // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    echo "<script> alert('Data Berhasil Ditambahkan')
        window.location.href='?page=penduduk/penduduk'
        </script>";
} else {
    // Jika Gagal, Lakukan :
    echo "<font style='color:red';>Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
}
?>
