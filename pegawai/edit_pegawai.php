<?php
include("../koneksi.php");
$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM `pegawai` WHERE `id`='$id'")->fetch_assoc();
?>
<div class="card">
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="nama_pegawai" class="form-control" value="<?php echo $data['nama_pegawai'] ?>">
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                    <option value="laki-laki" <?php if ($data['jenis_kelamin'] == 'laki-laki') echo 'selected'; ?>>Laki-Laki</option>
                    <option value="perempuan" <?php if ($data['jenis_kelamin'] == 'perempuan') echo 'selected'; ?>>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Jabatan</label>
                <input type="text" name="jabatan" class="form-control" value="<?php echo $data['jabatan'] ?>">
            </div>
            <div class="form-group">
                <label for="">Foto</label>
                <input type="file" name="foto" class="form-control">
                <!-- Hapus value dari input file karena tidak bisa menampilkan file yang diupload sebelumnya -->
            </div>
            <div class="form-group">
                <label for="">NIP</label>
                <input type="text" name="deskripsi" class="form-control" value="<?php echo $data['deskripsi'] ?>">
            </div>
            <button class="btn btn-primary" name="edit" type="submit">Edit Data</button>
        </form>

        <!-- ... -->
    </div>
</div>
        <?php if (isset($_POST['edit'])) {
            // $foto = $_POST['foto'];
            $nama_pegawai= $_POST['nama_pegawai'];
            $jenis_kelamin= $_POST['jenis_kelamin'];
            $jabatan= $_POST['jabatan'];
            $deskripsi= $_POST['deskripsi'];

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

                $sql = mysqli_query($koneksi, "UPDATE `pegawai` SET `nama_pegawai`='$nama_pegawai',`jenis_kelamin`='$jenis_kelamin',`jabatan`='$jabatan',`foto`='$nama_file',`deskripsi`='$deskripsi' WHERE id='$id'");

                if($sql){ // Cek jika proses simpan ke database sukses atau tidak
                    // Jika Sukses, Lakukan :
                echo"<script>
                    alert('Data Pegawai Telah Diubah')
                    window.location.href='?page=pegawai/pegawai'
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