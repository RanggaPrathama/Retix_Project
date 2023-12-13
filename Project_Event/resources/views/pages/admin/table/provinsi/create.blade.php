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

                <form action="{{ route('provinsi.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label>Nama Provinsi</label></br>
                    <input type="text" name="nama_provinsi" id="name" class="form-control @error('nama_provinsi') is-invalid @enderror">
                    @error('nama_provinsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
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
 {{-- <script src="{{ asset('js/adminlte.min.js') }}"></script> --}}

</body>



@endsection

