@extends('layouts.app')

@section('content')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Modifier le campus</h3>
        
        @if (session()->has("success"))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <!-- Content Row -->
        <div class="container-fluid">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
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
                    <form method="post" action="{{ route('campus.update', $campus->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Nom</label>
                                <input type="text" class="form-control" name="campus_name" value="{{ $campus->staff_name }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="location">Lieu</label>
                                <input type="text" class="form-control" name="campus_location" value="{{ $campus->campus_location }}">
                            </div>
                        </div>
                            
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="campus_email" value="{{ $campus->campus_email }}">
                        </div>

                        <div class="form-group">
                            <label for="phone">Téléphone</label>
                            <input type="text" class="form-control" name="campus_phone" value="{{ $campus->campus_phone }}">
                        </div>
                            
                        <div class="form-group col-md-4">
                            <label for="inputState">Membre du staff</label>
                            <select id="inputState" class="form-control" name="staff_id" value="{{ $campus->staff_id }}" multiple="multiple">
                                <option selected>Choisir...</option>
                                @foreach ($staffs as $staff) 
                                    <option value="{{ $staff->id }}">{{ $staff->staff_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Mettre à jour</button>
                        <a href="{{ route('home') }}" class="btn btn-danger mt-4">Retour</a>
                    </form>
                    <hr>
                </div>    
            </div>    

        </div>

    </div>   

@endsection




