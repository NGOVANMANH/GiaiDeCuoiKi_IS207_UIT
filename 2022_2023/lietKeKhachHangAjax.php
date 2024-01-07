<?php
include './connect.php';
if ($_POST['maKH']) {
    $maKH = $_POST['maKH'];
    echo "<option value=''>---- Chọn ------</option>";
    $res = $conn->query("Select mahd from hoadon where makh='$maKH'");
    if ($res->num_rows > 0) {
        while ($row = $res->fetch_row()) {
            echo "<option value='$row[0]'>$row[0]</option>";
        }
    }
}
$conn->close();
