<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota Transaksi</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: #333;
            text-align: left;
            font-size: 18px;
            margin: 0;
        }

        .container {
            margin: 0 auto;
            margin-top: 35px;
            padding: 40px;
            width: 750px;
            height: auto;
            background-color: #fff;
        }

        caption {
            font-size: 28px;
            margin-bottom: 15px;
        }

        table {
            border: 1px solid #333;
            border-collapse: collapse;
            margin: 0 auto;
            width: 740px;
        }

        td,
        tr,
        th {
            padding: 12px;
            border: 1px solid #333;
            width: 185px;
        }

        th {
            background-color: #f0f0f0;
        }

        h4,
        p {
            margin: 0px;
        }

    </style>
</head>

<body>
    <div class="container">
        <table>
            <caption>
                Aristo Fotografi Invoice
            </caption>
            <thead>
                <tr>
                    <th colspan="2">Invoice<strong>#{{ $items->uuid }}</strong></th>
                    <th colspan="2">{{ $items->created_at->format('D, d M Y') }}</th>
                </tr>
                <tr>
                    <td colspan="2">
                        <h4>Perusahaan: </h4>
                        <p>Aristo Fotografi.<br>
                            Gg. 18, Tirto, Kec. Pekalongan Barat, Kota Pekalongan, Jawa Tengah 51151<br>
                            085343966997<br>
                            aristo@gmail.com
                        </p>
                    </td>
                    <td colspan="2">
                        <h4>Pelanggan: </h4>
                        <p>{{ $items->user->name }}<br>
                            {{ $items->address }} <br>
                            {{ $items->number }} <br>
                            {{ $items->user->email }}
                        </p>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th colspan="2">Jenis Foto</th>
                    <th>Status</th>
                    <th>Harga</th>
                </tr>
                @foreach ($items->details as $detail)
                    <tr>
                        <td colspan="2">{{ $detail->product->name }}</td>
                        <td>{{ $items->transaction_status }}</td>
                        <td>Rp. @currency($detail->product['price'])</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total</th>
                    <td colspan="3">Rp. @currency($detail->product['price'])</td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>

</html>
