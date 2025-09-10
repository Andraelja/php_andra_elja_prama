<?php
include("./koneksi.php");

$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM `penduduk` WHERE `id`='$id'")->fetch_assoc();

if (isset($_POST['edit'])) {
    $nama_nagari = $_POST['nama_nagari'];
    $kode_nagari = $_POST['kode_nagari'];
    $kode_kemendagri = $_POST['kode_kemendagri'];
    $luas_wilayah = $_POST['luas_wilayah'];
    $jumlah_penduduk = $_POST['jumlah_penduduk'];
    $website = $_POST['website'];

    // Lakukan query UPDATE ke database
    $sql = "UPDATE `penduduk` SET 
            `nama_nagari`='$nama_nagari', 
            `kode_nagari`='$kode_nagari', 
            `kode_kemendagri`='$kode_kemendagri', 
            `luas_wilayah`='$luas_wilayah', 
            `jumlah_penduduk`='$jumlah_penduduk', 
            `website`='$website' 
            WHERE id='$id'";

    $result = $koneksi->query($sql);

    if ($result) {
        echo "<script>
                alert('Data Penduduk Telah Diubah');
                window.location.href='?page=penduduk/penduduk';
              </script>";
    } else {
        echo "<font style='color:red';>Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    }
}
?>

<div class="card">
    <div class="card-body">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
                <label for="">Nama Nagari</label>
                <input type="text" name="nama_nagari" class="form-control" value="<?php echo $data['nama_nagari'] ?>">
            </div>
            <div class="form-group">
                <label for="">Kode Nagari</label>
                <input type="text" name="kode_nagari" class="form-control" value="<?php echo $data['kode_nagari'] ?>">
            </div>
            <div class="form-group">
                <label for="">Kode Kemendagri</label>
                <input type="text" name="kode_kemendagri" class="form-control" value="<?php echo $data['kode_kemendagri'] ?>">
            </div>
            <div class="form-group">
                <label for="">Luas Wilayah</label>
                <input type="text" name="luas_wilayah" class="form-control" value="<?php echo $data['luas_wilayah'] ?>">
            </div>
            <div class="form-group">
                <label for="">Jumlah Penduduk</label>
                <input type="text" name="jumlah_penduduk" class="form-control" value="<?php echo $data['jumlah_penduduk'] ?>">
            </div>
            <div class="form-group">
                <label for="">Website</label>
                <input type="text" name="website" class="form-control" value="<?php echo $data['website'] ?>">
            </div>
            </div>
            <button class="btn btn-primary" name="edit" type="submit">Edit Data</button>
    </form>
    </div>
</div>
