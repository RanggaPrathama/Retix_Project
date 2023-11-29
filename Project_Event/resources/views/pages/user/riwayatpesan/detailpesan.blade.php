<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('riwayatpesan/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <section class="header-section" id="section_1">
        <div class="container-fluid page-header py-4 mb-5 wow fadeIn custom-header " style="height: 300px;">
            <div class="container py-5 mt-5">
                <h2 class=" text-white py-5 px-4 mb-4 animated slideInDown">Detail Pemesanan</h2>
            </div>
        </div>
    </section>

@extends('layouts.appUser')
@section('content')

<div class="container">
    <div class="row">
        <div class="card col-lg-3 mx-4" style="margin-top: -30px;">
        <div class="card-header text-center">
            Detail Event
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <img class="text-center" src="gambarEvent/card2.png" alt="" width="250" height="125">
            </li>
            <li class="list-group-item">
            📆 : 26 November 2023
            <br>
            ⏰ : 16:00 - Selesai
            <br>
             📍  : Plaza Surabaya
            </li>
        </ul>
        </div>

        <div class="card col-lg-8" style="margin-top: -30px;">
        <div class="card-header text-center">
            Purchase Details
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item ">
                <table class="table table-borderless">
                    <tr>
                        <td scope="col">Invoice</td>
                        <td scope="col">:</td>
                        <td scope="col">Y8MSPLWY</td>
                    </tr>
                    <tr>
                        <td>Buy At</td>
                        <td>:</td>
                        <td>26 November 2023 | 10:08</td>
                    </tr>
                    <tr>
                        <td>Payment Method</td>
                        <td>:</td>
                        <td>QRIS</td>
                    </tr>
                    <tr>
                        <td>Total Payment</td>
                        <td>:</td>
                        <td>Rp. 300.000</td>
                    </tr>
                </table>
            </li>
        </ul>
        </div>
    </div>





    </div>
</div>

<div class="container">
    <div class="row">
        <div class="card col-lg-8" style="margin-left: 357px; margin-bottom: 70px;">
        <div class="card-header text-center font-weight-bold">
            Ticket Details
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item ">
                <table class="table table-borderless">
                    <tr>
                        <td>Tiket Gold <br> Rp. 150.000 x 2</td>
                        <td style="text-align: right;" scope="col">Rp. 300.000</td>
                    </tr>
                </table>
            </li>
            <li class="list-group-item ">
                <table class="table table-borderless">
                    <tr>
                        <td>Tiket Silver <br> Rp. 100.000 x 1</td>
                        <td style="text-align: right;" scope="col">Rp. 100.000</td>
                    </tr>
                </table>
            </li>
        </ul>
        </div>
    </div>


    </div>
</div>
</body>
</html>
@endsection
