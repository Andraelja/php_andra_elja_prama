<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Galeri</h3>
                <form method="POST" action="?page=galeri/p_tambah_galeri" enctype="multipart/form-data">
              </div>
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label>Foto</label>
                    <input type="file" class="form-control" name="foto">
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
