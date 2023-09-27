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
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
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
                <h3 class="card-title">DataTable with default features</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body">

                    <a href="{{ route('lokasi.create') }}"><button type="button" class="btn btn-primary">Create</button></a>

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>Id Lokasi</th>
                          <th>Nama Lokasi</th>
                          <th>Id Kecamatan</th>
                          <th>Nama Kecamatan</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($lokasis as $lokasi )
                        <tr>
                          <td>{{ $lokasi->id_lokasi }}</td>
                          <td>{{ $lokasi->nama_lokasi }}</td>
                          <td>{{ $lokasi->id_kecamatan }}</td>
                          <td>{{ $lokasi->nama_kecamatan }}</td>
                          <td>
                            <a href="{{ route('lokasi.edit',$lokasi->id_lokasi) }}"><button type='submit'class="btn btn-success"><i class="bi bi-pencil-square"></i></button></a>
                            <form action="{{ route('lokasi.destroy',$lokasi->id_lokasi) }}"
                                method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure ?')"
                                class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>


                            </form>

                        </td>

                        </tr>
                        @endforeach


                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Id Lokasi</th>
                            <th>Nama Lokasi</th>
                            <th>Id Kecamatan</th>
                            <th>Nama Kecamatan</th>
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

