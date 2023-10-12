<!doctype html>

<html lang="en">

 <head>

  <meta charset="UTF-8">

  <title>Register</title>

  <link rel="stylesheet" href="css/login.css">

 </head>

 <body> <!-- partial:index.partial.html -->

  <section> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>

   <div class="signin">

    <div class="content">

     <h2>Sign UP</h2>

     <div class="form">

     <div class="inputBox">
        <form action="" method="post" enctype="multipart/form-data">
           @csrf
       <input type="text"  name="name"> <i>Full Name</i>
        @if ($errors->has('name'))
            <div class='invalid-feedback'>{{ $errors->first('name') }}</div>
        @endif
      </div>

      <div class="inputBox">

       <input type="email" name="email" required> <i>Email</i>
        @if ($errors->has('email'))
            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
        @endif
      </div>

      <div class="inputBox">

        <input type="text" name="no_telp" required> <i>Nomor Telepon</i>
       @if ($errors->has('no_telp'))
        <div class='invalid-feedback'>{{ $errors->first('no_telp') }}</div>
       @endif

       </div>

      <div class="inputBox">

       <input type="password" name="password" required> <i>Password</i>
       @if ($errors->has('password'))
        <div class='text-danger'>{{ $errors->first('password') }}</div>
       @endif

      </div>

      <div class="inputBox">

        <input type="password" name="password_confirmation" required> <i>Password confirmation</i>
        @if ($errors->has('no_telp'))
        <div class='invalid-feedback'>{{ $errors->first('no_telp') }}</div>
       @endif
       </div>
       <input type="hidden" value="{{ @rand(100000, 999999) }}" name="token">
      <div class="links"> <a href="#">Forgot Password</a> <a href="{{ route('login') }}">SignIn</a>

      </div>

      <div class="inputBox">

       <input type="submit" value="LOGIN">

      </div>
    </form>
      <div class="gg">

       <button> <img src="iconlogin/google.png" width="19" height="19"> SIGN IN WITH GOOGLE</button>

      </div>

     </div>

    </div>

   </div>

  </section> <!-- partial -->

 </body>

</html>
