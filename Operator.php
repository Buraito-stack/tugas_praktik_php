<?php

echo "1.<br>\n";
for ($baris = 0; $baris < 3; $baris++) {
    echo "*****<br>\n";
}

echo "2.<br>\n";
for ($baris = 0; $baris < 2; $baris++) {
    if ($baris == 1) {
        echo "**", "_", "**<br>\n";
    }
    echo "*****<br>\n";
}

echo "3.<br>\n";
for ($baris = 1; $baris <= 5; $baris++) {
    for ($garis = 1; $garis <= $baris; $garis++) {
        echo "*\n";
    }
    echo "<br>";
}

echo "4.<br>\n";
for ($baris = 5; $baris > 0; $baris--) {
    for ($garis = 1; $garis <= $baris; $garis++) {
        echo "*\n";
    }
    echo "<br>";
}

echo "5.<br>\n";
for ($baris = 1; $baris <= 5; $baris++) {
    if ($baris == 1) {
        echo "*<br>\n";
    } elseif ($baris == 2) {
        echo "**<br>\n";
    } elseif ($baris == 3) {
        echo "* *<br>\n";
    } elseif ($baris == 4) {
        echo "*__*<br>\n";
    } else {
        echo "*****<br>\n";
    }
}
