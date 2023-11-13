@extends('layouts.appUser')

@section('content')
    <section class="header-section" id="section_1">
        <div class="container-fluid page-header py-5 mb-5 wow fadeIn custom-header " data-wow-delay="0.1s" style="height: ">
            <div class="container  py-5 mt-5">
                <h2 class=" text-white py-5 px-4 mb-4 animated slideInDown" style="margin-top: 50px">SCIENSOMNIA 2023</h2>

            </div>
        </div>
    </section>





    <section class="artists-section section-padding" id="section_3">

        <div class="row" id="satutiket">
            <div class="col-lg-8">
                <div class="card" style="width: 45rem;">

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><img src="{{ asset('images/card2.png') }}" class="card-img-top"
                                alt="Project 1" /></li>
                        <li class="list-group-item">
                            <pre>
    <strong>Description</strong> <br>
    Sciencesomnia 2023 adalah suatu agenda yanng merupakan salah satu bagian dari
    proker Divisi Humas BEM Fakultas Sains dan Teknologi Universitas ,
    Airlangga yang dimana memiliki serangkaian acara pengenalan
    Fakultas Sains dan Teknologi melalui expo,
    talkshow, dan terdapat konser musik sebagai puncak acara yang menghadirkan
    beberapa seniman ternama di Indonesia. Sciencesomnia membawakan
    tema "Enchantment for The Soul" yang bermakna kebahagiaan untuk diri kita sendiri,
    jadi dengan hadir nya event ini diharapkan dapat membawa kebahagiaan
    kepada semua participants.
    </pre>

                        </li>
                        <li class="list-group-item">
                            <pre> <br>
    📆 : 26 November 2023

    ⏰ : 16.00 WIB - Selesai

    📍 : Parkir Timur Plaza Surabaya
    </pre>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card" style="width: 23rem; ">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <h4>Kategori Tiket</h4>
                        </li>
                        <li class="list-group-item">

                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-sm-8">
                                        <div class="card-body">
                                            <h5 class="card-title">PLATINUM</h5>
                                            <p class="card-text">Rp. 300.000</p>
                                            <div class="wrapper">
                                                <span class="minus" data-key="platinum">-</span>
                                                <span class="num" data-key="platinum">01</span>
                                                <span class="plus" data-key="platinum">+</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-sm-8">
                                        <div class="card-body">
                                            <h5 class="card-title">GOLD</h5>
                                            <p class="card-text">Rp. 200.000</p>
                                            <div class="wrapper">
                                                <span class="minus" data-key="gold">-</span>
                                                <span class="num" data-key="gold">01</span>
                                                <span class="plus" data-key="gold">+</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-sm-8">
                                        <div class="card-body">
                                            <h5 class="card-title">SILVER</h5>
                                            <p class="card-text">Rp. 100.000</p>

                                            <div class="wrapper">
                                                <span class="minus" data-key="silver">-</span>
                                                <span class="num" data-key="silver">01</span>
                                                <span class="plus" data-key="silver">+</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="float-left">
                                <h4>Subtotal</h4>
                                <p>Rp. 500.000</p>
                            </span>

                            <a href="{{ route('pemesanan') }}"><button type="button" class="btn btn-primary"
                                    style="width: 100px; height: 50px; margin-top: 25px;">Checkout</button></a>
                        </li>


                    </ul>
                </div>
            </div>

        </div>


    </section>




    <br>

    <script>
        // Inisialisasi variabel 'a' untuk setiap kategori tiket
        const a = [1, 1, 1]; // Inisialisasi dengan 1 untuk setiap kategori

        // Ambil semua elemen plus, minus, dan num
        const plusButtons = document.querySelectorAll(".plus");
        const minusButtons = document.querySelectorAll(".minus");
        const numElements = document.querySelectorAll(".num");

        // Tambahkan event listener ke setiap elemen plus
        plusButtons.forEach((plusButton, index) => {
            plusButton.addEventListener("click", () => {
                a[index]++;
                a[index] = (a[index] < 10) ? "0" + a[index] : a[index];
                numElements[index].innerText = a[index];
            });
        });

        // Tambahkan event listener ke setiap elemen minus
        minusButtons.forEach((minusButton, index) => {
            minusButton.addEventListener("click", () => {
                if (a[index] > 1) {
                    a[index]--;
                    a[index] = (a[index] < 10) ? "0" + a[index] : a[index];
                    numElements[index].innerText = a[index];
                }
            });
        });
    </script>


    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script> --}}
@endsection
