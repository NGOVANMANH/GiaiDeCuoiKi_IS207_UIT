<?php
include './connect.php';
$res = $conn->query("SELECT SOXE FROM XE");
echo "<option value=''>----Chọn số xe----</option>";
while ($row = $res->fetch_row()) {
    echo "<option value='$row[0]'>$row[0]</option>";
}
$conn->close();
