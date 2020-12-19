    <div class="aa-header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-header-bottom-area">
                        <!-- logo  -->
                        <div class="aa-logo">
                            <!-- Text based logo -->
                            <a href="{{ route('user.home') }}">
                                <span class="fa fa-camera"></span>
                                <p>Aristo<strong>Fotografi</strong> <span>Abadikan Moment Terbaikmu </span></p>
                            </a>
                            <!-- img based logo -->
                            <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
                        </div>
                        <!-- / logo  -->
                        <!-- search box -->
                        <div class="aa-search-box">
                            <form action="{{ route('user.search') }}">
                                @csrf
                                <input type="text" name="cari" placeholder="Search Jenis Foto... "
                                    value="{{ old('cari') }}">
                                <button type="submit"><span class="fa fa-search"></span></button>
                            </form>
                        </div>
                        <!-- / search box -->
                    </div>
                </div>
            </div>
        </div>
    </div>
