@extends('admin.layouts.default')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 ">
            <div class="card">
                <div class="card-header">
                    <strong>Tambah Foto Galleri</strong>
                </div>
                <form action="{{ route('product-galleries.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-2">
                                <label for="text-input" class=" form-control-label">Nama Jenis Foto</label>
                            </div>
                            <div class="col-12 col-md-10">
                                <select name="products_id"
                                    class="form-control @error('products_id')
                                                                                                                                                                is-invalid @enderror">
                                    @foreach ($products as $item)
                                        <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                    @endforeach
                                </select>
                                @error('products_id')
                                <small class="form-text text-muted">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-2">
                                <label for="photo" class=" form-control-label">Foto</label>
                            </div>
                            <div class="col-12 col-md-10">
                                <input type="file" name="photo"
                                    class="form-control-file @error('photo') is-invalid @enderror"
                                    value="{{ old('photo') }}" accept="image/*">
                                @error('photo')
                                <small class="form-text text-muted">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col col-md-2">
                                <label for="is_default" class=" form-control-label">Jadikan Gambar Utama</label>
                            </div>
                            <div class="col-12 col-md-10">
                                &nbsp; &nbsp; &nbsp;
                                <label class="form-check-label ">
                                    <input type="radio" name="is_default"
                                        class="form-check-input @error('is_default') is-invalid @enderror" value="1">Ya
                                </label>
                                &nbsp; &nbsp; &nbsp;
                                <label class="form-check-label ">
                                    <input type="radio" name="is_default"
                                        class="form-check-input @error('is_default') is-invalid @enderror" value="0">Tidak
                                </label>
                                @error('is_default')
                                <small class="form-text text-muted">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fa fa-download"></i> Tambah Foto Galleri
                            </button>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection
