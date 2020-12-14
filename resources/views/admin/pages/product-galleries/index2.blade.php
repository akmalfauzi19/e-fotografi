@extends('admin.layouts.default')

@section('content')

    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">
                            Daftar Gallery Foto
                        </h4>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table">
                                    <thead class="table">
                                        <tr>
                                            <th>No</th>
                                            <th>Name Jenis Foto</th>
                                            <th>Foto</th>
                                            <th>Gambar Utama</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($items as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->product->name }}</td>
                                                <td>
                                                    <img src="{{ url($item->photo) }}" alt="">
                                                </td>
                                                <td>{{ $item->is_default ? 'Ya' : 'tidak' }}</td>
                                                <td>
                                                    {{-- <form
                                                        action="{{ route('product-galleries.destroy', $item->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form> --}}


                                                    <a href="#mymodal"
                                                        data-remote="{{ route('product-galleries.show', $item->id) }}"
                                                        data-toggle="modal" data-target="#mymodal"
                                                        data-title="DELETE CONFIRMATION!!!" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
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
                <div class="text-center">
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
