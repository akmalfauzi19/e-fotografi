@extends('user.layouts.default')

@section('contentuser')

    <!-- Latest Blog -->
    <section id="aa-latest-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-latest-blog-area">
                        <h2>Hasil Pencarian</h2>
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
                                    <h1>Data Tidak Ditemukan</h1>
                                </center>
                            @endforelse
                        </div>

                        {{-- <div class="text-center">
                            {{ $items->links() }}
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Latest Blog -->


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
