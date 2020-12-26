@extends('user.layouts.default')

@section('contentuser')

    <!-- catg header banner section -->
    <!-- catg header banner section -->
    <section id="aa-catg-head-banner">
        <img src="{{ asset('user/img/img-banner.jpg') }}" alt="fashion img" style="width: 100%; height: 300px;">
        <div class="aa-catg-head-banner-area">
            <div class="container">
                <div class="aa-catg-head-banner-content">
                    <h2>Status Transaction</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('user.home') }}">Home</a></li>
                        <li class="active">Status Transaction</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section id="aa-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-contact-area">
                        <div class="aa-contact-top">
                            <h2>Status Transaksi</h2>
                            @include('layouts.flash-message')
                        </div>
                        <!-- Contact address -->
                        <div class="aa-contact-address">
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Tanggal Sesi Foto</th>
                                                <th>Alamat</th>
                                                <th>Harga</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($items as $item)
                                                <tr>
                                                    <td>{{ $item->date }}</td>
                                                    <td style="text-align: left;">{{ $item->address }}</td>
                                                    <td style="text-align: left;">Rp. @currency($item->transaction_price)</td>

                                                    <td>
                                                        @if ($item->transaction_status == 'PENDING')
                                                            <span class="badge badge-pill badge-info"
                                                                style="background-color: cyan;">
                                                                {{ $item->transaction_status }}
                                                            </span>
                                                        @elseif($item->transaction_status == "SUCCESS")
                                                            <span class="badge badge-success" style="background-color: green;">
                                                                {{ $item->transaction_status }}
                                                            </span>
                                                        @elseif($item->transaction_status == "FAILED")
                                                            <span class="badge badge-danger" style="background-color: red;">
                                                                {{ $item->transaction_status }}
                                                            </span>
                                                        @else
                                                            <span>
                                                                {{ $item->transaction_status }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">
                                                        Data transaksi tidak ada
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('after-script')
    {{--
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"> </script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"> </script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

    </script>

@endpush
