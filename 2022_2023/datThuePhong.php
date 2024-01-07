<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div>
        Mã hóa đơn:
        <select name="maHD" id="maHD">
            <option value="">----chon----</option>
            <?php
            include './connect.php';
            $res = $conn->query("SELECT MAHD FROM HOADON");
            if ($res->num_rows > 0) {
                while ($row = $res->fetch_row()) {
                    echo "<option value='$row[0]'>$row[0]</option>";
                }
            }
            $conn->close();
            ?>
        </select>
    </div>

    <div>
        <h3>Danh sách các phòng còn trống</h3>
        <table border="1" cellspacing='0'>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã phòng</th>
                    <th>Tên phòng</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody id="conTrong">

            </tbody>
        </table>
    </div>

    <div>
        <h3>Danh sách các phòng đã thêm</h3>
        <table border="1" cellspacing='0'>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã phòng</th>
                    <th>Tên phòng</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody id="daThem">

            </tbody>
        </table>
    </div>

    <script>
        let index = 0;

        function renderConTrong() {
            $.get('getPhongConTrong.php', function(data, status) {
                if (status === "success") {
                    $("#conTrong").html(data);
                }
            });
        }

        renderConTrong();

        function handleThem(maPhong) {
            $.post('handleDatPhong.php', {
                maPhong: maPhong,
                STT: ++index
            }, function(data, status) {
                if (status === 'success') {
                    $('#daThem').append(data);
                    renderConTrong();
                }
            })
        }

        function handleXoa(event, maPhong) {
            $.post('handleXoaPhongDaThem.php', {
                maPhong: maPhong,
            }, function(data, status) {
                if (status === 'success') {
                    $(event.target).parent().parent().remove();
                    --index;
                    renderConTrong();
                }
            })
        }
    </script>
</body>