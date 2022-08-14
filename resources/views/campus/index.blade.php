@extends('layouts.app')

@section('content')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Campus</h3>
        


        <div class="container-fluid mt-5">
            <div class="card card-outline card-primary">

                <div class="card-header">
                    <h3 class="card-title">Liste des campus</h3>
                    <a class="btn btn-success float-right mr-4" href="{{ route('campus.create') }}"><i class="fa fa-plus"></i> Nouveau</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Lieu</th>
                                    <th>Téléphone</th>
                                    <th>Email</th>
                                    <th>Responsables</th>
                                    <th>Actions</th>
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
                                    <td>{{ $cmps->staff->staff_name }}</td>
                                    <td>
                                        <form action="{{ route('campus.destroy', $cmps->id) }}" method="POST">
                                            <a href="{{ route('campus.edit', $cmps->id) }}" class="btn btn-info sm"><i class="fa fa-pen" ></i></a>
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

    </div>
        

    </div>

@endsection