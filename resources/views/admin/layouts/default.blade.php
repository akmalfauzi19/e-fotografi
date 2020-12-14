<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Halaman Admin Aristo Fotografi</title>
    <meta name="description" content="Aristo Fotografi">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- style --}}
    @stack('before-style')
    @include('admin.includes.style')
    @stack('after-style')

</head>

<body>
    <!-- Left Panel -->
    @include('admin.includes.sidebar')
    <!-- /#left-panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        @include('admin.includes.navbar')
        <!-- /#header -->

        <!-- Content -->
        <div class="content">
            @include('layouts.flash-message')
            {{-- content --}}
            @yield('content')
            {{-- content --}}
        </div>
        <!-- /.content -->


        <div class="clearfix"></div>
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2020 Aristo Fotografi
                    </div>
                    <div class="col-sm-6 text-right">
                        Dibuat Oleh <a href="https://www.instagram.com/wongjowo19/">Hafizh Akmal Fauzi</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    {{-- script --}}
    @stack('before-script')
    @include('admin.includes.script')
    @stack('after-script')

</body>

</html>
