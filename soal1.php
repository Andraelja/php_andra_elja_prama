<?php
$jml = $_GET['jml'];
echo "<table border=1 cellspacing=0 cellpadding=5>\n";

for ($a = $jml; $a > 0; $a--) {
    // Hitung total
    $total = 0;
    for ($b = $a; $b > 0; $b--) {
        $total += $b;
    }

    // Baris total (selalu full colspan jml)
    echo "<tr><td colspan='$jml'>TOTAL: $total</td></tr>\n";

    // Baris angka
    echo "<tr>";
    for ($b = $a; $b > 0; $b--) {
        echo "<td>$b</td>";
    }

    // Gabungkan sel kosong jadi satu
    $sisa = $jml - $a;
    if ($sisa > 0) {
        echo "<td colspan='$sisa'></td>";
    }

    echo "</tr>\n";
}

echo "</table>";
?>
