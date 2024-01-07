<form action="themHoaDon.php" method="post">
    Tên khách hàng:
    <select name="maKH">
        <?php
        include './connect.php';
        $res = $conn->query("SELECT MAKH, TENKH FROM KHACHHANG");
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_row()) {
                echo "<option value='$row[0]'>$row[1]</option>";
            }
        }
        $conn->close();
        ?>
    </select><br>
    Mã hóa đơn: <input type="text" name="maHD" /><br>
    Tên hóa đơn: <input type="text" name="tenHD" /> <br>
    Tổng tiền: <input type="text" name="tongTien" /> <br>
    <input type="submit" name="them" value="Thêm" />
</form>

<?php
include './connect.php';
if (isset($_POST['them'])) {
    $maKH = $_POST['maKH'];
    $maHD = $_POST['maHD'];
    $tenHD = $_POST['tenHD'];
    $tongTien = $_POST['tongTien'];
    $conn->query("INSERT INTO HOADON VALUES ('$maHD', '$tenHD', '$maKH', '$tongTien')");
}

$conn->close();
?>