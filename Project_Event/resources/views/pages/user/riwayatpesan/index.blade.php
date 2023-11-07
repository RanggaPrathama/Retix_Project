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

    @extends('layouts.appUser')
    @section('content')
    <div class="untree_co-section before-footer-section" style="background-image:linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);">
        <div class="container">
          <div class="row mb-5" >
            <form class="col-md-12" method="post">
              <div class="site-blocks-table">
                <table class="table" >
                  <thead>
                    <tr>
                      <th class="product-thumbnail">Image</th>
                      <th class="product-name">Product</th>
                      <th class="product-price">Price</th>
                      <th class="product-quantity">Quantity</th>
                      <th class="product-total">Total</th>
                      <th class="product-remove">Remove</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="product-thumbnail">
                        <img src="{{ asset('images/card2.png') }}" alt="Image" class="img-fluid">
                      </td>
                      <td class="product-name">
                        <h2 class="h5 text-white">Product 1</h2>
                      </td>
                      <td>$49.00</td>
                      <td>
                        <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
                          <div class="input-group-prepend">
                            <button class="btn btn-outline-black decrease" type="button">&minus;</button>
                          </div>
                          <input type="text" class="form-control text-center quantity-amount" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                          <div class="input-group-append">
                            <button class="btn btn-outline-black increase" type="button">&plus;</button>
                          </div>
                        </div>

                      </td>
                      <td>$49.00</td>
                      <td><a href="#" class="btn btn-black btn-sm">X</a></td>
                    </tr>

                    <tr>
                      <td class="product-thumbnail">
                        <img src="{{ asset('images/card3.png') }}" alt="Image" class="img-fluid">
                      </td>
                      <td class="product-name">
                        <h2 class="h5 text-white">Product 2</h2>
                      </td>
                      <td>$49.00</td>
                      <td>
                        <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
                          <div class="input-group-prepend">
                            <button class="btn btn-outline-black decrease" type="button">&minus;</button>
                          </div>
                          <input type="text" class="form-control text-center quantity-amount" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                          <div class="input-group-append">
                            <button class="btn btn-outline-black increase" type="button">&plus;</button>
                          </div>
                        </div>

                      </td>
                      <td>$49.00</td>
                      <td><a href="#" class="btn btn-black btn-sm">X</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </form>
          </div>




                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
</body>
</html>
