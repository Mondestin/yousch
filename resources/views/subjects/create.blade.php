@extends('layouts.app')

@section('content')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Créer un nouvelle matière</h3>
        
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
                    <form method="post" action="{{ route('subjects.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Nom</label>
                                <input type="text" class="form-control" name="subject_name">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="semester">Semester</label>
                                <input type="text" class="form-control" name="semester">
                            </div>
                        </div>
                            
                        <div class="form-group">
                            <label for="code">Code</label>
                            <input type="text" class="form-control" name="subject_code">
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Soumettre</button>
                        <a href="{{ route('home') }}" class="btn btn-danger mt-4">Retour</a>
                    </form>
                    <hr>
                </div>    
            </div>    
        </div>
    </div>   

@endsection




