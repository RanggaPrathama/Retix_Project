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
    <div class="untree_co-section before-footer-section" style="background-image:linear-gradient(90deg, rgba(58, 58, 62) 20%, rgb(58, 58, 62) 35%); margin-bottom: -40px;">
        <div class="container">
          <div class="row mb-5" >
            <form class="col-md-12" method="post">
              <div class="site-blocks-table">
                <table class="table" >
                  <thead>
                    <tr>
                      <th class="product-thumbnail">Image</th>
                      <th class="product-name">Invoice</th>
                      <th class="product-price">Buy At</th>
                      <th class="product-quantity">Quantity</th>
                      <th class="product-total">Total</th>
                      <th class="product-remove">Details</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="product-thumbnail">
                        <img src="{{ asset('images/card2.png') }}" alt="Image" class="img-fluid">
                      </td>
                      <td class="product-name">
                        <h2 class="h5 text-white">Y8MSPLWY</h2>
                      </td>
                      <td>26 November 2023 | 10:08</td>
                      <td>
                        2
                      </td>
                      <td>Rp. 300.000</td>
                      <td><a href="#" class="btn btn-black btn-sm"><button id="show" type="button">Show</button></a></td>
                    </tr>

                    <tr>
                      <td class="product-thumbnail">
                        <img src="{{ asset('images/card3.png') }}" alt="Image" class="img-fluid">
                      </td>
                      <td class="product-name">
                        <h2 class="h5 text-white">GAHWNDG</h2>
                      </td>
                      <td>27 November 2023 | 08:10</td>
                      <td>
                        1
                      </td>
                      <td>Rp. 200.000</td>
                      <td><a href="#" class="btn btn-black btn-sm"><button type="button" id="show">Show</button></a>
                    </td>
                    </tr>
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
