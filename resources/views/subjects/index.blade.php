@extends('layouts.app')

@section('content')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Matières</h3>
        
        @if (session()->has("success"))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="container-fluid mt-5">
            <div class="card card-outline card-primary">

                <div class="card-header">
                    <h3 class="card-title">Liste des matières</h3>
                    <a class="btn btn-success float-right mr-4" href="{{ route('subjects.create') }}"><i class="fa fa-plus"></i> Nouveau</a>
                </div>
            
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Semestre</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subjects as $subject)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $subject->subject_name }}</td>
                                    <td>{{ $subject->semester }}</td>
                                    <td>{{ $subject->subject_code }}</td>
                                    <td>
                                        <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST">
                                            <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pen" ></i></a>
                                            {{-- <a href="#" class="btn btn-warning">update</a> --}}

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer')"><i class="fa fa-trash" style="color: #fff;"></i></button>
                                            {{-- <a href="#" class="btn btn-danger btn-sm" title="Supprimer">
                                                <i class="fa fa-trash" style="color: #fff;"></i>
                                            </a> --}}
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

    </div>

@endsection