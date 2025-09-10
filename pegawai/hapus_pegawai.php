<?php
include("koneksi.php");
$id = $_GET['id'];
$sql = $koneksi->query("DELETE FROM pegawai WHERE id='$id'");
if ($sql == TRUE) {
    echo "<a href=?page=pegawai/pegawai>Data benar</a>";
} else {
    echo "<a href=?page=pegawai/pegawai>Data salah</a>";
}
echo"<script>
alert('Data Pegawai Telah Terhapus')
window.location.href='?page=pegawai/pegawai'
</script>";
?>
