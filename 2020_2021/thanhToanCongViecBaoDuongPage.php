<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <h3>Thanh toán</h3>
    <table>
        <tbody>
            <tr>
                <td>
                    Số xe <select type="text" id="soXe">

                    </select>
                </td>
                <td>
                    <table>
                        <tr>
                            <td>Ngày nhận xe</td>
                            <td><input type="date" id="ngayNhanXe"></td>
                        </tr>
                        <tr>
                            <td>Thành tiền</td>
                            <td><input type="number" id="thanhTien"></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <table border="1">
        <thead>
            <tr>
                <th>Tên công việc</th>
                <th>Đơn giá</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody id="danhSachCongViec">

        </tbody>
    </table>
    <button onclick="handleThanhToan()">Thanh toán</button>

    <script>
        function tinhTongTien() {
            let tongTien = 0;
            $('#danhSachCongViec tr').each(function() {
                var soTien = parseFloat($(this).children().eq(1).text());
                tongTien += isNaN(soTien) ? 0 : soTien;
            })
            $('#thanhTien').val(tongTien);
            return tongTien;
        }

        $.get('laySoXeDeXemChiTietBaoDuong.php', function(data, status) {
            if (status === 'success') {
                $('#soXe').html(data);

                $('#soXe').change(function() {
                    let ngayNhanXe = $('#ngayNhanXe').val();
                    $.post('layCongViecTheoSoXeNgayNhanXe.php', {
                        soXe: $('#soXe').val(),
                        ngayNhanXe: ngayNhanXe,
                    }, function(data, status) {
                        if (status === "success") {
                            $('#danhSachCongViec').html(data);
                            tinhTongTien();

                            $('.btnXoa').click(function() {
                                let maCV = $(this).attr("maCV");
                                $(this).parent().parent().remove();
                                tinhTongTien();
                                $.post('xoaChiTietCVTheoMaCV.php', {
                                    maCV: maCV
                                }, function(data, status) {
                                    if (status === 'success') {
                                        checkStatus = true;
                                    }
                                })
                            })
                        }
                    })
                })
            }
        })

        function handleThanhToan() {
            let tongTien = tinhTongTien();
            let soXe = $('#soXe').val();
            $.post('handleThanhToan.php', {
                tongTien: tongTien,
                soXe: soXe
            }, function(data, status) {})
        }
    </script>
</body>