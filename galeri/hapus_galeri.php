<?php
include("./koneksi.php");
$id = $_GET['id'];
$sql = $koneksi->query("DELETE FROM galeri WHERE id='$id'");
if ($sql == TRUE) {
    echo "<a href=?page=galei/galeri>Data benar</a>";
} else {
    echo "<a href=?page=galeri/galeri>Data salah</a>";
}
echo"<script>
alert('Data Berita Telah Terhapus')
window.location.href='?page=galeri/galeri'
</script>";
?>
