@extends('admin.layouts.default')

@section('content')

    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Restored Transaksi Masuk</strong>
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
                                            <td class="text-center">
                                                <a href="{{ route('transactions.setrestored', $item->id) }}?deleted_at=NULL"
                                                    class="btn btn-success btn-sm">
                                                    <i class="fa fa-undo"></i>
                                                </a>
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




@endpush
