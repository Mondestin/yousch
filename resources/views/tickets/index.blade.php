@extends('layouts.app')
<<<<<<< HEAD
=======


>>>>>>> b12ca21f5cef66280b75f28081d5a31cd7f03c7d
@section('content')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Tickets</h3>
        
        <div class="container-fluid mt-5">

    <div class="bg-body">
        <h3 class="pb-2 mb-4">Tickets</h3>
<<<<<<< HEAD
=======
        
>>>>>>> b12ca21f5cef66280b75f28081d5a31cd7f03c7d
        <div class="container-fluid mt-3">

            <div class="card card-outline card-primary">

                <div class="card-header">
                    <h3 class="card-title">Liste des tickets</h3>

<<<<<<< HEAD
                    <a class="btn btn-success float-right mr-4" href="{{ route('subjects.create') }}"><i class="fa fa-plus"></i> Nouveau ticket</a>
=======
>>>>>>> b12ca21f5cef66280b75f28081d5a31cd7f03c7d

                    <a class="btn btn-success float-right mr-4" href="{{ route('tickets.create') }}"><i class="fa fa-plus"></i> Nouveau ticket</a>
                </div>
            
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>

                                    <th scope="col">De</th>
                                    <th scope="col">A</th>
                                    <th scope="col">Subjet</th>

                                    <th scope="col">De:</th>
                                    <th scope="col">A:</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Sujet</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>
                                        5
                                    </td>
                                </tr>
<<<<<<< HEAD
=======

>>>>>>> b12ca21f5cef66280b75f28081d5a31cd7f03c7d
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection