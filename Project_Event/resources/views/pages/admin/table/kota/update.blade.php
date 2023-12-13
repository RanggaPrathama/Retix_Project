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

                                        <form action="{{ route('kota.update',$kotas->id_kota) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <label>Name Kota</label></br>
                                            <input type="text" name="nama_kota" id="name" value="{{ old('nama_kota',$kotas->nama_kota) }}"
                                                class="form-control @error('nama_kota') is-invalid  @enderror">
                                            @error('nama_kota')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <br>




                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group mb-3">
                                                        <label for="inputProvinsi">Provinsi</label>
                                                        <select class="form-control" id="inputProvinsi"
                                                            aria-label="Pilih Provinsi" name="provinsi" style="width: 100%;"
                                                            required>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

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


        <script>
            $(document).ready(function() {
                $("#inputProvinsi").select2({
                    placeholder: 'Pilih Provinsi',
                    ajax: {
                        url: "{{ route('pilihProvinsi') }}",
                        processResults: function({
                            data
                        }) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        id: item.id_provinsi,
                                        text: item.nama_provinsi
                                    }
                                })
                            }
                        }
                    }
                });



            });
        </script>

        <!-- AdminLTE App -->
       


    </body>
@endsection
