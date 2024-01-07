<?php
$ngayTra = date("Y-m-d");
$thanhTien = $_POST['tongTien'];
$soXe = $_POST['soXe'];
include './connect.php';
$conn->query("UPDATE BAODUONG SET THANHTIEN=$thanhTien, NGAYTRA='$ngayTra' WHERE SOXE='$soXe'");
$conn->close();
