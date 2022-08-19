@extends('layouts.app')

@section('content')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Matières</h3>
        
        {{-- @if (session()->has("success"))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif --}}

        <div class="container-fluid mt-5">
            <div class="card card-outline card-purple">

                <div class="card-header">
                    <h3 class="card-title">Unités d'enseignement</h3>
                    <a class="btn btn-success float-right mr-4" href="{{ route('units.create') }}"><i class="fa fa-plus"></i> Nouveau</a>
                </div>
            
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Unité d'enseignement</th>
                                    <th scope="col">Code de l'unité</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($units as $unit)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $unit->unit_name }}</td>
                                    <td>{{ $unit->unit_code }}</td>
                                    <td>
                                        <form action="{{ route('units.destroy', $unit->id) }}" method="POST">
                                            <a href="{{ route('units.show', $unit->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye" ></i></a>
                                            <a href="{{ route('units.edit', $unit->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pen" ></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer')"><i class="fa fa-trash" style="color: #fff;"></i></button>
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