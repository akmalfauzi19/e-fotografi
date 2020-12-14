@extends('admin.layouts.default')

@section('content')
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
             <div class="col-lg-4 col-md-6">
                        <div class="card text-white bg-flat-color-1">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <div><span class="currency float-left mr-1">Rp.</span></div>
                                        <div><span class="">@currency($income)</span></div>
                                    </h3>
                                    <p class="text-light mt-1 m-0">Penghasilan</p>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                    <i class="icon fade-5 icon-lg pe-7s-cash    "></i>
                                </div><!-- /.card-right -->
                            </div>
                        </div>
             </div>


     <!--/.col-->

                    <div class="col-lg-4 col-md-6">
                        <div class="card text-white bg-flat-color-2">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        {{-- <span class="count">{{ $sales }}</span> --}}
                                        <span class="count">{{ $pie['success'] }}</span>
                                    </h3>
                                    <p class="text-light mt-1 m-0">Transaksi Berhasil</p>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                     <i class="icon fade-5 icon-lg pe-7s-graph2"></i>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                    </div>
                    <!--/.col-->
           <div class="col-lg-4 col-md-6">
                        <div class="card text-white bg-flat-color-3">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="count">{{ $user }}</span>
                                    </h3>
                                    <p class="text-light mt-1 m-0">Total clients</p>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                    <i class="icon fade-5 icon-lg pe-7s-users"></i>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                    </div>
        </div>
        <!-- /Widgets -->
        <!--  /Traffic -->
        <div class="clearfix"></div>
        <!-- Orders -->
        <div class="orders">
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Pesanan Terbaru </h4>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Nomor</th>
                                            <th>Tanggal Sesi Foto</th>
                                            <th>Harga</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($items as $item)
                                            <tr>
                                                <td>{{ $number++ }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->number }}</td>
                                                <td>{{ $item->date }}</td>
                                                <td>Rp. @currency($item->transaction_price)</td>
                                                {{-- <td>{{ $item->transaction_price }}</td> --}}
                                                <td class="text-center">
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

                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">
                                                    Data tidak tersedia
                                                </td>
                                            </tr>
                                        @endforelse


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- /.card -->
                </div> <!-- /.col-lg-8 -->

                <div class="col-xl-4">
                    <div class="row">
                        <div class="col-lg-6 col-xl-12">
                            <div class="card br-0">
                                <div class="card-body">
                                    <div class="chart-container ov-h">
                                       <canvas id="pieChart"></canvas>
                                    </div>
                                </div>
                            </div><!-- /.card -->
                        </div>
                    </div>
                </div> <!-- /.col-md-4 -->
             </div>
        </div>
        <!-- /.orders -->
        <!-- /#add-category -->
    </div>
    <!-- .animated -->

@endsection

@push('after-script')
    <script>
           //pie chart
    var ctx = document.getElementById( "pieChart" );
    ctx.height = 300;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ {{ $pie['pending'] }}, {{ $pie['failed'] }}, {{ $pie['success'] }}],
                backgroundColor: [
                                    "#5c6bc0",
                                    "#ef5350",
                                    "#66bb6a"
                                ],
                hoverBackgroundColor: [
                                    "#5c6bc0",
                                    "#ef5350",
                                    "#66bb6a"
                                ]

                            } ],
            labels: [
                            "Pending",
                            "Failed",
                            "Success"
                        ]
        },
        options: {
            responsive: true
        }
    } );
    </script>
@endpush
