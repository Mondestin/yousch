@extends('layouts.app')
@section('links')
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap4.css">
    <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
@endsection
 @section('content-header')
 <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-md-6">
      <h1 class="text-black">{{ Auth::user()->type=="Staff"? "Gestions des notes et Bulletin" : "Notes et Bulletin"}}</h1>
      </div>
    </div>
  </div>
@endsection
@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    {{-- only staff can see this --}}
    @if (Auth::user()->type=="Staff")
   <div class="card card-outline card-purple">
  <div class="card-body">
        <!-- TABLE FOR ENTERING MARKS -->
      <div class="row">
        <div class="col-md-8" style="margin-left: 2%;">
          <h6>Code de l'étudiant: <strong>{{$student->student_code ?? ''}}</strong> </h6> 
        <input type="text" id="check" value="{{$student_code ?? ''}}" style="display: none;">
          <h6>Nom(s) et Prénom(s): <strong>{{$student->student_surname ?? ''}} {{$student->student_name ?? ''}}</strong> </h6>
          <h6>Classe: <strong>{{$student->class->class_name ?? ''}}</strong> </h6>
          <h6>Parcours: <strong>{{$student->course->course_code ?? ''}}</strong> </h6>
          <h6>Campus: <strong>{{$student->campus->campus_name ?? ''}}</strong> </h6>
        </div>
      </div>
     <div class="container-fluid" style="margin: 10px; background: #eee; margin-top: 4%;">
        <div class="card-body table-responsive">
        <form id="accept" action="{{route('notes.store')}}" method="POST">
            @csrf   
            @method("POST")
            <input type="text" name="student_id" value="{{$student->id}}" class="d-none">
            <div class="row" style="margin: 1%;">
              <div class="form-group col-md-3">
                <label for="staff_id">Intervenant </label>
                <span class="red"> *</span>
                <select class="form-control @error('staff_id') is-invalid @enderror" name="staff_id">
                    <option value="" hidden selected>Choisir le responsable</option>
                    @foreach ($staffs as $staff) 
                        <option value="{{ $staff->id }}">{{ $staff->staff_name}}</option>
                    @endforeach
                </select>
            </div>
              <div class="form-group col-md-4">
                  <label for="subject_id">Matière</label>
                  <span class="red">*</span>
                  <select name="subject_id" class="form-control @error('subject_id') is-invalid @enderror" style="overflow-y: scroll;">
                    <option hidden="" value="">Choisir la matière...</option>
                    @foreach ($subjects as $subject)
                      <option value="{{$subject->id}}">{{$subject->subject_code}} | {{$subject->subject_name}} | {{$subject->unit->unit_code}}</option>
                    @endforeach     
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="note">Entrer la note</label>
                  <span class="red">*</span>
                    <input type="number" id="marks" name="note" value="{{ old('note')}}" class="form-control" placeholder="entrer la note">
                </div>
              <div class="form-group col-md-2">
               <button type="submit" id="checkBtn" class="btn btn-success" style="margin-top: 15%;">
                   <span class="fa fa-save"></span>  
                 Valider
               </button>
              </div>
            </div>
        </form>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row" style="margin: 1%;">
          <div class="form-group col-md-10">
           <a href="{{route('notes.index')}}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Retour</a>
           <a href="{{route('notes.edit', $student->id)}}" class="btn btn-warning "><i class="fa-solid fa-pen"></i> Modifier les notes de l'étudiant</a>
          </div>
          <div class="form-group col-md-2">
          </div>
        </div>
      </div>
    </div>
  </form>
    <!-- /.card-body -->      
    <!-- /.card -->
  </div> 
  @endif
<div class="row p-3">
  <div class="card">
    <a href="#" class="btn btn-success">
     <i class="fa-solid fa-download"></i>
     Générer un Bulletin
    </a>
 </div> 
  @foreach ($units as $unit)
  <div class="card collapsed-card col-12  card-outline card-purple">
    <div class="card-header">
      <h3 class="card-title"><strong>{{$unit->unit_code}}</strong> </h3>
      <div class="card-tools">
        <span title="3 Matières" class="badge badge-primary">{{$unit->num}}</span>
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-plus"></i>
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Nom de l'évaluation</th>
            <th>Code</th>
            <th>Date</th>
            <th>Intervenant</th>
            <th>Note</th>
            <th>Grade</th>
          </tr>
        </thead>
        <tbody>
              @foreach ($notes as $note)
              @if ($unit->unit_code==$note->subject->unit->unit_code)
                <tr>
                  <td>{{$note->subject->subject_name}}</td>
                  <td>{{$note->subject->subject_code}}</td>
                  <td>{{ date('d/m/Y', strtotime($note->created_at)) }}</td>
                  <td>
                    {{$note->staff->staff_name}}
                  </td>
                  <td><span class="badge {{$note->note >=10 ? 'badge-success' : 'badge-danger'}}">{{$note->note}}</span></td>
                  <td>
                    {{$note->note >=10 ? 'PASS' : 'FAIL'}}
                  </td>
                </tr>
              @endif
              @endforeach  
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  @endforeach 

</div>
</div>
 </section>
@endsection
@section('scripts')
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- Toastr -->
<script src="../../plugins/toastr/toastr.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $("#example3").DataTable();
    $("#toast-container").fadeOut(12000);
  });
</script>
<script>
  $(function () {
   //===============Check the mark before submitting===================
      $("#checkBtn").click(function(){
      var news=$("#marks").val();
      if (news>20 || news=='' || news==null) {
      alert("La note ne peut pas être superieur à 20 ou vide");
      }
      else{
         $("#accept").submit();
      }   
     });
  });
</script> 
@endsection

