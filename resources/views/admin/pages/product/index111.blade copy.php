@extends('admin.layouts.default')

@section('content')
    <div class="row form-group">
        <input type="text" name="search" id="search" class="form-control col-sm-3" placeholder="Cari Jenis Foto........" />
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
                            Daftar Jenis Foto
                        </h4>

                        {{-- <form action="3" method="GET">
                            <input class="btn btn-primary btn-sm" type="submit" value="CARI">
                            <input class="col col-md-2" type="text" name="cari" placeholder="Cari Jenis Foto..."
                                value="{{ old('cari') }}">
                        </form> --}}
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Jenis Foto</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody style="position: center">

                                        @forelse ($items as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->type }}</td>
                                                <td>Rp. @currency($item->price)</td>
                                                {{-- <td>{{ $item->price }}</td>
                                                --}}
                                                <td class="text-center">

                                                    <a href="{{ route('products.gallery', $item->id) }}"
                                                        class="btn btn-info btn-sm">
                                                        <i class="fa fa-picture-o"></i>
                                                    </a>
                                                    <a href="{{ route('products.edit', $item->id) }}"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil  "></i>
                                                    </a>
                                                    {{-- <form
                                                        action="{{ route('products.destroy', $item->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form> --}}

                                                    <a href="#mymodal" data-remote="{{ route('products.show', $item->id) }}"
                                                        data-toggle="modal" data-target="#mymodal"
                                                        data-title="DELETE CONFIRMATION!!!" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash "></i>
                                                    </a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- ajax seach bar --}}

@push('after-script')
    <script>
        $(document).ready(function() {

            fetch_customer_data();

            function fetch_customer_data(query = '') {
                $.ajax({
                    url: "{{ route('live_search.product') }}",
                    method: 'GET',
                    data: {
                        query: query
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('tbody').html(data.table_data);
                    }
                })
            }

            $(document).on('keyup', '#search', function() {
                var query = $(this).val();
                fetch_customer_data(query);
            });
        });

    </script>
@endpush
{{-- end ajax seach bar --}}
