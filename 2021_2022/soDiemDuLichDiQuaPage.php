<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div>
        Số điểm du lịch đi qua <input type="number" id="soDiemDuLich">
    </div>
    <div>
        Số điểm du lịch mà Các tour đi qua
        <table border="1" cellspacing='0'>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên tour</th>
                    <th>Số điểm du lịch</th>
                </tr>
            </thead>
            <tbody id="danhSachDiemDuLich">

            </tbody>
        </table>
    </div>

    <script>
        $('#soDiemDuLich').keydown(function(e) {
            if (e.key === 'Tab') {
                const soDiemDuLich = +$(this).val();
                $.post('soDiemDuLichDiQua.php', {
                    soDiemDuLich: soDiemDuLich,
                }, function(data, status) {
                    if (status === 'success') {
                        console.log($('#danhSachDiemDuLich'))
                        $('#danhSachDiemDuLich').html(data);
                    }
                })
            }
        })
    </script>
</body>