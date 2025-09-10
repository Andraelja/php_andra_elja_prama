<div class="row">
  <div class="col-12">
    <div class="card shadow-lg">
      <div class="card-header bg-primary text-white">
        <h3 class="card-title">Data Berita</h3>
        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 200px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
            <div class="input-group-append">
              <button type="submit" class="btn btn-light">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      
      <div class="card-body">
        <a href="?page=berita/tambah_berita" class="btn btn-success mb-3">
          <i class="fas fa-plus"></i> Tambah Data Berita
        </a>

        <table class="table table-bordered table-hover">
          <thead class="thead-dark">
            <tr>
              <th>No</th>
              <th>Admin</th>
              <th>Judul</th>
              <th>Content</th>
              <th>Tanggal</th>
              <th>Comment</th>
              <th>Link</th>
              <th>Deskripsi</th>
              <th>Foto</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include "./koneksi.php";
            $query = mysqli_query($koneksi, "SELECT * FROM berita");
            $no = 1;
            while ($data = mysqli_fetch_array($query)) { ?>
              <tr>
                <td><?= $no; ?></td>
                <td><?= htmlspecialchars($data['admin']); ?></td>
                <td><?= substr(htmlspecialchars($data['judul']), 0, 20); ?>...</td>
                <td><?= substr(htmlspecialchars($data['content']), 0, 15); ?>...</td>
                <td><?= htmlspecialchars($data['tgl']); ?></td>
                <td><?= htmlspecialchars($data['comment']); ?></td>
                <td>
                  <a href="<?= htmlspecialchars($data['link']); ?>" target="_blank" class="btn btn-sm btn-secondary">
                    <i class="fas fa-link"></i>
                  </a>
                </td>
                <td><?= htmlspecialchars($data['deskripsi']); ?></td>
                <td>
                  <img src="foto/<?= htmlspecialchars($data['foto']); ?>" class="img-thumbnail" width="50" height="50" alt="Foto">
                </td>
                <td>
                  <a href="?page=berita/edit_berita&id=<?= $data['id']; ?>" class="btn btn-sm btn-warning" title="Edit">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="?page=berita/hapus_berita&id=<?= $data['id']; ?>" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                    <i class="fas fa-trash"></i>
                  </a>
                </td>
              </tr>
            <?php $no++; } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
