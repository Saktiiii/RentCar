<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 30px;
            color: #000;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        thead {
            border-bottom: 2px solid #000;
        }
        th, td {
            padding: 8px 10px;
            text-align: left;
            vertical-align: top;
        }
        th {
            font-weight: bold;
        }
        tbody tr:not(:last-child) {
            border-bottom: 1px solid #ccc;
        }
        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>
    <h2>Laporan Transaksi</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>No Polisi</th>
                <th>Nama Pemesan</th>
                <th>Alamat</th>
                <th>Lama</th>
                <th>Tgl Pesan</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transaksi as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->mobil->nopolisi }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>{{ $data->lama }}</td>
                    <td>{{ \Carbon\Carbon::parse($data->tgl_pesan)->format('Y-m-d') }}</td>
                    <td class="text-right">{{ number_format($data->total, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center;">Data Transaksi belum tersedia</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
