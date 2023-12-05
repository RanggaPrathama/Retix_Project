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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />


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

                @if(!empty($error))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{$error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row mb-5">
                    <form class="col-md-12" method="post">
                        <div class="site-blocks-table">
                            <table class="table" id="myTable" class="display">
                                <thead>
                                    <tr>
                                        <th class="text-black">Events</th>
                                        <th class="text-black">Invoice</th>
                                        <th class="text-black">Buy At</th>
                                        <th class="text-black">Subtotal</th>
                                        <th class="text-black">Status</th>
                                        <th class="text-black">Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr>
                                        <td class="product-thumbnail">
                                            <img src="{{ asset('images/card2.png') }}" alt="Image" class="img-fluid">
                                        </td>

                                        <td class="product-name">
                                            <h2 class="h5 text-black">Y8MSPLWY</h2>
                                        </td>
                                        <td class="h5 text-black">26 November 2023 | 10:08</td>
                                        <td class="h5 text-black">Rp. 400.000</td>
                                        <td class="h5 text-danger">Aktif</td>
                                        <td><a href="{{ route('detilpesan') }}" class="btn btn-black btn-sm"><button
                                                    id="show" type="button">Show</button></a></td>
                                    </tr> --}}
                                    @if(isset($riwayat) && count($riwayat) > 0)
                                    @foreach ($riwayat as $pesan)


                                    <tr>
                                        <td class="product-thumbnail">
                                            <img src="{{ asset('gambarEvent/'.$pesan->gambar_event) }}" alt="Image" class="img-fluid">
                                        </td>

                                        <td class="text-black">
                                           {{ $pesan->slug }}
                                        </td>
                                        <td class=" text-black">
                                            {{ \Carbon\Carbon::parse($pesan->tgl_pembayaran)->format('d F Y | H:i') }}
                                        </td>
                                        <td class=" text-black">{{ $pesan->total_tagihan }}</td>
                                        <td class=" text-black">

                                            @if ($pesan->status_pembayaran== 0)
                                                <div class="text-danger">
                                                    Expired
                                                </div>
                                            @elseif ($pesan->status_pembayaran == 1)
                                                <div class="text-success">
                                                    Paid
                                                </div>
                                            @elseif($pesan->status_pembayaran == 2)
                                                <div class="text-warning">
                                                    Menunggu Pembayaran
                                                </div>
                                            @elseif($pesan->status_pembayaran == 3)
                                                <div class="text-warning">
                                                    Menunggu Acc
                                                </div>

                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{route('detilpesan',$pesan->slug)  }}" ><button type="button"
                                                    id="show">Show</button></a>

                                            @if ($pesan->status_pembayaran == 2 )

                                            <a href="{{ route('membayar',$pesan->slug) }}" class="btn btn-warning btn-sm"><button type="button"
                                                id="bayar">Bayar</button></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach


                                    @endif
                                </tbody>
                            </table>

                        </div>
                    </form>
                </div>


            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js" defer></script>

        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
    @endsection


</body>

</html>
