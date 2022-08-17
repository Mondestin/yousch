@extends('layouts.app')

@section('content-header')
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-6">
            <h1>Profile de {{$user->student_name}} {{$user->student_surname}}</h1>
          </div>
        </div>
      </div>
@endsection
@section('content')
<div class="container-fluid">
        <div class="row m-1">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-purple card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$user->student_name}} {{$user->student_surname}}</h3>

                <p class="text-muted text-center">Software Engineer</p>

         
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-outline card-purple">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Informations Personnelles</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Informations de Connexion</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                        <div>
                           <h3>123456</h3>
                        </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                         <div>
                           <h3>23456</h3>
                        </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection
