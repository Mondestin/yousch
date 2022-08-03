@extends('layouts.app')

@section('content')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Cours</h3>
        
        @if (session()->has("success"))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a class="btn btn-success float-right mr-4" href="{{ route('courses.create') }}"><i class="fa fa-plus"></i> Nouveau</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Code</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $course->course_name }}</td>
                                <td>{{ $course->course_code }}</td>
                                <td>
                                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-info sm"><i class="fa fa-pen" ></i></a>
                                        {{-- <a href="#" class="btn btn-warning">update</a> --}}

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer')"><i class="fa fa-trash" style="color: #fff;"></i></button>
                                        {{-- <a href="#" class="btn btn-danger">Delete</a> --}}
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>

@endsection