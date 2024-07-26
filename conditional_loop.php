<?php

echo "1.<br>\n";
for ($baris = 0; $baris < 3; $baris++) {
    for ($garis = 0; $garis < 4; $garis++) {
        echo "*";
    }
    echo "<br>\n";
}

echo "2.<br>\n";
for ($baris = 0; $baris < 3; $baris++) {
    if ($baris == 1) {
        echo "**  **<br>\n";
    } else {
        for ($garis = 0; $garis < 5; $garis++) {
            echo "*";
        }
        echo "<br>\n";
    }
]

echo "3.<br>\n";
for ($baris = 1; $baris <= 5; $baris++) {
    for ($garis = 1; $garis <= $baris; $garis++) {
        echo "*";
    }
    echo "<br>\n";
}

echo "4.<br>\n";
for ($baris = 5; $baris > 0; $baris--) {
    for ($garis = 1; $garis <= $baris; $garis++) {
        echo "*";
    }
    echo "<br>\n";
}

echo "5.<br>\n";
for ($baris = 1; $baris <= 5; $baris++) {
    if ($baris == 1) {
        echo "*<br>\n";
    } elseif ($baris == 2 || $baris == 3) {
        echo "**<br>\n";
    } elseif ($baris == 4) {
        echo "* *<br>\n";
    } else {
        for ($garis = 1; $garis <= 5; $garis++) {
            echo "*";
        }
        echo "<br>\n";
    }
}
?>
