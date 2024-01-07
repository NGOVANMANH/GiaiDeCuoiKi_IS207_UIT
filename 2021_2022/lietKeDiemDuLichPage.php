<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<table border="1" cellspacing="0">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã điểm du lịch</th>
            <th>Tên điểm du lịch</th>
            <th>Tên thành phố</th>
            <th>Đặc trưng</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody id="danhSachDiemDuLich">

    </tbody>


</table>

<div id="thongBao"></div>
<div id="chiTietDiemDuLich">
    Mã điểm du lịch <input type='text' id='maDDL' /><br>
    Tên điểm du lịch <input type='text' id="tenDDL" /><br>
    Tên thành phố
    <select id='maTTP'>
        <?php
        include './connect.php';
        $res = $conn->query("SELECT * FROM TINHTP");
        while ($row = $res->fetch_row()) {
            echo "<option value='$row[0]'>$row[1]</option>";
        }
        $conn->close();
        ?>
    </select><br>
    Đặc trưng <input type='text' id="dacTrung" /><br>
    <button id='btnUpdate'>Cập nhật</button>
</div>

<script>
    $('#chiTietDiemDuLich').hide();
    $.get('lietKeDiemDuLich.php', function(data, status) {
        if (status === 'success') {
            $('#danhSachDiemDuLich').html(data);

            $('.btnView').click(function() {
                const maDDL = $(this).attr("maDDL");
                $.post('layDiemDuLichTheoMa.php', {
                    maDDL: maDDL
                }, function(data, status) {
                    if (status === 'success') {
                        $('#chiTietDiemDuLich').show();
                        const _data = JSON.parse(data)[0];
                        $('#maDDL').val(_data.MaDDL);
                        $('#tenDDL').val(_data.TenDDL);
                        $('#maTTP').val(_data.MaTTP);
                        $('#dacTrung').val(_data.Dactrung);
                    }
                })
            })

            $('.btnDelete').click(function() {
                const maDDL = $(this).attr("maDDL");
                $(this).parent().parent().remove();
                $.post('xoaDiemDuLich.php', {
                    maDDL: maDDL
                }, function(data, status) {
                    if (status === 'success') {
                        $('#thongBao').html("Xóa thành công!");
                    }
                })
            })
        }
    })

    $('#btnUpdate').click(function() {
        let maDDL = $('#maDDL').val();
        let tenDDL = $('#tenDDL').val();
        let maTTP = $('#maTTP').val();
        let dacTrung = $('#dacTrung').val();

        console.log(maDDL, tenDDL, maTTP, dacTrung);

        $.post('capNhatDDL.php', {
            maDDL: maDDL,
            tenDDL: tenDDL,
            maTTP: maTTP,
            dacTrung: dacTrung,
        }, function(data, status) {
            if (status === 'success') {
                $("#thongBao").html("Cập nhật thành công");
            }
        })
    })
</script>