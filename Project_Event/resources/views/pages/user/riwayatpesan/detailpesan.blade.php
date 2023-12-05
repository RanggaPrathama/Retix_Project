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
        <div class="card-header text-center"  style="margin-left: -15px; margin-right: -15px;">
            Detail Event
        </div>

        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <img class="text-center" src="{{ asset('gambarEvent/'.$detilEvent->gambar_event) }}" alt="" width="200" height="125">
            </li>
            <li class="list-group-item">
                <strong>{{ $detilEvent->nama_event }}</strong>
            </li>
            <li class="list-group-item">
            📆 : {{ $detilEvent->tgl_event }}
            <br>
            ⏰ : {{ $detilEvent->time_event }} - Selesai
            <br>
             📍  : {{ $detilEvent->nama_lokasi }}
            </li>
        </ul>
        </div>

        <div class="card col-lg-8" style="margin-top: -30px;">
        <div class="card-header text-center" style="margin-left: -15px; margin-right: -15px;">
            Purchase Details
        </div>

        {{-- @if (!empty('error'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert" style="margin-top:20px">
            <strong>{{ $error }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif --}}

        @foreach ($puchaseDetail as $purchase )


       @if ($purchase->status_pembayaran == 0)


        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert" style="margin-top:20px">
            <strong>Maaf Pembayaran Anda Telah Kedaluwarsa</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

         @elseif ($purchase->status_pembayaran == 1)
          <div class="alert alert-success alert-dismissible fade show text-center" role="alert" style="margin-top:20px">
            <strong>Anda Selesai Melakukan Pembayaran</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

       @elseif ($purchase->status_pembayaran == 2)
        <div class="alert alert-warning alert-dismissible fade show text-center" role="alert" style="margin-top:20px">
            <strong>Mohon Segera Melakukan Pembayaran</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

        @elseif ($purchase->status_pembayaran == 3)
        <div class="alert alert-warning alert-dismissible fade show text-center" role="alert" style="margin-top:20px">
            <strong>Mohon tunggu untuk ACC Pembayaran</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

        @else
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert" style="margin-top:20px">
            <strong>Pembayaran Anda Ditolak !</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
         @endif
         @endforeach

        <ul class="list-group list-group-flush">
            @foreach ($puchaseDetail as $purchase )


            <li class="list-group-item ">
                <table class="table table-borderless">
                    <tr>
                        <td scope="col">Invoice</td>
                        <td scope="col">:</td>
                        <td scope="col">{{ $purchase->slug }}</td>
                    </tr>
                    <tr>
                        <td>Buy At</td>
                        <td>:</td>
                        <td>{{\Carbon\Carbon::parse($purchase->tgl_pembayaran)->translatedFormat('l, d F Y | H:i')}}</td>
                    </tr>
                    <tr>
                        <td>Payment Method</td>
                        <td>:</td>
                        <td>{{ $purchase->nama }}</td>
                    </tr>
                    <tr>
                        <td>Total Payment</td>
                        <td>:</td>
                        <td>{{'Rp. '  . number_format( $purchase->total_tagihan,'0',',','.') }}</td>
                    </tr>
                </table>
            </li>
            @endforeach
        </ul>
        </div>
    </div>








{{-- <div class="container"> --}}
    <div class="row">
        <div class="card col-lg-8" style="margin-left: 310px; margin-bottom: 70px;">
        <div class="card-header text-center font-weight-bold"  style="margin-left: -15px; margin-right: -15px;">
            Ticket Details
        </div>
        <ul class="list-group list-group-flush">

             @foreach ( $ticketDetail as $tiket)


            <li class="list-group-item ">
                <table class="table table-borderless">
                    <tr>
                        <td>Tiket {{ $tiket->nama_kategori }} <br> {{'RP '. number_format($tiket->harga_event,'0',',','.') }} x {{ $tiket->quantity}}</td>
                        <td style="text-align: right;" scope="col">{{'Rp. ' . number_format($tiket->SUBTOTAL,'0',',','.')  }}</td>
                    </tr>
                </table>
            </li>
            @endforeach
            {{-- <li class="list-group-item ">
                <table class="table table-borderless">
                    <tr>
                        <td>Tiket Silver <br> Rp. 100.000 x 1</td>
                        <td style="text-align: right;" scope="col">Rp. 100.000</td>
                    </tr>
                </table>
            </li> --}}

        </ul>
        </div>
    </div>
</div>

  {{--</div>
  --}}
</body>
</html>
@endsection
