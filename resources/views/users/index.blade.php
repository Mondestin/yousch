@extends('layouts.app')

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
@endsection