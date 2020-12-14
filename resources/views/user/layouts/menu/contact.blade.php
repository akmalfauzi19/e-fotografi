@extends('user.layouts.default')

@section('contentuser')

    <!-- catg header banner section -->
    <section id="aa-catg-head-banner">
        <img src="{{ asset('user/img/img-banner.jpg') }}" alt="fashion img" style="width: 100%; height: 300px;">
        <div class="aa-catg-head-banner-area">
            <div class="container">
                <div class="aa-catg-head-banner-content">
                    <h2>Contact</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('user.home') }}">Home</a></li>
                        <li class="active">Contact</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- / catg header banner section -->

    <!-- start contact section -->
    <section id="aa-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-contact-area">
                        <div class="aa-contact-top">
                            <h2>Kami ingin membantu Anda...</h2>
                        </div>
                        <!-- contact map -->
                        <div class="aa-contact-map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15843.793953286937!2d109.651045!3d-6.8967649!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf466ca614177434d!2sAristo%20Fotografi%20Pekalongan!5e0!3m2!1sid!2sid!4v1606429195793!5m2!1sid!2sid"
                                width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

                        </div>
                        <!-- Contact address -->
                        <div class="aa-contact-address">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="aa-contact-address-right">
                                        <address>
                                            <h4>Aristo Fotografi</h4>
                                            <p style="text-align: justify;">Menyediakan berbagai jasa
                                                Fotografi
                                                baik untuk meningkatkan profile bisnis anda ataupun kebutuhan personal anda.
                                                Hubungi kami untuk mendapatkan penawaran dan portfolio kami yang terbaru.
                                            </p>
                                            <p><span class="fa fa-home"></span>Gg. 18, Tirto, Kec. Pekalongan Barat, Kota
                                                Pekalongan, Jawa Tengah 51151</p>
                                            <p><span class="fa fa-phone"></span>+6287730412573</p>
                                            <p><span class="fa fa-envelope"></span>Email: Aristofotografi7@gmail.com</p>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
