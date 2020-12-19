@extends('admin.layouts.default')

@section('content')
    <form action="{{ route('print.laporan') }}" method="GET">
        <div class="input-group mb-3 col-md-4 float-right">
            <input type="input" name="date" id="dates" class="form-control">
            <div class="input-group-append">
                <button class="btn btn-warning" type="submit">
                    <i class="fa fa-print"></i>
                    Cetak
                </button>
            </div>

        </div>
    </form>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Daftar Transaksi Masuk</strong>
                        </div>
                        <div class="card-body">

                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Kode Tansaksi</th>
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
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $item->uuid }}</td>
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
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="clearfix"></div>

@endsection

@push('after-script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        });

    </script>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css" />

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>

    {{-- datatables lama --}}
    {{-- <script src="{{ asset('admin/assets/js/lib/data-table/dataTables.min.js') }}">
    </script> --}}
    {{-- datatables lama end --}}
    <script src="{{ asset('admin/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>

    <script src="{{ asset('admin/assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>

    <script src="{{ asset('admin/assets/js/lib/data-table/buttons.bootstrap.min.js') }}">
    </script>
    <script src="{{ asset('admin/assets/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/init/datatables-init.js') }}"></script>

    {{-- date pciker --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $('input[id="dates"]').daterangepicker();

    </script>

@endpush

@push('after-style')
    {{-- date pciker --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

@endpush
