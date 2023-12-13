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

                <form action="{{ route('user.update',$users->id_user) }}" method="post" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <label>Username</label></br>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name',$users->name) }}"></br>

                    <label>Email</label></br>
                    <input type="email" name="email" id="name" class="form-control" value="{{ old('email',$users->email) }}"></br>


                    <label>Password</label></br>
                    <input type="text" name="password" id="name" class="form-control" value="{{ old('password',$users->password) }}"></br>


                    <label>Nomor Telfon</label></br>
                    <input type="text" name="no_telp" id="name" class="form-control" value="{{ old('no_telp',$users->no_telp) }}"></br>
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

