<style>
    table {
        border-collapse: collapse;
        border: 2px solid black;
    }
    td {
        width: 60px;
        height: 60px;
    }
    .black {
        background-color: black;
    }
</style>

<?php
function chessboard()
{
    echo "<table>";
    for ($i = 0; $i < 8; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 8; $j++) {
            if ($i % 2 == $j % 2)
                echo "<td></td>";
            else
                echo "<td class='black'></td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
chessboard();
?>