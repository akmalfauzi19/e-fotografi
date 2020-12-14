@extends('admin.layouts.default')

@section('content')
    <div class="row form-group">
        <input type="text" name="search" id="search" class="form-control col-sm-3" placeholder="Cari Transaksi ..." />
        <div class="input-group-addon">
            <span class="fa fa-search fa-lg" data-toggle="popover" data-container="body" data-html="true"
                data-title="Security Code"
                data-content="<div class='text-center one-card'>The 3 digit code on back of the card..<div class='visa-mc-cvc-preview'></div></div>"
                data-trigger="hover"></span>
        </div>
    </div>
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">
                            Daftar Transaksi Masuk
                        </h4>
                        <div class="text-right">
                            <a href="{{ route('print.laporan') }}" class="btn btn-primary btn-sm" target="_blank">
                                <i class="fa fa-print">
                                    Cetak Laporan</i>
                            </a>
                        </div>
                        &nbsp;
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr class="text-center">
                                            <th>Nama</th>
                                            <th>Nomor</th>
                                            <th>Tanggal Sesi Foto</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Cetak Invoice</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($items as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->number }}</td>
                                                <td>{{ $item->date }}</td>
                                                <td>Rp. @currency($item->transaction_price)</td>
                                                <td>
                                                    @if ($item->transaction_status == 'PENDING')
                                                        <span class="badge badge-info">
                                                            {{ $item->transaction_status }}
                                                        </span>
                                                    @elseif($item->transaction_status == "SUCCESS")
                                                        <span class="badge badge-success">
                                                            {{ $item->transaction_status }}
                                                        </span>
                                                    @elseif($item->transaction_status == "FAILED")
                                                        <span class="badge badge-danger">
                                                            {{ $item->transaction_status }}
                                                        </span>
                                                    @else
                                                        <span>
                                                            {{ $item->transaction_status }}
                                                        </span>
                                                    @endif
                                                </td>
                                                @if ($item->transaction_status == 'SUCCESS')
                                                    <td class="text-center">
                                                        <a href="{{ route('print.invoice', $item->id) }}"
                                                            class="btn btn-primary btn-sm" target="_blank">
                                                            <i class="fa fa-print"></i>
                                                        </a>
                                                    </td>
                                                @else
                                                    <td class="text-center">
                                                        <a href="{{ route('print.invoice', $item->id) }}"
                                                            class="btn disabled btn-primary btn-sm">
                                                            <i class="fa fa-print"></i>
                                                        </a>
                                                    </td>
                                                @endif

                                                <td>
                                                    @if ($item->transaction_status == 'PENDING')

                                                        <a href="{{ route('transactions.status', $item->id) }}?status=SUCCESS"
                                                            class="btn btn-success btn-sm">
                                                            <i class="fa fa-check"></i>
                                                        </a>
                                                        <a href="{{ route('transactions.status', $item->id) }}?status=FAILED"
                                                            class="btn btn-warning btn-sm">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    @endif
                                                    {{-- <a
                                                        href="{{ route('transactions.show', $item->id) }}"
                                                        class="btn btn-info btn-sm">
                                                        <i class="fa fa-picture-o"></i>
                                                    </a> --}}

                                                    <a href="#mymodal" data-remote="{{ route('transactions.show', $item->id) }}"
                                                        data-toggle="modal" data-target="#mymodal"
                                                        data-title="Detail Transaksi {{ $item->uuid }}"
                                                        class="btn btn-info btn-sm">
                                                        <i class="fa fa-eye  "></i>
                                                    </a>
                                                    <a href="{{ route('transactions.edit', $item->id) }}"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    {{-- <form
                                                        action="{{ route('transactions.destroy', $item->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form> --}}

                                                    <a href="#mymodal"
                                                        data-remote="{{ route('transactions.showdelete', $item->id) }}"
                                                        data-toggle="modal" data-target="#mymodal"
                                                        data-title="DELETE CONFIRMATION!!!" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash "></i>
                                                </td>

                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">
                                                    Data tidak tersedia
                                                </td>
                                            </tr>
                                        @endforelse


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="text-center">
                            {{ $items->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
