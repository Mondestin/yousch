<!DOCTYPE html>
<<<<<<< HEAD
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link href="{{ asset('dist/css/adminlte.css') }}" rel="stylesheet">

    <!-- Datable bootstrap -->
    {{-- <link href="{{ asset('dist/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('dist/css/jquery.dataTables.min.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('dist/css/bootstrap.min.css') }}" rel="stylesheet"> --}}

    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

    @yield('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
=======
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <link rel="icon" href="{{asset('img/logo.png')}}" type="image/ico" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link href="{{ asset('dist/css/adminlte.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
    @yield('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-footer-fixed layout-navbar-fixed">
>>>>>>> e19bcdabde31c9174269652d945e9d8c56c6b0b4
<div class="wrapper">
    <!-- Main Header -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
<<<<<<< HEAD

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"
                         class="user-image img-circle elevation-2" alt="User Image">
                    <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- User image -->
                    <li class="user-header bg-primary">
                        <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"
                             class="img-circle elevation-2"
                             alt="User Image">
                        <p>
=======
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="{{asset('img/user.png')}}"
                         class="user-image img-circle" alt="User Image" style="border: 1px solid #6633CC!important;">
                    <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" >
                    <!-- User image -->
                    <li class="user-header">
                        <img src="{{asset('img/user.png')}}"
                             class="img-circle"
                             alt="User Image" style="border: 2px solid #6633CC!important;">
                        <p  class="text-dark">
>>>>>>> e19bcdabde31c9174269652d945e9d8c56c6b0b4
                            {{ Auth::user()->name }}
                            <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
<<<<<<< HEAD
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                        <a href="#" class="btn btn-default btn-flat float-right"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sign out
=======
                        <a href="#" class="btn btn-default btn-flat border">Profile <i class="fa-solid fa-user-cog"></i></a>
                        <a href="#" class="btn btn-default btn-flat float-right border"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Se déconnecter <i class="fa-solid fa-right-from-bracket"></i>
>>>>>>> e19bcdabde31c9174269652d945e9d8c56c6b0b4
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Left side column. contains the logo and sidebar -->
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
<<<<<<< HEAD
        @yield('content')
    </div>

=======
          <section class="content-header">
             @yield('content-header')
           </section>
          <!-- Main content -->
           <section class="content">
             @yield('content')
           </section>
    </div>
>>>>>>> e19bcdabde31c9174269652d945e9d8c56c6b0b4
    <!-- Main Footer -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 1.0.1
        </div>
        <strong>Copyright &copy; {{ date('Y')}} <a href="https://yousch.com">Yousch</a>.</strong> All rights
        reserved.
    </footer>
</div>

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('dist/js/adminlte.js') }}" defer></script>
<!--  jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<<<<<<< HEAD

<!-- Datatable bootstrap  -->
{{-- <script src="{{asset('dist/js/bootstrap/js/jquery.dataTables.min.js')}}"></script> --}}
{{-- <script src="{{asset('dist/js/bootstrap/js/dataTables.bootstrap4.min.js')}}"></script> --}}
{{-- <script src="{{asset('dist/js/bootstrap/js/jquery-3.5.1.js')}}"></script> --}}

<script src="https://code.jquery.com/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
@yield('scripts')
<script>
    $(document).ready(function() {
  $('#dataTable').DataTable();
});
=======
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>
 @yield('scripts')
<!-- page script -->
<script>
$(function(){
    @if(Session::has('success'))
        Swal.fire({
        icon: 'success',
        title: 'Succès!',
        text: '{{ Session::get("success") }}'
    })
    @endif
});
@if(Session::has('error'))
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '{{ Session::get("error") }}'
    })
@endif
>>>>>>> e19bcdabde31c9174269652d945e9d8c56c6b0b4
</script>
</body>
</html>
