<form action="./themDiemDuLich.php" method="post">
    <label for="maTP">Tên thành phố</label>
    <select name="maTP" id="maTP">
        <?php
        include './connect.php';
        $results = $conn->query("SELECT * FROM TINHTP");
        if ($results->num_rows > 0) {
            while ($row = $results->fetch_row()) {
                echo "<option value='$row[0]'>$row[1]</option>";
            }
        }
        $conn->close();
        ?>
    </select>
    <br>
    <label for="maDDL">Mã điểm du lịch</label>
    <input type="number" name="maDDL" id="maDDL">
    <br>
    <label for="tenDDL">Tên điểm du lịch</label>
    <input type="text" name="tenDDL" id="tenDDL">
    <br>
    <label for="dacTrung">Đặt trưng</label>
    <input type="text" name="dacTrung" id="dacTrung">
    <br>
    <input type="submit" name="addDDL" value="Thêm">
</form>

<?php
if (isset($_POST['addDDL']) && ($_POST['addDDL'] == "Thêm")) {
    $maTP = $_POST['maTP'];
    $maDDL = $_POST['maDDL'];
    $tenDDL = $_POST['tenDDL'];
    $dacTrung = $_POST['dacTrung'];

    include './connect.php';
    $conn->query("INSERT INTO DIEMDL VALUES ('$maDDL', '$tenDDL', '$maTP', '$dacTrung')");
    $conn->close();
}
?>