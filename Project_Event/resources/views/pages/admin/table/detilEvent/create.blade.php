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

                                        <form action="{{ route('detilevent.store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <label>Pilih Event </label>

                                            <select class="form-control @error('id_event') @enderror" name="id_event">
                                                <option value="">Silahkan Memilih</option>
                                                @foreach ($events as $event)
                                                    <option value="{{ $event->id_event }}">{{ $event->nama_event }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_event')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <br>

                                            <label>Pilih Kategori </label></br>
                                            <select class="form-control @error('id_kategori') is-invalid @enderror "
                                                name="id_kategori" aria-label="Default">
                                                <option selected>Silahkan Memilih </option>
                                                @foreach ($kategoris as $kategori)
                                                    <option value="{{ $kategori->id_kategori }}">
                                                        {{ $kategori->nama_kategori }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_kategori')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror <br>
                                            <label>Kuota Event</label></br>
                                            <input type="text" name="kuota_event" id="name"
                                                class="form-control @error('kuota_event') is-invalid  @enderror" value="{{old('kuota_event') }}">
                                            @error('kuota_event')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <br>
                                            <label>Harga Event </label></br>
                                            <input type="text" name="harga_event" id="name"
                                                class="form-control @error('harga_event') is-invalid  @enderror" value="{{ old('harga_event') }}">
                                            @error('harga_event')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
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

        <!-- AdminLTE App -->
      

    </body>
@endsection
