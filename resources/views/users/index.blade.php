@extends('layouts.app')
<<<<<<< HEAD

@section('styles')
  @include('layouts.datatablestyles')
@endsection

@section('content')
    <div class="container-fluid">
      <h1 class="text-black ml-3">Utilisateurs</h1>
      
      <div class="container-fluid mt-5">
        <div class="card card-outline card-primary">
          <div class="card-header">
            <h3 class="card-title">Liste des utilisateurs</h3>
          </div>      
          <div class="card-body">
            <table class="table table-bordered table-striped" id="datatable">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Created at</th>
                  <th>Action</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
      
    </div>
@endsection

@section('scripts')
  @include('layouts.datatablescripts')
    <script type="text/javascript">
      $(document).ready( function () {
      $.ajaxSetup({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      });
      $('#datatable').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ url('users') }}",
      columns: [
      { data: 'name', name: 'name' },
      { data: 'email', name: 'email' },
      { data: 'created_at', name: 'created_at' },
      {data: 'action', name: 'action', orderable: false},
      ],
      order: [[0, 'desc']]
      });
      });
    </script>
=======
@section('styles')
@include('layouts.datatablestyles')
@endsection
@section('content-header')
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-6">
          <h1 class="text-black">Utilisateurs</h1>
          </div>
        </div>
      </div>
 
@endsection
@section('content')
    <div class="container-fluid">
        <div class="container-fluid mt-3">
        <div class="card card-outline card-purple">
              <div class="card-header">
                <h3 class="card-title"><b> Liste des utilisateurs</b></h3>
              </div>
              <div class="container-fluid m-3">
              <a class="btn btn-success float-right mr-4" href="{{ route('users.create') }}"><i class="fa fa-plus"></i> New</a>
              <a class="btn btn-primary float-right mr-4" href="#"><i class="fa fa-print"></i> Imprimer la liste</a>
                  <a class="btn btn-success float-right mr-4" href="#"><i class="fa fa-file-excel"></i> Exporter en excel</a>
              </div>      
              <div class="card-body">
                  <table class="table table-bordered table-striped" id="datatable">
                    <thead>
                    <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created at</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                  </table>
              </div>
        </div>
    </div>
    </div>
@endsection
@section('scripts')
@include('layouts.datatablescripts')
<script type="text/javascript">
$(document).ready( function () {
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$('#datatable').DataTable({
processing: true,
serverSide: true,
ajax: "{{ url('users') }}",
columns: [
{ data: 'name', name: 'name' },
{ data: 'email', name: 'email' },
{ data: 'created_at', name: 'created_at' },
{data: 'action', name: 'action', orderable: false},
],
order: [[0, 'desc']]
});
});
</script>
>>>>>>> e19bcdabde31c9174269652d945e9d8c56c6b0b4
@endsection