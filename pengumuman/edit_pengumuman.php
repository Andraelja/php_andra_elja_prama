<?php
include("./koneksi.php");
$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM `pengumuman` WHERE `id`='$id'")->fetch_assoc();
?>
<div class="card">
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
                <label for="">Nama Admin</label>
                <input type="text" name="admin" class="form-control" value="<?php echo $data['admin'] ?>">
            </div>
            <div class="form-group">
                <label for="">Judul</label>
                <input type="text" name="judul" class="form-control" value="<?php echo $data['judul'] ?>">
            </div>
            <div class="form-group">
                <label for="">Content</label>
                <input type="tetxtarea" name="content" class="form-control" value="<?php echo $data['content'] ?>">
            </div>
            <div class="form-group">
                <label for="">Tanggal</label>
                <input type="date" name="tgl" class="form-control" value="<?php echo $data['tgl'] ?>">
            </div>
            <div class="form-group">  
                <label for="">Foto</label>
                <input type="file" name="foto" class="form-control" value="<?php echo $data['foto'] ?>">
            </div>
            <!-- <div class="form-group">
                <label for="">Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control" value="<?php echo $data['deskripsi'] ?>">
            </div> -->
            </div>
            <button class="btn btn-primary" name="edit" type="submit">Edit Data</button>
        </form>
        <?php if (isset($_POST['edit'])) {
            $admin= $_POST['admin'];
            $judul= $_POST['judul'];
            $content= $_POST['content'];
            $tgl= $_POST['tgl'];
            $comment= $_POST['comment'];
            $deskripsi= $_POST['deskripsi'];
            $link= $_POST['link'];

            $nama_file = $_FILES['foto']['name'];
            $ukuran_file = $_FILES['foto']['size'];
            $tipe_file = $_FILES['foto']['type'];
            $tmp_file = $_FILES['foto']['tmp_name'];

    $path = "foto/".$nama_file;
    if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){

        // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
        // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
        if($ukuran_file <= 10000000){

            // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
            // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
            // Proses upload
            if(move_uploaded_file($tmp_file, $path)){

                // Cek apakah foto berhasil diupload atau tidak
                // Jika foto berhasil diupload, Lakukan :
                // Proses simpan ke Database

                $sql = mysqli_query($koneksi, "UPDATE `pengumuman` SET `admin`='$admin',`judul`='$judul',`content`='$content',`tgl`='$tgl' ,`comment`='$comment' ,`deskripsi`='$deskripsi' ,`link`='$link' ,`foto`='$nama_file'WHERE id='$id'");

                if($sql){ // Cek jika proses simpan ke database sukses atau tidak
                    // Jika Sukses, Lakukan :
                echo"<script>
                    alert('Data Berita Telah Diubah')
                    window.location.href='?page=pengumuman/pengumuman'
                    </script>";
                }else{
                    // Jika Gagal, Lakukan :
                    echo "<font style='color:red';>Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
                }
            }else{
                // Jika foto gagal diupload, Lakukan :
                echo "<font style='color:red';>Maaf, foto gagal untuk diupload.";
            }
        }else{
            // Jika ukuran file lebih dari 1MB, lakukan :
            echo "<font style='color:red';>Maaf, Ukuran foto yang diupload tidak boleh lebih dari 1MB";
        }
    }
}
?>