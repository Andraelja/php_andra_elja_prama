<div class="card shadow-lg border-0">
  <div class="card-header bg-primary text-white">
    <h3 class="card-title">Tambah Data Berita</h3>
  </div>

  <form method="POST" action="?page=berita/p_tambah_berita" enctype="multipart/form-data">
    <div class="card-body">
      <!-- Nama Admin -->
      <div class="form-group">
        <label for="admin">Nama Admin</label>
        <input type="text" class="form-control" id="admin" name="admin" placeholder="Masukkan nama admin" required>
      </div>

      <!-- Judul -->
      <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul berita" required>
      </div>

      <!-- Content -->
      <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" id="content" name="content" rows="3" placeholder="Masukkan isi berita" required></textarea>
      </div>

      <!-- Tanggal -->
      <div class="form-group">
        <label for="tgl">Tanggal</label>
        <input type="date" class="form-control" id="tgl" name="tgl" required>
      </div>

      <!-- Comment -->
      <div class="form-group">
        <label for="comment">Comment</label>
        <input type="text" class="form-control" id="comment" name="comment" placeholder="Masukkan komentar" required>
      </div>

      <!-- Foto -->
      <div class="form-group">
        <label for="foto">Foto</label>
        <input type="file" class="form-control-file" id="foto" name="foto" accept="image/*" onchange="previewFoto(event)" required>
        <br>
        <!-- Preview Foto -->
        <img id="preview" src="#" alt="Preview Gambar" style="display: none; max-width: 300px; margin-top: 10px; border-radius: 8px;">
      </div>

      <!-- Link -->
      <div class="form-group">
        <label for="link">Link</label>
        <input type="url" class="form-control" id="link" name="link" placeholder="Masukkan URL terkait" required>
      </div>

      <!-- Deskripsi -->
      <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="2" placeholder="Masukkan deskripsi" required></textarea>
      </div>
    </div>

    <div class="card-footer">
      <button type="submit" class="btn btn-success">
        <i class="fas fa-check"></i> Submit
      </button>
      <a href="?page=berita/berita" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
      </a>
    </div>
  </form>
</div>

<!-- JavaScript untuk Preview Foto -->
<script>
  function previewFoto(event) {
    const input = event.target;
    const preview = document.getElementById('preview');

    if (input.files && input.files[0]) {
      const reader = new FileReader();

      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
      };

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
