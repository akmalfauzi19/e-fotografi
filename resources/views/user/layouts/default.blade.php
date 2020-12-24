<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aristo Fotografi</title>
    @toastr_css
    {{-- style --}}
    @stack('before-style')
    @include('user.includes.style')
    @stack('after-style')
    {{-- end style --}}

</head>

<body>

    <!-- Start header section -->
    <header id="aa-header">
        <!-- start header top  -->
        @include('user.includes.header-top')
        <!-- / header top  -->

        <!-- start header bottom  -->
        @include('user.includes.header-bottom')
        <!-- / header bottom  -->
    </header>
    <!-- / header section -->

    <!-- menu -->
    <section id="menu">
        @include('user.includes.menu')
    </section>
    <!-- / menu -->

    <div class="content">

        {{-- content --}}
        @yield('contentuser')
        {{-- content --}}

    </div>

    <!-- footer -->
    <footer id="aa-footer">
        <!-- footer bottom -->
        <div class="aa-footer-top">
            @include('user.includes.footer-top')
        </div>
        <!-- footer-bottom -->
        <div class="aa-footer-bottom">
            @include('user.includes.footer-bottom')
        </div>
    </footer>
    <!-- / footer -->

    {{-- script bottom --}}
    @stack('before-script')
    @include('user.includes.script')
    @stack('after-script')
    {{-- end script bottom --}}

</body>
@jquery
@toastr_js
@toastr_render

</html>
