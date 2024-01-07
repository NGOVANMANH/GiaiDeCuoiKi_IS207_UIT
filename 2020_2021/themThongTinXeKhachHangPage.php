<form action="./themThongTinXeKhachHangPage.php" method="POST">
    <h3>Thêm thông tin xe khách hàng</h3>
    <table>
        <tbody>
            <tr>
                <td>Họ tên khách hàng</td>
                <td>
                    <select name="maKH" id="maKH">
                        <?php
                        include './connect.php';
                        $res = $conn->query("SELECT MAKH, HOTENKH FROM KHACHHANG");
                        if ($res->num_rows > 0) {
                            while ($row = $res->fetch_row()) {
                                echo "<option value='$row[0]'>$row[1]</option>";
                            }
                        }
                        $conn->close();
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Số xe</td>
                <td>
                    <input type="text" name="soXe">
                </td>
            </tr>
            <tr>
                <td>Hãng xe</td>
                <td>
                    <input type="text" list="options" placeholder="Chọn hoặc nhập..." name="hangXe">
                    <datalist id="options">
                        <option value="Toyota">
                        <option value="BMW">
                        <option value="Audi">
                    </datalist>
                </td>
            </tr>
            <tr>
                <td>Năm sản xuất</td>
                <td>
                    <input type="number" name="namSanXuat">
                </td>
            </tr>
        </tbody>
    </table>
    <input type="submit" name="them" value="Thêm">

</form>

<?php
if (isset($_POST['them'])) {
    include './connect.php';
    $maKH = $_POST['maKH'];
    $soXe = $_POST['soXe'];
    $hangXe = $_POST['hangXe'];
    $namSanXuat = $_POST['namSanXuat'];
    $conn->query("INSERT INTO XE VALUES('$soXe', '$hangXe', $namSanXuat, '$maKH')");
    $conn->close();
}
?>