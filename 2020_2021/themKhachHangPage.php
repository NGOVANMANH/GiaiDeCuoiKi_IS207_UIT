<form action="./themKhachHangPage.php" method="POST">
    <h3>Thêm khách hàng</h3>
    <table>
        <tbody>
            <tr>
                <td>Mã khách hàng</td>
                <td><input type="text" name="maKH"></td>
            </tr>
            <tr>
                <td>Họ tên khách hàng</td>
                <td><input type="text" name="tenKH"></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td><input type="text" name="diaChi"></td>
            </tr>
            <tr>
                <td>Điện thoại</td>
                <td><input type="text" name="sdt"></td>
            </tr>
        </tbody>
    </table>
    <input type="submit" value="Thêm" name="them">
</form>

<?php
if (isset($_POST['them'])) {
    $maKH = $_POST['maKH'];
    $tenKH = $_POST['tenKH'];
    $diaChi = $_POST['diaChi'];
    $sdt = $_POST['sdt'];
    include './connect.php';
    $conn->query("INSERT INTO KHACHHANG VALUES ('$maKH', '$tenKH', '$diaChi', '$sdt')");
    $conn->close();
}
?>