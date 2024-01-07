<?php
include './connect.php';
$maDDL = $_POST['maDDL'];
$tenDDL = $_POST['tenDDL'];
$maTTP = $_POST['maTTP'];
$dacTrung = $_POST['dacTrung'];

$conn->query("UPDATE DIEMDL SET TENDDL='$tenDDL', MATTP='$maTTP', DACTRUNG='$dacTrung' WHERE MADDL='$maDDL'");
$conn->close();
