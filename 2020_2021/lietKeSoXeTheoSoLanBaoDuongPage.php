<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <h3>Liệt kê</h3>
    <div>
        Chọn số lần bảo dưỡng <input type="number" id="soLanBaoDuong">
    </div>
    <table border="1">
        <thead>
            <tr>
                <th>Họ tên khách hàng</th>
                <th>Số xe</th>
                <th>Số lần bảo dưỡng</th>
            </tr>
        </thead>
        <tbody id="ketQua">

        </tbody>
    </table>

    <script>
        $('#soLanBaoDuong').keydown(function(e) {
            if (e.key === 'Enter') {
                $.post('lietKeSoXeAjax.php', {
                    soLanBaoDuong: $(this).val(),
                }, function(data, status) {
                    if (status === 'success') {
                        $('#ketQua').html(data);
                    }
                })
            }
        })
    </script>
</body>