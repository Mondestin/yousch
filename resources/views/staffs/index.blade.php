@extends('layouts.app')

@section('content')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Staff</h3>
        
        @if (session()->has("success"))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                {{-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> --}}
                <a class="btn btn-success float-right mr-4" href="{{ route('staffs.create') }}"><i class="fa fa-plus"></i> Nouveau</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Téléphone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Campus</th>
                                <th scope="col">Code</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staffs as $staff)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $staff->staff_name }}</td>
                                <td>{{ $staff->staff_surname }}</td>
                                <td>{{ $staff->staff_phone }}</td>
                                <td>{{ $staff->staff_email }}</td>
                                <td>{{ $staff->staff_adress }}</td>
                                <td>{{ $staff->staff_code }}</td>
                                <td>
                                    <form action="{{ route('staffs.destroy', $staff->id) }}" method="POST">
                                        <a href="{{ route('staffs.edit', $staff->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pen" ></i></a>
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

@endsection