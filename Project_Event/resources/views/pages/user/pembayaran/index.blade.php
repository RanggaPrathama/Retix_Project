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
    <style>
        input[type=file] {
            display: none;
        }

        label.file-selector-button {
            border: none;
            background:#042A40;
            padding: 9px 10px;
            border-radius: 10px;
            color: #ffffff;
            cursor: pointer;
            transition: background .2s ease-in-out;
        }

        label.file-selector-button:hover {
            background: #F8CB2E;

        }

        .img-preview {
            display: none;
        }
    </style>
</head>

<body>
    <!-- Page Header Start -->
    <div class="container-fluid bg-customPemesanan mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-white mb-3">Pembayaran</h1>
        </div>
    </div>
    <!-- Page Header End -->
    @extends('layouts.appUser')
    @section('content')

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                            <div class="card-header text-center">
                                <h3>Please Finish Your Payment in</h3>
                            </div>
                            <form action="{{route('bayar',$pembayarans->slug)}}" method="POST" enctype="multipart/form-data">
                                @csrf

                            <div class="card-body">
                                <div class="d-flex justify-content-center mt-3 waktu">
                                    <p id="countdown" style="font-weight: 900; font-size: 50px; color: #042A40"></p>
                                </div>

                                <div class='d-flex justify-content-center tenggat'>
                                    <strong> Lakukan Pembayaran sebelum {{\Carbon\Carbon::parse($pembayarans->tgl_pembayaran)->addHours(2)->translatedFormat('l, d F Y H:i')}}</strong>
                                </div>
                                <input type="hidden" id="time" value="{{\Carbon\Carbon::parse($pembayarans->tgl_pembayaran)->addHours(2)->translatedFormat('l, d F Y H:i')}}">

                                    <div class="col-sm-12 mt-5">
                                        <div class="alert alert-danger text-center">
                                            <strong>Please scan the QRIS below using the Mobile Banking or Ewallet application.</strong>
                                          </div>
                                    </div>

                                <div class="d-flex justify-content-center mt-5">
                                    <img src="{{asset('logoPayment/'.$pembayarans->gambar)}}" alt="">
                                </div>


                            </div>

                            <input type="hidden" name="slug" value="{{$pembayarans->slug}}">

                            <div class="card-footer mt-5">
                                <div class="d-flex justify-content-between mt-3">
                                    <p style="font-weight: bold">Total Payment</p>
                                    <strong> {{ 'Rp.' . number_format($pembayarans->total_tagihan, 0, ',', '.') }}</strong>
                                </div>

                                <div class="d-flex justify-content-between mt-3">
                                    <p style="font-weight: bold">E-wallet</p>
                                    <img src="{{asset('logoPayment/'.$pembayarans->logo)}}" alt="" style="width: 90px; height:70px">
                                </div>

                                <div class="mt-3">
                                    <h5>Unggah Bukti pembayaran Anda !</h5>
                                    <div class="mt-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="fileInput" class="file-selector-button">Pilih Bukti
                                                Pembayaran</label>
                                        </div>
                                        <div class="col-6">
                                            <img class="img-preview img-fluid mb-3" style="height: 200px; width: 150px"
                                                id="gambar">
                                        </div>
                                    </div>
                                    <input type="file" id="fileInput" class="form-control" name="gambar"
                                        id="gambar" onchange="previewImage()">
                                    </div>

                                </div>

                                <div class=" mt-5">
                                    <div class="row">
                                        <div class="col text-center">
                                            <button type="submit" class="btn" style="background-color:#042A40; color: white; width: 92%; padding: 12px 12px" role="button">Kirim Bukti
                                                Pembayaran</button>
                                        </div>
                                    </div>
                                </div>

                            </form>

                            </div>
                    </div>
                </div>
            </div>

            <div class="row">
                    <div class="col-lg-12">

                    </div>
            </div>
        </div>


<br>

<script>

var now = new Date(new Date().toLocaleString('en-US', { timeZone: 'Asia/Jakarta' }));


var deadlineString = document.getElementById('time').value;


var deadline = new Date(deadlineString);




if(isNaN(deadline.getTime())){
    console.error("Invalid Date Format:", deadlineString);
}
else{

    var timeremaining = deadline - now;

function updateCountdown() {



    timeremaining = Math.max(0, timeremaining - 1000);


    let hours = Math.floor((timeremaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor((timeremaining % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((timeremaining % (1000 * 60)) / 1000);


    let countdown = document.getElementById('countdown');
    countdown.innerHTML =  hours + ' Jam ' + minutes + ' Menit ' + seconds + ' Detik';


    if (timeremaining === 0) {
        clearInterval(interval);
        countdown.innerHTML = "Waktu telah habis!";
        // Panggil fungsi atau lakukan tindakan lain jika diperlukan saat waktu habis
        // window.location.href = "/pesanansaya";
    }
}

// Perbarui penghitungan setiap 1000 milidetik
var interval = setInterval(updateCountdown, 1000);

}

function previewImage() {
            const gambar = document.querySelector('#fileInput');
            const imgPreview = document.querySelector('.img-preview');


            if (gambar.files && gambar.files[0]) {
                const oFReader = new FileReader();
                oFReader.readAsDataURL(gambar.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }


                imgPreview.style.display = 'block';
            } else {

                imgPreview.style.display = 'none';
            }
        }



    </script>



@endsection
</body>

</html>
