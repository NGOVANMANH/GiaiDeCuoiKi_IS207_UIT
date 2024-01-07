<?php
if (isset($_POST['maPhong']) && isset($_POST['STT'])) {
    include './connect.php';
    $maPhong = $_POST['maPhong'];
    $conn->query("UPDATE PHONG SET TINHTRANG='Đã thuê' WHERE MAPHONG='$maPhong'");
    $STT = $_POST['STT'];
    $res = $conn->query("SELECT MAPHONG, TENPHONG FROM PHONG WHERE MAPHONG='$maPhong'");
    if ($res->num_rows > 0) {
        while ($row = $res->fetch_row()) {
            echo "<tr>
            <td>" . $STT . "</td>
            <td>$row[0]</td>
            <td>$row[1]</td>
            <td><button onclick='handleXoa(event, `$row[0]`)'>Xóa</button></td>
        </tr>";
        }
    }
    $conn->close();
}
