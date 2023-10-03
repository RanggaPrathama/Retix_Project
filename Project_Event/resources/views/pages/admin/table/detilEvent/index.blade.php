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

                    <a href="{{ route('detilevent.create') }}"><button type="button" class="btn btn-primary">Create</button></a>

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <th>Id Detil Event</th>
                          <th>Nama Event</th>
                          <th>Nama Kategori</th>
                          <th>Kuota Event </th>
                          <th>Harga Event </th>
                        <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($detilEvents as $detilEvent )
                        <tr>
                          <td>{{ $detilEvent->id_detilEvent  }}</td>
                          <td>{{ $detilEvent->nama_event }}</td>
                          <td>{{ $detilEvent->nama_kategori  }}</td>
                          <td>{{ $detilEvent->kuota_event }}</td>
                          <td>{{ $detilEvent->harga_event }}</td>

                          <td>
                            <a href="{{ route('detilevent.edit',$detilEvent->id_detilEvent) }}"><button type='submit'class="btn btn-success"><i class="bi bi-pencil-square"></i></button></a>
                            <form action="{{ route('detilevent.destroy',$detilEvent->id_detilEvent) }}"
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
                            <th>Id Detil Event</th>
                            <th>Id Event</th>
                            <th>Id Kategori</th>
                            <th>Kuota Event </th>
                            <th>Harga Event </th>
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

