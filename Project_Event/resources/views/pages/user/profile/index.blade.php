<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                    <img src="images/fotoku.jpeg" alt="user avatar">
                  </div>
                  <h5 class="mb-1 text-white">Rangga Prathama N.H</h5>
                 </div>

                 </div>
               </div>
            </div>
            <div class="col-lg-8" style="margin-top: -150px">
               <div class="card z-depth-3">
                <div class="card-body">
                <div class="tab-pane" id="edit">
                        <form>
                        <h5 class="mb-3">User Profile</h5>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">First name</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" value="Rangga">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" value="Prathama N.H">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">NIK</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" value="351507234577907">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="email" value="rangga.sangar123@gmail.com">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Change profile</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="file">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">No Telp</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" value="081234567829">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="password" value="11111122333">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="password" value="11111122333">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                <div class="col-lg-9">
                                    <input type="reset" class="btn btn-secondary" value="Cancel">
                                    <input type="button" class="btn btn-primary" value="Save Changes">
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


</body>
</html>
@endsection
