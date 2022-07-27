@extends('layouts.app')

@section('content')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Modifier une cours</h3>
        
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
                    <form method="post" action="{{ route('courses.update', $course->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Nom</label>
                                <input type="text" class="form-control" name="course_name" value="{{ $course->course_name }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="code">code</label>
                                <input type="text" class="form-control" name="course_code" value="{{ $course->course_code }}">
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




