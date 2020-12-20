  <div class="container">
      <div class="menu-area">
          <!-- Navbar -->
          <div class="navbar navbar-default" role="navigation">
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
              </div>
              <div class="navbar-collapse collapse">
                  <!-- Left nav -->
                  <ul class="nav navbar-nav">
                      <li><a href="{{ route('user.home') }}">Home</a></li>
                      <li><a href="#">Jasa Foto<span class="caret"></span></a>

                          <ul class="dropdown-menu">
                              @foreach ($menu as $item)
                                  @if ($item->is_default == 1)
                                      <li>
                                          <a href="{{ route('user.details', $item->product->id) }}">
                                              {{ $item->product->name }}
                                          </a>
                                      </li>
                                  @endif
                              @endforeach
                          </ul>

                      </li>
                      <li><a href="{{ route('user.portofolio') }}">Portofolio</a></li>
                      <li><a href="{{ route('user.contact') }}">Contact</a></li>

                      @if (Route::has('login'))
                          @auth
                              @if (Auth::user()->is_admin == 1)

                              @else
                                  <li><a href="{{ route('user.status.login', Auth::user()->email) }}">My Transaction</a></li>
                              @endif
                          @else
                              <li><a href="{{ route('user.status') }}">My Transaction</a></li>
                          @endauth
                      @endif
                  </ul>
              </div>
              <!--/.nav-collapse -->
          </div>
      </div>
  </div>
