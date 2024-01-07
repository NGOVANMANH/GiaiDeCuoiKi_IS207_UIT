<form action="themKhachHang.php" method="post">
    Mã khách hàng: <input type="text" name="ma"><br>
    Tên khách hàng: <input type="text" name="ten"><br>
    Số điện thoại: <input type="text" name="sdt"><br>
    Căn cước công dân: <input type="text" name="cccd"><br>
    <input type="submit" name="them" value="Thêm">
</form>

<?php
if (isset($_POST['them'])) {
    $ma = $_POST['ma'];
    $ten = $_POST['ten'];
    $sdt = $_POST['sdt'];
    $cccd = $_POST['cccd'];
    include './connect.php';

    $conn->query("INSERT INTO KHACHHANG VALUES ('$ma', '$ten', '$sdt', '$cccd')");

    $conn->close();
}
?>