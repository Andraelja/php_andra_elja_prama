<?php
include("./koneksi.php");
$id = $_GET['id'];
$sql = $koneksi->query("DELETE FROM berita WHERE id='$id'");
if ($sql == TRUE) {
    echo "<a href=?page=berita/berita>Data benar</a>";
} else {
    echo "<a href=?page=berita/berita>Data salah</a>";
}
echo"<script>
alert('Data Berita Telah Terhapus')
window.location.href='?page=berita/berita'
</script>";
?>
