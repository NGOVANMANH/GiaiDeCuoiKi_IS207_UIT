<form action="./themTourPage.php" method="post">
    <label for="maTour">Mã tour</label>
    <input type="number" name="maTour" id="maTour">
    <br>
    <label for="tenTour">Tên tour</label>
    <input type="text" name="tenTour" id="tenTour">
    <br>
    <label for="ngayKhoiHanh">Ngày khởi hành</label>
    <input type="date" name="ngayKhoiHanh" id="ngayKhoiHanh">
    <br>
    <label for="soNgay">Số ngày</label>
    <input type="number" name="soNgay" id="soNgay">
    <br>
    <label for="soDem">Số đêm</label>
    <input type="number" name="soDem" id="soDem">
    <br>
    <label for="gia">Giá</label>
    <input type="number" name="gia" id="gia">
    <br>
    <input type="submit" name="addTour" value="Thêm" />
</form>

<?php
include './connect.php';
if (isset($_POST['addTour']) && ($_POST['addTour'] == "Thêm")) {
    $maTour = $_POST['maTour'];
    $tenTour = $_POST['tenTour'];
    $ngayKhoiHanh = $_POST['ngayKhoiHanh'];
    $soNgay = $_POST['soNgay'];
    $soDem = $_POST['soDem'];
    $gia = $_POST['gia'];

    $conn->query("INSERT INTO TOUR VALUES
    ('$maTour', '$tenTour', '$ngayKhoiHanh', $soNgay, $soDem, $gia)");
}
$conn->close();
?>