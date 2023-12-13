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
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">

                                <!-- /.card -->

                                <div class="card">

                                    <!-- /.card-header -->
                                    <div class="card-body">

                                        <form action="{{ route('payment.update',$payments->slug) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <div class="row">
                                                <div class="col-lg-4">

                                                        <label>Nama Payment </label></br>
                                                        <input type="text" name="nama" id="name" value="{{ old('nama',$payments->nama) }}"
                                                            class="form-control @error('nama') is-invalid  @enderror">
                                                        @error('nama')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror

                                                </div>

                                                <div class="col-lg-4">

                                                    <label>Atas Nama </label></br>
                                                    <input type="text" name="atasnama" id="name" value="{{ old('atasnama',$payments->atasnama) }}"
                                                        class="form-control @error('atasnama') is-invalid  @enderror">
                                                    @error('atasnama')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror

                                            </div>

                                                <div class="col-lg-4">
                                                    <label>Nomer Payment </label></br>
                                                    <input class='form-control'type="text" name="nomer" value="{{ old('nomer',$payments->nomer) }}" />
                                                    @error('nomer')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror <br>
                                                </div>


                                            </div>


                                            <div class="row">
                                            <div class="col-lg-4">
                                                <label>Logo Payment</label></br>
                                                <input type="file" name="logo" id="name"
                                                    class="form-control @error('logo') is-invalid  @enderror">
                                                @error('logo')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>

                                            <div class="col-lg-4">
                                                <label>Gambar Scan Payment</label></br>
                                                <input type="file" name="gambar" id="name"
                                                    class="form-control @error('gambar') is-invalid  @enderror">
                                                @error('gambar')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>

                                            <div class="col-lg-4">
                                                <label>Pilih Status</label></br>
                                                @php
                                                    $oldStatus = old('status',$payments->status)
                                                @endphp
                                                    <select name="status" id="" class="form-control @error('status') is-invalid @enderror">
                                                        @foreach ( $status as $status1 => $deskripsi )

                                                        <option value="{{ $status1 }}" {{ $oldStatus == $status1 ? 'selected' :''}}>
                                                            {{ $deskripsi }}
                                                        </option>
                                                        @endforeach
                                                    </select>

                                                    @error('status')
                                                        <div class="invalid-feedback"> {{ $message }}</div>
                                                    @enderror
                                                    <br>
                                             </div>


                                            </div>

                                            <br>
                                            <input type="submit" value="Save" class="btn btn-success"></br>

                                        </form>

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


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




        <!-- AdminLTE App -->
        {{-- <script src="{{ asset('js/adminlte.min.js') }}"></script> --}}



    </body>
@endsection
