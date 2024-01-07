<?php
include './connect.php';

if (isset($_POST['soDiemDuLich'])) {
    $soDiemDuLich = $_POST['soDiemDuLich'];
    $sql = "SELECT * 
    FROM
    (
        SELECT t.TenTour, COUNT(ddl.MaDDL) as SLDDL 
        FROM tour t 
        JOIN chitiet ct ON t.MaTour=ct.MaTour 
        JOIN diemdl ddl ON ddl.MaDDL=ct.MaDDL
        GROUP BY t.TenTour
    ) AS subquery
    WHERE subquery.SLDDL >= $soDiemDuLich";

    $rows = $conn->query($sql);

    $stt = 0;
    while ($row = $rows->fetch_row()) {
        echo "<tr>";
        echo "<td>" . ++$stt . "</td>";
        echo "<td>$row[0]</td>";
        echo "<td>$row[1]</td>";
        echo "</tr>";
    }
}

$conn->close();
