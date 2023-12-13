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
                                    {{ $error }}
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
                                        <h3 class="card-title">Pemesanan</h3>

                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">

                                        {{-- <a href="{{ route('event.create') }}"><button type="button"
                                                class="btn btn-primary">Create</button></a> --}}

                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Id Pemesanan</th>
                                                    <th>Nama User</th>
                                                    <th>Payment </th>
                                                    <th>tgl pesan </th>
                                                    <th>Total </th>
                                                    <th>Status</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pemesanans as $pesan)
                                                    <tr>
                                                        <td>{{ $pesan->id_pemesanan }}</td>
                                                        <td>{{ $pesan->name }}</td>
                                                        <td>{{ $pesan->nama }}</td>
                                                        <td>{{ $pesan->tgl_pesan }}</td>
                                                        <td>{{ $pesan->total_tagihan }}</td>
                                                        <td>
                                                            @if ($pesan->status_pemesanan == 0)
                                                                <p class="text-danger"> Expired </p>
                                                            @elseif ($pesan->status_pemesanan == 1)
                                                                <p class="text-success">Done </p>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{-- <a href="{{ route('event.edit', $event->slug) }}"><button
                                                                    type='submit'class="btn btn-success"><i
                                                                        class="bi bi-pencil-square"></i></button></a> --}}
                                                            <form action="{{ route('pemesanan.destroy', $pesan->slug) }}"
                                                                method="POST" style="display: inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    onclick="return confirm('Are you sure ?')"
                                                                    class="btn btn-danger"><i
                                                                        class="bi bi-trash3-fill"></i></button>


                                                            </form>

                                                        </td>

                                                    </tr>
                                                @endforeach


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Id Pemesanan</th>
                                                    <th>Nama User</th>
                                                    <th>Payment </th>
                                                    <th>tgl pesan </th>
                                                    <th>Total </th>
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


                    <div class="container-fluid mt-4">
                        <div class="row">
                            <div class="col-12">

                                <!-- /.card -->

                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Detil Pemesanan</h3>

                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">

                                        {{-- <a href="{{ route('event.create') }}"><button type="button"
                                                class="btn btn-primary">Create</button></a> --}}

                                        <table id="example2" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Id Detil Pesan</th>
                                                    <th>Id Pemesanan</th>
                                                    <th>Id Detil Event</th>
                                                    <th>Quantity </th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($detilPesans as $detil)
                                                    <tr>
                                                        <td>{{ $detil->id_detilPemesanan }}</td>
                                                        <td>{{ $detil->id_pemesanan }}</td>
                                                        <td>{{ $detil->id_detilEvent }}</td>
                                                        <td>{{ $detil->quantity }}</td>

                                                        <td>
                                                            {{-- <a href="{{ route('event.edit', $event->slug) }}"><button
                                                                    type='submit'class="btn btn-success"><i
                                                                        class="bi bi-pencil-square"></i></button></a> --}}
                                                            <form action="{{ route('detilpesan.destroy', $detil->id_detilPemesanan) }}"
                                                                method="POST" style="display: inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    onclick="return confirm('Are you sure ?')"
                                                                    class="btn btn-danger"><i
                                                                        class="bi bi-trash3-fill"></i></button>


                                                            </form>

                                                        </td>

                                                    </tr>
                                                @endforeach


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Id Detil Pesan</th>
                                                    <th>Id Pemesanan</th>
                                                    <th>Id Detil Event</th>
                                                    <th>Quantity </th>
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
        {{-- <script src="{{ asset('js/adminlte.min.js') }}"></script> --}}

    </body>
@endsection
