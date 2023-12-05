<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>

<body>
    <section class="header-section" id="section_1">
        <div class="container-fluid page-header py-4 mb-5 wow fadeIn custom-header" style="height: 150px">
            <div class="container py-5 mt-5">

            </div>
        </div>
    </section>

    @extends('layouts.appUser')
    @section('content')
        <div class="container">
            <div class="row">


                <div class="col-lg-4" style="margin-top: -150px">
                    <div class="profile-card-4 z-depth-3">
                        <div class="card">
                            <div class="card-body text-center bg-profile rounded-top">
                                <div class="user-box">
                                    <img src="{{ asset('profileUser/'.$users->profile_user) }}" alt="user avatar">
                                </div>
                                <h5 class="mb-1 text-white">{{ $users->name }}</h5>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-8" style="margin-top: -150px">

                    <div class="card z-depth-3">

                        <div class="card-body">
                            @if (!empty($error))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $error }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="tab-pane" id="edit">
                                <form id="form" action=" {{ url('/profile/update/' . $users->id_user) }} "
                                    method="POST">
                                    @csrf
                                    <input type="hidden" id="id_user" value="{{ $users->id_user }}">
                                    <h5 class="mb-3">User Profile</h5>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Nama Lengkap</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="name" type="text"
                                                value="{{ $users->name }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">NIK</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="no_ktp" type="text"
                                                value="{{ $users->no_ktp }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name= "email" type="email"
                                                value="{{ $users->email }} " disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Change profile</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" id="profile_user" name="profile_user" type="file" value="{{ $users->profile_user }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">No Telp</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="no_telp" type="text"
                                                value="{{ $users->no_telp }}">
                                        </div>
                                    </div>


                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                <div class="col-lg-9">
                                    {{-- <input type="reset" class="btn btn-secondary" value="Cancel"> --}}
                                    <input id="save" type="submit" class="btn btn-primary" value="Save Changes">
                                </div>
                            </div>
                            </form>
                        </div>



                    </div>
                </div>
            </div>
        </div>

        </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#save').click(function (e) {
                    e.preventDefault();

                    var id = $('#id_user').val();
                    var formData = new FormData($('#form')[0]);

                    $.ajax({
                        type: "POST",
                        url: '/profile/update/' + id,
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        success: function (response) {
                            alert('berhasil !');
                            window.location.reload();
                        },

                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);
                            alert('Terjadi kesalahan: ' + error);
                        },
                    });
                });
            });
        </script>

    </body>

    </html>
@endsection
