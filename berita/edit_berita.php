<?php
include("./koneksi.php");

$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id === null) {
  echo "ID tidak ditemukan!";
  exit();
}

$data = $koneksi->query("SELECT * FROM `berita` WHERE `id`='$id'")->fetch_assoc();
?>

<div class="card shadow-lg border-0">
  <div class="card-header bg-primary text-white">
    <h3 class="card-title">Edit Data Berita</h3>
  </div>

  <form method="POST" enctype="multipart/form-data">
    <div class="card-body">
      <!-- Nama Admin -->
      <div class="form-group">
        <label for="admin">Nama Admin</label>
        <input type="text" class="form-control" id="admin" name="admin" value="<?= $data['admin'] ?>" required>
      </div>

      <!-- Judul -->
      <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" class="form-control" id="judul" name="judul" value="<?= $data['judul'] ?>" required>
      </div>

      <!-- Content -->
      <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" id="content" name="content" rows="3" required><?= $data['content'] ?></textarea>
      </div>

      <!-- Tanggal -->
      <div class="form-group">
        <label for="tgl">Tanggal</label>
        <input type="date" class="form-control" id="tgl" name="tgl" value="<?= $data['tgl'] ?>" required>
      </div>

      <!-- Comment -->
      <div class="form-group">
        <label for="comment">Comment</label>
        <input type="text" class="form-control" id="comment" name="comment" value="<?= $data['comment'] ?>" required>
      </div>

      <!-- Foto -->
      <div class="form-group">
        <label for="foto">Foto</label>
        <input type="file" class="form-control-file" id="foto" name="foto" accept="image/*">
        <small class="text-muted">Format yang diperbolehkan: JPG, PNG. Maksimal ukuran: 1MB</small>
        <br>
        <?php if ($data['foto']) : ?>
          <img src="foto/<?= $data['foto'] ?>" alt="Foto" class="mt-2 img-thumbnail" style="width: 150px; height: auto;">
        <?php endif; ?>
      </div>

      <!-- Link -->
      <div class="form-group">
        <label for="link">Link</label>
        <input type="url" class="form-control" id="link" name="link" value="<?= $data['link'] ?>" required>
      </div>

      <!-- Deskripsi -->
      <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="2" required><?= $data['deskripsi'] ?></textarea>
      </div>
    </div>

    <div class="card-footer">
      <button type="submit" name="edit" class="btn btn-success">
        <i class="fas fa-save"></i> Simpan Perubahan
      </button>
      <a href="?page=berita/berita" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
      </a>
    </div>
  </form>
</div>

<?php
if (isset($_POST['edit'])) {
  $admin = $_POST['admin'];
  $judul = $_POST['judul'];
  $content = $_POST['content'];
  $tgl = $_POST['tgl'];
  $comment = $_POST['comment'];
  $link = $_POST['link'];
  $deskripsi = $_POST['deskripsi'];

  // Foto Baru
  $nama_file = $_FILES['foto']['name'];
  $ukuran_file = $_FILES['foto']['size'];
  $tipe_file = $_FILES['foto']['type'];
  $tmp_file = $_FILES['foto']['tmp_name'];

  if ($nama_file) { // Jika ada foto baru yang diunggah
    if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {
      if ($ukuran_file <= 1000000) { // Maksimal 1MB
        $path = "foto/" . $nama_file;
        if (move_uploaded_file($tmp_file, $path)) {
          // Hapus foto lama jika ada
          if ($data['foto'] && file_exists("foto/" . $data['foto'])) {
            unlink("foto/" . $data['foto']);
          }
          $foto = $nama_file; // Update foto dengan foto baru
        } else {
          echo "<script>
                        Swal.fire('Gagal!', 'Gagal mengunggah foto!', 'error');
                    </script>";
          exit();
        }
      } else {
        echo "<script>
                    Swal.fire('Gagal!', 'Ukuran foto maksimal 1MB!', 'error');
                </script>";
        exit();
      }
    } else {
      echo "<script>
                Swal.fire('Gagal!', 'Format file harus JPG atau PNG!', 'error');
            </script>";
      exit();
    }
  } else {
    // Jika tidak ada file yang diunggah, gunakan foto lama
    $foto = $data['foto'];
  }

  // Update data
  $sql = "UPDATE `berita` SET 
                `admin` = '$admin', 
                `judul` = '$judul', 
                `content` = '$content', 
                `tgl` = '$tgl', 
                `comment` = '$comment', 
                `link` = '$link', 
                `deskripsi` = '$deskripsi', 
                `foto` = '$foto' 
            WHERE `id` = '$id'";

  if ($koneksi->query($sql)) {
    echo "<script>
            Swal.fire('Sukses!', 'Data berita berhasil diperbarui.', 'success').then(() => {
                window.location.href='?page=berita/berita';
            });
        </script>";
  } else {
    echo "<script>
            Swal.fire('Gagal!', 'Terjadi kesalahan saat memperbarui data.', 'error');
        </script>";
  }
}
?>