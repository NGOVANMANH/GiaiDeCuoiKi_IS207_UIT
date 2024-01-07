<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <h3>Thêm bảo dưỡng</h3>
    <table>
        <tbody>
            <tr>
                <td>Số xe</td>
                <td>
                    <input type="text" id="soXe">
                </td>
            </tr>
            <tr>
                <td>Họ tên khách</td>
                <td>
                    <input type="text" id="tenKH">
                </td>
            </tr>
            <tr>
                <td>Mã bảo dưỡng</td>
                <td>
                    <input type="text" id="maBaoDuong">
                </td>
            </tr>
            <tr>
                <td>Số KM</td>
                <td>
                    <input type="text" id="soKM">
                </td>
            </tr>
            <tr>
                <td>Nội dung</td>
                <td>
                    <input type="text" id="noiDung">
                </td>
            </tr>
        </tbody>
    </table>

    <button id="themButton">Thêm</button>

    <div id="thongbao"></div>

    <script>
        $('#soXe').change(function() {
            let soXe = $(this).val();
            $.post('layTenKHquaSoXe.php', {
                soXe: soXe
            }, function(data, status) {
                if (status === 'success') {
                    $('#tenKH').val(data);
                }
            })
        })

        $('#themButton').click(function() {
            let soXe = $("#soXe").val();
            let hoTenKH = $('#tenKH').val();
            let maBaoDuong = $('#maBaoDuong').val();
            let soKM = $('#soKM').val();
            let noiDung = $('#noiDung').val();

            $.post('themBaoDuong.php', {
                soXe: soXe,
                maBaoDuong: maBaoDuong,
                soKM: soKM,
                noiDung: noiDung
            }, function(data, status) {
                if (status === 'success') {
                    $('#thongbao').html('<strong>Thêm thành công</strong>')
                } else $('#thongbao').html('Thêm thất bại')
            })

        })
    </script>
</body>