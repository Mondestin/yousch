@extends('layouts.app')

@section('content')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Matières</h3>
        
        @if (session()->has("success"))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between mb-4">
            {{-- {{ $staffs->links() }} pagination --}}
            <div><a href="{{ route('subjects.create') }}" class="btn btn-success">Nouveau</a></div>
        </div>

        <table class="table table-bordered table-hover">
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
                            <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-info">Éditer</a>
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