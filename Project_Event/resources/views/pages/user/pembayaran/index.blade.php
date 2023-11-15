<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/pemesanan/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/pemesanan/css/style.css" rel="stylesheet">

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
    
    <div class="row" >
    <div class="card" style="width: 70rem; text-align:center; margin-left: 150px; margin-bottom: 70px;">
  <div class="card-body">
    <section class="info">
      <h2>Informasi Pembayaran Tiket</h2>
      <p>
        Kode Invoice: Y8MSPLWY
      </p>
      <p>
        Total: 200.000
      </p>

      <img src="images/QRIS.jpg" alt="QR Code Tiket">

    </section>
  </div>
</div>
</div>

  




</body>
</html>


    @endsection
</body>
</html>
