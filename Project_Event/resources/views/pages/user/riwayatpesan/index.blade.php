<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="riwayatpesan/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="riwayatpesan/tiny-slider.css" rel="stylesheet">
		<link href="riwayatpesan/style.css" rel="stylesheet">
</head>
<body>
  <section class="header-section" id="section_1">
        <div class="container-fluid page-header py-4 mb-5 wow fadeIn custom-header" style="height: 300px">
            <div class="container py-5 mt-5">
                <h2 class=" text-white py-5 px-4 mb-4 animated slideInDown">Riwayat Pemesanan</h2>
            </div>
        </div>
    </section>

    @extends('layouts.appUser')
    @section('content')
    <div class="untree_co-section before-footer-section" style="background-color: #ffffff;margin-top: -120px;">
        <div class="container">

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
          <div class="row mb-5">
            <form class="col-md-12" method="post">
              <div class="site-blocks-table">
              <table class="table">
                <thead>
                  <tr>
                      <th class="text-black">Image</th>
                      <th class="text-black">Invoice</th>
                      <th class="text-black">Buy At</th>
                      <th class="text-black">Subtotal</th>
                      <th class="text-black">Status</th>
                      <th class="text-black">Details</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      <td class="product-thumbnail">
                        <img src="{{ asset('images/card2.png') }}" alt="Image" class="img-fluid">
                      </td>
                      <td class="product-name">
                        <h2 class="h5 text-black">Y8MSPLWY</h2>
                      </td>
                      <td class="h5 text-black">26 November 2023 | 10:08</td>
                      <td class="h5 text-black">Rp. 400.000</td>
                      <td class="h5 text-danger">Aktif</td>
                      <td><a href="{{ route('detilpesan') }}" class="btn btn-black btn-sm"><button id="show" type="button">Show</button></a></td>
                  </tr>
                  <tr>
                      <td>
                        <img src="{{ asset('images/card3.png') }}" alt="Image" class="img-fluid">
                      </td>
                      <td>
                        <h2 class="h5 text-black">GAHWNDG</h2>
                      </td>
                      <td class="h5 text-black">27 November 2023 | 08:10</td>
                      <td class="h5 text-black">Rp. 200.000</td>
                      <td class="h5 text-black">Tidak Aktif</td>
                      <td><a href="#" class="btn btn-black btn-sm"><button type="button" id="show">Show</button></a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection

</body>
</html>
