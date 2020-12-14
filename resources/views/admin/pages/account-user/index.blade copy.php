@extends('admin.layouts.default')

@section('content')

    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">
                            Daftar Jenis Foto
                        </h4>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Jenis</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($items as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>
                                                    {{ $item->is_admin === 1 ? 'Admin' : 'User' }}
                                                </td>
                                                {{-- <td>{{ $item->price }}</td>
                                                --}}
                                                <td>
                                                    @if ($item->is_admin === 1)
                                                        {{-- <form
                                                            action="{{ route('products.destroy', $item->id) }}" method="POST"
                                                            class="d-inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button disabled class="btn btn-danger btn-sm">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form> --}}

                                                        <a href="#mymodal"
                                                            data-remote="{{ route('user-accounts.show', $item->id) }}"
                                                            data-toggle="modal" data-target="#mymodal"
                                                            data-title="DELETE CONFIRMATION!!!"
                                                            class="btn disabled btn-danger btn-sm">
                                                            <i class="fa fa-trash "></i>
                                                        @else
                                                            <a href="#mymodal"
                                                                data-remote="{{ route('user-accounts.show', $item->id) }}"
                                                                data-toggle="modal" data-target="#mymodal"
                                                                data-title="DELETE CONFIRMATION!!!"
                                                                class="btn btn-danger btn-sm">
                                                                <i class="fa fa-trash "></i>
                                                    @endif


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
