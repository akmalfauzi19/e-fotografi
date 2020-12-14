<!DOCTYPE html>
<html>

<head>
    <title>Hasil Laporan Transaksi</title>
    <link rel="stylesheet" href="{{ public_path('admin/assets/css/bootstrap.min.css') }}"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 10pt;
        }

    </style>
    <center>
        <h5>Laporan Transaksi Aristo Fotorgrafi</h5>
    </center>

    <table class='table table-bordered' style="border: 5px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Transaksi</th>
                <th>Nama</th>
                <th>Nomor</th>
                <th>Tanggal Sesi Foto</th>
                <th>Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @forelse ($items as $item)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $item->uuid }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->number }}</td>
                    <td>{{ $item->date }}</td>
                    <td>Rp. @currency($item->transaction_price)</td>
                    <td>
                        @if ($item->transaction_status == 'PENDING')
                            <p style="color:blue;">
                                {{ $item->transaction_status }}
                            </p>
                        @elseif($item->transaction_status == "SUCCESS")
                            <p style="color:green;">
                                {{ $item->transaction_status }}
                            </p>
                        @elseif($item->transaction_status == "FAILED")
                            <p style="color:red;">
                                {{ $item->transaction_status }}
                            </p>
                        @else
                            <span>
                                {{ $item->transaction_status }}
                            </span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">
                        Belum ada Transaksi yang Dilakukan
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>
