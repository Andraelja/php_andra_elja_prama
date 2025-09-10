<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="table-responsive">
        <h1>Data penduduk</h1>
        
        <br><a href="?page=penduduk/tambah_penduduk" class="btn btn-primary">Tambah Data penduduk</a></br>
        <table border="1" width="100%">
            <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
               <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
          <tr>
            <th>No</th>
            <th>Nama Nagari</th>
            <th>Kode Nagari</th>
            <th>Kode Kemendagri</th>
            <th>Luas Wilayah</th>
            <th>Jumlah Penduduk</th>
            <th>Website</th>
            <th>Action</th>
          </tr>
      </thead>
         <?php 
    include "./koneksi.php";
    $query = mysqli_query($koneksi, "SELECT * FROM penduduk");
    $no = 1;
    while($data = mysqli_fetch_array($query)){
        // var_dump($data);
        // exit;
        ?> 
        <tr>
            <td><?= $no; ?></td>
            <td><?= $data['nama_nagari']?></td>
            <td><?= $data['kode_nagari']?></td>
            <td><?= $data['kode_kemendagri']?></td>
            <td><?= $data['luas_wilayah']?></td>
            <td><?= $data['jumlah_penduduk']?></td>
            <td><?= $data['website']?></td>
            <td><a href="?page=penduduk/edit_penduduk&id=<?php echo $data['id']; ?>" class="btn btn-info btn-icon-split">
                        <span class="icon text-white-50">
                          <i class="fas fa-edit"></i>
                        </span>
                        
                      </a>   

                      <a href="?page=penduduk/hapus_penduduk&id=<?php echo $data['id']; ?>" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                          <i class="fas fa-trash"></i>
                        </span>
                       
                      </a></td>  </tr>

    <?php 
        $no++;
        }     
    ?>
        </table>

</div>
