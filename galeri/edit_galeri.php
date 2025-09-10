<?php
include("./koneksi.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Prepared statement untuk menghindari SQL Injection
    $stmt = $koneksi->prepare("SELECT * FROM `galeri` WHERE `id`=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $stmt->close();
}

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $deskripsi = $_POST['deskripsi'];

    $nama_file = $_FILES['foto']['name'];
    $ukuran_file = $_FILES['foto']['size'];
    $tipe_file = $_FILES['foto']['type'];
    $tmp_file = $_FILES['foto']['tmp_name'];

    $path = "foto/".$nama_file;

    // Lakukan update hanya jika ada file yang diunggah
    if(!empty($nama_file)) {
        // Proses upload foto baru
        if($tipe_file == "image/jpeg" || $tipe_file == "image/png") {
            if($ukuran_file <= 10000000) {
                if(move_uploaded_file($tmp_file, $path)) {
                    $sql = $koneksi->prepare("UPDATE `galeri` SET `foto`=?, `deskripsi`=? WHERE `id`=?");
                    $sql->bind_param("ssi", $nama_file, $deskripsi, $id);
                    $sql->execute();
                    $sql->close();
                    echo "<script>
                            alert('Data Galeri Telah Diubah');
                            window.location.href='?page=galeri/galeri';
                          </script>";
                } else {
                    echo "<font style='color:red';>Maaf, foto gagal untuk diupload.";
                }
            } else {
                echo "<font style='color:red';>Maaf, Ukuran foto yang diupload tidak boleh lebih dari 1MB";
            }
        } else {
            echo "<font style='color:red';>Maaf, tipe file yang diunggah harus JPEG atau PNG";
        }
    } else {
        // Jika tidak ada file yang diunggah, hanya update deskripsi
        $sql = $koneksi->prepare("UPDATE `galeri` SET `deskripsi`=? WHERE `id`=?");
        $sql->bind_param("si", $deskripsi, $id);
        $sql->execute();
        $sql->close();
        echo "<script>
                alert('Data Galeri Telah Diubah');
                window.location.href='?page=galeri/galeri';
              </script>";
    }
}
?>

<div class="card">
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
            <div class="form-group">  
                <label for="">Foto</label>
                <input type="file" name="foto" class="form-control">
                <img src="foto/<?php echo $data['foto']; ?>" alt="Foto saat ini" width="100">
            </div>
            
            <div class="form-group">
                <label for="">Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control" value="<?php echo $data['deskripsi'] ?>">
            </div>
            
            <button class="btn btn-primary" name="edit" type="submit">Edit Data</button>
        </form>
    </div>
</div>
