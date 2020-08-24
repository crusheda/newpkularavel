<html>
<head>
    <title>CETAK PENGADAAN RUTIN</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" media="all" crossorigin="anonymous">
    <link href="{{ public_path('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
    </style>
    <center>
        <h4>FORM PENGADAAN BARANG RUTIN</h4>
        <p>KEBUTUHAN UNIT {{ $now }}</p>
    </center>
    <br>
    <p>Tgl : {{ $data['show'][0]->created_at }}</p>
    <table class="table table-bordered table-hover table-sm">
        <thead>
            <tr>
                <th></th>
                <th>Bangsal Lt.3</th>
                <th>Bangsal Lt.4</th>
                <th>Kebidanan</th>
                <th>Perinatologi</th>
                <th>Isolasi</th>
                <th>ICU</th>
            </tr>
        </thead> 
        <tbody>
            <tr>
                <td></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
