<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div>
        Số lượng khách hàng<input type='number' name='sl' id='sl' /> <br>
    </div>
    <h3>3 khách hàng có số tiền thuê nhiều nhất</h3>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã khách hàng</th>
                <th>Tên khách hàng</th>
                <th>Tổng tiền thuê</th>
            </tr>
        </thead>
        <tbody id="list_kh">

        </tbody>
    </table>
    <script>
        $("#sl").keydown(function(e) {
            if (e.key === 'Enter') {
                let sl = +$(this).val();
                $.post('xemKhachHangAjax.php', {
                    sl: sl
                }, function(data, status) {
                    if (status === 'success') {
                        $('#list_kh').html(data);
                    }
                })
            }
        })
    </script>
</body>