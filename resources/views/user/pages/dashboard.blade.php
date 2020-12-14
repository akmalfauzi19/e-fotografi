@extends('user.layouts.default')

@section('contentuser')

    <!-- Start slider -->
    <section id="aa-slider">
        <div class="aa-slider-area">
            <div id="sequence" class="seq">
                <div class="seq-screen">
                    <ul class="seq-canvas">
                        <!-- single slide item -->
                        <li>
                            <div class="seq-model">
                                <img data-seq src="{{ asset('user/img/slider-1.png') }}" alt="Men slide img" />
                            </div>
                            <div class="seq-title">
                                <h2 data-seq>Grup </h2>
                                <p data-seq>Sahabat bukan tentang siapa yang telah lama kamu kenal, tapi tentang siapa yang
                                    menghampiri hidupmu dan tidak pernah meninggalkanmu dalam situasi dan kondisi seburuk
                                    apa pun
                                </p>
                            </div>
                        </li>
                        <!-- single slide item -->
                        <li>
                            <div class="seq-model">
                                <img data-seq src="{{ asset('user/img/slider-2.png') }}" alt="Wristwatch slide img" />
                            </div>
                            <div class="seq-title">
                                <h2 data-seq>Bayi</h2>
                                <p data-seq>Anak-anak bukanlah buku mewarnai. Anda tak dapat mewarnai mereka sesuka hati
                                    Anda
                                </p>
                            </div>
                        </li>
                        <!-- single slide item -->
                        <li>
                            <div class="seq-model">
                                <img data-seq src="{{ asset('user/img/slider-3.png') }}" alt="Women Jeans slide img" />
                            </div>
                            <div class="seq-title">
                                <h2 data-seq>Keluarga</h2>
                                <p data-seq>Bisa membuat keluarga bahagia adalah salah satu momen paling membahagiakan dalam
                                    hidup ini.
                                </p>
                            </div>
                        </li>
                        <!-- single slide item -->
                        <li>
                            <div class="seq-model">
                                <img data-seq src="{{ asset('user/img/slider-4.png') }}" alt="Shoes slide img" />
                            </div>
                            <div class="seq-title">
                                <h2 data-seq>Prewedding Outdoor</h2>
                                <p data-seq>Banyak orang yang mengatakan cinta itu buta dan banyak orang yang rela melakukan
                                    hal apa pun untuk mendapatkan seseorang yang dicintainya.
                                </p>
                            </div>
                        </li>
                        <!-- single slide item -->
                        <li>
                            <div class="seq-model">
                                <img data-seq src="{{ asset('user/img/slider-5.png') }}" alt="Male Female slide img" />
                            </div>
                            <div class="seq-title">
                                <h2 data-seq>Produk olshop</h2>
                                <p data-seq>Jika ingin menjadi pengusaha sukses tetapi tidak punya modal uang, gunakan saja
                                    modal dengkulmu untuk menjadi pengusaha sukses
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- slider navigation btn -->
                <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
                    <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
                    <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
                </fieldset>
            </div>
        </div>
    </section>
    <!-- / slider -->

    <!-- Latest Blog -->
    <section id="aa-latest-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-latest-blog-area">
                        <h2>Jasa Kami</h2>
                        <div class="row">
                            @forelse ($items as $item)
                                @if ($item->is_default == 1)
                                    <!-- single latest blog -->
                                    <div class="col-md-4 col-sm-4">
                                        <div class="aa-latest-blog-single">
                                            <figure class="aa-blog-img">
                                                <a href="{{ route('user.details', $item->product->id) }}"><img
                                                        src="{{ url($item->photo) }}" alt="img"></a>
                                                <figcaption class="aa-blog-img-caption">
                                                    <span href="#"><i class="fa fa-money"></i>Rp.
                                                        @currency($item->product->price)</span>
                                                    <span href="#"><i
                                                            class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($item->product->created_at)->format('d/m/Y') }}</span>

                                                </figcaption>
                                            </figure>
                                            <div class="aa-blog-info">
                                                <h3 class="aa-blog-title"><a
                                                        href="{{ route('user.details', $item->product->id) }}">{{ $item->product->name }}</a>
                                                </h3>
                                                <p style="color: gray;">Ketegori : {{ $item->product->type }}</p>
                                            </div>
                                            <a href="{{ route('user.details', $item->product->id) }}"
                                                class="aa-browse-btn">Detail <span class="fa fa-long-arrow-right"></span>
                                            </a>
                                        </div>
                                        <br>
                                    </div>
                                @else

                                @endif
                            @empty
                                <center>
                                    <h1>Data Tidak tersedia</h1>
                                </center>
                            @endforelse
                        </div>

                        <div class="text-center">
                            {{ $items->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Latest Blog -->


    <!-- Testimonial -->
    <section id="aa-testimonial">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-testimonial-area">
                        <ul class="aa-testimonial-slider">
                            @forelse ($user as $item)
                                @if ($item->is_admin == 1)

                                @else
                                    <li>
                                        <div class="aa-testimonial-single">
                                            <p>Pelanggan Kami</p>
                                            <img class="aa-testimonial-img" src="{{ url('user/img/user-male.png') }}"
                                                alt="testimonial img">
                                            <span class="fa fa-quote-left aa-testimonial-quote"></span>
                                            <p>Telah bergabung pada tanggal
                                                {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                            </p>
                                            <div class="aa-testimonial-info">
                                                <p>{{ $item->name }}</p>
                                                <span>Designer</span>
                                            </div>
                                        </div>
                                    </li>
                                @endif

                            @empty

                            @endforelse
                            <!-- single slide -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Testimonial -->

    <!-- Support section -->
    <section id="aa-support">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-support-area">
                        <!-- single support -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="aa-support-single">
                                <span class="fa fa-truck"></span>
                                <h4>FREE SHIPPING</h4>
                            </div>
                        </div>
                        <!-- single support -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="aa-support-single">
                                <span class="fa fa-clock-o"></span>
                                <h4>30 DAYS MONEY BACK</h4>
                            </div>
                        </div>
                        <!-- single support -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="aa-support-single">
                                <span class="fa fa-phone"></span>
                                <h4>SUPPORT 24/7</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Support section -->
@endsection
