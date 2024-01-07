<?php
if (isset($_POST['maHD'])) {
    include './connect.php';
    $maHD = $_POST['maHD'];
    $res = $conn->query("SELECT P.MAPHONG, P.LOAIPHONG
    FROM THUE T, PHONG P
    WHERE T.MAPHONG = P.MAPHONG
    AND T.MAHD='$maHD'");
    if ($res->num_rows > 0) {
        $index = 1;
        while ($row = $res->fetch_row()) {
            echo "<tr>";
            echo "<td>" . $index++ . "</td>";
            echo "<td>$row[0]</td>";
            echo "<td>$row[1]</td>";
            echo "</tr>";
        }
    }
    $conn->close();
}
