<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <td>{{ $item->user->name }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $item->user->email }}</td>
    </tr>
    <tr>
        <th>Tanggal Sesi Foto</th>
        <td>{{ $item->date }}</td>
    </tr>
    <tr>
        <th>Nomor</th>
        <td>{{ $item->number }}</td>
    </tr>
    <tr>
        <th>Status Transaksi</th>
        <td>{{ $item->transaction_status }}</td>
    </tr>
    <tr>
        <th>Down Payment</th>
        <td>
            <img style="width: 50%" src="{{ url('storage/' . $item->photo) }}" alt="Bukti-{{ $item->uuid }}">
        </td>
    </tr>
    <tr>
        <th>Jenis Sesi Foto yang Dipilih</th>
        <td>
            <table class="tabble table-bordered w-100">
                <tr>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                </tr>
                @foreach ($item->details as $detail)
                    <tr>
                        <td>{{ $detail->product->name }}</td>
                        <td>{{ $detail->product->type }}</td>
                        <td>Rp. @currency($detail->product['price'])</td>
                    </tr>
                @endforeach
            </table>
        </td>
    </tr>
</table>

<div class="row">

    <div class="col-4">
        <a href="{{ route('transactions.status', $item->id) }}?status=SUCCESS" class="btn btn-success btn-block">
            <i class="fa fa-check"></i> Set Sukses
        </a>
    </div>

    <div class="col-4">
        <a href="{{ route('transactions.status', $item->id) }}?status=FAILED" class="btn btn-warning btn-block">
            <i class="fa fa-times"></i> Set Gagal
        </a>
    </div>

    <div class="col-4">
        <a href="{{ route('transactions.status', $item->id) }}?status=PENDING" class="btn btn-info btn-block">
            <i class="fa fa-spinner"></i> Set Pending
        </a>
    </div>

</div>
