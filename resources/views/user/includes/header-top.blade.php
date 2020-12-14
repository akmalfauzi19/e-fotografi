 <div class="aa-header-top">
     <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <div class="aa-header-top-area">
                     <!-- start header top left -->
                     <div class="aa-header-top-left">
                         <!-- start cellphone -->
                         <div class="cellphone hidden-xs">
                             <p><span class="fa fa-phone"></span>0877-3041-2573</p>
                         </div>
                         <!-- / cellphone -->
                     </div>
                     <!-- / header top left -->
                     <div class="aa-header-top-right">
                         @if (Route::has('login'))
                             @auth
                                 @if (Auth::user()->is_admin == 1)
                                     <ul class="aa-head-top-nav-right">
                                         <li class="hidden-xs"><a href="{{ route('admin.home') }}">Halaman Admin</a></li>
                                         <li>
                                             <a href="{{ route('logout') }}"
                                                 onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                 {{ __('Logout') }}
                                             </a>
                                             <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                 class="d-none">
                                                 @csrf
                                             </form>
                                         </li>
                                         <li>Selamat Datang : {{ Auth::user()->name }}</li>
                                     </ul>
                                 @else
                                     <ul class="aa-head-top-nav-right">
                                         <li>
                                             <a href="{{ route('logout') }}"
                                                 onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                 {{ __('Logout') }}
                                             </a>
                                             <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                 class="d-none">
                                                 @csrf
                                             </form>
                                         </li>
                                         <li class="hidden-xs">Selamat Datang : {{ Auth::user()->name }}</li>
                                     </ul>
                                 @endif
                             @else
                                 <ul class="aa-head-top-nav-right">
                                     <li><a href="{{ route('login') }}">Login</a></li>
                                     <li><a href="{{ route('register') }}">Register</a></li>
                                 </ul>
                             @endauth
                         @endif

                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
