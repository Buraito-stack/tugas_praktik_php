<?php

echo "1.<br>\n";
for ($row = 0; $row < 3; $row++) {
    for ($column = 0; $column < 4; $column++) {
        echo "*";
    }
    echo "<br>\n";
}

echo "2.<br>\n";
for ($row = 0; $row < 3; $row++) {
    if ($row == 1) {
        echo "**_**<br>\n";
    } else {
        for ($column = 0; $column < 5; $column++) {
            echo "*";
        }
        echo "<br>\n";
    }
}

echo "3.<br>\n";
for ($row = 1; $row <= 5; $row++) {
    for ($column = 1; $column <= $row; $column++) {
        echo "*";
    }
    echo "<br>\n";
}

echo "4.<br>\n";
for ($row = 5; $row > 0; $row--) {
    for ($column = 1; $column <= $row; $column++) {
        echo "*";
    }
    echo "<br>\n";
}

echo "5.<br>\n";
for ($row = 1; $row <= 5; $row++) {
    if ($row == 1) {
        echo "*<br>\n";
    } else if ($row == 2) {
        echo "**<br>\n";
        
    } else if ($row == 3) {
        echo "*_*<br>\n";
        
    } else if ($row == 4) {
        echo "*__*<br>\n";
        
    } else {
        for ($column = 0; $column < 5; $column++) {
            echo "*";
        }
        echo "<br>\n";
    }
}
?>
