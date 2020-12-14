@extends('admin.layouts.default')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 ">
            <div class="card">
                <div class="card-header">
                    <strong>Tambah Jenis Foto</strong>
                </div>
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-2">
                                <label for="text-input" class=" form-control-label">Nama Jenis Foto</label>
                            </div>
                            <div class="col-12 col-md-10">
                                <input type="name2" name="name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}">
                                @error('name')
                                <small class="form-text text-muted">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2">
                                <label for="type" class=" form-control-label">Kategori</label>
                            </div>
                            <div class="col-12 col-md-10">
                                <input type="text" name="type" class="form-control @error('type') is-invalid @enderror"
                                    value="{{ old('type') }}">
                                @error('type')
                                <small class="form-text text-muted">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-2">
                                <label for="description" class=" form-control-label">Deskripsi</label>
                            </div>
                            <div class="col-12 col-md-10">
                                <textarea name="description"
                                    class="form-control ckeditor @error('description') is-invalid @enderror">{{ old('description') }}
                                </textarea>
                                @error('description')
                                <small class="form-text text-muted">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-2">
                                <label for="price" class=" form-control-label">Harga</label>
                            </div>
                            <div class="col-12 col-md-10">
                                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                                    value="{{ old('price') }}">
                                @error('price')
                                <small class="form-text text-muted">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="ti-save"></i> Simpan
                            </button>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection
