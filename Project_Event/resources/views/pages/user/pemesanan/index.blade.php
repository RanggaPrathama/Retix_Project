<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/pemesanan/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/pemesanan/css/style.css" rel="stylesheet">

</head>

<body>
    <!-- Page Header Start -->
    <div class="container-fluid bg-customPemesanan  mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-white mb-3">Checkout</h1>

        </div>
    </div>
    <!-- Page Header End -->
    @extends('layouts.appUser')
    @section('content')
        <!-- Checkout Start -->
        <div class="container-fluid pt-5">
            <div class="row px-xl-5">
                <div class="col-lg-7"  style="max-height: 480px; overflow-y: auto">
                    <div class="mb-4">

                        <div class="row">
                            <div class="card border-secondary mb-5 p-0" style="margin-top: -30px">
                                <div class="card-header bg-primary border-0 ">
                                    <h4 class="font-weight-semi-bold text-white mb-4">Data Diri</h4>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label>Nama Lengkap</label>
                                        <input class="form-control" type="text" placeholder="Pregorian Purwacahyani">
                                    </div>
                                    <div class="mb-3">
                                        <label>NIK</label>
                                        <input class="form-control" type="text" placeholder="3518253912520008">
                                    </div>
                                    <div class="mb-3">
                                        <label>E-mail</label>
                                        <input class="form-control" type="text" placeholder="pregorianp123@gmail.com">
                                    </div>
                                    <div class="mb-3">
                                        <label>No Telp</label>
                                        <input class="form-control" type="text" placeholder="082245678910">
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="mb-4">

                        <div class="row">
                            <div class="card border-secondary mb-5 p-0" style="margin-top: -30px">
                                <div class="card-header bg-primary border-0 ">
                                    <h4 class="font-weight-semi-bold text-white mb-4">Data Diri</h4>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label>Nama Lengkap</label>
                                        <input class="form-control" type="text" placeholder="Pregorian Purwacahyani">
                                    </div>
                                    <div class="mb-3">
                                        <label>NIK</label>
                                        <input class="form-control" type="text" placeholder="3518253912520008">
                                    </div>
                                    <div class="mb-3">
                                        <label>E-mail</label>
                                        <input class="form-control" type="text" placeholder="pregorianp123@gmail.com">
                                    </div>
                                    <div class="mb-3">
                                        <label>No Telp</label>
                                        <input class="form-control" type="text" placeholder="082245678910">
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>



                </div>



                <div class="col-lg-5">
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-primary border-0">
                            <h4 class="font-weight-semi-bold text-white m-0">Order Total</h4>
                        </div>
                        <div class="card-body">
                            <h5 class="font-weight-medium mb-3">Tiket</h5>
                            <div class="d-flex justify-content-between">
                                <p>Sciencesomnia 2023 -- Silver</p>
                                <p>Rp 100.000</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p>Sciencesomnia 2023 -- Gold</p>
                                <p>Rp 200.000</p>
                            </div>
                            <hr class="mt-0">
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <div class="d-flex justify-content-between mt-2">
                                <h5 class="font-weight-bold">Total</h5>
                                <h5 class="font-weight-bold">Rp 300.000</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-primary border-0">
                            <h4 class="font-weight-semi-bold text-white m-0">Payment</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                    <label class="custom-control-label" for="paypal">Paypal</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                    <label class="custom-control-label" for="directcheck">Direct Check</label>
                                </div>
                            </div>
                            <div class="">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                    <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">

                            <a href="{{ route('riwayatpesan') }}"> <button
                                    class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3"> Order</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Checkout End -->
    @endsection
</body>

</html>
