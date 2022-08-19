@extends('layouts.app')

@section('content')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Ajouter une nouvelle matière</h3>

        <!-- Content Row -->
        <div class="container-fluid">
            <!-- Area Chart -->
            <div class="card card-purple card-outline">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-purple">Détails</h6>
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
                    <form method="post" action="{{ route('subjects.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Nom</label>
                                <input type="text" class="form-control" name="subject_name">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputState">Semestre</label>
                                <select id="inputState" class="form-control" name="semester">
                                    <option selected>Choisir...</option>
                                        <option value="1">Semestre 1</option>
                                        <option value="0">Semestre 2</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="code">Code</label>
                                <input type="text" class="form-control" name="subject_code">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="semester">Unité d'enseignement</label>
                                <select id="inputState" class="form-control" name="unit_id">
                                    <option selected>Choisir...</option>
                                    @foreach ($units as $unit) 
                                        <option value="{{ $unit->id }}">{{ $unit->unit_name}}</option>
                                    @endforeach
                                </select>
                            </div>
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




