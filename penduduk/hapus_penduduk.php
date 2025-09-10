<?php
include("./koneksi.php");
$id = $_GET['id'];
$sql = $koneksi->query("DELETE FROM penduduk WHERE id='$id'");
if ($sql == TRUE) {
    echo "<a href=?page=penduduk/penduduk>Data benar</a>";
} else {
    echo "<a href=?page=penduduk/penduduk>Data salah</a>";
}
echo"<script>
alert('Data Pegawai Telah Terhapus')
window.location.href='?page=penduduk/penduduk'
</script>";
?>
