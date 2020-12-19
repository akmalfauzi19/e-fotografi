<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ Route::currentRouteNamed('admin.home') ? 'active' : '' }}">
                    <a href="{{ route('admin.home') }}"><i class="menu-icon fa fa-home"></i>Dashboard </a>
                </li>

                <li class="menu-title">Jenis Foto</li><!-- /.menu-title -->
                <li class="{{ Route::currentRouteNamed('products.index') ? 'active' : '' }}">
                    <a href="{{ route('products.index') }}"> <i class="menu-icon fa  fa-list-alt"></i>Daftar Jenis
                        Foto</a>
                </li>
                <li class="{{ Route::currentRouteNamed('products.create') ? 'active' : '' }}">
                    <a href="{{ route('products.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Jenis Foto</a>
                </li>
                <li class="{{ Route::currentRouteNamed('products.restored') ? 'active' : '' }}">
                    <a href="{{ route('products.restored') }}"> <i class="menu-icon fa fa-trash "></i>Restored Jenis
                        Foto</a>
                </li>

                <li class="menu-title">Galleri</li><!-- /.menu-title -->
                <li class="{{ Route::currentRouteNamed('product-galleries.index') ? 'active' : '' }}">
                    <a href="{{ route('product-galleries.index') }}"> <i class="menu-icon fa fa-camera-retro"></i>Lihat
                        Semua Foto</a>
                </li>
                <li class="{{ Route::currentRouteNamed('product-galleries.create') ? 'active' : '' }}">
                    <a href="{{ route('product-galleries.create') }}"> <i class="menu-icon fa  fa-picture-o"></i>Tambah
                        Foto</a>
                </li>
                <li class="{{ Route::currentRouteNamed('product-galleries.restored') ? 'active' : '' }}">
                    <a href="{{ route('product-galleries.restored') }}"> <i class="menu-icon fa fa-trash "></i>Restored
                        Foto</a>
                </li>

                <li class="menu-title">Transaksi</li><!-- /.menu-title -->
                <li class="{{ Route::currentRouteNamed('transactions.index') ? 'active' : '' }}">
                    <a href="{{ route('transactions.index') }}"> <i class="menu-icon fa fa-money"></i>Lihat
                        Transaksi</a>
                </li>
                <li class="{{ Route::currentRouteNamed('transactions.restored') ? 'active' : '' }}">
                    <a href="{{ route('transactions.restored') }}"> <i class="menu-icon fa fa-trash "></i>Restored
                        Foto</a>
                </li>

                <li class="menu-title">Halaman User</li><!-- /.menu-title -->
                <li class="{{ Route::currentRouteNamed('admin.user') ? 'active' : '' }}">
                    <a href="{{ route('admin.user') }}"><i class="menu-icon fa fa-user"></i>Kelola User</a>
                </li>
                <li class="{{ Route::currentRouteNamed('user.home') ? 'active' : '' }}">
                    <a href="{{ route('user.home') }}"><i class="menu-icon fa fa-reply"></i>Back</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
