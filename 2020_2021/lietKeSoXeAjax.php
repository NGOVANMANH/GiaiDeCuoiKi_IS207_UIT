<?php
$soLanBaoDuong = $_POST['soLanBaoDuong'];
include './connect.php';
$res = $conn->query("SELECT KH.HOTENKH, X.SOXE, COUNT(MABD)
FROM BAODUONG BD, XE X, KHACHHANG KH
WHERE BD.SOXE = X.SOXE AND KH.MAKH = X.MAKH
GROUP BY KH.HOTENKH, X.SOXE
HAVING COUNT(MABD) >= $soLanBaoDuong");
while ($row = $res->fetch_row()) {
    echo "<tr>
    <td>$row[0]</td>
    <td>$row[1]</td>
    <td>$row[2]</td>
    </tr>";
}
$conn->close();
