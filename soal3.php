<?php
include 'koneksi.php';
$keyword = $_GET['keyword'] ?? '';

$sql = "SELECT p.id, p.nama, p.alamat, GROUP_CONCAT(h.hobi SEPARATOR ', ') AS hobis
        FROM person p
        LEFT JOIN hobi h ON p.id = h.person_id";

if (!empty($keyword)) {
    $keyword = mysqli_real_escape_string($koneksi, $keyword);
    $sql .= " WHERE p.nama LIKE '%$keyword%'
              OR p.alamat LIKE '%$keyword%'
              OR h.hobi LIKE '%$keyword%'";
}

$sql .= " GROUP BY p.id, p.nama, p.alamat
          ORDER BY p.id ASC";

$result = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>SOAL 3 - Person & Hobi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background: #f2f2f2;
        }

        .search-box {
            margin-bottom: 15px;
        }

        input[type="text"] {
            padding: 8px;
            width: 300px;
        }

        button {
            padding: 8px 15px;
        }
    </style>
</head>

<body>
    <h2>Daftar Person dan Hobinya</h2>
    <form method="GET" class="search-box">
        <input type="text" name="keyword" placeholder="Cari nama / alamat / hobi"
            value="<?= htmlspecialchars($_GET['keyword'] ?? '') ?>">
        <button type="submit">SEARCH</button>
        <a href="soal3.php"><button type="button">RESET</button></a>
    </form>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Hobi</th>
        </tr>
        <?php
        $no = 1;
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$no}</td>
                        <td>" . htmlspecialchars($row['nama']) . "</td>
                        <td>" . htmlspecialchars($row['alamat']) . "</td>
                        <td>" . htmlspecialchars($row['hobis'] ?? '-') . "</td>
                      </tr>";
                $no++;
            }
        } else {
            echo "<tr><td colspan='4' style='text-align:center'>Tidak ada data ditemukan</td></tr>";
        }
        ?>
    </table>
</body>

</html>