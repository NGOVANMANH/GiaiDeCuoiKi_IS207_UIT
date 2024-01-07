<?php
$soXe = $_POST['soXe'];
$ngayNhanXe = $_POST['ngayNhanXe'];
include './connect.php';
$res = $conn->query("SELECT CV.TENCV, CV.DONGIA, CV.MACV
    FROM BAODUONG BD, CONGVIEC CV, CT_BD CT
    WHERE BD.MABD=CT.MABD AND CV.MACV=CT.MACV
    AND BD.SOXE='$soXe' AND BD.NGAYNHAN='$ngayNhanXe'");
while ($row = $res->fetch_row()) {
    echo "<tr>
        <td>$row[0]</td>
        <td>$row[1]</td>
        <td><button class='btnXoa' maCV='$row[2]'>Xóa</button></td>
    </tr>";
}
$conn->close();
