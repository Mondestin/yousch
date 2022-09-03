@extends('layouts.dashboard')
@section('links')
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap4.css">
    <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
@endsection
@section('header')
<div class="content-header">
   <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
          <h1 class="m-0 text-dark">Entrer les Notes d'un étudiant</h1>
         </div><!-- /.col -->
     </div><!-- /.row -->
 </div>

@endsection
@section('content')
<!-- Main content -->




<section class="content">
  <div class="container-fluid">
   <div class="card">
      <div class="card-header blue">      
        <h3 class="box-title" style=" font-size: 20px;"><i class="fa fa-calendar"  aria-hidden="true"></i>&nbsp; Manager les Notes
        </h3>
      </div>
      <div class="container-fluid" style="background: #eee;">

      <form action="{{route('notes.create')}}"> 
       @csrf
        <div class="row" style="margin: 1%;">
          <div class="form-group col-md-2">
          </div>
          <div class="form-group col-md-4">
    
          </div>
          <div class="form-group col-md-3">
            <label for="stNum">Entrer le code de l'étudiant</label>
            <span class="red">*</span>
            <select class="select2 citoyensSelect form-control @error('stNum') is-invalid @enderror pb-4" name="stNum">
              <option value="" hidden="hidden" class="pb-4">Choisir l'étudiant</option>
              @foreach ($students as $key => $value)
                 <option value="{{$value->student_code}}">{{$value->student_code}} - {{$value->student_surname}} - {{$value->student_name}}
                 </option>
              @endforeach 
            </select>
          </div>
          <div class="form-group col-md-3">
           <button type="submit" class="btn btn-primary" style="margin-top: 13%;">
            <span class="fa fa-search"></span>  
             Rechercher
           </button>
          </div>
        </div>
        <div class="row " style="margin-bottom: 25px;">
          <div class="col-md-2">
            <a href="{{route('notes.index')}}" class="btn btn-primary" style="margin-left: 15px;">           
              Retour au menu
            </a>
          </div>
          <div class="col-md-7">
            <a href="{{route('notes.show',9)}}" class="btn btn-primary">
            Aller voir les notes</a>  
          </div>
        </div>
        </form>
      </div>
  <div class="card-body">
        <!-- TABLE FOR ENTERING MARKS -->
      <div class="row">
        <div class="col-md-8" style="margin-left: 2%; margin-top: 5%;">
          <h6>Numero d'Eleve: <strong>{{$stNum ?? ''}}</strong> </h6> 
        <input type="text" id="check" value="{{$stNum ?? ''}}" style="display: none;">
          <h6>Nom(s) et Prenom(s): <strong>{{$name ?? ''}} {{$surname ?? ''}}</strong> </h6>
          <h6>Classe: <strong>{{$class ?? ''}}</strong> </h6>
        </div>
      </div>
     <div class="row" style="margin: 10px; background: #eee; margin-top: 4%;">
        <div class="card-body table-responsive">
        <form id="accept" action="{{route('notes.store')}}" method="POST">
            @csrf   
          <div class="row">
          <div class="form-group col-md-4">
            <label for="exam_code">Choisir le code du devoir</label>
            <span class="red">*</span>
            <select id="selectSub" name="matiere" class="form-control  flow" required="required" disabled="disabled">
             <option hidden="">Sélectionner le code</option>
             @foreach ($subjects as $key => $sub)
              <option value="{{$sub->subject_code}}">{{$sub->subject_code}}</option>
              @endforeach          
            </select>
          </div>
          <div class="form-group col-md-3">
            <label for="mark">Entrer la note de l'Eleve</label>
            <span class="red">*</span>
             <input type="text" name="stNumNote" value="{{$stNum ??'' }}" style="display: none;">
            <input type="text" class="form-control " id="marks" name="mark" placeholder="Entrer la note de l'Eleve" value="" required="required">
          </div>   
          <div class="form-group col-md-3">
           <a href="#" id="checkBtn" class="btn btn-primary" style="margin-top: 13%;" disabled="disabled">
             Sauvegarder
           </a>
          </div>
          </div>
        </form>
        </div>
      </div>
      <br>
      <div class="container-fluid">
        <div class="row" style="margin: 1%;">
 
        </div>
      </div>
      <hr>
      <div class="container-fluid">
        <div class="row" style="margin: 1%;">
          <div class="form-group col-md-10">
           <a href="#" class="btn btn-primary" style="display: none;">Retour</a>
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

    var stNum=$("#check").val();
    if ((stNum=='' || stNum==null)) {
      $("#checkBtn").attr('disabled','disabled');
      $("#selectSub").attr('disabled','disabled');
    }
    else
    {
     $("#checkBtn").removeAttr('disabled');
     $("#selectSub").removeAttr('disabled');
    }
  });
</script>
<script>
  $(function () {
   //==================================
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
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
    $('.citoyensSelect').change(function(e){
    var value= $(this).val();
     $('#idS').val(value);
       $('#selectForm').submit();
    });
    
  })
</script> 
<script>
   $(function () {
    $(".bulC0").addClass("menu-open");
    $(".bulC1").addClass("active");
    $(".colN0").addClass("active");
  });
</script>
@endsection

