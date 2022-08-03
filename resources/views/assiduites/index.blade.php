@extends('layouts.app')

@section('content')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Assiduité</h3>
        
        @if (session()->has("success"))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        {{-- <div class="d-flex justify-content-between mb-4">
            {{ $staffs->links() }} pagination
            <div><a href="{{ route('assiduites.create') }}" class="btn btn-success">Nouveau</a></div>
        </div> --}}

        <div class="container-fluid mt-5">
            <div class="card card-outline card-primary">

                <div class="card-header">
                    <h3 class="card-title">Période d'absence</h3>
                    <a class="btn btn-success float-right mr-4" href="{{ route('assiduites.create') }}"><i class="fa fa-plus"></i> Nouveau</a>
                </div>
            
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Justicatif</th>
                                    <th>Date</th>
                                    <th>Heure</th>
                                    <th>Retard</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($assiduites as $ass)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $ass->justificatif ? 'JUSTIFIEE' : 'NON JUSTIFIEE'}}</td>
                                    <td>{{ $ass->date }}</td>
                                    <td>{{ $ass->time }}</td>
                                    <td>{{ $ass->retard ? 'OUI' : 'NON' }}</td>
                                    <td>
                                        <form action="{{ route('assiduites.destroy', $ass->id) }}" method="POST">
                                            <a href="{{ route('assiduites.edit', $ass->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pen" ></i></a>
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
        

    </div>

@endsection