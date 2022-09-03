@extends('layouts.app')
@section('content-header')
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-6">
          <h1 class="text-black">Notes</h1>
          </div>
        </div>
      </div>
 
@endsection
@section('content')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="container-fluid">
            <div class="card card-purple card-outline">

                <div class="card-header">
                  
                    <a class="btn btn-success float-right mr-4" href="{{ route('notes.create') }}"><i class="fa fa-plus"></i> Nouvelle entrée</a>
                </div>
            
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>

                                </tr>
                            </thead>
                            <tbody>
                               
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection