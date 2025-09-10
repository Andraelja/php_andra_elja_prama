<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="table-responsive">
        <h1>Data Pegawai</h1>
        
        <br><a href="?page=pegawai/tambah_pegawai" class="btn btn-primary">Tambah Data pegawai</a></br>
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
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Jabatan</th>
            <th>NIP</th>
            <th>Foto</th>
            <th>Action</th>
          </tr>
      </thead>
         <?php 
    include "koneksi.php";
    $query = mysqli_query($koneksi, "SELECT * FROM pegawai");
    $no = 1;
    while($data = mysqli_fetch_array($query)){
        // var_dump($data);
        // exit;
        ?> 
        <tr>
            <td><?= $no; ?></td>
            <td><?= $data['nama_pegawai']?></td>
            <td><?= $data['jenis_kelamin']?></td>
            <td><?= $data['jabatan']?></td>
            <td><?= $data['deskripsi']?></td>
            <td><img src="foto/<?php echo $data['foto'] ?>" width="45" height="50"></td>
            <td><a href="?page=pegawai/edit_pegawai&id=<?php echo $data['id']; ?>" class="btn btn-info btn-icon-split">
                        <span class="icon text-white-50">
                          <i class="fas fa-edit"></i>
                        </span>
                        
                      </a>   

                      <a href="?page=pegawai/hapus_pegawai&id=<?php echo $data['id']; ?>" class="btn btn-primary btn-icon-split">
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

