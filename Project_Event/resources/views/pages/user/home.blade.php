@extends('layouts.appUser')

@section('content')
    <!-- Masthead-->
    <div id="carouselExample" class="carousel slide ">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('gambarEvent/card1.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('gambarEvent/dewa19.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('gambarEvent/card1.jpg') }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- About-->
    <section id="about">
        <div id="band" class="container text-center">
            <h3>RETIX</h3>
            <p><em>We love music!</em></p>
            <p>"Retix" adalah aplikasi tiket yang inovatif dan praktis, dirancang untuk memberikan pengguna pengalaman yang
                mulus dalam memesan tiket acara dan pertunjukan secara online. Dengan fitur-fitur canggih dan antarmuka yang
                ramah pengguna, "Retix" memberikan solusi terbaik bagi pengguna yang ingin menjelajahi dan menikmati
                berbagai acara dalam waktu singkat.</p>
            <br>
        </div>
    </section>
    <!-- Projects-->
    <div class="dropdown1">
        <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Kategori
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Silver</a></li>
            <li><a class="dropdown-item" href="#">Gold</a></li>
            <li><a class="dropdown-item" href="#">Platinum</a></li>
        </ul>
    </div>
    <section id="tiket">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="gambarEvent/dewa19.jpg" class="card-img-top" alt="Project 1" />
                    <div class="card-body text-center">
                        <h5 class="card-title">Dewa 19</h5>
                        <p class="card-text">500.000</p>
                        <a href="#" class="btn btn-primary">Pesan Tiket</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="gambarEvent/dewa19.jpg" class="card-img-top" alt="Project 1" />
                    <div class="card-body text-center">
                        <h5 class="card-title">Dewa 19</h5>
                        <p class="card-text">500.000</p>
                        <a href="#" class="btn btn-primary">Pesan Tiket</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="gambarEvent/dewa19.jpg" class="card-img-top" alt="Project 1" />
                    <div class="card-body text-center">
                        <h5 class="card-title">Dewa 19</h5>
                        <p class="card-text">500.000</p>
                        <a href="#" class="btn btn-primary">Pesan Tiket</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endsection
