<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div>
        Tên khách hàng <select type="text" name="maKH" id="maKH">
            <option value="">---- Chọn ------</option>
            <?php
            include './connect.php';
            $res = $conn->query("Select makh, tenkh from khachhang");
            if ($res->num_rows > 0) {
                while ($row = $res->fetch_row()) {
                    echo "<option value='$row[0]'>$row[1]</option>";
                }
            }
            $conn->close();
            ?>
        </select>
    </div>
    <div>
        Mã hóa đơn <select type="text" name="maHD" id="maHD" onchange="handleChooseMaHD(event)">
        </select>
    </div>
    <div>Danh sách các phòng trong hóa đơn</div>
    <table border="1" cellspacing='0'>
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã phòng</th>
                <th>Loại phòng</th>
            </tr>
        </thead>
        <tbody id="danhSachPhong">

        </tbody>
    </table>

    <script>
        $("#maKH").change(function() {
            const maKH = $(this).val();
            $.post('lietKeKhachHangAjax.php', {
                maKH: maKH
            }, function(data, status) {
                if (status === 'success') {
                    $('#maHD').html(data);
                }
            })
        })

        function handleChooseMaHD(event) {
            const maHD = event.target.value;
            $.post('handleChooseMaHD.php', {
                maHD: maHD
            }, function(data, status) {
                if (status === 'success') {
                    $('#danhSachPhong').html(data);
                }
            })
        }
    </script>
</body>