<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="table-responsive">
                <h1>Data Galeri</h1>
                <br><a href="?page=galeri/tambah_galeri" class="btn btn-primary">Tambah Data Galeri</a></br>
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Deskripsi</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "./koneksi.php";
                        $query = mysqli_query($koneksi, "SELECT * FROM galeri");
                        $no = 1;
                        while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $data['deskripsi'] ?></td>
                                <td><img src="foto/<?php echo $data['foto'] ?>" width="45" height="50"></td>
                                <td>
                                    <a href="?page=galeri/edit_galeri&id=<?php echo $data['id']; ?>" class="btn btn-info btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                    </a>
                                    <a href="?page=galeri/hapus_galeri&id=<?php echo $data['id']; ?>" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
