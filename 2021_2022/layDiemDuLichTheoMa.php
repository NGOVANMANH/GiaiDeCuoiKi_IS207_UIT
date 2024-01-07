<?php
include './connect.php';
$maDDL = $_POST['maDDL'];
$res = $conn->query("SELECT * FROM DIEMDL WHERE MADDL='$maDDL'");
$response = array();
while ($row = $res->fetch_assoc()) {
    $response[] = $row;
}
echo json_encode($response);
$conn->close();
