@extends('layouts.app')

@section('content')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Créer un nouveau campus</h3>
        
        <!-- Content Row -->
        <div class="container-fluid">
            <!-- Area Chart -->
            <div class="card card-purple card-outline">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-purple">Détails</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('campus.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Nom</label>
                                <input type="text" class="form-control" name="campus_name">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="location">Lieu</label>
                                <input type="text" class="form-control" name="campus_location">
                            </div>
                        </div>
                            
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="campus_email" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Téléphone</label>
                            <input type="text" class="form-control" name="campus_phone">
                        </div>
                            
                        <div class="form-group col-md-4">
                            <label for="inputState">Membre du Staff</label>
                            <select id="inputState" class="form-control" name="staff_id">
                                <option selected>Choisir...</option>
                                @foreach ($staffs as $staff) 
                                    <option value="{{ $staff->id }}">{{ $staff->staff_name}}</option>
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

@endsection




