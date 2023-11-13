<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#page-top"><img src="{{ asset('images/logo.png') }}" alt="" width="100"
                height="50"></a>

                <div class="d-flex ">
                    <form action="/catalog#listproduk">
                        <div class="input-group d-flex flex-end-center" style="width: 8cm">
                            <input class="form-control form-eduprixsearch-control rounded-pill"
                                id="formGroupExampleInput" type="text" name="search" value="{{ request('search') }}"
                                placeholder="Produk apa yang anda cari hari ini?" />
                        </div>
                    </form>
                </div>
        <div class="collapse navbar-collapse" id="navbarNav">

            {{-- <div class="row justify-content-between">
                <div class="col-auto d-none d-lg-block">

                </div>
            </div> --}}


            <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="{{ route('home') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_2">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_3">Tiket</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_4">Contacts</a>
                </li>
                @guest

                @if (Route::has('login'))
                <a href="{{ route('login') }}" id="login" class="btn custom-btn d-lg-block d-none">Login</a>
                <a href="{{ route('register') }}" class="btn custom-btn d-lg-block d-none">Register</a>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-person"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('profile') }}">Profil</a></li>
                        <li><a class="dropdown-item" href="{{ route('riwayatpesan') }}">Riwayat Pesanan</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" > {{ __('Logout') }}</a></li>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                    </ul>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
