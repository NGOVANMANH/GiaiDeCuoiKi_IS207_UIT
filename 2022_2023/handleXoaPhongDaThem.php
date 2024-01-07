<?php
include './connect.php';
if (isset($_POST['maPhong'])) {
    $maPhong = $_POST['maPhong'];
    $conn->query("UPDATE PHONG SET TINHTRANG='Chưa thuê' WHERE MAPHONG='$maPhong'");
}

$conn->close();
