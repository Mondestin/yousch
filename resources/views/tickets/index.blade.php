@extends('layouts.app')


@section('content')

    <div class="bg-body">
        <h3 class="pb-2 mb-4">Tickets</h3>
        
        <div class="container-fluid mt-3">

            <div class="card card-outline card-primary">

                <div class="card-header">
                    <h3 class="card-title">Liste des tickets</h3>


                    <a class="btn btn-success float-right mr-4" href="{{ route('tickets.create') }}"><i class="fa fa-plus"></i> Nouveau ticket</a>
                </div>
            
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
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

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection