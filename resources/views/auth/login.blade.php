<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>
<<<<<<< HEAD

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>

 
          <link href="{{ asset('dist/css/adminlte.css') }}" rel="stylesheet">

=======
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
    <link href="{{ asset('dist/css/adminlte.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/styles.css') }}" rel="stylesheet">
>>>>>>> e19bcdabde31c9174269652d945e9d8c56c6b0b4
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
<<<<<<< HEAD
        <a href="{{ url('/home') }}"><b>{{ config('app.name') }}</b></a>
=======
        <a href="{{ url('/home') }}"> <img src="{{ asset('img/logo.png') }}" alt="{{ config('app.name') }}"> </a>
>>>>>>> e19bcdabde31c9174269652d945e9d8c56c6b0b4
    </div>
    <!-- /.login-logo -->

    <!-- /.login-box-body -->
<<<<<<< HEAD
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form method="post" action="{{ url('/login') }}">
                @csrf

=======
    <div class="card borderded">
        <div class="card-body login-card-body borderded">
            <form method="post" action="{{ url('/login') }}">
                @csrf
>>>>>>> e19bcdabde31c9174269652d945e9d8c56c6b0b4
                <div class="input-group mb-3">
                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           placeholder="Email"
                           class="form-control @error('email') is-invalid @enderror">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                    </div>
                    @error('email')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
<<<<<<< HEAD

=======
>>>>>>> e19bcdabde31c9174269652d945e9d8c56c6b0b4
                <div class="input-group mb-3">
                    <input type="password"
                           name="password"
                           placeholder="Password"
                           class="form-control @error('password') is-invalid @enderror">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
<<<<<<< HEAD

                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">Remember Me</label>
                        </div>
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
=======
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Se connecter <i class="fa fa-arrow-right"></i></button>
>>>>>>> e19bcdabde31c9174269652d945e9d8c56c6b0b4
                    </div>

                </div>
            </form>

<<<<<<< HEAD
            <p class="mb-1">
                <a href="{{ route('password.request') }}">I forgot my password</a>
            </p>
            <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
=======
            <p class="mb-1 mt-3 float-right">
                <a href="{{ route('password.request') }}">Mot de passe oublier</a>
>>>>>>> e19bcdabde31c9174269652d945e9d8c56c6b0b4
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>

</div>
<!-- /.login-box -->


<script src="{{ asset('dist/js/adminlte.js') }}" defer></script>

</body>
</html>
