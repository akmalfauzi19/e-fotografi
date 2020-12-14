{{-- rekomendasi --}}
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <h3 class="detail-price">Rekomendasi</h3>
    </div>
</div>
<div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel" data-type="multi">
    <div class="carousel-inner">
        <div class="item active">
            <div class="row">
                @foreach ($rekomendasi as $item)

                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="slider-item">
                            <div class="slider-image">
                                <img src="{{ url($item->photo) }}" class="img-responsive" alt="a"
                                    style="width: 260px; height: 200px;" />
                            </div>
                            <div class="slider-main-detail">
                                <div class="slider-detail">
                                    <div class="product-detail">
                                        <h5>{{ $item->product->name }}</h5>
                                        <h5 class="detail-price">
                                            Rp. @currency($item->product->price)
                                        </h5>
                                    </div>
                                </div>
                                <div class="cart-section">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 col-xs-6 review">
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-6">
                                            <a href="{{ route('user.details', $item->product->id) }}"
                                                class="AddCart btn btn-info"><i class="fa fa-search-plus"
                                                    aria-hidden="true">
                                                </i> Detail Foto</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
</div>
{{-- end rekomendasi --}}
