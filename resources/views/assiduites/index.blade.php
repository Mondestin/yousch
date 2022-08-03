@extends('layouts.app')

@section('content')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Assiduité</h3>
        
        @if (session()->has("success"))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between mb-4">
            {{-- {{ $staffs->links() }} pagination --}}
            <div><a href="{{ route('assiduites.create') }}" class="btn btn-success">Nouveau</a></div>
        </div>

        {{-- <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Lieu</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Responsables</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($campus as $cmps)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $cmps->campus_name }}</td>
                    <td>{{ $cmps->campus_location }}</td>
                    <td>{{ $cmps->campus_phone }}</td>
                    <td>{{ $cmps->campus_email }}</td>
                    <td>{{ $cmps->staff_id }}</td>
                    <td>
                        <form action="{{ route('campus.destroy', $cmps->id) }}" method="POST">
                            <a href="{{ route('campus.edit', $cmps->id) }}" class="btn btn-info">Éditer</a>
                            {{-- <a href="#" class="btn btn-warning">update</a> --}}

                            {{-- @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer')">Supprimer</button>
                            {{-- <a href="#" class="btn btn-danger">Delete</a> --}}
                        {{-- </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        {{-- </table> --}}


        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
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
                                <td>{{ $ass->justificatif ? 'Justifié' : 'Non-justifié'}}</td>
                                <td>{{ $ass->date }}</td>
                                <td>{{ $ass->time }}</td>
                                <td>{{ $ass->retard ? 'Oui' : 'Non' }}</td>
                                <td>
                                    <form action="{{ route('assiduites.destroy', $ass->id) }}" method="POST">
                                        <a href="{{ route('assiduites.edit', $ass->id) }}" class="btn btn-info">Éditer</a>
                                        {{-- <a href="#" class="btn btn-warning">update</a> --}}

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer')">Supprimer</button>
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