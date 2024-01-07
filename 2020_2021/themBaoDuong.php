<?php
$soXe = $_POST['soXe'];
$maBaoDuong = $_POST['maBaoDuong'];
$soKM = $_POST['soKM'];
$noiDung = $_POST['noiDung'];
$ngayNhan = date("Y-m-d");

include './connect.php';
$conn->query("INSERT INTO BAODUONG VALUES('$maBaoDuong', '$ngayNhan', null, $soKM, '$noiDung', '$soXe', null)");
$conn->close();
