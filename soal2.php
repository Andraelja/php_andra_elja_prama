<?php
session_start();

if (isset($_POST['reset'])) {
    session_destroy();
    session_start();
    $_SESSION['step'] = 1;
}

if (!isset($_SESSION['step'])) {
    $_SESSION['step'] = 1;
}

if ($_POST && !isset($_POST['reset'])) {
    if ($_SESSION['step'] == 1) {
        $_SESSION['nama'] = $_POST['nama'] ?? '';
        $_SESSION['step'] = 2;
    } elseif ($_SESSION['step'] == 2) {
        $_SESSION['umur'] = $_POST['umur'] ?? '';
        $_SESSION['step'] = 3;
    } elseif ($_SESSION['step'] == 3) {
        $_SESSION['hobi'] = $_POST['hobi'] ?? '';
        $_SESSION['step'] = 4;
    }
}

$step = $_SESSION['step'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Form Multi Step</title>
</head>

<body>
    <?php if ($step == 1): ?>
        <h3>Langkah 1: Data Pribadi</h3>
        <form method="post">
            Nama: <input type="text" name="nama" required><br><br>
            <button type="submit">Lanjut</button>
        </form>

    <?php elseif ($step == 2): ?>
        <h3>Langkah 2: Umur</h3>
        <form method="post">
            Umur: <input type="number" name="umur" required><br><br>
            <button type="submit">Lanjut</button>
        </form>

    <?php elseif ($step == 3): ?>
        <h3>Langkah 3: Hobi</h3>
        <form method="post">
            Hobi: <textarea name="hobi" required></textarea><br><br>
            <button type="submit">Lanjut</button>
        </form>

    <?php elseif ($step == 4): ?>
        <h3>Ringkasan Data</h3>
        <ul>
            <li>Nama: <?= $_SESSION['nama'] ?? '-' ?></li>
            <li>Umur: <?= $_SESSION['umur'] ?? '-' ?> Tahun</li>
            <li>Hobi: <?= $_SESSION['hobi'] ?? '-' ?></li>
        </ul>
        <form method="post">
            <button type="submit" name="reset">Input Baru</button>
        </form>
    <?php endif; ?>
</body>

</html>