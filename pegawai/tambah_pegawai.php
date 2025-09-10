<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Foto</h3>
                <form method="POST" action="?page=pegawai/p_tambah_pegawai" enctype="multipart/form-data">
              </div>
              <form role="form">
                <div class="card-body">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama_pegawai">
                  </div>
                  <div class="form-group"></div>
                  <div><label for="jenis_kelamin">Jenis Kelamin</label>
                  <div>
                  <select class="form-control" id="jenis_kelamin" name="jenis_kelamin"value="{{old('jenis_kelamin')}}" id="jenis_kelamin">
                  <option selected>-Pilih Jenis Kelamin-</option>
                  <option value="laki-laki">Laki-Laki</option>
                  <option value="perempuan">Perempuan</option>
                </select>
                </div>
                </div>
                  <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" class="form-control" name="jabatan">
                  </div>
                  <div class="form-group">
                    <label>NIP</label>
                    <input type="text" class="form-control" name="deskripsi">
                  </div>
                  <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" class="form-control" name="foto">
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
