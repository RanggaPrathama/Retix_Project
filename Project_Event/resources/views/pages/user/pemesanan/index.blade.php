<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
        <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png" sizes="16x16">
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
                <div class="col-lg-7" style="max-height: 480px; overflow-y: auto">
                    <div class="mb-4">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                        <div class="row">
                            <div class="card border-secondary mb-5 p-0" style="margin-top: -30px">
                                <div class="card-header border-0 " style=" background-color: #042A40;">
                                    <h4 class="font-weight-semi-bold text-white mb-4">Data Diri</h4>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">

                                        <label>Nama Lengkap</label>
                                        <input class="form-control" name= 'name' id = 'namaregistrasi' type="text" value="{{$users ->name}}">
                                    </div>
                                    <div class="mb-3">
                                        <label>NIK</label>
                                        <input class="form-control" name = 'no_ktp' id = 'ktpregistrasi' type="text" value="{{ $users->no_ktp }}" >
                                    </div>
                                    <div class="mb-3">
                                        <label>E-mail</label>
                                        <input class="form-control" id='emailregistrasi' type="text" value="{{$users->email}}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label>No Telp</label>
                                        <input class="form-control" name='no_telp' id= 'notelpregistrasi' type="text" value="{{$users->no_telp}}">
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="mb-4">

                        <div class="row">
                            <div class="card border-secondary mb-5 p-0" style="margin-top: -30px">
                                <div class="card-header  border-0 " style=" background-color: #042A40;">
                                    <h4 class="font-weight-semi-bold text-white mb-4">Data Pemilik Tiket</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-check text-end">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault"> Same as registration data
                                        </label>
                                    </div>
                                    <div class="mb-3">
                                        <label>Nama Lengkap</label>
                                        <input class="form-control" id='namapemilik' type="text" >
                                    </div>
                                    <div class="mb-3">
                                        <label>NIK</label>
                                        <input class="form-control" id="ktppemilik" type="text">
                                    </div>
                                    <div class="mb-3">
                                        <label>E-mail</label>
                                        <input class="form-control" id="emailpemilik" type="text">
                                    </div>
                                    <div class="mb-3">
                                        <label>No Telp</label>
                                        <input class="form-control" id="notelppemilik" type="text" >
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>



                </div>



                <div class="col-lg-5">
                    <div class="card border-secondary mb-5">
                        <div class="card-header  border-0" style=" background-color: #042A40;">
                            <h4 class="font-weight-semi-bold text-white m-0">Order Total</h4>
                        </div>

                        <div class="card-body">

                            <h5 class="font-weight-medium mb-3">Tiket</h5>
                            @foreach ($orders as $order)


                            <div class="d-flex justify-content-between">
                                <p>{{$order->nama_event}} &nbsp; -- {{$order->nama_kategori}} &nbsp;  x {{$order->quantity}}</p>
                                <p>{{$order->SUBTOTAL}}</p>
                            </div>
                            @endforeach

                            <hr class="mt-0">
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <div class="d-flex justify-content-between mt-2">
                                <h5 class="font-weight-bold">Total</h5>
                                <h5 class="font-weight-bold">{{$pemesanans->total_tagihan}}</h5>
                            </div>
                        </div>
                    </div>


                    <div class="card border-secondary mb-5">
                        <div class="card-header  border-0" style=" background-color: #042A40;">
                            <h4 class="font-weight-semi-bold text-white m-0">Payment Methods</h4>
                        </div>
                        <div class="card-body">

                            {{-- <div class="row m-0 mb-3 ">

                                <div class="col-sm-4 ">
                                    <div class="card" >
                                        <div class="card-body ">
                                            <div class="form-group">
                                                <input class="form-check-input" type="radio" name="payment" value="1" id="bankTransfer">
                                                <label class="form-check-label" for="pembayaran1">
                                                    <span class="text-success  fw-bold" >Bank Tranfer</span><br>

                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <input class="form-check-input" type="radio" name="payment" value="2" id="eWallet">
                                                <label class="form-check-label" for="pembayaran1">
                                                    <span class="text-success fw-bold" style="font-size: 15px">E-Wallet</span><br>

                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <input class="form-check-input" type="radio" name="payment" value="3" id="qris">
                                                <label class="form-check-label" for="pembayaran1">
                                                    <span class="text-success fw-bold" style="font-size: 15px">Qris</span><br>

                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div> --}}

                            <div class="row m-0">
                                @foreach ( $payments  as $payment )


                                <div class="col-md-9 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-check form">
                                                <input class="form-check-input radio" type="radio" name="id_payments" value="{{ $payment->id_payments }}" onsubmit="return validateForm()" >
                                                <label class="form-check-label d-flex justify-content-between" for="pembayaran1">
                                                    <span class="text-success fw-bold">{{ $payment->nama }}</span><br>
                                                    <img class="img-fluid" src="{{ asset('logoPayment/'.$payment->logo) }}" style=" width: 100px; margin-top:-16px" alt="">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                {{-- <div class="col-md-9 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-check form">
                                                <input class="form-check-input" type="radio" name="payment" value="" onsubmit="return validateForm()" checked required>
                                                <label class="form-check-label" for="pembayaran2">
                                                    <span class="text-success fw-bold">Jatim</span><br>
                                                    <img class="img-fluid" src="{{ asset('images/jatim.png') }}" style="height: 60px; width: 100px" alt="">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                            </div>

                            <!-- Form-group radio buttons below -->
                            {{-- <div class="form-group">
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
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                    <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                                </div>
                            </div> --}}
                        </div>

                        <div class="card-footer border-secondary bg-transparent">

                             <button type="submit"
                                    class="btn btn-lg  btn-primary font-weight-bold my-3 py-3"> Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
        <!-- Checkout End -->

<!-- Modal -->
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Terms and Conditions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Your terms content here -->
                <p>Dengan membeli tiket ini, <strong>saya telah membaca dan menyetujui syarat dan ketentuan yang berlaku </strong>untuk melanjutkan pembayaran, singkatnya sebagai berikut: Jika terjadi FORCE MAJEURE (Gempa Bumi, Gunung Meletus, Banjir, Tsunami, Pandemik dan/atau Epidemik, Pernyataan Perang, Perang, Terorisme) dan/atau keputusan darurat nasional dari pemerintah, <strong>Panitia berhak</strong>  untuk membatalkan atau mengatur ulang jadwal acara secara sepihak. <strong>Saya sebagai pembeli setuju</strong>  untuk membebaskan Panitia dan Penyedia Layanan dari tuntutan apapun</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="disagree()">Disagree</button>
                <button type="button" class="btn btn-primary" onclick="agree()">Agree</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


<script>

    $(document).ready(function() {
        $('#myModal').modal('show');
    });

    function agree() {
        alert('You agreed to the terms!');
        $('#myModal').modal('hide');

    };

    function disagree() {
        alert('You disagreed to the terms!');
        $('#myModal').modal('hide');

        var slug = '{{$pemesanans->slug}}';

        $.ajax({
            type: 'DELETE',
            url: '/deletePemesanan/' + slug,
            data: {
                            _token: "{{ csrf_token() }}"
                        },
            success: function(response) {

                // console.log('Pemesanan berhasil dihapus:', response);
                window.history.back();
            },
            error: function(error) {

                console.error('Gagal menghapus pemesanan:', error);
            }
        });
    };

    function validateForm() {
        var radioButtons = document.querySelectorAll('.radio');

        var isChecked = false;
        for (var i = 0; i < radioButtons.length; i++) {
            if (radioButtons[i].checked) {
                isChecked = true;
                break;
            }
        }

        if (!isChecked) {
            alert('Pilihlah metode pembayaran!');
            return false;
        }


        return true;
    };

    document.addEventListener('DOMContentLoaded', function () {
        var checkbox = document.getElementById('flexCheckDefault');
        var pemilikNama = document.getElementById('namapemilik');
        var pemilikNIK = document.getElementById('ktppemilik');
        var pemilikEmail = document.getElementById('emailpemilik');
        var pemilikNoTelp = document.getElementById('notelppemilik');


        var originalPemilikNama = pemilikNama.value;
        var originalPemilikNIK = pemilikNIK.value;
        var originalPemilikEmail = pemilikEmail.value;
        var originalPemilikNoTelp = pemilikNoTelp.value;

        checkbox.addEventListener('change', function () {
            if (checkbox.checked) {
                // Jika checkbox dicentang, setel nilai pemilik menjadi nilai dari data diri
                pemilikNama.value = document.getElementById('namaregistrasi').value;
                pemilikNIK.value = document.getElementById('ktpregistrasi').value;
                pemilikEmail.value = document.getElementById('emailregistrasi').value;
                pemilikNoTelp.value = document.getElementById('notelpregistrasi').value;
            } else {

                pemilikNama.value = originalPemilikNama;
                pemilikNIK.value = originalPemilikNIK;
                pemilikEmail.value = originalPemilikEmail;
                pemilikNoTelp.value = originalPemilikNoTelp;
            }
        });
    });

</script>

@endsection
</body>

</html>
