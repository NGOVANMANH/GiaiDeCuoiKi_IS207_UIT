<?php
if ($_POST['soXe']) {
    $soXe = $_POST['soXe'];
    include './connect.php';
    $res = $conn->query("SELECT k.HOTENKH
        FROM XE x, KHACHHANG k
        WHERE x.makh=k.makh
        AND x.soxe='$soXe'");
    while ($row = $res->fetch_row()) {
        echo $row[0];
    }
    $conn->close();
}
