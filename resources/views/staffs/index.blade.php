@extends('layouts.app')

@section('content')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Staff</h3>
        
        @if (session()->has("success"))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between mb-4">
            {{-- {{ $staffs->links() }} pagination --}}
            <div><a href="{{ route('staffs.create') }}" class="btn btn-success">Ajouter un nouveau membre du Staff</a></div>
        </div>

        <table class="table table-bordered table-hover">
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
                            <a href="{{ route('staffs.edit', $staff->id) }}" class="btn btn-info">Éditer</a>
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

@endsection