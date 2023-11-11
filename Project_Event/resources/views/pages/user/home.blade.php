@extends('layouts.appUser')

@section('content')
    <section class="hero-section" id="section_1">
        <div class="section-overlay"></div>

        <div class="container d-flex justify-content-center align-items-center">
            <div class="row">

                <div data-aos="zoom-in" data-aos-duration="1000" id='judul' class="col-12 mt-auto mb-5 text-center">

                    <h1 class="text-white mb-5">RETIX</h1>

                    <a class="btn custom-btn smoothscroll" href="#section_2">Let's Try</a>
                </div>


            </div>
        </div>


        <div class="video-wrap">
            <video autoplay="" loop="" muted="" class="custom-video" poster="">
                <source src="video/pexels-2022395.mp4" type="video/mp4">

                Your browser does not support the video tag.
            </video>
        </div>
    </section>


    <section class="about-section section-padding" id="section_2">
        <div class="container">
            <div class="row">


                <div data-aos="fade-up" data-aos-duration="1000" id="band" class="container text-center">
                    <h3>RETIX</h3>
                    <h6><em>We love music!</em></h6>
                    <h6>"Retix" adalah aplikasi tiket yang inovatif dan praktis, dirancang untuk memberikan pengguna
                        pengalaman yang mulus dalam memesan tiket acara dan pertunjukan secara online. Dengan fitur-fitur
                        canggih dan antarmuka yang ramah pengguna, "Retix" memberikan solusi terbaik bagi pengguna yang
                        ingin menjelajahi dan menikmati berbagai acara dalam waktu singkat.</h6>
                    <br>
                </div>

            </div>
        </div>
    </section>


     <section class="artists-section section-padding" id="section_3">

        <div class="container">

                <div class="row">
                    <div data-aos="flip-left"
                    data-aos-anchor-placement="top-bottom"  data-aos-duration="2000"  class="d-flex justify-content-lg-center ">


                        <h2 class="mb-5 " style=" border-bottom: 8px dotted  #000000;; display: inline-block; padding-bottom : 5px">
                            Popular events </h2>
                        </div>
                </div>

            <div data-aos="fade-up" data-aos-duration="2000" class="row">

                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="{{ asset('images/card2.png') }}" class="card-img-top" alt="Project 1" />
                        <div class="card-body text-center">
                            <h5 class="card-title">Sciencesomnia 2023</h5>
                            <p class="card-text">Parkir Timur Plaza Surabaya | Parkir Timur Plaza Surabaya</p>
                            <a href="{{ route('event') }}" class="btn btn-primary">Pesan Tiket</a>
                        </div>
                        <ul class="list-group list-group-flush d-flex justify-content-between">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Start From</span>
                                <p class="text-right">100.000</p>
                            </li>
                        </ul>
                        <div class="date-container">
                            <span class="date-day">26</span> <br>
                            <span class="date-month">NOV</span>
                        </div>

                    </div>
                </div>
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
        {{-- <div class="dropdown1">
            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Kategori
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Silver</a></li>
                <li><a class="dropdown-item" href="#">Gold</a></li>
                <li><a class="dropdown-item" href="#">Platinum</a></li>
            </ul>
            </div> --}}
        {{-- <section data-aos="fade-up" data-aos-duration="2000" id="tiket">


        </section> --}}

        <section  data-aos="fade-up" data-aos-duration="3000"  class="contact-section section-padding" id="section_4">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12 mx-auto">
                        <h2 class="text-center mb-4">Interested? Let's talk</h2>

                        <nav class="d-flex justify-content-center">
                            <div class="nav nav-tabs align-items-baseline justify-content-center" id="nav-tab"
                                role="tablist">
                                <button class="nav-link active" id="nav-ContactForm-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-ContactForm" type="button" role="tab"
                                    aria-controls="nav-ContactForm" aria-selected="false">
                                    <h5>Contact Form</h5>
                                </button>

                            </div>
                        </nav>

                        <div class="tab-content shadow-lg mt-5" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-ContactForm" role="tabpanel"
                                aria-labelledby="nav-ContactForm-tab">
                                <form class="custom-form contact-form mb-5 mb-lg-0" action="#" method="post"
                                    role="form">
                                    <div class="contact-form-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <input type="text" name="contact-name" id="contact-name"
                                                    class="form-control" placeholder="Full name" required>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-12">
                                                <input type="email" name="contact-email" id="contact-email"
                                                    pattern="[^ @]*@[^ @]*" class="form-control"
                                                    placeholder="Email address" required>
                                            </div>
                                        </div>

                                        <input type="text" name="contact-company" id="contact-company"
                                            class="form-control" placeholder="Company" required>

                                        <textarea name="contact-message" rows="3" class="form-control" id="contact-message" placeholder="Message"></textarea>

                                        <div class="col-lg-4 col-md-10 col-8 mx-auto">
                                            <button type="submit" class="form-control">Send message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="nav-ContactMap" role="tabpanel"
                                aria-labelledby="nav-ContactMap-tab">
                                <iframe class="google-map"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29974.469402870927!2d120.94861466021855!3d14.106066818082482!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd777b1ab54c8f%3A0x6ecc514451ce2be8!2sTagaytay%2C%20Cavite%2C%20Philippines!5e1!3m2!1sen!2smy!4v1670344209509!5m2!1sen!2smy"
                                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <!-- You can easily copy the embed code from Google Maps -> Share -> Embed a map // -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


    @endsection
