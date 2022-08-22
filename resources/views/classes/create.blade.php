@extends('layouts.app')

@section('content')

    <div class="my-3 p-3 bg-body rounded">
        <h3 class="border-bottom pb-2 mb-4">Créer une nouvelle classe</h3>
        
        <!-- Content Row -->
        <div class="container-fluid">
            <!-- Area Chart -->
            <div class="card card-purple card-outline col-md-5">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-purple">Détails</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('classes.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Nom de la classe</label>
                                <input type="text" class="form-control" name="class_name" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="code">Code de la classe</label>
                                <input type="text" class="form-control" name="class_code" required>
                            </div>
                        </div>

                        <div class="box-footer text-right">
                            <button type="submit" class="btn btn-success mt-4"><i class="fa-solid fa-file-arrow-down"></i> Soumettre</button>&nbsp;&nbsp;
                            <a href="{{ route('classes.index') }}" class="btn btn-primary mt-4"><i class="fa-solid fa-arrow-left"></i> Retour</a>
                        </div>
                    </form>
                    <hr>
                </div>    
            </div>    
        </div>
    </div>   

@endsection




