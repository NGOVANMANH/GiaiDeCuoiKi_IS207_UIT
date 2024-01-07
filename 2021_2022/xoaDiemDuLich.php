<?php
include './connect.php';
if ($_POST['maDDL']) {
    $maDDL = $_POST['maDDL'];
    $conn->query("DELETE FROM CHITIET WHERE MADDL='$maDDL'");
    $conn->query("DELETE FROM DIEMDL WHERE MADDL='$maDDL'");
}
$conn->close();
