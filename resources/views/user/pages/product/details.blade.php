@extends('user.layouts.default')

@section('contentuser')

    <!-- catg header banner section -->
    <section id="aa-catg-head-banner">
        <img src="{{ asset('user/img/img-banner.jpg') }}" alt="fashion img" style="width: 100%; height: 250px;">
        <div class="aa-catg-head-banner-area">
            <div class="container">
                <div class="aa-catg-head-banner-content">
                    <h2>{{ $product->name }}</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('user.home') }}">Home</a></li>
                        <li class="active">{{ $product->name }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- / catg header banner section -->

    <!-- product category -->
    <section id="aa-product-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-product-details-area">
                        <div class="aa-product-details-content">
                            <div class="row">
                                <!-- Modal view slider -->
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <div class="aa-product-view-slider">
                                        <div id="demo-1" class="simpleLens-gallery-container">
                                            <div class="simpleLens-container">
                                                <div class="simpleLens-big-image-container">
                                                    @forelse ($items as $item)
                                                        @if ($item->is_default == 1)
                                                            <a data-lens-image="{{ url($item->photo) }}"
                                                                class="simpleLens-lens-image">
                                                                <img src="{{ url($item->photo) }}" class="simpleLens-big-image"
                                                                    style="width: 100%; height: 250px">
                                                            </a>
                                                        @endif
                                                    @empty

                                                    @endforelse
                                                </div>
                                            </div>
                                            <div class="simpleLens-thumbnails-container row">
                                                @foreach ($items as $item)
                                                    <a data-big-image="{{ url($item->photo) }}"
                                                        data-lens-image="{{ url($item->photo) }}"
                                                        class="simpleLens-thumbnail-wrapper" href="#">
                                                        <img src="{{ url($item->photo) }}"
                                                            style="width: 45px; height: 55px;">
                                                    </a>

                                                @endforeach
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <!-- Modal view content -->
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <div class="aa-product-view-content">
                                        <h3>{{ $item->product->name }}</h3>
                                        <div class="aa-price-block">
                                            <h3 class="detail-price">
                                                Rp. @currency($item->product->price)
                                            </h3>

                                        </div>
                                        <div class="aa-prod-quantity">
                                            <p class="aa-prod-category">
                                                Category: <a href="#">{{ $item->product->type }}</a>
                                            </p>
                                        </div>
                                        @if (Route::has('login'))
                                            @auth
                                                <a class="aa-add-to-cart-btn"
                                                    href="{{ route('user.booking', $item->product->id) }}">
                                                    Pesan Sekarang</a>
                                            @else
                                                <a class="aa-add-to-cart-btn"
                                                    href="{{ route('user.booking.guest', $item->product->id) }}">
                                                    Pesan Sekarang</a>
                                            @endauth

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="aa-product-details-bottom">
                            <ul class="nav nav-tabs" id="myTab2">
                                <li><a href="#description" data-toggle="tab">Description</a></li>
                                <li><a href="#review" data-toggle="tab">Reviews</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="description">
                                    <p>{!! $item->product->description !!}</p>
                                </div>
                                <div class="tab-pane fade " id="review">
                                    <div class="aa-product-review-area">
                                        <h4>Pelanggan yang Melalakukan Transaksi Jenis Foto {{ $product->name }}</h4>
                                        <ul class="aa-review-nav">
                                            @forelse ($transaction as $t)
                                                <li>
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <img class="media-object" src="{{ url('user/img/user-male.png') }}"
                                                                alt="girl image">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">
                                                                <strong>{{ $t->user->name }}</strong>
                                                                -
                                                                <span>
                                                                    {{ \Carbon\Carbon::parse($t->date)->format('d/m/Y') }}
                                                                </span>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </li>
                                            @empty
                                                <li>
                                                    belum ada transaksi
                                                </li>
                                            @endforelse

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- / product category -->

    <div class="container">
        @include('user.pages.product.rekomendasi')
    </div>
@endsection
