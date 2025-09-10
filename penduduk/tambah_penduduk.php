<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Tambah Data penduduk</h3>
    <form method="POST" action="?page=penduduk/p_tambah_penduduk" enctype="multipart/form-data">
  </div>
  <form role="form">
    <div class="card-body">
      <div class="form-group">
        <label>Nama Nagari</label>
        <input type="text" class="form-control" name="nama_nagari">
      </div>
      <div class="form-group">
        <label>Kode Nagari</label>
        <input type="text" class="form-control" name="kode_nagari">
      </div>
      <div class="form-group">
        <label>Kode Kemendagri</label>
        <input type="text" class="form-control" name="kode_kemendagri">
      </div>
      <div class="form-group">
        <label>Luas Wilayah</label>
        <input type="text" class="form-control" name="luas_wilayah">
      </div>
      <div class="form-group">
        <label>Jumlah Penduduk</label>
        <input type="text" class="form-control" name="jumlah_penduduk">
      </div>
      <div class="form-group">
        <label>Website</label>
        <input type="text" class="form-control" name="website">
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
  </form>
</div>