@extends('layouts.app')
@section('styles')
@include('layouts.datatablestyles')
@endsection
@section('content-header')
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-6">
          <h1 class="text-black">Etudiants</h1>
          </div>
        </div>
      </div>
 
@endsection
@section('content')
    <div class="container-fluid">
        <div class="container-fluid mt-3">
        <div class="card card-outline card-purple">
              <div class="card-header">
                <h3 class="card-title"><b> Liste des étudiants</b></h3>
              </div>
              <div class="container-fluid m-3">
              <a class="btn btn-success float-right mr-4" href="{{ route('students.create') }}"><i class="fa fa-plus"></i> Nouvelle entrée</a>
              <a class="btn btn-primary float-right mr-4" href="#"><i class="fa fa-print"></i> Imprimer la liste</a>
                  <a class="btn btn-success float-right mr-4" href="#"><i class="fa fa-file-excel"></i> Exporter en excel</a>
              </div>      
              <div class="card-body">
                  <table class="table table-bordered table-striped" id="datatable">
                    <thead>
                    <tr>
                    <th>Code</th>
                    <th>Nom(s)</th>
                    <th>Prénom(s)</th>
                    <th>Email</th>
                    <th>Date de Naissance</th>
                    <th>Lieu de Naissance</th>
                    <th>Téléphone</th>
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
ajax: "{{ url('students') }}",
columns: [
{ data: 'student_code', name: 'student_code' },
{ data: 'student_surname', name: 'student_surname' },
{ data: 'student_name', name: 'student_name' },
{ data: 'student_email', name: 'student_email' },
{ data: 'student_dob', name: 'student_dob' },
{ data: 'student_pob', name: 'student_pob' },
{ data: 'student_phone', name: 'student_phone' },
{data: 'action', name: 'action', orderable: false},
],
order: [[0, 'desc']]
});
});
</script>
@endsection