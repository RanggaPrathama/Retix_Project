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
             <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Id Kategori</th>
                    <th>Nama Kategori</th>

                  </tr>
                  </thead>
                  <tbody>

                  <tr>
                    <td>1</td>
                    <td>NetFront 3.4</td>

                  </tr>

                  <tr>
                    <td>2</td>
                    <td>All others</td>

                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Id Kategori</th>
                    <th>Nama Kategori</th>

                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>Id Kategori</th>
                          <th>Nama Kategori</th>

                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                          <td>1</td>
                          <td>NetFront 3.4</td>

                        </tr>

                        <tr>
                          <td>2</td>
                          <td>All others</td>

                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>Id Kategori</th>
                          <th>Nama Kategori</th>

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

