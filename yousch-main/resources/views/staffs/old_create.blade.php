@extends('layouts.app')

@section('content')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Créer un nouveau staff</h3>
        
        @if (session()->has("success"))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <!-- Content Row -->
        <div class="row">
            <!-- Donut Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Photo de profile</h6>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body mx-auto d-block">
                        <div class="mb-4" >
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROZTgJiqRWL5wWednBz8zyRUhSuEDTzefieg&usqp=CAU" class="rounded-circle" style="width: 150px;" alt="Avatar" />
                        </div>

                        <input type="file" class="form-control-file">
                        <hr>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-lg-7">
                <!-- Area Chart -->
                <div class="card shadow mb-4 card-purple card-outline">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Détails</h6>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card-body">
                        <form method="post" action="{{ route('staffs.store') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Nom</label>
                                    <input type="text" class="form-control" name="staff_name">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="surname">Prénom</label>
                                    <input type="text" class="form-control" name="staff_surname">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="staff_email">
                            </div>

                            <div class="form-group">
                                <label for="phone">Téléphone</label>
                                <input type="text" class="form-control" name="staff_phone">
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="adress">Ville</label>
                                    <input type="text" class="form-control" name="staff_adress">
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="code">Code</label>
                                    <input type="text" class="form-control" name="staff_code" value="{{$code_generator}}" readonly>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Utilisateur</label>
                                <select id="inputState" class="form-control" name="user_id">
                                    <option selected>Choisir...</option>
                                    @foreach ($users as $user) 
                                        <option value="{{ $user->id }}">{{ $user->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="box-footer text-right">
                                <button type="submit" class="btn btn-success mt-4"><i class="fa-solid fa-file-arrow-down"></i> Soumettre</button>&nbsp;&nbsp;
                                <a href="{{ route('home') }}" class="btn btn-primary mt-4"><i class="fa-solid fa-arrow-left"></i> Retour</a>
                            </div>
                        </form>
                        <hr>
                    </div>    
                </div>    
            </div>

        </div>

    </div>   

@endsection




