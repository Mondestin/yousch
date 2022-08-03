@extends('layouts.app')

@section('content')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Modification</h3>
        
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
                    <form method="post" action="{{ route('assiduites.update', $assiduite->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Date</label>
                                <input type="date" class="form-control" name="date" value="{{ $assiduite->date }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="location">Heure</label>
                                <input type="time" class="form-control" name="time" value="{{ $assiduite->time }}">
                            </div>
                        </div>

                        <div class="form-row mt-4">
                            <div class="form-group col-md-6">
                                <label for="inputState">Justicatif</label>
                                <select id="inputState" class="form-control" name="justificatif" value="{{ $assiduite->justificatif }}">
                                    <option selected>Choisir...</option>
                                        <option value="1">Justifié</option>
                                        <option value="0">Non-justifié</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputState">Retard</label>
                                <select id="inputState" class="form-control" name="retard" value="{{ $assiduite->retard }}">
                                    <option selected>Choisir...</option>
                                        <option value="1">Oui</option>
                                        <option value="0">Non</option>
                                </select>
                            </div>
                        </div>
                        

                        <button type="submit" class="btn btn-primary mt-4">Enregistrer</button>
                        <a href="{{ route('home') }}" class="btn btn-danger mt-4">Retour</a>
                    </form>
                    <hr>
                </div>    
            </div>    
        </div>
    </div>   

@endsection




