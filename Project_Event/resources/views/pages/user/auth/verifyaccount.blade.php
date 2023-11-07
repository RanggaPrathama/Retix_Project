@extends('layouts.auth')

@section('auth')
<section class="h-100 gradient-form" style=" background-image: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">
                                <div class="text-center">
                                    <img src="{{ asset('images/Tiket Logo.png') }}"
                                        style="width: 200px;" alt="logo">
                                    <h4 class="mt-1 mb-5 pb-1">Token</h4>
                                    @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>
                                    @endif

                                    @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                          </div>
                                    @endif
                                </div>


                                    <form action="" method="POST" class="row g-3 needs-validation" novalidate>
                                        @csrf
                                        <div class="col-12">
                                            <label for="yourEmail" class="form-label">Input Your Token </label>
                                            <input type="text" name="token" class="form-control @error('token')is-invalid @enderror" id="yourEmail" required>
                                            @error('token')
                                                <div class='invalid-feedback'>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                          <div class="col-12">
                                            <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 w-100 " type="submit">SUBMIT</button>
                                            <div id="countdown" style="color: #a30000;"></div>
                                        </div>



                                    </form>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" >
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('images/konser1.jpg') }}" class="d-block w-100"  style="height: 100%"  alt="Image 1">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('images/konser2.jpg') }}" class="d-block w-100" style="height: 100%" alt="Image 2">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('images/pexels-laura-stanley-2147029.jpg') }}" class="d-block w-100" style="height: 100%" alt="Image 2">
                                    </div>
                                    <!-- Tambahkan item-carousel sesuai kebutuhan -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        function startCountdown() {
            var seconds = 60;
            var countdown = setInterval(function () {
                $("#countdown").text("Redirecting in " + seconds + " seconds...");
                seconds--;
                if (seconds < 0) {
                    clearInterval(countdown);

                    window.location.href = "/verifikasiakun";
                }
            }, 1000);
        }


        $(document).ready(function () {
            startCountdown();
        });
    </script>
</section>
@endsection
