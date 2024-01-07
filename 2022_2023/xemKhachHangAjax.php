<?php
include './connect.php';
if (isset($_POST['sl'])) {
    $sl = $_POST['sl'];
    $res = $conn->query("SELECT kh.MAKH, kh.TENKH, SUM(h.TONGTIEN) tongTien
    FROM khachhang kh, thue t, hoadon h
    WHERE kh.MAKH = h.MAKH AND t.MAHD=h.MAHD
    GROUP BY kh.MAKH, kh.TENKH
    ORDER BY tongTien DESC
    LIMIT $sl");
    if ($res->num_rows > 0) {
        $index = 1;
        while ($row = $res->fetch_row()) {
            echo "<tr>";
            echo "<td>" . $index++ . "</td>";
            echo "<td>$row[0]</td>";
            echo "<td>$row[1]</td>";
            echo "<td>$row[2]</td>";
            echo "</tr>";
        }
    }
}
$conn->close();
