@extends('layouts.appAdmin')
@section('content')

    <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">


            <!-- Content Wrapper. Contains page content -->

            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>DataTables</h1>
                            </div>

                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">DataTables</li>
                                </ol>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (!empty($error))
                            <div class="alert alert-danger">
                                {{ $error}}
                            </div>
                            @endif
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">

                                <!-- /.card -->

                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Pembayaran</h3>

                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">

                                        {{-- <a href="{{ route('event.create') }}"><button type="button"
                                                class="btn btn-primary">Create</button></a> --}}

                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Id Pembayaran</th>
                                                    <th>Atas nama</th>
                                                    <th>Id Pemesanan </th>
                                                    <th>Tanggal Bayar </th>
                                                    <th>Bukti Bayar</th>
                                                    <th>Status</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pembayarans as $bayar)
                                                    <tr>
                                                        <td>{{ $bayar->id_pembayaran }}</td>
                                                        <td>{{ $bayar->name }}</td>
                                                        <td>{{ $bayar->id_pemesanan }}</td>
                                                        <td>{{ $bayar->tgl_pembayaran }}</td>
                                                        <td><img src="{{ asset('buktiBayar/' . $bayar->gambar) }}"
                                                                style="width: 55px">

                                                                <a href="{{ asset('buktiBayar/'.$bayar->gambar) }}" class="btn btn-primary mt-2">
                                                                    <i class="bi bi-eye"> Lihat</i>

                                                                </a>
                                                            </td>
                                                        <td>
                                                            @if ($bayar->status_pembayaran== 0)
                                                            <div class="text-danger">
                                                                Expired
                                                            </div>
                                                        @elseif ($bayar->status_pembayaran == 1)
                                                            <div class="text-success">
                                                                Paid
                                                            </div>
                                                        @elseif($bayar->status_pembayaran == 2)
                                                            <div class="text-warning">
                                                                Menunggu Pembayaran
                                                            </div>
                                                        @elseif($bayar->status_pembayaran == 3)
                                                            <div class="text-warning">
                                                                Menunggu Acc
                                                            </div>
                                                        @else
                                                        <div class="text-danger">
                                                            Ditolak
                                                        </div>
                                                        @endif
                                                        </td>
                                                        <td>
                                                            {{-- <a href="{{ route('event.edit', $event->slug) }}"><button
                                                                    type='submit'class="btn btn-success"><i
                                                                        class="bi bi-pencil-square"></i></button></a> --}}
                                                            {{-- ACC --}}
                                                            @if($bayar->status_pembayaran == 3 || $bayar->status_pembayaran == 4 )
                                                            <form action="{{ route('bayar.acc',$bayar->slug) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit"
                                                                onclick="return confirm('Apakah Anda yakin ACC Pembayaran ?')"
                                                                class="btn btn-success"><i class="bi bi-check-lg"></i></button>
                                                            </form>


                                                            @else
                                                            {{-- TOLAK --}}
                                                            <form action="{{ route('bayar.tolak', $bayar->slug) }}"
                                                                method="POST" style="display: inline-block;">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit"
                                                                    onclick="return confirm('Apakah Anda Yakin ?')"
                                                                    class="btn btn-danger mt-2"><i class="bi bi-bag-x-fill"></i></button>


                                                            </form>
                                                            @endif
                                                        </td>

                                                    </tr>
                                                @endforeach


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Id Pembayaran</th>
                                                    <th>Atas nama</th>
                                                    <th>Id Pemesanan </th>
                                                    <th>Tanggal Bayar </th>
                                                    <th>Bukti Bayar</th>
                                                    <th>Status</th>
                                                    <th>Action</th>

                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>


            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>

        <!-- AdminLTE App -->
        <script src="{{ asset('js/adminlte.min.js') }}"></script>

    </body>
@endsection
