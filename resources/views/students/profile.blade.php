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
                       src="{{asset('uploads/students')}}/{{$user->avatar}}"
                       alt="Student profile picture">
                </div>

                <h3 class="profile-username text-center">{{$user->student_name}} {{$user->student_surname}}</h3>

                <p class="text-muted text-center">{{$user->student_code}}</p>

         
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
                      <form method="POST" action="{{ route('userUpdate',$user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group ">
                          <label for="name" class="col-sm-2">Nom(s)</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" >
                          </div>
                        </div>
                        <div class="form-group ">
                          <label for="email" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-12">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" >
                          </div>
                        </div>
                        <div class="form-group ">
                          <label for="inputName2" class="col-sm-2">Niveau d'accès</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" value="{{ $user->level }}" readonly>
                          </div>
                        </div>
                        <div class="form-group ">
                          <label for="inputName2" class="col-sm-2">Avatar</label>
                          <div class="col-sm-12">
                            <input type="file" name="avatar" class="form-control" title="Entré votre avatar">
                          </div>
                        </div>
                        <div class="card-header p-2 mt-3">
                          <ul class="nav nav-pills">
                            <h4 class="m-1 bold"> <b>Information de Connexion</b> </h4>
                          </ul>
                        </div><!-- /.card-header -->
                        <div class="form-group mt-3">
                          <label for="inputSkills" class="col-sm-12 col-form-label">Mot de passe actuel</label>
                          <div class="col-sm-12">
                            <input type="password" class="form-control @error('password_actuel') is-invalid @enderror" name="password_actuel">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputSkills" class="col-sm-12 col-form-label">Nouveau Mot de passe</label>
                          <div class="col-sm-12">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                          </div>
                        </div>
                        <div class="form-group ">
                          <label for="inputSkills" class="col-sm-12 col-form-label">Confirmer le Mot de passe</label>
                          <div class="col-sm-12">
                            <input id="password-confirm" type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                          </div>
                        </div>
                        <div class="form-group mt-5">
                          <div class=" col-sm-12">
                            <button type="submit" class="btn btn-success float-right"><span class="fa fa-check"></span> Valider</button>
                          </div>
                        </div>
                      </form>
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
