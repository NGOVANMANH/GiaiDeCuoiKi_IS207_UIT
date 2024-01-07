<?php
if (isset($_POST['maPhong'])) {
    $maPhong = $_POST['maPhong'];
    include './connect.php';
    $conn->query("UPDATE PHONG SET TINHTRANG='Chưa thuê' WHERE MAPHONG='$maPhong'");
    $res = $conn->query("SELECT MAPHONG, TENPHONG FROM PHONG WHERE MAPHONG='$maPhong'");
    if ($res->num_rows > 0) {
        while ($row = $res->fetch_row()) {
            echo "<tr>
            <td>1</td>
            <td>$row[0]</td>
            <td>$row[1]</td>
            <td><button class='add' maPhong='$row[0]'>Thêm</button></td>
        </tr>";
        }
    }
    $conn->close();
}
