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
                                    <img src="{{ asset('images/logo.png') }}"
                                        style="width: 200px;" alt="logo">
                                    <h4 class="mt-1 mb-5 pb-1">REGISTER</h4>
                                    @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>
                                    @endif
                                </div>

                                    <p>Please Register to your account</p>
                                    <form  action=""  method="POST"   class="row g-3 needs-validation" novalidate>
                                        @csrf

                                        <input type="hidden" name="token" value="{{ @rand(100000, 999999) }}">
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">

                                              <input type="text" name="name" class="form-control @error('username')is-invalid @enderror" id="yourUsername" required>
                                                @error('name')
                                                    <div class='invalid-feedback'>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                          </div>

                                        <div class="col-12">
                                          <label for="yourEmail" class="form-label">Your Email</label>
                                          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="yourEmail" required>
                                          @error('email')
                                                    <div class='invalid-feedback'>
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                        </div>

                                        <div class="col-12">
                                            <label for="yourEmail" class="form-label">Telephone</label>
                                            <input type="text" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" id="yourTelponl" required>
                                            @error('no_telp')
                                                      <div class='invalid-feedback'>
                                                          {{ $message }}
                                                      </div>
                                                  @enderror

                                          </div>



                                        <div class="col-12">
                                          <label for="yourPassword" class="form-label">Password</label>
                                          <input type="password" name="password" class="form-control @error('password') is-invalid  @enderror" id="" required>
                                        @error('password')
                                            <div class='invalid-feedback'>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>

                                          <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password Confirm </label>
                                            <input type="password" name="password_confirmation" class="form-control" id="" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                          </div>

                                        <div class="col-12">
                                          <div class="form-check">
                                            <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                                            <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                                            <div class="invalid-feedback">You must agree before submitting.</div>
                                          </div>
                                          <br>
                                          <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 w-100 " type="submit">Register</button>

                                       </div>
                                       <div class="col-12">
                                        <p class="small mb-0">Have an account? <a href="{{ route('login') }}">Sign In</a></p>
                                    </div>
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
</section>
@endsection
