@extends('layouts.appUser')

@section('content')


{{-- <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">Products</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
        </nav>
    </div>
</div> --}}








         <!-- Carousel Start -->
    <div class="container-fluid px-0 mb-4">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel" >
            <div class="carousel-inner">
                <div class="carousel-item active" style= "height: 700px">
                    <img class="w-100" src="{{ asset('images/nainoa-shizuru-unsplash-blur.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-8 text-start">
                                    <h4 class="fs-4 text-white">Terbaru</h4>
                                    <h1 class="text-white mb-5 animated slideInRight">Sciensomnia 2k23</h1>
                                    <a href=""
                                        class="btn btn-secondary rounded-pill py-3 px-5 animated slideInRight">Explore
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style= "height: 700px">
                    <img class="w-100" src="{{ asset('images/concert-2527495_1920.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-lg-8 text-end">
                                    <p class="fs-4 text-white">Welcome to our dairy farm</p>
                                    <h1 class="display-1 text-white mb-5 animated slideInRight">Best Organic Dairy
                                        Products</h1>
                                    <a href=""
                                        class="btn btn-secondary rounded-pill py-3 px-5 animated slideInLeft">Explore
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->




    <!-- Product Start -->
    <section class="artists-section section-padding" id="listproduk">

        <div class="container">

                <div class="row">
                    <div data-aos="flip-left"
                    data-aos-anchor-placement="top-bottom"  data-aos-duration="2000"  class="d-flex justify-content-lg-center ">


                        <h2 class="mb-5 " style=" border-bottom: 8px dotted  #000000;; display: inline-block; padding-bottom : 5px">
                           Events </h2>
                        </div>
                </div>

            <div data-aos="fade-up" data-aos-duration="2000" class="row">

                @foreach ($events as $event)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="{{ asset('gambarEvent/' . $event->gambar_event) }}" class="card-img-top"
                                alt="Project 1" />
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $event->nama_event }}</h5>
                                <p class="card-text">{{ $event->nama_lokasi }}</p>
                                <a href="{{ route('event') }}" class="btn btn-primary">Pesan Tiket</a>
                            </div>
                            <ul class="list-group list-group-flush d-flex justify-content-between">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Start From</span>

                                    <p class="text-right">{{ $event->min_harga = 'Rp '. number_format($event->min_harga,0,',','.') }}</p>
                                </li>
                            </ul>
                            <div class="date-container">
                                <span class="date-day">{{ $event->Tanggal_Event }}</span>
                            </div>

                        </div>

                    </div>
                @endforeach

                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="{{ asset('images/card3.png') }}" class="card-img-top" alt="Project 1" />
                        <div class="card-body text-center">
                            <h5 class="card-title">ARCOFEST 2023</h5>
                            <p class="card-text">Lapangan Basket BMX Pulomas | BMX International Center Pulomas</p>
                            <a href="#" class="btn btn-primary">Pesan Tiket</a>
                        </div>
                        <ul class="list-group list-group-flush d-flex justify-content-between">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Start From</span>
                                <p class="text-right">200.000</p>
                            </li>
                        </ul>
                        <div class="date-container">
                            <span class="date-day">28</span> <br>
                            <span class="date-month">OKT</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="{{ asset('images/card4.png') }}" class="card-img-top" alt="Project 1" />
                        <div class="card-body text-center">
                            <h5 class="card-title">Progresif Festival</h5>
                            <p class="card-text">Jalan Stadion Barat | <br> Stadion Diponegoro</p>
                            <a href="#" class="btn btn-primary">Pesan Tiket</a>
                        </div>
                        <ul class="list-group list-group-flush d-flex justify-content-between">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Start From</span>
                                <p class="text-right">150.000</p>
                            </li>
                        </ul>
                        <div class="date-container">
                            <span class="date-day">28</span> <br>
                            <span class="date-month">OKT</span>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </section>
    <!-- Product End -->


<script>
    // Fungsi ini akan dipanggil saat formulir pencarian disubmit


    function scrollToSection() {
            // Arahkan scroll ke elemen dengan id "section_3"
            document.getElementById('section_5').scrollIntoView({
                behavior: 'smooth'
            });
        }
</script>
@endsection
