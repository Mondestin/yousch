@extends('layouts.app')
@section('content-header')
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-6">
          <h1 class="text-black">Modifier la matière</h1>
          </div>
        </div>
      </div>
 
@endsection
@section('content')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- Content Row -->
        <div class="container-fluid">

            <!-- Area Chart -->
            <div class="card card-purple card-outline">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-purple">Détails</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('subjects.update', $subject->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Nom de la matière</label>
                                <input type="text" class="form-control" name="subject_name" value="{{ $subject->subject_name }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputState">Semestre</label>
                                <select id="inputState" class="form-control" name="semester" value="{{ $subject->semester }}">
                                    <option selected>Choisir...</option>
                                        <option value="1">Semestre 1</option>
                                        <option value="0">Semestre 2</option>
                                </select>
                            </div>
                     
                        
                        
                            <div class="form-group col-md-6">
                                <label for="code">Code de la matière</label>
                            <input type="text" class="form-control" name="subject_code" value="{{ $subject->subject_code }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="semester">Unité d'enseignement</label>
                                <select id="inputState" class="form-control" name="unit_id" value="{{ $subject->unit_id }}" multiple="multiple">
                                    <option selected>Choisir...</option>
                                    @foreach ($units as $unit) 
                                        <option value="{{ $unit->id }}">{{ $unit->unit_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Classe</label>
                                <select class="form-control" name="semester" required>
                                    <option hidden="hideen" value="" selected>Choisir la classe</option>
                                    @foreach ($classes as $class) 
                                        <option value="{{ $class->id }}">{{ $class->class_code}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="box-footer text-right">
                            <button type="submit" class="btn btn-success mt-4"><i class="fa-solid fa-file-arrow-down"></i> Enregistrer</button>&nbsp;&nbsp;
                            <a href="{{ route('subjects.index') }}" class="btn btn-primary mt-4"><i class="fa-solid fa-arrow-left"></i> Retour</a>
                        </div>
                    </form>
                    <hr>
                </div>    
            </div>    

        </div>

    </div>   

@endsection




