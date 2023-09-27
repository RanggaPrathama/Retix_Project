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

                <form action="{{ route('lokasi.update',$lokasis->id_lokasi) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label>Nama Lokasi</label></br>
                    <input type="text" name="nama_lokasi" value="{{ old('nama_lokasi',$lokasis->nama_lokasi) }}"id="name" class="form-control @error('nama_lokasi') is-invalid @enderror">
                    @error('nama_lokasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror<br>
                    <label >Silahkan Memilih Kecamatan</label>
                    <select class="form-control @error('id_kecamatan') is-invalid @enderror" name="id_kecamatan" aria-label="Default select example">
                        <option selected>Pilih Kecamatan</option>
                        @foreach($kecamatans as $kecamatan)
                        <option value="{{ $kecamatan->id_kecamatan}}">{{ $kecamatan->nama_kecamatan }}</option>
                        @endforeach
                      </select>
                      @error('id_kecamatan')
                      <div class='invalid-feedback'>{{ $message }}</div>
                      @enderror<br>

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
 <script src="{{ asset('js/adminlte.min.js') }}"></script>

</body>



@endsection
