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
                                <div class="col-md-4">
                                    <div class="checkout-right">
                                        <h4>Order Summary</h4>
                                        <div class="aa-order-summary-area">
                                            <table class="table table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th>Jenis Foto</th>
                                                        <th>Harga</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{{ $items->name }}</td>
                                                        <td>Rp. @currency($items->price)</td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                        <h4>Pesan Sekarang</h4>
                                        <div class="aa-payment-method">
                                            <input type="submit" value="Place Order" class="aa-browse-btn">
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
                            <form action="{{ route('transaction-user.store') }}" method="POST">
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
                                                                        <input type="date" name="date"
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
                                                                        <input type="number" name="number"
                                                                            placeholder="Nomor Hp/wa"
                                                                            class="@error('number') is-invalid @enderror">
                                                                        <small>Format: 086445607890</small><br>
                                                                        @error('number')
                                                                            <small class="form-text text-danger">{{ $message }}
                                                                            </small>
                                                                        @enderror
                                                                        <input type="number" name="transaction_price"
                                                                            value="{{ $items->price }}" readonly hidden>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkout-right">
                                            <h4>Order Summary</h4>
                                            <div class="aa-order-summary-area">
                                                <table class="table table-responsive">
                                                    <thead>
                                                        <tr>
                                                            <th>Jenis Foto</th>
                                                            <th>Harga</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $items->name }}</td>
                                                            <td>Rp. @currency($items->price)</td>
                                                        </tr>
                                                    </tbody>

                                                </table>
                                            </div>
                                            <div class="aa-payment-method">
                                                <input type="submit" value="Pesan Sekarang" class="aa-browse-btn">
                                            </div>
                                        </div>
                                    </div>
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
