@extends('layouts.app')
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
@endsection