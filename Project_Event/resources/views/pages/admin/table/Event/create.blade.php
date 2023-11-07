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

                                        <form action="{{ route('event.store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <label>Name Event</label></br>
                                            <input type="text" name="nama_event" id="name"
                                                class="form-control @error('nama_event') is-invalid  @enderror">
                                            @error('nama_event')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <br>

                                            <label>Nama Lokasi </label></br>
                                            <input class='form-control'type="text" name="nama_lokasi" />
                                            @error('nama_lokasi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror <br>


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


                                                <div class="col-lg-4">
                                                    <div class="form-group mb-3">
                                                        <label for="inputKota">Kota/Kabupaten</label>
                                                        <select class="form-control" id="inputKota" name="kota"
                                                            aria-label="Pilih Kota/Kabupaten" style="width: 100%" required>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-lg-4">
                                                    <div class="form-group mb-3">
                                                        <label for="inputKecamatan">Kecamatan</label>
                                                        <select class="form-control" id="inputKecamatan" name="kecamatan"
                                                            aria-label="Pilih Kecamatan" style="width: 100%" required>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <label>Tanggal Event</label></br>

                                            <input type="date" name="tgl_event" id="name"
                                                class="form-control @error('tgl_event') is-invalid  @enderror">
                                            @error('tgl_event')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <br>
                                            <label>Gambar Event</label></br>
                                            <input type="file" name="gambar_event" id="name"
                                                class="form-control @error('gambar_event') is-invalid  @enderror">
                                            @error('gambar_event')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label> Deskripsi Event </label></br>
                                            <textarea class="form-control @error('deskripsi_event') is-invalid @enderror" name="deskripsi_event" id=""
                                                cols="40" rows="10"></textarea>
                                            @error('deskripsi_event')
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
                $('#inputProvinsi').change(function() {
                    let id = $('#inputProvinsi').val();
                    let url = "/event/kota/" + id;
                    $("#inputKota").select2({
                        placeholder: 'Pilih Kota/Kabupaten',
                        ajax: {
                            url: url,
                            processResults: function({
                                data
                            }) {
                                return {
                                    results: $.map(data, function(item) {
                                        return {
                                            id: item.id_kota,
                                            text: item.nama_kota
                                        }
                                    })
                                }
                            }
                        }
                    });
                });

                $('#inputKota').change(function() {
                    let id = $('#inputKota').val();
                    let url = '/event/kecamatan/' + id;
                     $('#inputKecamatan').empty();
                    $('#inputKecamatan').select2({
                        placeholder: 'Pilih Kecamatan',
                        ajax: {
                            url: url,
                            processResults: function({
                                data
                            }) {
                                return {
                                    results: $.map(data, function(item) {
                                        return {
                                            id: item.id_kecamatan,
                                            text: item.nama_kecamatan
                                        }
                                    })
                                }
                            }
                        }
                    })
                })


            });
        </script>

        <!-- AdminLTE App -->
        <script src="{{ asset('js/adminlte.min.js') }}"></script>



    </body>
@endsection
