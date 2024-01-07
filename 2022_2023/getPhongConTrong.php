<?php
include './connect.php';
$res = $conn->query("SELECT MAPHONG, TENPHONG FROM PHONG WHERE TINHTRANG='Chưa thuê'");
if ($res->num_rows > 0) {
    $index = 1;
    while ($row = $res->fetch_row()) {
        echo "<tr>
                <td>" . $index++ . "</td>
                <td>$row[0]</td>
                <td>$row[1]</td>
                <td><button onclick='handleThem(`$row[0]`)'>Thêm</button></td>
            </tr>";
    }
}
$conn->close();
