@extends('user.layouts.default')

@section('contentuser')

    <!-- catg header banner section -->
    <section id="aa-catg-head-banner">
        <img src="{{ asset('user/img/img-banner.jpg') }}" alt="fashion img" style="width: 100%; height: 300px;">
        <div class="aa-catg-head-banner-area">
            <div class="container">
                <div class="aa-catg-head-banner-content">
                    <h2>Checkout Page</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('user.home') }}">Home</a></li>
                        <li class="active">Checkout</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- / catg header banner section -->

    @guest
        <!-- Cart view section -->
        <section id="checkout">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="checkout-area">
                            @include('layouts.flash-message')
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="checkout-left">
                                        <div class="panel-group" id="accordion">
                                            <!-- Login section -->
                                            <div class="panel panel-default aa-checkout-login">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                            Login
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseTwo" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <form method="POST" action="{{ route('login') }}">
                                                            @csrf

                                                            <div class="form-group row">
                                                                <label for="email"
                                                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                                <div class="col-md-6">
                                                                    <input id="email" type="email"
                                                                        class="form-control @error('email') is-invalid @enderror"
                                                                        name="email" value="{{ old('email') }}"
                                                                        autocomplete="email" autofocus>
                                                                    @error('email')
                                                                        <span class="invalid-feedback text-danger" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="password"
                                                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                                <div class="col-md-6">
                                                                    <input id="password" type="password"
                                                                        class="form-control @error('password') is-invalid @enderror"
                                                                        name="password" autocomplete="current-password">

                                                                    @error('password')
                                                                        <span class="invalid-feedback text-danger" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-md-6 offset-md-4">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="remember" id="remember"
                                                                            {{ old('remember') ? 'checked' : '' }}>

                                                                        <label class="form-check-label" for="remember">
                                                                            {{ __('Remember Me') }}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row mb-0">
                                                                <div class="col-md-8 offset-md-4">
                                                                    <button type="submit" class="btn btn-primary">
                                                                        {{ __('Login') }}
                                                                    </button>

                                                                    @if (Route::has('password.request'))
                                                                        <a class="btn btn-link"
                                                                            href="{{ route('password.request') }}">
                                                                            {{ __('Forgot Your Password?') }}
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <a href="{{ route('register') }}" class="btn btn-warning">
                                                            Register</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <h4>Order Summary</h4>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="proceed-checkout">
                                                <ul>
                                                    <li class="subtotal">ID Transaction
                                                        <span>#{{ 'TRX' . mt_rand(10000, 99999) . mt_rand(100, 999) }}</span>
                                                    </li>
                                                    <li class="subtotal mt-3">Harga <span>Rp.
                                                            @currency($items->price)</span></li>
                                                    @php
                                                        $dp = $items->price / 2;
                                                    @endphp
                                                    <li class="subtotal mt-3">Down Payment <span>Rp.
                                                            @currency($dp)</span></li>
                                                    <li class="subtotal mt-3">Bank Transfer <span>Mandiri</span></li>
                                                    <li class="subtotal mt-3">No. Rekening <span>2208 1996 1403</span></li>
                                                    <li class="subtotal mt-3">Nama Penerima <span>Aristo Fotografi</span>
                                                    </li>
                                                </ul>
                                                <input type="submit" value="Pesan Sekarang" class="proceed-btn col-md-12">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- / Cart view section -->
    @else
        <!-- Cart view section -->
        <section id="checkout">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="checkout-area">
                            @include('layouts.flash-message')
                            <form action="{{ route('transaction-user.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="checkout-left">
                                            <div class="panel-group" id="accordion">
                                                <!-- Billing Details -->
                                                <div class="panel panel-default aa-checkout-billaddress">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion"
                                                                href="#collapseThree">
                                                                Billing Details
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree" class="panel-collapse collapse">
                                                        <div class="panel-body">

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="aa-checkout-single-bill">
                                                                        <input type="text" name="product_id"
                                                                            value="{{ $items->id }}" hidden readonly>
                                                                        <input type="text" name="user_id"
                                                                            value="{{ Auth::user()->id }}" hidden readonly>
                                                                        <input type="text" name="uuid"
                                                                            value="{{ 'TRX' . mt_rand(10000, 99999) . mt_rand(100, 999) }}"
                                                                            hidden readonly>
                                                                        <input type="text" placeholder="Name*"
                                                                            class="@error('name') is-invalid @enderror"
                                                                            name="name" value="{{ Auth::user()->name }}"
                                                                            readonly>
                                                                        @error('name')
                                                                            <small class="form-text text-muted">{{ $message }}
                                                                            </small>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="aa-checkout-single-bill">
                                                                        <input type="email" placeholder="email*"
                                                                            class="@error('email') is-invalid @enderror"
                                                                            name="email" value="{{ Auth::user()->email }}"
                                                                            readonly>
                                                                        @error('email')
                                                                            <small class="form-text text-muted">
                                                                                {{ $message }}
                                                                            </small>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="aa-checkout-single-bill">
                                                                        <textarea cols="8" rows="3" name="address"
                                                                            class="@error('address') is-invalid @enderror"
                                                                            placeholder="Alamat*"></textarea>
                                                                        @error('address')
                                                                            <small
                                                                                class="form-text text-danger">{{ $message }}</small>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="aa-checkout-single-bill">
                                                                        <input type="text" name="date"
                                                                            class="@error('date') is-invalid @enderror"
                                                                            placeholder=" Pilih Tanggal">
                                                                        <small>*Pilih Tanggal Sesi Foto H+2</small>
                                                                        <br>
                                                                        @error('date')
                                                                            <small
                                                                                class="form-text text-danger">{{ $message }}</small>
                                                                        @enderror
                                                                        <input type="text" name="transaction_status"
                                                                            value="PENDING" readonly hidden>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="aa-checkout-single-bill">
                                                                        <input type="tel" name="number" id="cc"
                                                                            placeholder="Nomor Hp/wa"
                                                                            class="@error('number') is-invalid @enderror">
                                                                        <small>Format: 086445607890</small><br>
                                                                        @error('number')
                                                                            <small
                                                                                class="form-text text-danger">{{ $message }}
                                                                            </small>
                                                                        @enderror
                                                                        <input type="number" name="transaction_price"
                                                                            value="{{ $items->price }}" readonly hidden>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    {{-- ss --}}
                                                                    <label>Bukti Transfer</label>
                                                                    <input type="file" name="photo"
                                                                        onchange="previewFile(this);"
                                                                        class="@error('photo') is-invalid @enderror"
                                                                        value="{{ old('photo') }}" accept="image/*">
                                                                    @error('photo')
                                                                        <small class="form-text text-danger">{{ $message }}
                                                                        </small>
                                                                    @enderror
                                                                    <img id="previewImg"
                                                                        src="https://static.remove.bg/remove-bg-web/3b88866d32d310b59bcf27d93297634aa540fbed/assets/logo-footer-kaleido-e1e7a09f241f4fc02fda8c2dd90701fe98ef328c3b1a94d513db891605e377ce.svg"
                                                                        alt="Placeholder">
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <h4>Order Summary</h4>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="proceed-checkout">
                                                    <ul>
                                                        <li class="subtotal">ID Transaction
                                                            <span>#{{ 'TRX' . mt_rand(10000, 99999) . mt_rand(100, 999) }}</span>
                                                        </li>
                                                        <li class="subtotal mt-3">Harga <span>Rp.
                                                                @currency($items->price)</span></li>
                                                        @php
                                                            $dp = $items->price / 2;
                                                        @endphp
                                                        <li class="subtotal mt-3">Down Payment <span>Rp.
                                                                @currency($dp)</span></li>
                                                        <li class="subtotal mt-3">Bank Transfer <span>Mandiri</span></li>
                                                        <li class="subtotal mt-3">No. Rekening <span>2208 1996 1403</span></li>
                                                        <li class="subtotal mt-3">Nama Penerima <span>Aristo Fotografi</span>
                                                        </li>
                                                    </ul>
                                                    <input type="submit" value="Pesan Sekarang" class="proceed-btn col-md-12">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-4">
                                        <div class="checkout-right">
                                            <h4>Order Summary</h4>
                                            <div class="aa-order-summary-area">
                                                <table class="table table-responsive">
                                                    <thead>
                                                        <tr>
                                                            <th>Jenis Foto</th>
                                                            <th>Harga</th>
                                                            <th>Dp</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $items->name }}</td>
                                                            <td>Rp. @currency($items->price)</td>
                                                            <td>Rp. @currency($items->price)</td>
                                                        </tr>
                                                    </tbody>

                                                </table>
                                            </div>
                                            <div class="aa-payment-method">
                                                <input type="submit" value="Pesan Sekarang" class="aa-browse-btn">
                                            </div>

                                        </div>
                                    </div> --}}

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- / Cart view section -->
    @endguest

@endsection

@push('after-style')
    <link href="{{ asset('user/css/style2.css') }}" rel="stylesheet">
    <script>
        $('#cc').inputmask("9999 9999 9999")

    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                    $("#previewImg").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        }

    </script>
@endpush

@push('after-script')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script>
        $(function() {
            $('input[name="date"]').daterangepicker({
                singleDatePicker: true,
                timePicker: true,
                timePicker24Hour: true,
                timePickerIncrement: 60,
                locale: {
                    format: 'YYYY/MM/DD HH:mm:ss'
                }
            });
        });

    </script>
@endpush
