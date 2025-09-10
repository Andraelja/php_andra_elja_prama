<?php
include("./koneksi.php");
$id = $_GET['id'];
$sql = $koneksi->query("DELETE FROM pengumuman WHERE id='$id'");
if ($sql == TRUE) {
    echo "<a href=?page=pengumuman/pengumuman>Data benar</a>";
} else {
    echo "<a href=?page=pengumuman/pengumuman>Data salah</a>";
}
echo"<script>
alert('Data Berita Telah Terhapus')
window.location.href='?page=pengumuman/pengumuman'
</script>";
?>
