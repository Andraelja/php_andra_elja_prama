<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Pengumuman</h3>
                <form method="POST" action="?page=pengumuman/p_tambah_pengumuman" enctype="multipart/form-data">
              </div>
              <form role="form">
                <div class="card-body">
                <div class="form-group">
                    <label>Nama Admin</label>
                    <input type="text" class="form-control" name="admin">
                  </div>
                </div>
                  <div class="form-group">
                    <label>Judul</label>
                    <input type="text" class="form-control" name="judul">
                  </div>
                  <div class="form-group">
                    <label>Content</label>
                    <input type="text" class="form-control" name="content">
                  </div>
                  <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" class="form-control" name="tgl">
                  </div>
                  <div class="form-group">
                    <label>Comment</label>
                    <input type="text" class="form-control" name="comment">
                  </div>
                  <div class="form-group">
                    <label>Foto</label>
                    <input type="file" class="form-control" name="foto">
                  </div>
                  <div class="form-group">
                    <label>Link</label>
                    <input type="link" class="form-control" name="link">
                  </div>
                  <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi">
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
