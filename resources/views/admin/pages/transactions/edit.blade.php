@extends('admin.layouts.default')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 ">
            <div class="card">
                <div class="card-header">
                    <strong>Edit Transaksi =></strong>&nbsp;
                    <small>{{ $item->uuid }}</small>
                </div>
                <form action="{{ route('transactions.update', $item->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-2">
                                <label for="text-input" class=" form-control-label">Nama Pelanggan</label>
                            </div>
                            <div class="col-12 col-md-10">
                                <input type="name" name="name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') ? old('name') : $item->name }}">
                                @error('name')
                                    <small class="form-text text-muted">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2">
                                <label for="number" class=" form-control-label">Nomor Hp</label>
                            </div>
                            <div class="col-12 col-md-10">
                                <input type="text" name="number" class="form-control @error('number') is-invalid @enderror"
                                    value="{{ old('number') ? old('number') : $item->number }}">
                                @error('number')
                                    <small class="form-text text-muted">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-2">
                                <label for="date" class=" form-control-label">Tanggal</label>
                            </div>
                            <div class="col-12 col-md-10">
                                <input type="datetime-local" name="date"
                                    class="form-control @error('date') is-invalid @enderror"
                                    value="{{ old('date') ? old('date') : $item->date }}">
                                @error('date')
                                    <small class="form-text text-muted">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-2">
                                <label for="transaction_price" class=" form-control-label">Harga</label>
                            </div>
                            <div class="col-12 col-md-10">
                                <input type="number" name="transaction_price"
                                    class="form-control @error('transaction_price') is-invalid @enderror"
                                    value="{{ old('transaction_price') ? old('transaction_price') : $item->transaction_price }}">
                                @error('transaction_price')
                                    <small class="form-text text-muted">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fa fa-download"></i> Ubah Data
                            </button>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection
