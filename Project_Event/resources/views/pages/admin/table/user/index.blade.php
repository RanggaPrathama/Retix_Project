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

                    {{-- <a href="{{ route('user.create') }}"><button type="button" class="btn btn-primary">Create</button></a> --}}

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>Id User</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>No Telfon</th>
                          <th>Role</th>
                        <th> Status </th>
                          <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user )
                        <tr>
                          <td>{{ $user->id_user  }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->no_telp }}</td>
                          <td>@if( $user->role == 0)
                                <h6> User </h6>
                                @else
                                <h6> Admin</h6>
                                @endif

                          </td>
                          <td>
                            @if ($user->is_actived == 1)
                                <h6>Aktif</h6>
                            @else
                            <h6>No Aktif</h6>
                            @endif
                          </td>
                          <td>
                            <a href="{{ route('user.edit',$user->id_user) }}"><button type='submit'class="btn btn-success"><i class="bi bi-pencil-square"></i></button></a>
                            <form action="{{ route('user.destroy',$user->id_user)}}"
                                method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure ?')"
                                class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>


                            </form>
                                @if ($user->role == 0)
                                <form action="{{ route('user.upgrade',$user->id_user) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <button type="submit" onclick="return confirm('Apakah anda yakin mengupgrade User menjadi Admin ?')" class="btn btn-warning" style="margin-top: 10px"><i class="bi bi-person-fill-up "></i> Upgrade Admin</button>

                                </form>

                                @else
                                <form action="{{ route('user.down',$user->id_user) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <button type="submit" onclick="return confirm('Apakah anda yakin mengganti role Admin menjadi User ?')" class="btn btn-warning" style="margin-top: 10px"><i class="bi bi-person-fill-down"></i>Down Admin</button>

                                </form>
                                @endif


                        </td>

                        </tr>
                        @endforeach


                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Id User</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>No Telfon</th>
                            <th>Role</th>
                          <th> Status </th>
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
 {{-- <script src="{{ asset('js/adminlte.min.js') }}"></script> --}}

</body>



@endsection

