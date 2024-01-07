<?php
include './connect.php';
$res = $conn->query("SELECT D.MADDL, D.TENDDL, T.TENTTP, D.DACTRUNG FROM DIEMDL D, TINHTP T WHERE D.MATTP=T.MATTP");
$stt = 0;
while ($row = $res->fetch_row()) {
    echo "<tr>";
    echo "<td>" . ++$stt . "</td>";
    echo "<td>$row[0]</td>";
    echo "<td>$row[1]</td>";
    echo "<td>$row[2]</td>";
    echo "<td>$row[3]</td>";
    echo "<td><button class='btnView' maDDL='$row[0]'>View</button><button class='btnDelete' maDDL='$row[0]'>Delete</button></td>";
    echo "</tr>";
}
$conn->close();
